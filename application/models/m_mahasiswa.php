<?php

class M_mahasiswa extends CI_Model {

    private $nrp = 'nrp';
    private $table = 'tb_mahasiswa';

    function __construct() {
        parent::__construct();
    }

    function selectPageList($limit , $offset = 0, $order_column = '', $order_type = 'asc') {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->nrp, 'asc');
        else
            $this->db->order_by($order_column, $order_type);
        return $this->db->get($this->table, $limit, $offset);
    }

    function selectAll() {
        return $this->db->get($this->table);
    }

    function selectById($id) {
        $this->db->where($this->nrp, $id);
        return $this->db->get($this->table);
    }
    function insert($mahasiswa){
    }
    function delete($id){
        $this->db->where($this->nrp, $id);
        $this->db->delete($this->table);    
    }
    public function calon_peserta() {
        return $this->db->query(""
                . "SELECT * FROM $this->table "
                . "WHERE nrp NOT IN (SELECT nrp FROM tb_peserta) "
                    . "AND nrp NOT IN (SELECT nrp FROM tb_pementor) "
                    . "AND nrp NOT IN (SELECT nrp FROM tb_panitia)"                    
                . "");
    }

    public function calon_pengajar() {
        return  $this->db->query(""
                        . "SELECT * FROM $this->table "
                        . "WHERE nrp NOT IN (SELECT nrp FROM tb_peserta) "
                            . "AND nrp NOT IN (SELECT nrp FROM tb_pementor) "
                        . "");        
    }
    
    public function calon_panitia() {
        $query = $this->db->query(""
                        . "SELECT * FROM $this->table "
                        . "WHERE nrp NOT IN (SELECT nrp FROM tb_peserta) "
                            . "AND nrp NOT IN (SELECT nrp FROM tb_panitia) "
                        . "");
        return $query->result();
    }    
}

?>
