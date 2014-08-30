<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Admin extends CI_Model {

    
    public function getData(){
        $query = $this->db->get('tb_mahasiswa');
        return $query->result();
    }
    
    public function insert($tabel, $data){
        $this->db->insert($tabel, $data);
    }
    
//	public function index()
//	{
//		$this->load->view('welcome_message');
//	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */