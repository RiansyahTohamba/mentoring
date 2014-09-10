<?php


class M_pengajar extends CI_Model{

    private $primary_key = 'id_pementor';
    private $table = 'tb_pementor';
    
    function __construct(){
        parent::__construct();
    }

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tb_akun');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('id_pementor IS NOT NULL');
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }
    function getNama($id_pementor){
        $this->db->select('tb_mahasiswa.nama_mahasiswa,jenis_kelamin');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_pementor', 'tb_mahasiswa.nrp = tb_pementor.nrp');
        $this->db->join('tb_akun', 'tb_pementor.id_pementor = tb_akun.id_pementor');
        $this->db->where('tb_akun.id_pementor', $id_pementor);
        $this->db->limit(1);
        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return "pengajar"; //if data is wrong
        }
    }
    public function getProfile($id_pementor){
        $this->db->select('tb_mahasiswa.nrp,nama_mahasiswa,jenis_kelamin,kontak,alamat,kota');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_pementor', 'tb_mahasiswa.nrp = tb_pementor.nrp');
        $this->db->join('tb_akun', 'tb_pementor.id_pementor = tb_akun.id_pementor');
        $this->db->where('tb_akun.id_pementor', $id_pementor);
        $this->db->limit(1);
        //get query and processing
        $query = $this->db->get();
        
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true            
        } else {
            return 'Data yang dimaksud tidak ada'; //if data is wrong
        }
    }
    function updateProfile($nrp,$data){
        $this->db->where('nrp', $nrp);
        $this->db->update('tb_mahasiswa', $data); 
    }
    function getJadwal($id_pementor){
        $this->db->select('id_jadwal,hari,jam,kelompok,tb_pementor.id_pementor');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_pementor', 'tb_jadwal.id_pementor = tb_pementor.id_pementor');
        $this->db->where('tb_pementor.id_pementor', $id_pementor);
        $this->db->order_by("jam", "asc"); 
        //get query and processing
        $query = $this->db->get();
        return $query->result();   
    }
    function getJadwalDetail($id_jadwal){
        $this->db->select('id_jadwal,hari,jam,kelompok');
        $this->db->from('tb_jadwal');
        $this->db->where('id_jadwal', $id_jadwal);        
        //get query and processing
        $query = $this->db->get();
        return $query->result();   
    }
    function addJadwal($id){
        $data = array(
               'id_pementor' => $this->session->userdata('ID')
            );
        $this->db->where('id_jadwal', $id);
        $this->db->update('tb_jadwal', $data); 
        //get query and processing 
    }
       function getJadwalKosong($jenis_kelamin){
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->like('id_jadwal', $jenis_kelamin, 'after'); 
        $this->db->where('id_pementor IS NULL');
        //get query and processing
        $query = $this->db->get();
        return $query->result();   
    }

   // function getJadwalKosong($jenis_kelamin){
   //      $this->db->select('*');
   //      $this->db->from('tb_jadwal');
   //      $this->db->join('tb_peserta', 'tb_jadwal.id_jadwal = tb_peserta.id_jadwal');
   //      $this->db->join('tb_mahasiswa', 'tb_peserta.nrp = tb_mahasiswa.nrp');
   //      $this->db->where('jenis_kelamin', $jenis_kelamin);
   //      $this->db->where('tb_jadwal.id_pementor IS NULL');
   //      //get query and processing
   //      $query = $this->db->get();
   //      return $query->result();   
   //  }
    function getAbsen($id_pementor,$id_jadwal,$pertemuan){
        $this->db->select('tanggal,nama_mahasiswa,tb_mahasiswa.nrp,status_kehadiran,berita_acara,id_materi');
        $this->db->from('tb_presensi');
        $this->db->join('tb_peserta', 'tb_presensi.id_peserta = tb_peserta.id_peserta');
        $this->db->join('tb_mahasiswa', 'tb_peserta.nrp = tb_mahasiswa.nrp');
        //$this->db->join('tb_pementor', 'tb_jadwal.id_pementor = tb_pementor.id_pementor');
        $this->db->where('tb_presensi.id_pementor', $id_pementor);
        $this->db->where('tb_presensi.id_jadwal', $id_jadwal);
        $this->db->where('tb_presensi.pertemuan', $pertemuan);
        //get query and processing
        $query = $this->db->get();
        return $query->result();      
    }
    function getAbsenPertemuan($id_jadwal){
        $this->db->distinct();
        $this->db->select('pertemuan');
        $this->db->where('id_jadwal', $id_jadwal); 
        $this->db->order_by("pertemuan", "asc"); 
        $query = $this->db->get('tb_presensi'); 
        return $query->result(); 
    }
    function getPertemuanCount($id_jadwal){
        $this->db->select('pertemuan');
        $this->db->where('id_jadwal', $id_jadwal); 
        $this->db->order_by("pertemuan", "desc"); 
        $this->db->limit(1);
        $query = $this->db->get('tb_presensi'); 
        return $query->result(); 
    }
    function getMateriList(){
        $this->db->select('*');
        $query = $this->db->get('tb_materi'); 
        return $query->result(); 
    }
    function getBeritaAcara($idJadwal,$pertemuan){
        $this->db->distinct();
        $this->db->select('berita_acara');
        $this->db->where('id_jadwal', $idJadwal);
        $this->db->where('pertemuan', $pertemuan);  
        $query = $this->db->get('tb_presensi');
        $this->db->limit(1);
        return $query->result(); 
    }
    function getPertemuanDate($idJadwal,$pertemuan){
        $this->db->distinct();
        $this->db->select('tanggal');
        $this->db->where('id_jadwal', $idJadwal);
        $this->db->where('pertemuan', $pertemuan);  
        $query = $this->db->get('tb_presensi');
        $this->db->limit(1);
        return $query->result(); 
    }
    function getAbsenPeserta($id_jadwal){
        $this->db->distinct();
        $this->db->select('tb_mahasiswa.nrp,nama_mahasiswa,tb_peserta.id_peserta');
        $this->db->from('tb_peserta');
        $this->db->join('tb_mahasiswa', 'tb_peserta.nrp = tb_mahasiswa.nrp');
        $this->db->where('tb_peserta.id_jadwal', $id_jadwal); 
        $this->db->order_by("tb_mahasiswa.nrp", "asc"); 
        //get query and processing
        $query = $this->db->get();
        return $query->result(); 
    }
    function updateAbsensi($id_presensi,$data){  
        $this->db->where('id_presensi', $id_presensi);
        $this->db->update('tb_presensi', $data); 
    }
    function getAbsenPesertaEdit($id_jadwal,$pertemuan){
        $this->db->distinct();
        $this->db->select('tb_presensi.id_presensi,tb_mahasiswa.nrp,nama_mahasiswa,tb_peserta.id_peserta,tb_presensi.status_kehadiran');
        $this->db->from('tb_presensi');
        $this->db->join('tb_peserta', 'tb_presensi.id_peserta = tb_peserta.id_peserta');
        $this->db->join('tb_mahasiswa', 'tb_peserta.nrp = tb_mahasiswa.nrp');
        $this->db->where('tb_presensi.id_jadwal', $id_jadwal);
        $this->db->where('tb_presensi.pertemuan', $pertemuan);  
        $this->db->order_by("tb_mahasiswa.nrp", "asc"); 
        //get query and processing
        $query = $this->db->get();
        return $query->result(); 
    }

    /* tambahan kang rahmatulloh*/
    

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
        return $this->db->query('
            SELECT tb_pementor.id_pementor, 
                   tb_pementor.nrp, tb_mahasiswa.nama_mahasiswa, 
                   tb_mahasiswa.jurusan, tb_mahasiswa.fakultas, 
                   tb_mahasiswa.jenis_kelamin, tb_mahasiswa.kontak
            FROM tb_mahasiswa, tb_pementor 
            WHERE tb_pementor.nrp = tb_mahasiswa.nrp 
              AND tb_mahasiswa.nrp=' . $nrp . '');
    }

    public function insert($peserta) {        
        return ($this->db->insert($this->table, $peserta)) ? TRUE : FALSE;
    }

    public function delete($id) {
        $this->db->where($this->primary_key, $id);        
        $this->db->delete($this->table);
        $this->db->where($this->primary_key, $id);        
        return ($this->db->delete('tb_akun')) ? TRUE : FALSE;
    }

}