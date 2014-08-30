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
   

    public function  index(){
        
    }
    public function delete($id) {
         $this->m_mahasiswa->delete($id);
         redirect('admin');
    }

    
}

?>
