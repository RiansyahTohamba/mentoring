<?php

class M_Jadwal extends CI_Model {

    private $primary_key = 'id_jadwal';
    private $table = 'tb_jadwal';

    function __construct() {
        parent::__construct();
    }
    
    public function get_kotak_jadwal($hari) {
        $query = $this->db->query('');
        foreach ($query as $row) {
            
        }
        return $output;
    }
    

    function selectPageList($limit, $offset = 0, $order_column = '', $order_type = 'asc') {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->id_jadwal, 'asc');
        else
            $this->db->order_by($order_column, $order_type);
        return $this->db->get($this->table, $limit, $offset);
    }

    function selectAll() {
        return $this->db->count_all($this->table);
    }

    function insert($jadwal) {
        $this->db->insert($this->table, $jadwal);
    }

    function selectById($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->table);
    }

//
//    function insert($panitia) {
//        $this->db->insert($this->table, $panitia);
//    }
//
    function delete($id) {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
    }
}

?>
