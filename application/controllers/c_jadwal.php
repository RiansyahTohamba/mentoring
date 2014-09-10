<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_jadwal extends CI_Controller {

    private $limit = 2;

    function __construct() {
        parent::__construct();
        $this->load->library(array('table'));
        $this->load->model('m_jadwal', '', TRUE);
        $this->load->helper(array('url', 'form'));
    }

    function index($offset = 0, $order_column = 'id_jadwal', $order_type = 'asc') {
        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'id_jadwal';
        if (empty($order_type))
            $order_type = 'asc';

        //data jadwal
        $jadwal = $this->m_jadwal->selectPageList($this->limit, $offset, $order_column, $order_type)->result();

        //paging
        $this->load->library('pagination');
        $config['base_url'] = site_url('c_jadwal/index/');
        $config['total_rows'] = $this->m_jadwal->selectAll();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //tabel

        $this->load->library('table');
        $this->table->set_heading(
                'NO', 'Hari', 'Jam', 'Kelompok', 'Jadwal', 'Aksi');

        $i = 0 + $offset;

        foreach ($jadwal as $jadwal) {
            $temp = $jadwal->id_jadwal;
            $jk = substr($temp, 0, 1);
            if ($jk == 1) {
                $jk = "Ikhwan";
            } else {
                $jk = "Akhwat";
            }


            $this->table->add_row(++$i, $jadwal->hari, $jadwal->jam, $jadwal->kelompok, $jk, anchor('c_jadwal/delete/' . $jadwal->id_jadwal, 'delete', array('onclick' => "return confirm('lanjutkan menghapus?')")));
        }

        $data['table'] = $this->table->generate();
        if ($this->uri->segment(3) == 'delete_success')
            $data['message'] = 'Data berhasil dihapus';
        elseif ($this->uri->segment(3) == 'add_success')
            $data['message'] = 'data berhasil ditambah';
        elseif ($this->uri->segment(3) == 'exist')
            $data['message'] = 'jadwal sudah terdaftar';
        elseif ($this->uri->segment(3) == 'null')
            $data['message'] = 'input tidak boleh kosong';
        else
            $data['message'] = '';

        //daftar jadwal
        $this->load->view('v_jadwal', $data);
    }

    function viewInsert() {
        $this->load->view('v_insert_jadwal');
    }

//
//    function view($nrp) {
//        $data['title'] = 'Panitia Detail';
//        $data['daftar_panitia'] = anchor('c_panitia/index', 'Daftar Panitia');
//
//        // detail pengajar
//        $data['panitia'] = $this->m_panitia->selectById($nrp)->row();
//        $this->load->view('v_detail_panitia', $data);
//    }
//
//    function delete($id) {
//        $this->m_panitia->delete($id);
//        redirect('c_panitia/index/delete_success', 'refresh');
//    }
//
//    function viewCalonPanitia($offset = 0, $order_column = 'nrp', $order_type = 'asc') {
//
//        if (empty($offset))
//            $offset = 0;
//        if (empty($order_column))
//            $order_column = 'nrp';
//        if (empty($order_type))
//            $order_type = 'asc';
//
//        //data mahasiswa
//        $mahasiswa = $this->m_mahasiswa->selectPageList($this->limit, $offset, $order_column, $order_type)->result();
//
//        //paging
//        $this->load->library('pagination');
//        $config['base_url'] = site_url('c_pengajar/viewCalonPanitia/');
//        $config['total_rows'] = $this->m_mahasiswa->selectAll();
//        $config['per_page'] = $this->limit;
//        $config['uri_segment'] = 3;
//        $this->pagination->initialize($config);
//        $data['pagination'] = $this->pagination->create_links();
//
//        //tabel
//
//        $this->load->library('table');
//        $this->table->set_heading(
//                'NO', 'NRP', 'Nama', 'Jurusan', 'Aksi');
//
//        $i = 0 + $offset;
//
//        foreach ($mahasiswa as $mahasiswa) {
//
//
//            $this->table->add_row(++$i, $mahasiswa->nrp, $mahasiswa->nama_mahasiswa, $mahasiswa->jurusan, anchor('c_panitia/add/' . $mahasiswa->nrp . '/', 'ADD'));
//        }
//
//        $data['table'] = $this->table->generate();
//
//        if ($this->uri->segment(3) == 'exist')
//            $data['message'] = 'data sudah terdaftar';
//        else if ($this->uri->segment(3) == 'add_success')
//            $data['message'] = 'data berhasil ditambah';
//        else
//            $data['message'] = '';
//
//        //daftar calon panitia
//        $this->load->view('v_calon_panitia', $data);
//    }
//

    function insert() {
        $hari = $this->input->post('hari');
        $jam = $this->input->post('jam');
        $jk = $this->input->post('jk');
        $kelompok = $this->input->post('kelompok');
       
        switch ($hari) {
            case 'senin';
                $a = 1;
                break;

            case 'selasa';
                $a = 2;
                break;

            case 'rabu';
                $a = 3;
                break;

            case 'kamis';
                $a = 4;
                break;

            case 'jumat';
                $a = 5;
                break;

            case 'sabtu';
                $a = 6;
                break;
        }
        $id = $jk . $a . $jam . $kelompok;

        $jadwal = array(
            'id_jadwal' => $id,
            'hari' => $hari,
            'jam' => $jam,
            'kelompok' => $kelompok
        );

        $pesan = $this->m_jadwal->selectById($id)->result();
        if ( empty($jk) ) {
            redirect("c_jadwal/index/null");
        } else {
            if ($pesan == TRUE) {

                redirect("c_jadwal/index/exist");
            } else {
                $this->m_jadwal->insert($jadwal);
                redirect("c_jadwal/index/add_success");
            }
        }
    }

//    function view($id_jadwal) {
//        $data['title'] = 'Panitia Detail';
//        $data['daftar_panitia'] = anchor('c_jadwal/index', 'Daftar Jadwal');
//
//        // detail pengajar
//        $data['jadwal'] = $this->m_jadwal->selectById($id_jadwal)->row();
//        $this->load->view('v_detail_jadwal', $data);
//    }

    function delete($id) {
        $this->m_jadwal->delete($id);
        redirect('c_jadwal/index/delete_success', 'refresh');
    }

}