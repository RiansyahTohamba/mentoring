<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_admin extends CI_Controller {

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
        $id_akun = $this->session->userdata('id_akun');        
        if($id_akun == ""){
            redirect(site_url('panitia/login'));
        }        
    }

    private function output($halaman_view = '', $data = array()) {
        //paramate show() yakni : halaman view, data yg akan dikirimkan, level-administrasi 
        //untuk level dapat diganti di pada templates_helper.php difolder helpers
        show("admin/$halaman_view", $data, 'admin');
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
        redirect('admin/mahasiswa');
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
            redirect('admin/panitia');
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

            redirect('admin/panitia/');
        }
    }

    public function pengajar() {
        $data['calon_pengajar'] = $this->m_mahasiswa->calon_pengajar();
        $data['pengajar'] = $this->m_pengajar->selectAll()->result();
        $this->output('v_admin_pengajar', $data);
    }

    public function add_pengajar() {
        $nrp = $this->uri->segment(4);
        $pengajar = $this->m_pengajar->selectById($nrp)->result();
        if ($pengajar == TRUE) {
            redirect('admin/pengajar', 'refresh');
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
                redirect('admin/pengajar/');
            } else {
                echo 'gagal memasukkan data ! '
                . '<br><a href=' . site_url('admin/pengajar') . '>kembali</a>';
            }
        }
    }

    public function peserta() {
        $data['mahasiswa'] = $this->m_mahasiswa->selectAll()->result();
        $data['peserta'] = $this->m_peserta->selectAll()->result();
        $data['calon_peserta'] = $this->m_mahasiswa->calon_peserta()->result();
        $this->output('v_admin_peserta', $data);
    }
    public function jadwal() {
        $data = array(
//            'jadwal' => $this->m_mahasiswa->get_kotak_jadwal()
        );        
        $this->output('v_jadwal', $data);        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */