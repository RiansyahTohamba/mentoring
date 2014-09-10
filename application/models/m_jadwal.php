<?php

class M_Jadwal extends CI_Model {

    var $output;
    private $primary_key = 'id_jadwal';
    private $table = 'tb_jadwal';

    function __construct() {
        parent::__construct();
    }

    public function get_kotak_jadwal() {
        $this->output = '';
        $hari = array('', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Sabtu');
        for ($id_hari = 1; $id_hari <= 5; $id_hari++) {
            $this->output .= '                        
                <div class="col-lg-6"> 
                    <div class="panel panel-primary">                            
                        <div class="panel-heading"> ' . $hari[$id_hari] . ' </div>                                                        
                        <div class="panel-body">
                            <table class="table-condensed" style="text-align: center">
                                <tr><th> Shift </th> <th> Jumlah Kelompok </th>
                                    <th> Ikhwan/Akhwat</th> <th> &nbsp;</th></tr>';
            for ($id_jam = 1; $id_jam <= 4; $id_jam++) {
                $this->output .= $this->get_kotak_hari($id_hari, $id_jam);
            }
            $this->output .='
                            </table>
                        </div>                                                                                    
                    </div>                                                
                </div>';
        }
        return $this->output;
    }

    public function get_kotak_hari($id_hari, $id_jam) {
        $output = '';
        $output .= $this->get_query_kotak_hari($id_hari, $id_jam, "0");
        $output .= $this->get_query_kotak_hari($id_hari, $id_jam, "1");
        return $output;
    }

    public function get_query_kotak_hari($id_hari, $id_jam, $id_jenis_kelamin) {
        $output = '';
        $query = $this->db->query("            
            SELECT tb_peserta.id_jadwal, COUNT(DISTINCT(tb_peserta.id_jadwal)) as jumlah ,jam FROM tb_peserta,tb_jadwal 
            WHERE (tb_peserta.id_jadwal LIKE '$id_jenis_kelamin$id_hari$id_jam%')"
                . " AND tb_jadwal.id_jadwal = tb_peserta.id_jadwal");

        foreach ($query->result() as $row) {
            $jam = $row->jam;
            $id_jenis_kelamin = substr($row->id_jadwal, 0, 1);
            //membuat url menuju link konten yang menampilkan daftar kelompok per-hari-shift
            $id_jadwal_kelompok = substr($row->id_jadwal, 0, 3);
            if ($id_jenis_kelamin == "1") {
                $jenis_kelamin = 'Ikhwan';
            } else {
                $jenis_kelamin = 'Akhwat';
            }
            if ($row->jumlah > 0) {
                $output .= '                   
                            <tr><td> ' . $jam . ' </td> '
                        . '<td> ' . $row->jumlah . '</td> ' .
                        '<td> ' . $jenis_kelamin . '</td>'.                                
                        '<td> <a href="' . base_url('panitia/jadwal/' . $id_jadwal_kelompok) . '"> detail</a></td>                                
                        </tr>'
                ;
            }
        }

        return $output;
    }

    public function get_kotak_kelompok($id_jadwal = '') {
        $this->output = '';
        $queryKelompok = $this->db->query("SELECT DISTINCT(tb_peserta.id_jadwal),hari,kelompok "
                . "FROM tb_peserta,tb_jadwal "
                . "WHERE tb_peserta.id_jadwal = tb_jadwal.id_jadwal "
                . " AND tb_peserta.id_jadwal LIKE '$id_jadwal%' "
                . "");        
        foreach ($queryKelompok->result() as $value) {
            $id_jadwal = substr($id_jadwal, 0,3);//pengambilan 3 digit awal
            $id_jadwal = "$id_jadwal$value->kelompok";
            $this->output .= '                        
                <div class="col-lg-5"> 
                    <div class="panel panel-primary">                            
                        <div class="panel-heading"> ' . $value->hari . ' - '
                    . 'Kelompok ' . $value->kelompok . '</div>                                                        
                        <div class="panel-body">
                            <table class="table-condensed" style="text-align: center">
                                <tr><th> NRP </th> <th> Nama </th>
                                    <th> Kontak</th> </tr>';            
            $this->output .= $this->get_nama_kelompok($id_jadwal);
            $this->output .= '</table>
                        </div>                                                                                    
                    </div>                                                
                </div>';
        }
        return $this->output;
    }

    public function get_nama_kelompok($id_jadwal) {
        $output = '';
        $queryMentee = $this->db->query("SELECT * "
                . " FROM tb_mahasiswa,tb_peserta,tb_jadwal "
                . "WHERE tb_peserta.id_jadwal = tb_jadwal.id_jadwal "
                . " AND tb_mahasiswa.nrp = tb_peserta.nrp "
                . " AND tb_peserta.id_jadwal = '$id_jadwal'"
                . "");
        $queryPementor = $this->db->query("SELECT nama_mahasiswa "
                . " FROM tb_mahasiswa,tb_jadwal,tb_pementor "
                . "WHERE tb_pementor.id_pementor = tb_jadwal.id_pementor "
                . " AND tb_pementor.nrp = tb_mahasiswa.nrp "
                . " AND id_jadwal = '$id_jadwal'");

        if ($queryPementor->num_rows() > 0) {
            $nama_pementor = $queryPementor->row()->nama_mahasiswa;
        } else {
            $nama_pementor = 'Kosong';
        }

        $jumlahMentee = $queryMentee->num_rows();
        foreach ($queryMentee->result() as $row) {
            $output .= "<tr>"
                    . "<td> $row->nrp </td><td>$row->nama_mahasiswa </td> "
                    . "<td> $row->kontak</td>"
                    . "</tr>";
        }
        if ($jumlahMentee > 0) {
            $output .= "<tr><td> <b>Jumlah Mentee </b></td> <td colspan='2'> <b> $jumlahMentee</b></td></tr>"
                    . "<tr ><td> <b>Pementor </b></td> <td colspan='2'> <b>$nama_pementor </b></td> </tr>"
                    . "<tr ><td colspan='3'> "
                    . "<a href='" . base_url('panitia/gantipementor/'.$id_jadwal) . "'> "
                    . "Ganti pementor "
                    . "</a> </td> </tr>"
            ;
        }
        return $output;
    }

    public function ganti_pementor($id_jadwal,$id_pementor) {
        $status = $this->db->query("UPDATE tb_jadwal,tb_pementor "
                . "SET tb_jadwal.id_pementor = '$id_pementor' "
                . "WHERE id_jadwal = '$id_jadwal' "
                . "AND tb_pementor.id_pementor = '$id_pementor' ");
        return $status;
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