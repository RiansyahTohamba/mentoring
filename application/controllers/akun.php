<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of akun
 *
 * @author muhriansyah
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
            if ($this->access->is_login() == TRUE) {
                redirect('peserta');
            }
        } else {
            redirect('peserta');
        }
    }

    public function logout() {
        $this->access->logout();
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
