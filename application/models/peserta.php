<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of barang
 *
 * @author muhriansyah
 */
class peserta extends CI_Model {

    private $output;

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
            if ($query->num_rows() < 10) {
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
        if ($query2->num_rows() > 9) {
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
        $kuota = 50;

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

}
