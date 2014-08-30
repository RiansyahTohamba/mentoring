<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users_model
 *
 * @author muhriansyah
 */
class Users_model extends CI_Model{
    public $table = 'tb_akun';
    public $primary_key = 'id_akun';
    
    public function __construct() {
        parent::__construct();       
        $this->load->database();
    }
    
    function get_login_info($username){
        $this->db->where('username',$username);
        $this->db->limit(1);
        $query = $this->db->get($this->table);
        return ($query->num_rows() > 0 ) ? $query->row() : FALSE;
    }
}
