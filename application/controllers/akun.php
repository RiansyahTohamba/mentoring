<?php

/**
 * kelas ini sudah tidak digunakan
 * TETAPI ! 
 * kelas ini JANGAN dihapus dulu, karena kedepannya akan 
 * di coba untuk membuat libraries login degan mengikuti
 * pola coding seperti contoh in
 */
class akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('access');
//        $this->access->restrict();
    }

    public function index() {
//        $this->access->logout();
        $this->login();
    }

    public function login() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|strip_tags');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        //penggunaan fungsi check_login()
        $this->form_validation->set_rules('token', 'token', 'callback_check_login');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
            if ($this->access->is_login('peserta') == TRUE) {
                redirect('peserta');
            }
        } else {
            redirect('peserta');
        }
    }

    function logout() {
        $this->session->unset_userdata('id_akun');
        $this->session->unset_userdata('username');        
        $this->session->unset_userdata('login_peserta');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect(site_url());
    }

    public function check_login() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $login = $this->access->loginPeserta($username, $password);
        if ($login) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_login', 'Username atau password anda salah');
            return FALSE;
        }
    }

}
