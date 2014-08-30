<?php

class M_akun extends CI_Model {

    private $primary_key = 'id_akun';
    private $table = 'tb_akun';

    function __construct() {
        parent::__construct();
    }

     function selectAll() {
        return $this->db->count_all($this->table);
    }

    function selectById($nrp) {
     
    }

    function insert($akun) {
        $status = $this->db->insert($this->table,$akun);
        if($status == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function delete($id) {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
    }


}

?>
