<?php
class C_loginPengajar extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_pengajar');
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('pengajar/v_login',$data);
    }

    function ceklogin() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query  database
        $result = $this->m_pengajar->login($username, $password);
        
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                $result2 = $this->m_pengajar->getNama($row->id_pementor);
                foreach ($result2 as $row2) {
                    $nama = $row2->nama_mahasiswa;
                }
                //membuat session
                $sess_array = array(
                    'ID' => $row->id_pementor,
                    'USERNAME' => $row->username,
                    'NAMA' => $nama,
                    'login_status'=>true,
                );
                $this->session->set_userdata($sess_array);
                redirect('pengajar/beranda','refresh');
            }
            return TRUE;
        } else {
            //if form validate false
            $this->session->set_flashdata('notif','username atau password yang anda masukan salah');
            redirect('pengajar/login','refresh');
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('NAMA');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('pengajar/login');
    }
}
