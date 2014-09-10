<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_pengajar extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('login_pengajar') != TRUE) {
            //$this->session->set_flashdata('notif', 'LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('pengajar/login','refresh');
        };
        $this->load->library(array('table'));
        $this->load->model('m_pengajar');
    }

    private function output($halaman_view = '', $data = array()) {
        //paramate show() yakni : halaman view, data yg akan dikirimkan, level-administrasi 
        //untuk level dapat diganti di pada templates_helper.php difolder helpers
        show("pengajar/$halaman_view", $data, 'pengajar');
    }

    public function index() {
        redirect('pengajar/beranda');
    }

    function beranda() {
        $this->output('v_beranda');
    }

    public function profile() {
        $index['data_profil'] = $this->m_pengajar->getProfile($this->session->userdata('ID'));        
        $this->output('v_profile', $index);
    }

    function editProfile() {
        $data = array(
            'nama_mahasiswa' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'kontak' => $this->input->post('kontak')
        );
        $result2 = $this->m_pengajar->updateProfile($this->input->post('nrp'), $data);
        redirect('pengajar/profile', 'refresh');
    }

    function jadwal() {
        if ($this->session->userdata('jenis_kelamin') == 'L') {
            $jenis_kelamin = 0;
        } elseif ($this->session->userdata('jenis_kelamin') == 'P') {
            $jenis_kelamin = 1;
        } 
        
        $index['data_jadwal'] = $this->m_pengajar->getJadwal($this->session->userdata('ID'));
        $index['jadwal_kosong'] = $this->m_pengajar->getJadwalKosong($jenis_kelamin);
        $this->output('v_jadwal', $index);
    }
    function addJadwal() {
        $index = $this->m_pengajar->addJadwal($this->uri->segment(3));
        redirect('pengajar/jadwal', 'refresh');
    }
    function absensi() {
        $index['data_absensi'] = $this->m_pengajar->getJadwal($this->session->userdata('ID'));
        $this->output('v_absensi', $index);
    }
    function getAbsen() {
        $idJadwal = substr($this->uri->segment(3), 0, -1);
        $pertemuan = substr($this->uri->segment(3), -1);
        $index['data_jadwal'] = $this->m_pengajar->getJadwal($this->session->userdata('ID'));
        $index['absen'] = $this->m_pengajar->getAbsen($this->session->userdata('ID'), $idJadwal, $pertemuan);
        $index['pertemuan'] = $this->m_pengajar->getAbsenPertemuan($idJadwal);
        $this->output('v_absensidetail', $index);
    }
    function addAbsen() {
        $idJadwal = $this->uri->segment(3);
        $index['daftar_peserta'] = $this->m_pengajar->getAbsenPeserta($idJadwal);
        $index['pertemuan'] = $this->m_pengajar->getPertemuanCount($idJadwal);
        $index['materi'] = $this->m_pengajar->getMateriList();
        $index['jadwal'] = $this->m_pengajar->getJadwalDetail($idJadwal);
        $this->output('v_absensitambah', $index);
    }
    function editAbsen() {
        $idJadwal = substr($this->uri->segment(3), 0, -1);
        $pertemuan = substr($this->uri->segment(3), -1);
        $index['daftar_peserta'] = $this->m_pengajar->getAbsenPesertaEdit($idJadwal,$pertemuan);
        $index['pertemuan'] = substr($this->uri->segment(3), -1);
        $index['materi'] = $this->m_pengajar->getMateriList();
        $index['berita'] = $this->m_pengajar->getBeritaAcara($idJadwal,$pertemuan);
        $index['tanggal'] = $this->m_pengajar->getPertemuanDate($idJadwal,$pertemuan);
        $index['jadwal'] = $this->m_pengajar->getJadwalDetail($idJadwal);
        $this->output('v_absensiedit', $index);
    }
    function insertAbsen() {
        $idJadwal = $this->uri->segment(3);
        $status_kehadiran = $this->input->post('cekHadir');
        $idPeserta = $this->input->post('id_peserta');
        $i=1;
        foreach($status_kehadiran as $count){
         $data = array(
           'pertemuan' => $this->input->post('pertemuan'),
           'status_kehadiran' => $status_kehadiran[$i],
           'id_peserta' => $idPeserta[$i],
           'tanggal' => $this->input->post('tanggal'),
           'id_pementor' => $this->session->userdata('ID'),
           'berita_acara' => $this->input->post('berita'),
           'id_jadwal' => $idJadwal,
           'id_materi' => $this->input->post('id_materi')
           );
            $this->db->insert('tb_presensi', $data);
            $i++;
        }
        redirect('pengajar/absensi/'.$idJadwal.$this->input->post('pertemuan'),'refresh');
    }
    function updateAbsen() {
        $idPresensi = $this->input->post('id_presensi');
        $idJadwal = substr($this->uri->segment(3), 0, -1);
        $pertemuan = substr($this->uri->segment(3), -1);
        $status_kehadiran = $this->input->post('cekHadir');
        $i=1;
        foreach($status_kehadiran as $count){
         $data = array(
           'status_kehadiran' => $status_kehadiran[$i],
           'tanggal' => $this->input->post('tanggal'),
           'berita_acara' => $this->input->post('berita'),
           'id_materi' => $this->input->post('id_materi')
        ); 
        $index = $this->m_pengajar->updateAbsensi($idPresensi[$i],$data);
            $i++;
        }
       redirect('pengajar/absensi/'.$idJadwal.$this->input->post('pertemuan'),'refresh');
    }
    function nilai() {
        $this->output('v_nilai');
    }

    function evaluasi() {
        $this->output('v_evaluasi');
    }

    function catatan() {
        
        $this->output('v_catatan');
    }
    
    //controller pengajar bagian kang rahmat

    public function add($nrp) {

        $pengajar = $this->m_pengajar->selectById($nrp)->result();
        if ($pengajar == TRUE) {
            redirect('c_pengajar/viewCalonPengajar/exist', 'refresh');
        } else {
            $pengajar = array(
                'nrp' => $nrp,
                'id_honor' => 1
            );
            $this->m_pengajar->insert($pengajar);

            $pementor = $this->m_pengajar->selectById($nrp)->result();
            foreach ($pementor as $pementor) {
                $id_pementor = $pementor->id_pementor;
                $nrp_pementor = $pementor->nrp;
            }
            $akun = array(
                'username' => $nrp_pementor,
                'password' => $nrp_pementor,
                'id_pementor' => $id_pementor
            );
            $this->m_akun->insert($akun);

            redirect('admin/pengajar/');
        }
    }        

    public function view($nrp) {
        $data['title'] = 'pengajar detail';
        $data['daftar_pengajar'] = anchor('c_pengajar/index', 'Daftar Pengajar');

        // detail pengajar
        $data['pengajar'] = $this->m_pengajar->selectById($nrp)->row();
        $this->load->view('v_detail_pengajar', $data);
    }
    
    public function delete($id) {
        $this->m_pengajar->delete($id);
        redirect('c_pengajar/index/delete_success', 'refresh');
    }
    
}