<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

    private $limit = 2;

    function __construct() {
        parent::__construct();
        $this->load->library(array('table'));
        $this->load->model('m_mahasiswa', '', TRUE);
        $this->load->helper(array('url'));
    }

    public function index() {
        
    }

    public function delete($id) {
        $this->m_mahasiswa->delete($id);
        redirect('admin');
    }

    public function insertMhs() {

        $nrp = $this->input->post('nrp');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $kontak = $this->input->post('kontak');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        //113040257

        $temJurusan = substr($nrp, 2, 4);
        switch ($temJurusan) {
            case '3010';
                $jurusan = 'Teknik Industri';
                $fakulta = 'Fakultas Teknik';
                break;
            case '3020';
                $jurusan = 'Teknologi Pangan';
                $fakulta = 'Fakultas Teknik';
                break;
            case '3030';
                $jurusan = 'Teknik Mesin';
                $fakulta = 'Fakultas Teknik';
                break;
            case '3040';
                $jurusan = 'Teknik Informatika';
                $fakulta = 'Fakultas Teknik';
                break;
            case '3050';
                $jurusan = 'Teknik Lingkungan';
                $fakulta = 'Fakultas Teknik';
                break;
            case '3060';
                $jurusan = 'Teknik Planologi';
                $fakulta = 'Fakultas Teknik';
                break;
            case '6010';
                $jurusan = 'Desain Komunikasi Visual';
                $fakulta = 'Fakultas Ilmu Seni dan Sastra';
                break;
            case '6020';
                $jurusan = 'Fotografi dan Film';
                $fakulta = 'Fakultas Ilmu Seni dan Sastra';
                break;
//            case '3030';
//                $jurusan = 'Teknik Mesin';
//                $fakulta = 'Fakultas Ilmu Seni dan Sastra';
//                break;
            case '6040';
                $jurusan = 'Seni Musik';
                $fakulta = 'Fakultas Ilmu Seni dan Sastra';
                break;
            case '7010';
                $jurusan = 'Sastra Inggris';
                $fakulta = 'Fakultas Ilmu Seni dan Sastra';
                break;
            
        }
        $jurusan = substr($nrp, 3, 5);

        $mahasiswa = array(
            'nrp' => $nrp,
            'nama_mahasiswa' => $nama,
            'jurusan' => $jurusan,
            'fakultas' => $fakultas,
            'jenis_kelamin' => $jk,
            'kontak' => $kontak,
            'alamat' => $alamat,
            'kota' => $kota
        );



        $this->m_mahasiswa->delete($id);
        redirect('admin');
    }

}