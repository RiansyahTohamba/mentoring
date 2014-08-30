<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_panitia extends CI_Controller {

    private $limit = 2;

    function __construct() {
        parent::__construct();
        $this->load->library(array('table'));
        $this->load->model('m_panitia', '', TRUE);
        $this->load->model('m_mahasiswa', '', TRUE);
        $this->load->model('m_akun', '', TRUE);
        $this->load->helper(array('url'));
    }

    function index($offset = 0, $order_column = 'id_panitia', $order_type = 'asc') {
        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'id_panitia';
        if (empty($order_type))
            $order_type = 'asc';

        //data pengajar
        $panitia = $this->m_panitia->selectPageList($this->limit, $offset, $order_column, $order_type)->result();

        //paging
        $this->load->library('pagination');
        $config['base_url'] = site_url('c_panitia/index/');
        $config['total_rows'] = $this->m_panitia->selectAll();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //tabel

        $this->load->library('table');
        $this->table->set_heading(
                'NO', 'Nama', 'Jabatan', 'Jenis Kelamin', 'No Kontak', 'Aksi');

        $i = 0 + $offset;

        foreach ($panitia as $panitia) {


            $this->table->add_row(++$i, $panitia->nama_mahasiswa, $panitia->jabatan, $panitia->jenis_kelamin, $panitia->kontak, anchor('c_panitia/view/' . $panitia->nrp, 'view') . ' | ' .
                    anchor('c_panitia/delete/' . $panitia->id_panitia, 'delete', array('onclick' => "return confirm('lanjutkan menghapus?')")));
        }

        $data['table'] = $this->table->generate();
        if ($this->uri->segment(3) == 'delete_success')
            $data['message'] = 'Data berhasil dihapus';
        elseif ($this->uri->segment(3) == 'add_success')
            $data['message'] = 'data berhasil ditambah';
        else
            $data['message'] = '';

        //daftar panitia
        $this->load->view('v_panitia', $data);
    }

    function view($nrp) {
        $data['title'] = 'Panitia Detail';
        $data['daftar_panitia'] = anchor('c_panitia/index', 'Daftar Panitia');

        // detail pengajar
        $data['panitia'] = $this->m_panitia->selectById($nrp)->row();
        $this->load->view('v_detail_panitia', $data);
    }

    function delete($id) {
        $this->m_panitia->delete($id);
        redirect('c_panitia/index/delete_success', 'refresh');
    }

    function viewCalonPanitia($offset = 0, $order_column = 'nrp', $order_type = 'asc') {

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
        $config['base_url'] = site_url('c_pengajar/viewCalonPanitia/');
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


            $this->table->add_row(++$i, $mahasiswa->nrp, $mahasiswa->nama_mahasiswa, $mahasiswa->jurusan, anchor('c_panitia/add/' . $mahasiswa->nrp . '/', 'ADD'));
        }

        $data['table'] = $this->table->generate();

        if ($this->uri->segment(3) == 'exist')
            $data['message'] = 'data sudah terdaftar';
        else if ($this->uri->segment(3) == 'add_success')
            $data['message'] = 'data berhasil ditambah';
        else
            $data['message'] = '';

        //daftar calon panitia
        $this->load->view('v_calon_panitia', $data);
    }

    function add($nrp) {

        $panitia = $this->m_panitia->selectById($nrp)->result();
        if ($panitia == TRUE) {
            redirect('c_panitia/viewCalonPanitia/exist', 'refresh');
        } else {
            $panitia = array(
                'nrp' => $nrp,
                'id_honor' => 2
            );
            $this->m_panitia->insert($panitia);

            $panitia = $this->m_panitia->selectById($nrp)->result();
            foreach ($panitia as $panitia) {
                $id_panitia = $panitia->id_panitia;
                $nrp_panitia = $panitia->nrp;
            }
            $akun = array(
                'username' => $nrp_panitia,
                'password' => $nrp_panitia,
                'id_panitia' => $id_panitia
            );
            $this->m_akun->insert($akun);

            redirect('c_panitia/viewCalonPanitia/add_success/');
        }
    }

}

?>
