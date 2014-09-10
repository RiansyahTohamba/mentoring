<?php
/*
 * kelas ini (admin) sebenarnya mengurus 
 * pengelolaan yang dilakukan oleh panitia
 * agar tidak membingungkan, kelas ini akan 
 * diganti namanya dengan kelas c_panitia
 * lakukan pengubahan nama di routes, 

 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_panitia extends CI_Controller {
    var $username;
    function __construct() {
        parent::__construct();
        
        $this->load->library(array('table'));
        $this->load->model('m_mahasiswa', '', TRUE);
        $this->load->model('m_akun', '', TRUE);
        $this->load->model('m_pengajar', '', TRUE);
        $this->load->model('m_peserta', '', TRUE);
        $this->load->model('m_jadwal', '', TRUE);
        $this->load->model('m_panitia', '', TRUE);
        $this->load->helper(array('url', 'form'));
        
        $this->id_akun = $this->session->userdata('id_akun_panitia');                
        $this->username = $this->session->userdata('username_panitia');                
        
        if ($this->session->userdata('login_panitia') != TRUE) {
            $this->session->set_flashdata('notif', 'LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect(base_url());
        };    
    }

    private function output($halaman_view = '', $data = array()) {
        $data['username'] = $this->username;
        //paramate show() yakni : halaman view, data yg akan dikirimkan, level-administrasi 
        //untuk level dapat diganti di pada templates_helper.php difolder helpers
        show("panitia/$halaman_view", $data, 'panitia');
    }

    public function index() {
        $this->news();
    }

    public function news() {
        $this->output('v_news');
    }

    public function mhs() {
        $data['mahasiswa'] = $this->m_mahasiswa->selectAll()->result();
        $this->output('v_admin_mhs', $data);
    }

    function deleteMhs($id) {
        $this->m_mahasiswa->delete($id);
        redirect('panitia/mahasiswa');
    }

    public function panitia() {
        $data['calon_panitia'] = $this->m_mahasiswa->calon_panitia();
        $data['panitia'] = $this->m_panitia->selectAll()->result();
        $this->output('v_admin_panitia', $data);
    }

    public function add_panitia() {
        $nrp = $this->uri->segment(4);

        $panitia = $this->m_panitia->selectById($nrp)->result();
        if ($panitia == TRUE) {
            redirect('panitia/panitia');
        } else {
            $panitia = array(
                'nrp' => $nrp,
                'id_honor' => 2,
                'id_panitia' => NULL,
            );
            $this->m_panitia->insert($panitia);

            $panitia = $this->m_panitia->selectById($nrp)->result();
            foreach ($panitia as $panitia) {
                $id_panitia = $panitia->id_panitia;
                $nrp_panitia = $panitia->nrp;
            }
            $akun = array(
                'username' => $nrp_panitia,
                'password' => $nrp_panitia,
                'id_panitia' => $id_panitia
            );

            $this->m_akun->insert($akun);

            redirect('panitia/panitia/');
        }
    }

    public function pengajar() {
        $data['calon_pengajar'] = $this->m_mahasiswa->calon_pengajar();
        $data['pengajar'] = $this->m_pengajar->selectAll()->result();
        $this->output('v_admin_pengajar', $data);
    }
    
    public function aktivasi_pengajar() {                
        $data['calon_pengajar'] = $this->m_mahasiswa->calon_pengajar()->result();
        $this->output('v_aktivasi_pengajar', $data);
    }
    public function add_pengajar() {
        $nrp = $this->uri->segment(4);
        $pengajar = $this->m_pengajar->selectById($nrp)->result();
        if ($pengajar == TRUE) {
            redirect('panitia/pengajar', 'refresh');
        } else {
            $pengajar = array(
                'nrp' => $nrp,
                'id_honor' => 1,
                'id_pementor' => NULL
            );
            $status = $this->m_pengajar->insert($pengajar);

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
            if ($status == TRUE) {
                redirect('panitia/pengajar/notiftambah/sukses');
            } else {
                redirect('panitia/pengajar/notiftambah/gagal');
            }
        }
    }

    public function delete_pengajar() {
        $id = $this->uri->segment(4);
        if ($this->m_pengajar->delete($id) == TRUE) {
            redirect('panitia/pengajar/notifhapus/sukses');
        } else {
            redirect('panitia/pengajar/notifhapus/gagal');
        }
    }
    
    public function ganti_pementor() {
        $this->load->library('form_validation');
        $this->valid = $this->form_validation; //persingkat nama agar lebih mudah digunakan                                
        $data['pementor'] = $this->m_pengajar->selectAll()->result();
        $data['id_jadwal'] = $this->uri->segment(3);
        $this->output('v_ganti_pementor', $data);       
    }
    
    public function query_ganti_pementor() {
        $id_jadwal = $this->uri->segment(3);
        $id_pementor = $this->uri->segment(4);
        if ($this->m_jadwal->ganti_pementor($id_jadwal, $id_pementor) == TRUE) {
            redirect('panitia/jadwal/' . $id_jadwal);
        } else {
            echo 'gagal mengganti pementor'
            . '<a href="' . base_url('panitia/jadwal/'.$id_jadwal) . '"> kembali ke halaman jadwal</a>';
        }        
    }

    public function peserta() {
        $data['mahasiswa'] = $this->m_mahasiswa->selectAll()->result();
        $data['peserta'] = $this->m_peserta->selectAll()->result();
        $data['calon_peserta'] = $this->m_mahasiswa->calon_peserta()->result();
        $this->output('v_admin_peserta', $data);
    }
    
    public function aktivasi_peserta() {                
        $data['calon_peserta'] = $this->m_mahasiswa->calon_peserta()->result();
        $this->output('v_aktivasi_peserta', $data);
    }
    
    public function add_peserta() {
        $nrp = $this->uri->segment(4);
        $peserta = $this->m_peserta->selectById($nrp)->result();
        if ($peserta == TRUE) {
            redirect(site_url('panitia/peserta'), 'refresh');
        } else {
            $peserta = array(
                'id_peserta' => null,
                'nrp' => $nrp,
                'id_jadwal' => null,
            );
            $status = $this->m_peserta->insert($peserta);

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
            
            $this->m_akun->insert($akun);
            if ($status == TRUE) {
                redirect('panitia/peserta/notiftambah/sukses');
            } else {
                redirect('panitia/peserta/notiftambah/gagal');
            }
        }
    }
    
    
    public function delete_peserta() {
        $id = $this->uri->segment(4);
        if ($this->m_peserta->delete($id) == TRUE) {
            //pesan kalau peserta sukses dihapus
            redirect('panitia/peserta/notifhapus/sukses');
        }  else {
            redirect('panitia/peserta/notifhapus/gagal');
        }
    }
    public function jadwal() {
        $data = array(
            'kotak_jadwal' => $this->m_jadwal->get_kotak_jadwal()
        );
        $this->output('v_jadwal', $data);
    }

    public function kelompok() {
        $id_jadwal = $this->uri->segment(3);
        $data = array(
            'kotak_jadwal' => $this->m_jadwal->get_kotak_kelompok($id_jadwal)
        );
        $this->output('v_jadwal_kelompok', $data);
    }
    
//dari tim rahmatulloh
    
    function view($nrp) {
        $data['title'] = 'Panitia Detail';
        $data['daftar_panitia'] = anchor('c_panitia/index', 'Daftar Panitia');

        // detail pengajar
        $data['panitia'] = $this->m_panitia->selectById($nrp)->row();
        $this->load->view('v_detail_panitia', $data);
    }

    function delete_panitia($id) {
        $this->m_panitia->delete($id);
        redirect('c_panitia/index/delete_success', 'refresh');
    }


    function add($nrp) {

        $panitia = $this->m_panitia->selectById($nrp)->result();
        if ($panitia == TRUE) {
            redirect('c_panitia/viewCalonPanitia/exist', 'refresh');
        } else {
            $panitia = array(
                'nrp' => $nrp,
                'id_honor' => 2
            );
            $this->m_panitia->insert($panitia);

            $panitia = $this->m_panitia->selectById($nrp)->result();
            foreach ($panitia as $panitia) {
                $id_panitia = $panitia->id_panitia;
                $nrp_panitia = $panitia->nrp;
            }
            $akun = array(
                'username' => $nrp_panitia,
                'password' => $nrp_panitia,
                'id_panitia' => $id_panitia
            );
            $this->m_akun->insert($akun);

            redirect('c_panitia/viewCalonPanitia/add_success/');
        }
    }
}