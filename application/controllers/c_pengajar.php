<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_pengajar extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('login_status') != TRUE) {
            $this->session->set_flashdata('notif', 'LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('pengajar/login');
        };
        $this->load->model('m_pengajar');
    }

    private function output($halaman_view = '', $data = array()) {
        //paramate show() yakni : halaman view, data yg akan dikirimkan, level-administrasi 
        //untuk level dapat diganti di pada templates_helper.php difolder helpers
        show("pengajar/$halaman_view", $data, 'pengajar');
    }

    public function index() {
        redirect('pengajar/beranda');
    }

    function beranda() {
        $this->output('v_beranda');
    }

    public function profile() {
        $index['data_profil'] = $this->m_pengajar->getProfile($this->session->userdata('ID'));
        $this->output('v_profile', $index);
    }

    function editProfile() {
        $data = array(
            'nama_mahasiswa' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'kontak' => $this->input->post('kontak')
        );
        $result2 = $this->m_pengajar->updateProfile($this->input->post('nrp'), $data);
        redirect('profile', 'refresh');
    }

    function jadwal() {
        $index['data_jadwal'] = $this->m_pengajar->getJadwal($this->session->userdata('ID'));
        $this->output('v_jadwal', $index);
    }

    function absensi() {
        $index['data_absensi'] = $this->m_pengajar->getJadwal($this->session->userdata('ID'));
        $this->output('v_absensi', $index);
    }

    function getAbsen() {
        $idJadwal = substr($this->uri->segment(3), 0, -1);
        $pertemuan = substr($this->uri->segment(3), -1);
        $index['data_jadwal'] = $this->m_pengajar->getJadwal($this->session->userdata('ID'));
        $index['absen'] = $this->m_pengajar->getAbsen($this->session->userdata('ID'), $idJadwal, $pertemuan);
        $index['pertemuan'] = $this->m_pengajar->getAbsenPertemuan($idJadwal);
        $this->output('v_absensidetail', $index);
    }

    function nilai() {
        $this->output('v_nilai');
    }

    function evaluasi() {
        $this->output('v_evaluasi');
    }

    //controller pengajar bagian kang rahmat



    public function view($nrp) {
        $data['title'] = 'pengajar detail';
        $data['daftar_pengajar'] = anchor('c_pengajar/index', 'Daftar Pengajar');
        // detail pengajar
        $data['pengajar'] = $this->m_pengajar->selectById($nrp)->row();
        $this->load->view('v_detail_pengajar', $data);
    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */