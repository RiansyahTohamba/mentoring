<?php

class C_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pengajar');
        $this->load->model('m_panitia');
        $this->load->model('m_peserta');
    }

    function index() {
        $data = array(
            'title' => 'Login Page'
        );
        $this->load->view('v_login', $data);
    }

    function ceklogin() {
        $username = $this->input->post('username_form');
        $password = $this->input->post('password_form');
        //query  database        
        $resultPengajar = $this->m_pengajar->login($username, $password);
        $resultPeserta = $this->m_peserta->login($username, $password);
        $resultPanitia = $this->m_panitia->login($username, $password);
        
         if ($resultPengajar) {
            $sess_array = array();
            foreach ($resultPengajar as $row) {
                $result2 = $this->m_pengajar->getNama($row->id_pementor);                
                foreach ($result2 as $row2) {
                    $nama = $row2->nama_mahasiswa;
                    $jenis_kelamin = $row2->jenis_kelamin;
                }
                //membuat session
                $sess_array = array(                    
                    'ID' => $row->id_pementor,
                    'USERNAME' => $row->username,
                    'NAMA' => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'login_pengajar' => true,
                );
                $this->session->set_userdata($sess_array);
                redirect('pengajar/beranda', 'refresh');
            }
            return TRUE;
        
        } elseif ($resultPanitia) {
            $sess_array = array();
            foreach ($resultPanitia as $row) {
                $result2 = $this->m_panitia->getNama($row->id_panitia);
                foreach ($result2 as $row2) {
                    $nama = $row2->nama_mahasiswa;
                }
                //membuat session
                $sess_array = array(
                    'id_akun_panitia' => $row->id_akun,                    
                    'id_panitia' => $row->id_panitia,
                    'username_panitia' => $row->username,
                    'nama_panitia' => $nama,
                    'login_panitia' => true,
                );
                $this->session->set_userdata($sess_array);
                redirect('panitia', 'refresh');
            }
            return TRUE;            
        } elseif ($resultPeserta) {
            $sess_array = array();
            foreach ($resultPeserta as $row) {
                $result2 = $this->m_peserta->getNama($row->id_peserta);
//                $nama = $result2->nama_mahasiswa;
                foreach ($result2 as $row2) {
                    $nama = $row2->nama_mahasiswa;
                }
                //membuat session
                $sess_array = array(
                    'id_akun_peserta' => $row->id_akun,
                    'id_peserta' => $row->id_peserta,
                    'username_peserta' => $row->username,
                    'nama_peserta' => $nama,
                    'login_peserta' => true,
                );
                $this->session->set_userdata($sess_array);
                redirect('peserta', 'refresh');
            }
            return TRUE;            
        } else {
            //if form validate false
            $this->session->set_flashdata('notif', 'username atau password yang anda masukan salah');
            redirect(base_url(), 'refresh');
            return FALSE;
        }
    }

    function logout() {
        $level_akun = $this->uri->segment(1);
        $this->session->unset_userdata("id_akun_$level_akun");
        $this->session->unset_userdata("id_$level_akun");
        $this->session->unset_userdata("username_$level_akun");
        $this->session->unset_userdata("nama_$level_akun");
        $this->session->unset_userdata("login_$level_akun");
        $this->session->set_flashdata('notif', 'Terima kasih telah menggunakan aplikasi ini');
        redirect(base_url());
    }

}