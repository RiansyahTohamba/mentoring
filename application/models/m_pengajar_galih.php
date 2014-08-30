<?php

class M_pengajar extends CI_Model {

    private $primary_key = 'id_pementor';
    private $table = 'tb_pementor';

    function __construct() {
        parent::__construct();
    }

    function selectPageList($limit, $offset = 0, $order_column = '', $order_type = 'asc') {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary_key, 'asc');
        else
            $this->db->order_by($order_column, $order_type);
        $this->db->select('tb_pementor.id_pementor, tb_pementor.nrp, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.jurusan, tb_mahasiswa.fakultas, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_pementor', 'tb_pementor.nrp = tb_mahasiswa.nrp');
        $this->db->limit($limit, $offset);
        return $this->db->get();
    }

    function selectAll() {
        $this->db->select('tb_pementor.id_pementor, tb_pementor.nrp, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.jurusan, tb_mahasiswa.fakultas, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_pementor', 'tb_pementor.nrp = tb_mahasiswa.nrp');
        return $this->db->get();
    }

    function selectById($nrp) {
        return $this->db->query('select tb_pementor.id_pementor, tb_pementor.nrp, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.jurusan, tb_mahasiswa.fakultas, tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak
             from tb_mahasiswa, tb_pementor where tb_pementor.nrp = tb_mahasiswa.nrp and tb_mahasiswa.nrp=' . $nrp . '');
    }

    function insert($pengajar) {
        $this->db->insert($this->table, $pengajar);
    }

    function delete($id) {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
    }

}

?>
