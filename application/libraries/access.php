<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Access
 *
 * @author muhriansyah
 */
class Access {

    public $user;

//    private $CI;
    function __construct() {
        $this->CI =& get_instance();        
        $auth = $this->CI->config->item('auth');
        $this->CI->load->library('session');
        $this->CI->load->helper('cookie');
        $this->CI->load->model('users_model');
        $this->users_model =& $this->CI->users_model;
    }
    /*
     * cek login
     */
    function loginPanitia($username, $password){
//        mengambil informasi berdasarkan paramater username
        $result = $this->users_model->get_login_info($username);
        if($result){
            //untuk enkripsi
            //$password = md5($password);
            if($password === $result->password && $result->id_panitia != NULL){                
                $data = array(
                    'id_akun'=>$result->id_akun,
                    'username'=>$result->username, 
                    'login_admin'=>TRUE,                    
                );
                $this->CI->session->set_userdata($data);
                return TRUE;
            }
            return FALSE;
        }
    }
    
    function loginPeserta($username, $password){
//        mengambil informasi berdasarkan paramater username
        $result = $this->users_model->get_login_info($username);
        if($result){
            //untuk enkripsi
            //$password = md5($password);
            if($password === $result->password && $result->id_peserta != NULL){                
                $data = array(
                    'id_akun'=>$result->id_akun,
                    'username'=>$result->username,                    
                    'login_peserta'=>TRUE,                    
                );
                $this->CI->session->set_userdata($data);
                return TRUE;
            }
            return FALSE;
        }
    }

    
    function restrict() {
        if ($this->is_login() == TRUE) {
            redirect('admin');
        }else{
            redirect(site_url());
        }        
    }
    /*
     * cek apakah sdh login
     */
    function is_login($level){                   
        return ($this->CI->session->userdata("login_$level") ? TRUE : FALSE);
    }
    /*
     * logout
     */
    function logout(){        
        $this->CI->session->sess_destroy();        
    }
}
