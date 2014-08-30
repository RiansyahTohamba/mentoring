<?php

class M_peserta extends CI_Model {

    private $primary_key = 'id_peserta';
    private $table = 'tb_peserta';

    function __construct() {
        parent::__construct();
    }

    function selectPageList($limit, $offset = 0, $order_column = '', $order_type = 'asc') {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary_key, 'asc');
        else
            $this->db->order_by($order_column, $order_type);
        $this->db->select('tb_peserta.id_peserta, tb_peserta.nrp, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.jurusan, tb_mahasiswa.fakultas, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_peserta', 'tb_peserta.nrp = tb_mahasiswa.nrp');
        $this->db->limit($limit);
        return $this->db->get();
    }

    function selectAll() {
        $this->db->select('tb_peserta.id_peserta, tb_peserta.nrp, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.jurusan, tb_mahasiswa.fakultas, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_peserta', 'tb_peserta.nrp = tb_mahasiswa.nrp');
        return $this->db->get();
    }

    public function selectById($nrp) {
        return $this->db->query('SELECT tb_peserta.id_peserta, 
            tb_peserta.nrp, nama_mahasiswa, 
            jurusan, fakultas, 
            jenis_kelamin, kontak
            FROM tb_mahasiswa, tb_peserta 
            WHERE tb_peserta.nrp = tb_mahasiswa.nrp 
              AND tb_mahasiswa.nrp = ' . $nrp . '');
    }

    public function insert($peserta) {        
        return ($this->db->insert($this->table, $peserta)) ? TRUE : FALSE;
    }

    public function delete($id) {
        $this->db->where($this->primary_key, $id);        
        return ($this->db->delete($this->table)) ? TRUE : FALSE;
    }

}

?>
