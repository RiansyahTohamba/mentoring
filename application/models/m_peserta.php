<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_peserta extends CI_Model {

    private $primary_key = 'id_peserta';
    private $table = 'tb_peserta';
    private $output;

    function __construct() {
        parent::__construct();
    }
    
    public function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tb_akun');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('id_peserta IS NOT NULL');
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    public function getNama($id_peserta) {
        $this->db->select('tb_mahasiswa.nama_mahasiswa');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_peserta', 'tb_mahasiswa.nrp = tb_peserta.nrp');
        $this->db->join('tb_akun', 'tb_peserta.id_peserta = tb_akun.id_peserta');
        $this->db->where('tb_akun.id_peserta', $id_peserta);
        $this->db->limit(1);
        //get query and processing
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return "peserta"; //if data is wrong
        }
    }
    /* 
     * nanti dicoba mengirim password lewat kontak mentee 
     * sehingga maua tidak mau mentee harus memasukkan kontak ASLI
     */
    public function cekKontak($id_peserta){
        $query = $this->db->query('SELECT kontak FROM tb_mahasiswa,tb_peserta'
                . ' WHERE id_peserta = ' . $id_peserta                 
                . ' AND tb_peserta.nrp = tb_mahasiswa.nrp');
        if($query->row()->kontak == NULL || $query->row()->kontak =="" ||
                $query->row()->kontak == "none"){
            return FALSE;
        }  else {
            return TRUE;
        }
    }

    public function get_jenis_kelamin($id_akun) {
        $query = $this->db->query('SELECT jenis_kelamin FROM tb_mahasiswa,tb_peserta,tb_akun '
                . 'WHERE tb_akun.id_akun = ' . $id_akun .
                ' AND tb_akun.id_peserta = tb_peserta.id_peserta '
                . 'AND tb_peserta.nrp = tb_mahasiswa.nrp');
        $jenis_kelamin = $query->row()->jenis_kelamin;
        return $jenis_kelamin;
    }

    public function data_profil($id_akun) {
        $this->output = '';
        $query = $this->db->query('SELECT * FROM tb_mahasiswa,tb_peserta,tb_akun '
                . 'WHERE tb_akun.id_akun = ' . $id_akun .
                ' AND tb_akun.id_peserta = tb_peserta.id_peserta ' .
                'AND tb_peserta.nrp = tb_mahasiswa.nrp');
        $this->output .= "<table class='table table-striped'>";
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                if ($row->jenis_kelamin == "L") {
                    $jenis_kelamin = "Laki - Laki";
                } else {
                    $jenis_kelamin = "Perempuan ";
                };
                $this->output .= "                
                <tr> <th>Nama</th> <td> $row->nama_mahasiswa </td></tr>                     
                <tr> <th>Jenis kelamin</th> <td> $jenis_kelamin </td> </tr>
                <tr><th>Alamat</th> <td> $row->alamat, $row->kota </td></tr>
                <tr><th>Hp</th><td>$row->kontak</td></tr>";
            }
        }
        $this->output .= '</table>';
        return $this->output;
    }

    public function get_data_profil($id_akun) {
        $query = $this->db->query('SELECT * FROM tb_mahasiswa,tb_peserta,tb_akun '
                . 'WHERE tb_akun.id_akun = ' . $id_akun .
                ' AND tb_akun.id_peserta = tb_peserta.id_peserta '
                . 'AND tb_peserta.nrp = tb_mahasiswa.nrp');
        $row = $query->row();
        if ($query->num_rows() == 1) {
            $data_profil = array(
                'nama' => $row->nama_mahasiswa,
                'alamat' => $row->alamat,
                'kota' => $row->kota,
                'hp' => $row->kontak,
            );
        }
        return $data_profil;
    }

    public function edit_profile_awal($id_akun, $data = array()) {
  //      $data_akun['password']  = $data['password'];
 //       $data_mhs = array(
//                     'jenis_kelamin'  => $data['jenis_kelamin'],
//                     'kontak'  => $data['kontak'],
//                    );
        $password =  $data['password'];
        $jenis_kelamin  = $data['jenis_kelamin'];
	$kontak  = $data['kontak'];
        $query = $this->db->query('SELECT tb_mahasiswa.nrp FROM tb_mahasiswa,tb_peserta,tb_akun '
                . 'WHERE tb_akun.id_akun = ' . $id_akun .
                ' AND tb_akun.id_peserta = tb_peserta.id_peserta '
                . 'AND tb_peserta.nrp = tb_mahasiswa.nrp');
        $hasil = $query->row();
//      $this->db->where('nrp', $hasil->nrp);
//      $this->db->update('tb_mahasiswa', $data_mhs);
        $status = $this->db->query("UPDATE tb_mahasiswa,tb_akun 
        		  SET password = '$password', jenis_kelamin = '$jenis_kelamin', kontak = '$kontak' 
        		  WHERE nrp = '$hasil->nrp' AND username = '$hasil->nrp'");
//        $status = $this->db->update('tb_akun', $data_akun);
        if ($status == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function edit_profile($id_akun, $data = array()) {
        $query = $this->db->query('SELECT tb_mahasiswa.nrp FROM tb_mahasiswa,tb_peserta,tb_akun '
                . 'WHERE tb_akun.id_akun = ' . $id_akun .
                ' AND tb_akun.id_peserta = tb_peserta.id_peserta '
                . 'AND tb_peserta.nrp = tb_mahasiswa.nrp');
        $hasil = $query->row();
        $this->db->where('nrp', $hasil->nrp);
        $status = $this->db->update('tb_mahasiswa', $data);
        if ($status == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_jadwal_saya($id_akun) {
        $query = $this->db->query('SELECT * FROM tb_akun,tb_jadwal,tb_peserta '
                . 'WHERE id_akun = ' . $id_akun . ' AND tb_akun.id_peserta = tb_peserta.id_peserta '
                . 'AND tb_jadwal.id_jadwal = tb_peserta.id_jadwal');
        $this->output .= '<tr> <td colspan="3"><b>Jadwal saya</b></td></tr>'
                . '<tr> <th>Hari</th> <th>Pukul</th> <th>Kelompok </th></tr>';
        foreach ($query->result() as $row) {
            $this->output .= "<tr> "
                    . "<td>$row->hari</td> <td>$row->jam </td><td> $row->kelompok</td>"
                    . "</tr>";
        }
        return $this->output;
    }

    private function get_id_jadwal($id_jadwal) {
        for ($n = 1; $n <= 5; $n++) {
            $query = $this->db->query("
                    SELECT tb_peserta.id_jadwal 
                    FROM tb_jadwal,tb_peserta 
                    WHERE tb_peserta.id_jadwal = tb_jadwal.id_jadwal
                        AND tb_peserta.id_jadwal = '$id_jadwal$n' "
            );
            if ($query->num_rows() < 15) { // kuota
                $id_jadwal = "$id_jadwal$n";
                break;
            }
        }
        return $id_jadwal;
    }

    public function add_jadwal($id_akun, $id_jadwal) {
        $query = $this->db->query('SELECT tb_peserta.id_peserta '
                . 'FROM tb_peserta,tb_akun '
                . 'WHERE tb_akun.id_akun = ' . $id_akun .
                ' AND tb_akun.id_peserta = tb_peserta.id_peserta ');
        $row = $query->row();
        //jika ada yg iseng menambah jadwal melalui pengetikan url secara manual
        $query2 = $this->db->query("                    
            SELECT tb_peserta.id_jadwal
            FROM tb_jadwal,tb_peserta 
            WHERE tb_peserta.id_jadwal = $id_jadwal 
                AND tb_peserta.id_jadwal = tb_jadwal.id_jadwal");
        if ($query2->num_rows() > 14) {
            //menampilkan form_validasi
        } else {
            $data['id_jadwal'] = $this->get_id_jadwal($id_jadwal);
            $this->db->where('id_peserta', $row->id_peserta);
            $status = $this->db->update('tb_peserta', $data);
            if ($status) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function count_jadwal_saya($id_akun) {
        $query = $this->db->query('SELECT * FROM tb_akun,tb_jadwal,tb_peserta '
                . 'WHERE id_akun = ' . $id_akun . ' AND tb_akun.id_peserta = tb_peserta.id_peserta '
                . 'AND tb_jadwal.id_jadwal = tb_peserta.id_jadwal');
        return $query->num_rows();
    }

    public function get_daftar_jadwal($id_akun) {
        $kuota = 60;//15 X 4 kelompok

        $this->output = '';
        $this->output .= '<tr><th>Hari</th><th>jam</th> <th colspan="2">kuota</th> </tr>';

        $jenis_kelamin = $this->get_jenis_kelamin($id_akun);

        for ($hari = 1; $hari <= 5; $hari++) {
            for ($jam = 1; $jam <= 4; $jam++) {
                if ($jenis_kelamin == "L") {
                    $id_jadwal = "1$hari$jam";
                } else {
                    $id_jadwal = "0$hari$jam";
                }
                $query = $this->db->query("
                    SELECT hari,jam, COUNT(tb_peserta.id_jadwal) as jumlah 
                    FROM tb_jadwal,tb_peserta 
                    WHERE tb_peserta.id_jadwal LIKE '$id_jadwal%' 
                          AND tb_peserta.id_jadwal = tb_jadwal.id_jadwal"
                );
                foreach ($query->result() as $row) {
                    if ($row->jumlah == $kuota) {//kuota
                        $row->jumlah = 'PENUH';
                        $tombol = '';
                    } else if ($row->jumlah == 0) {
                        //query jika jumlah kuota = 0
                        if ($jenis_kelamin == "L") {
                            $query1 = $this->db->query("SELECT hari,jam
                                FROM tb_jadwal                                
                                WHERE id_jadwal LIKE '1$hari$jam%'");
                        } else {
                            $query1 = $this->db->query("SELECT hari,jam
                                FROM tb_jadwal                                
                                WHERE id_jadwal LIKE '0$hari$jam%'");
                        }
                        foreach ($query1->result() as $hasil) {
                            $row->hari = $hasil->hari;
                            $row->jam = $hasil->jam;
                        }
                        $row->jumlah = $kuota;
                        $tombol = 'ambil';
                    } else {
                        $row->jumlah = $kuota - $row->jumlah;
                        $tombol = 'ambil';
                    }
                    $this->output .=
                            "<tr>"
                            . "<td>$row->hari</td><td>$row->jam</td>
                            <td> $row->jumlah</td> 
                            <td> <a href='" . site_url('peserta/ambiljadwal/' . $id_jadwal) . " ' "
                            . "class='button buttons-box'> $tombol </a></td>
                        </tr>";
                }
            }
        }
        return $this->output;
    }

    public function get_materi() {
        $this->output = '';
        $n = 1;
        $query = $this->db->query('SELECT * FROM tb_materi');
        foreach ($query->result() as $row) {
            $this->output .= "<tr>     
                <th>$n</th><th> <a href='$row->isi' style='cursor'>$row->topik.pdf</a></th>"
                    . "</tr>";
            $n++;
        }
        return $this->output;
    }

    public function get_absensi($id_akun) {
        $query = $this->db->query('SELECT * FROM tb_akun,tb_presensi,tb_peserta,tb_pementor,tb_mahasiswa '
                . 'WHERE id_akun = ' . $id_akun .
                ' AND tb_akun.id_peserta = tb_peserta.id_peserta ' .
                ' AND tb_presensi.id_pementor = tb_pementor.id_pementor ' .
                ' AND tb_pementor.nrp = tb_mahasiswa.nrp ' .
                'AND tb_peserta.id_peserta = tb_presensi.id_peserta');
        foreach ($query->result() as $row) {
            if ($row->status_kehadiran == "Hadir") {
                $status = "ok";
            } else if ($row->status_kehadiran == "Absen") {
                $status = "remove";
            }
            $this->output .= "<tr> " .
                    "<th>$row->pertemuan </th> <td><i class='icon-$status'></i></td>"
                    . "<th>$row->nama_mahasiswa </th> <th>$row->tanggal </th> "
                    . "<th>$row->berita_acara </th></tr>"
                    . "</tr>";
        }
        return $this->output;
    }

    
    public function get_nilai($id_akun) {
        $query = $this->db->query('SELECT * FROM tb_akun,tb_nilai,tb_peserta '
                . 'WHERE id_akun = ' . $id_akun . ' AND tb_akun.id_peserta = tb_peserta.id_peserta '
                . 'AND tb_nilai.id_peserta = tb_peserta.id_peserta');
        foreach ($query->result() as $row) {
            $this->output .= "<tr> "
                    . " <td>$row->kategori </td> <td>$row->bobot_nilai</td>  
                    </tr>";
        }
        return $this->output;
    }

    public function simpan_saran($id_akun) {
        $query = $this->db->query('SELECT tb_peserta.id_peserta FROM tb_akun,tb_peserta '
                . 'WHERE id_akun = ' . $id_akun . ' AND tb_akun.id_peserta = tb_peserta.id_peserta');
        $row = $query->row();
        $data = array(
            'id_peserta' => $row->id_peserta,
            'isi_saran' => $this->input->post('isi_saran'),
        );
        $status = $this->db->insert('tb_saran', $data);
        return ($status == FALSE) ? FALSE : TRUE;
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

    public function delete($nrp) {        
        $this->db->where('nrp', $nrp);                        
        $this->db->delete($this->table);
        $this->db->where('username', $nrp);  
        return ($this->db->delete('tb_akun')) ? TRUE : FALSE;
    }

}

?>