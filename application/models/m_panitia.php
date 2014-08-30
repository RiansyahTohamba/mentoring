<?php

class M_panitia extends CI_Model {

    private $primary_key = 'id_panitia';
    private $table = 'tb_panitia';

    function __construct() {
        parent::__construct();
    }

    function selectPageList($limit, $offset = 0, $order_column = '', $order_type = 'asc') {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary_key, 'asc');
        else 
            $this->db->order_by($order_column, $order_type);
        $this->db->select('tb_panitia.id_panitia,tb_panitia.nrp, tb_mahasiswa.nama_mahasiswa, tb_panitia.jabatan, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_panitia', 'tb_panitia.nrp = tb_mahasiswa.nrp');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function selectAll() {
         $this->db->select('tb_panitia.id_panitia,tb_panitia.nrp, tb_mahasiswa.nama_mahasiswa, tb_panitia.jabatan, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_panitia', 'tb_panitia.nrp = tb_mahasiswa.nrp');
        return $this->db->get();
    }

    function selectById($nrp) {
      return  $this->db->query('select tb_panitia.id_panitia, tb_panitia.nrp, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.jurusan, tb_mahasiswa.fakultas,tb_panitia.jabatan, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak
             from tb_mahasiswa, tb_panitia where tb_panitia.nrp = tb_mahasiswa.nrp and tb_mahasiswa.nrp=' . $nrp . '');
        
    }

    function insert($panitia) {
        $this->db->insert($this->table, $panitia);
    }

    function delete($id) {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
    }

    
}

?>
