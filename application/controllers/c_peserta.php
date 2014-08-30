<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_peserta extends CI_Controller {

    private $limit = 2;

    function __construct() {
        parent::__construct();
        $this->load->library('table');
        $this->load->model('m_peserta', '', TRUE);
        $this->load->model('m_mahasiswa', '', TRUE);
        $this->load->model('m_akun', '', TRUE);
        $this->load->helper(array('url'));
    }
    

    function viewCalonPeserta($offset = 0, $order_column = 'nrp', $order_type = 'asc') {

        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'nrp';
        if (empty($order_type))
            $order_type = 'asc';

        //data mahasiswa
        $mahasiswa = $this->m_mahasiswa->selectPageList($this->limit, $offset, $order_column, $order_type)->result();

        //paging
        $this->load->library('pagination');
        $config['base_url'] = site_url('c_peserta/viewCalonPeserta/');
        $config['total_rows'] = $this->m_mahasiswa->selectAll();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //tabel

        $this->load->library('table');
        $this->table->set_heading(
                'NO', 'NRP', 'Nama', 'Jurusan', 'Aksi');

        $i = 0 + $offset;

        foreach ($mahasiswa as $mahasiswa) {
            $this->table->add_row( ++$i, $mahasiswa->nrp, $mahasiswa->nama_mahasiswa, $mahasiswa->jurusan, anchor('c_peserta/add/' . $mahasiswa->nrp . '/', 'ADD'));
        }

        $data['table'] = $this->table->generate();

        if ($this->uri->segment(3) == 'exist')
            $data['message'] = 'data sudah terdaftar';
        else if ($this->uri->segment(3) == 'add_success')
            $data['message'] = 'data berhasil ditambah';
        else
            $data['message'] = '';

        //daftar calon panitia
        $this->load->view('v_calon_peserta', $data);
    }

    public function add() {
        $nrp = $this->uri->segment(4);
        $peserta = $this->m_peserta->selectById($nrp)->result();
        if ($peserta == TRUE) {
            redirect(site_url('admin/peserta'), 'refresh');
        } else {
            $peserta = array(
                'id_peserta' => null,
                'nrp' => $nrp,
                'id_jadwal' => null,
            );
            $this->m_peserta->insert($peserta);

            $peserta = $this->m_peserta->selectById($nrp)->result();
            foreach ($peserta as $peserta) {
                $id_peserta = $peserta->id_peserta;
                $nrp_peserta = $peserta->nrp;
            }
            
            $akun = array(
                'username' => $nrp_peserta,
                'password' => $nrp_peserta,
                'id_peserta' => $id_peserta
            );
            
            $status = $this->m_akun->insert($akun);
            if ($status == TRUE) {
                redirect(site_url('admin/peserta/'));
            } else {
                echo 'gagal memasukkan data !';
            }
//            redirect('c_peserta/viewCalonPeserta/add_success/');
        }
    }

    function view($nrp) {
        $data['title'] = 'peserta detail';
        $data['daftar_peserta'] = anchor('c_peserta/index', 'Daftar Peserta');

        // detail pengajar
        $data['peserta'] = $this->m_peserta->selectById($nrp)->row();
        $this->load->view('v_detail_peserta', $data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        if ($this->m_peserta->delete($id) == TRUE) {
//            buat pesan notif kalau data berhasil dihapus
//            redirect(site_url('admin/peserta/delete_success'), 'refresh');
            redirect('admin/peserta');
        }  else {
            echo 'data gagal dihapus dari database';
        }
    }

}

?>
