<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_pengajar extends CI_Controller {

    private $limit = 2;

    function __construct() {
        parent::__construct();
        $this->load->library(array('table', 'form_validation'));
        $this->load->model('m_pengajar', '', TRUE);
        $this->load->model('m_mahasiswa', '', TRUE);
        $this->load->model('m_akun', '', TRUE);
        $this->load->helper(array('url'));
    }

    function index($offset = 0, $order_column = 'id_pementor', $order_type = 'asc') {
        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'id_pementor';
        if (empty($order_type))
            $order_type = 'asc';

        //data pengajar
        $pengajar = $this->m_pengajar->selectPageList($this->limit, $offset, $order_column, $order_type)->result();

        //paging
        $this->load->library('pagination');
        $config['base_url'] = site_url('c_pengajar/index/');
        $config['total_rows'] = $this->m_pengajar->selectAll();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //tabel

        $this->load->library('table');
        $this->table->set_heading(
                'NO', 'NRP', 'Nama', 'Jurusan', 'Fakultas', 'Jenis Kelamin', 'No Kontak', 'Aksi');

        $i = 0 + $offset;

        foreach ($pengajar as $pengajar) {


            $this->table->add_row(++$i, $pengajar->nrp, $pengajar->nama_mahasiswa, $pengajar->jurusan, $pengajar->fakultas, $pengajar->jenis_kelamin, $pengajar->kontak, anchor('c_pengajar/view/' . $pengajar->nrp, 'view') . ' | ' .
                    anchor('c_pengajar/delete/' . $pengajar->id_pementor, 'delete', array('onclick' => "return confirm('lanjutkan menghapus?')")));
        }

        $data['table'] = $this->table->generate();
        if ($this->uri->segment(3) == 'delete_success')
            $data['message'] = 'Data berhasil dihapus';
        elseif ($this->uri->segment(3) == 'add_success')
            $data['message'] = 'data berhasil ditambah';
        else
            $data['message'] = '';

        //daftar pengajar
        $this->load->view('v_pengajar', $data);
    }

    function viewCalonPengajar($offset = 0, $order_column = 'nrp', $order_type = 'asc') {

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
        $config['base_url'] = site_url('c_pengajar/viewCalonPengajar/');
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


            $this->table->add_row(++$i, $mahasiswa->nrp, $mahasiswa->nama_mahasiswa, $mahasiswa->jurusan, anchor('c_pengajar/add/' . $mahasiswa->nrp . '/', 'ADD'));
        }

        $data['table'] = $this->table->generate();

        if ($this->uri->segment(3) == 'exist')
            $data['message'] = 'data sudah terdaftar';
        else if ($this->uri->segment(3) == 'add_success')
            $data['message'] = 'data berhasil ditambah';
        else
            $data['message'] = '';

        //daftar calon panitia
        $this->load->view('v_calon_pengajar', $data);
    }

    function add($nrp) {

        $pengajar = $this->m_pengajar->selectById($nrp)->result();
        if ($pengajar == TRUE) {
            redirect('c_pengajar/viewCalonPengajar/exist', 'refresh');
        } else {
            $pengajar = array(
                'nrp' => $nrp,
                'id_honor' => 1
            );
            $this->m_pengajar->insert($pengajar);

            $pementor = $this->m_pengajar->selectById($nrp)->result();
            foreach ($pementor as $pementor) {
                $id_pementor = $pementor->id_pementor;
                $nrp_pementor = $pementor->nrp;
            }
            $akun = array(
                'username' => $nrp_pementor,
                'password' => $nrp_pementor,
                'id_pementor' => $id_pementor
            );
            $this->m_akun->insert($akun);

            redirect('c_pengajar/viewCalonPengajar/add_success/');
        }
    }

    function view($nrp) {
        $data['title'] = 'pengajar detail';
        $data['daftar_pengajar'] = anchor('c_pengajar/index', 'Daftar Pengajar');

        // detail pengajar
        $data['pengajar'] = $this->m_pengajar->selectById($nrp)->row();
        $this->load->view('v_detail_pengajar', $data);
    }

    function delete($id) {
        $this->m_pengajar->delete($id);
        redirect('c_pengajar/index/delete_success', 'refresh');
    }

}
?>
