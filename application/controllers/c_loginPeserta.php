<?php
/*
 * untuk kedepannya akan coba dibuat pola libraries login, 
 * untuk ke3 level login (panitia,mentee,pementor),
 * mengaculah pada kelas controller/akun, 
 * oleh karena itu , kelas controller/akun JANGAN DIHAPUS !
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_loginPeserta extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_peserta');
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('peserta/v_login',$data);
    }

    function ceklogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query  database
        $result = $this->m_peserta->login($username, $password);
        
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                $result2 = $this->m_peserta->getNama($row->id_peserta);
                foreach ($result2 as $row2) {
                    $nama = $row2->nama_mahasiswa;
                }
                //membuat session
                $sess_array = array(
                    'id_akun' => $row->id_akun,
                    'id_peserta' => $row->id_peserta,                    
                    'USERNAME' => $row->username,
                    'NAMA' => $nama,
                    'login_peserta'=>true,
                );
                $this->session->set_userdata($sess_array);
                redirect('peserta','refresh');
            }
            return TRUE;
        } else {
            //if form validate false
            $this->session->set_flashdata('notif','username atau password yang anda masukan salah');
            redirect('peserta/login','refresh');
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('id_akun');
        $this->session->unset_userdata('id_peserta');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('NAMA');
        $this->session->unset_userdata('login_peserta');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('peserta/login');
    }
}
