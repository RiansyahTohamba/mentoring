<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of barang_controller
 *
 * @author muhriansyah
 */
class peserta_controller extends CI_Controller {    

    public function __construct() {
        parent::__construct();        
        $this->load->model('peserta');        
        $this->load->helper('form');
        $this->load->library('session');
        $this->id_akun = $this->session->userdata('id_akun');        
        if($this->id_akun == ""){
            redirect(site_url());
        }
//        $this->id_akun = '100';//ikhwan        
//        $this->id_akun = '101';//akhwat        
    }

    private function output($halaman_view = '', $data = array()) {        
        //paramate show() yakni : halaman view, data yg akan dikirimkan, level-administrasi 
        //untuk level dapat diganti di pada templates_helper.php difolder helpers
        show($halaman_view, $data,'peserta');
    }
    
    public function index() {
        $this->news();
    }

    public function news() {
        $data = array(
//            'daftar' => $this->penulis->lihat(),            
        );
        $this->output('peserta/news', $data, 'peserta');
//        $this->load->view('beranda', $data);
    }

    public function profile() {
        $data = array(
            'data_profil' => $this->peserta->data_profil($this->id_akun),
        );
        $this->output('peserta/profile', $data);        
    }

    public function edit_profile() {
        if ($this->validasi_profile() == FALSE) {
            $data_profil = $this->peserta->get_data_profil($this->id_akun);
            $this->output('peserta/edit_profile', $data_profil);            
        } else {
            $id_akun = $this->id_akun;
            $data = array(
                'nama_mahasiswa' => $this->input->post('nama'),
                'jenis_kelamin ' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'kontak' => $this->input->post('hp'),
                'kota' => $this->input->post('kota'),
            );
            if ($this->peserta->edit_profile($id_akun, $data) == TRUE) {
                redirect('peserta/profile');
            } else {
                echo 'gagal memasukkan data';
            };
        }
    }

    private function validasi_profile() {
        $this->load->library('form_validation');
        $this->valid = $this->form_validation; //persingkat nama agar lebih mudah digunakan        
        $this->valid->set_message('required', 'isi terlebih dahulu kolom ini ');
        $this->valid->set_rules('nama', 'Nama anda', 'required|min_length[3]');
        $this->valid->set_rules('alamat', 'Alamat anda', 'required|min_length[3]');
        $this->valid->set_rules('kota', 'Alamat anda', 'required|min_length[3]');
        $this->valid->set_rules('hp', 'Hp anda', 'required|min_length[3]');
        return ($this->form_validation->run() == FALSE) ? FALSE : TRUE;
    }

    public function jadwal($notif = null) {
        if($this->peserta->count_jadwal_saya($this->id_akun) > 0){
            $jadwal = $this->peserta->get_jadwal_saya($this->id_akun); 
        }else{
            $jadwal = $this->peserta->get_daftar_jadwal($this->id_akun);
        }
        $data = array(
            'notif'=> $notif,
            'jadwal_saya' => $jadwal,
            'materi' => $this->peserta->get_materi(),
        );
        $this->output('peserta/jadwal', $data);        
    }
    
    public function add_jadwal() {
        $id_jadwal = $this->uri->segment(3);        
        if($this->peserta->add_jadwal($this->id_akun,$id_jadwal) == FALSE){            
            $notif = 'gagal';
        }else{
            $notif = 'berhasil';
        }                    
        $this->jadwal($notif);
    }
    public function absensi() {
        $data = array(
            'presensi' => $this->peserta->get_absensi($this->id_akun),
        );
        $this->output('peserta/absensi', $data);        
    }

    public function nilai() {
        $data = array(
            'nilai' => $this->peserta->get_nilai($this->id_akun),
        );
        $this->output('peserta/nilai', $data);        
    }

    public function evaluasi() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('isi_saran', 'Isi Evaluasi', 'required|xss_clean|min_length[3]|max_length[1000]');        
        if($this->form_validation->run() == TRUE){
            if($this->peserta->simpan_saran($this->id_akun) != TRUE){                            
                echo 'gagal dimasukkan ke database';
            }
        }
        $this->output('peserta/evaluasi');               
    }


}
