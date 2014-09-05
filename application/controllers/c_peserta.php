<?php
/*
 * DESKRIPSI
 * kelas ini merupakan controller gabungan dari tim riansyah degan tim rahmatulloh
 * 
 * 
 * PR PENGEMBANGAN
 * 1. untuk ke depannya akan coba dipilah mana fungsi yang di gunakan mana yang tidak
 * 2. semua method pada model 'peserta' di ubah paramater id_akun menjadi id_peserta untuk masalah efisiensi 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_peserta extends CI_Controller {

    private $limit = 2;

    var $username;
    var $id_peserta;
    public function __construct() {
        parent::__construct();        
        //dari kg rahmat
        $this->load->library('table');
        $this->load->model('m_peserta', '', TRUE);
        $this->load->model('m_mahasiswa', '', TRUE);
        $this->load->model('m_akun', '', TRUE);
        $this->load->helper(array('url'));
        //dari riansyah        
        $this->load->helper('form');        
        $this->id_akun = $this->session->userdata('id_akun');                
        $this ->id_peserta = $this->session->userdata('id_akun');
        $this->status_side_bar = $this->m_peserta->cekKontak($this->id_peserta);
        $this->username = $this->session->userdata('USERNAME');                
        if ($this->session->userdata('login_peserta') != TRUE) {
            $this->session->set_flashdata('notif', 'LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('peserta/login');
        };        
    }

    private function output($halaman_view = '', $data = array()) {        
        $data['username'] = $this->username;
        //paramate show() yakni : halaman view, data yg akan dikirimkan, level-administrasi 
        //untuk level dapat diganti di pada templates_helper.php difolder helpers
        show($halaman_view, $data,'peserta');
    }
    
    public function index() {
        $this->news();
    }

    public function news() {
        $data = array(
//            'daftar' => $this->penulis->lihat(),            
        );
        $this->output('peserta/news', $data, 'peserta');
//        $this->load->view('beranda', $data);
    }

    public function profile() {
        $data = array(
            'data_profil' => $this->m_peserta->data_profil($this->id_akun),
        );
        $this->output('peserta/profile', $data);        
    }

    public function edit_profile() {
        if ($this->validasi_profile() == FALSE) {
            $data_profil = $this->m_peserta->get_data_profil($this->id_akun);
            $this->output('peserta/edit_profile', $data_profil);            
        } else {
            $id_akun = $this->id_akun;
            $data = array(
                'nama_mahasiswa' => $this->input->post('nama'),
                'jenis_kelamin ' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'kontak' => $this->input->post('hp'),
                'kota' => $this->input->post('kota'),
            );
            if ($this->m_peserta->edit_profile($id_akun, $data) == TRUE) {
                redirect('peserta/profile');
            } else {
                echo 'gagal memasukkan data';
            };
        }
    }

    private function validasi_profile() {
        $this->load->library('form_validation');
        $this->valid = $this->form_validation; //persingkat nama agar lebih mudah digunakan        
        $this->valid->set_message('required', 'isi terlebih dahulu kolom ini ');
        $this->valid->set_rules('nama', 'Nama anda', 'required|min_length[3]');
        $this->valid->set_rules('alamat', 'Alamat anda', 'required|min_length[3]');
        $this->valid->set_rules('kota', 'Alamat anda', 'required|min_length[3]');
        $this->valid->set_rules('hp', 'Hp anda', 'required|min_length[3]');
        return ($this->form_validation->run() == FALSE) ? FALSE : TRUE;
    }

    public function jadwal($notif = null) {
        if($this->m_peserta->count_jadwal_saya($this->id_akun) > 0){
            $jadwal = $this->m_peserta->get_jadwal_saya($this->id_akun); 
        }else{
            $jadwal = $this->m_peserta->get_daftar_jadwal($this->id_akun);
        }
        $data = array(
            'notif'=> $notif,
            'jadwal_saya' => $jadwal,
            'materi' => $this->m_peserta->get_materi(),
        );
        $this->output('peserta/jadwal', $data);        
    }
    
    public function add_jadwal() {
        $id_jadwal = $this->uri->segment(3);        
        if($this->m_peserta->add_jadwal($this->id_akun,$id_jadwal) == FALSE){            
            $notif = 'gagal';
        }else{
            $notif = 'berhasil';
        }                    
        $this->jadwal($notif);
    }
    public function absensi() {
        $data = array(
            'presensi' => $this->m_peserta->get_absensi($this->id_akun),
        );
        $this->output('peserta/absensi', $data);        
    }

    public function nilai() {
        $data = array(
            'nilai' => $this->m_peserta->get_nilai($this->id_akun),
        );
        $this->output('peserta/nilai', $data);        
    }

    public function evaluasi() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('isi_saran', 'Isi Evaluasi', 'required|xss_clean|min_length[3]|max_length[1000]');        
        if($this->form_validation->run() == TRUE){
            if($this->m_peserta->simpan_saran($this->id_akun) != TRUE){                            
                echo 'gagal dimasukkan ke database';
            }
        }
        $this->output('peserta/evaluasi');               
    }

    //dari kang rahmat
    function viewCalonPeserta($offset = 0, $order_column = 'nrp', $order_type = 'asc') {

        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'nrp';
        if (empty($order_type))
            $order_type = 'asc';

        //data mahasiswa
        $mahasiswa = $this->m_mahasiswa->selectPageList($this->limit, $offset, $order_column, $order_type)->result();

        //paging
        $this->load->library('pagination');
        $config['base_url'] = site_url('c_peserta/viewCalonPeserta/');
        $config['total_rows'] = $this->m_mahasiswa->selectAll();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //tabel

        $this->load->library('table');
        $this->table->set_heading(
                'NO', 'NRP', 'Nama', 'Jurusan', 'Aksi');

        $i = 0 + $offset;

        foreach ($mahasiswa as $mahasiswa) {
            $this->table->add_row( ++$i, $mahasiswa->nrp, $mahasiswa->nama_mahasiswa, $mahasiswa->jurusan, anchor('c_peserta/add/' . $mahasiswa->nrp . '/', 'ADD'));
        }

        $data['table'] = $this->table->generate();

        if ($this->uri->segment(3) == 'exist')
            $data['message'] = 'data sudah terdaftar';
        else if ($this->uri->segment(3) == 'add_success')
            $data['message'] = 'data berhasil ditambah';
        else
            $data['message'] = '';

        //daftar calon panitia
        $this->load->view('v_calon_peserta', $data);
    }

    public function add() {
        $nrp = $this->uri->segment(4);
        $peserta = $this->m_peserta->selectById($nrp)->result();
        if ($peserta == TRUE) {
            redirect(site_url('admin/peserta'), 'refresh');
        } else {
            $peserta = array(
                'id_peserta' => null,
                'nrp' => $nrp,
                'id_jadwal' => null,
            );
            $this->m_peserta->insert($peserta);

            $peserta = $this->m_peserta->selectById($nrp)->result();
            foreach ($peserta as $peserta) {
                $id_peserta = $peserta->id_peserta;
                $nrp_peserta = $peserta->nrp;
            }
            
            $akun = array(
                'username' => $nrp_peserta,
                'password' => $nrp_peserta,
                'id_peserta' => $id_peserta
            );
            
            $status = $this->m_akun->insert($akun);
            if ($status == TRUE) {
                redirect(site_url('admin/peserta/'));
            } else {
                echo 'gagal memasukkan data !';
            }
//            redirect('c_peserta/viewCalonPeserta/add_success/');
        }
    }

    function view($nrp) {
        $data['title'] = 'peserta detail';
        $data['daftar_peserta'] = anchor('c_peserta/index', 'Daftar Peserta');

        // detail pengajar
        $data['peserta'] = $this->m_peserta->selectById($nrp)->row();
        $this->load->view('v_detail_peserta', $data);
    }

    public function delete() {
        $id = $this->uri->segment(4);
        if ($this->m_peserta->delete($id) == TRUE) {
//            buat pesan notif kalau data berhasil dihapus
//            redirect(site_url('admin/peserta/delete_success'), 'refresh');
            redirect('admin/peserta');
        }  else {
            echo 'data gagal dihapus dari database';
        }
    }

}

?>
