<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';

 * |
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "c_loginPeserta";//untuk halaman login
$route['default_controller'] = "c_login";//untuk halaman login
$route['404_override'] = '';

/* grocery crud tidak memudahkan kita untuk membuat routes
 * karena banyaknya fungsi dalam satu fungsi crud-render(), antara lain
 * add,export,print,search,list,delete dan lain-lain yg klo kita buat routes berarti 
 * kita harus membuat routes untuk masing masing fungsi tadi
 * jadi sebaiknya sesuaikan nama di fungsi contoller dgn nama url (bentuk defaultnya)
 */

//$route['kegiatan'] = 'kegiatan_controller/index';
//$route['berita'] = 'berita_controller/index';
//$route['penulis'] = 'penulis_controller/index';

$route['login'] = "c_login";
$route['ceklogin'] = "c_login/ceklogin";
$route['peserta/logout'] = "c_login/logout";
$route['pengajar/logout'] = "c_login/logout";
$route['panitia/logout'] = "c_login/logout";


$route['mahasiswa/insert'] = 'c_mahasiswa/insertMhs';

$route['peserta'] = 'c_peserta/index';
$route['peserta/news'] = 'c_peserta/news';
$route['peserta/profile'] = 'c_peserta/profile';

$route['peserta/editawal'] = 'c_peserta/edit_profil_awal';

$route['peserta/profile/editprofile'] = 'c_peserta/edit_profile';
$route['peserta/jadwal'] = 'c_peserta/jadwal';
$route['peserta/jadwal/:any'] = 'c_peserta/jadwal';
$route['peserta/ambiljadwal/:num'] = 'c_peserta/add_jadwal';
$route['peserta/absensi'] = 'c_peserta/absensi';
$route['peserta/nilai'] = 'c_peserta/nilai';
$route['peserta/evaluasi'] = 'c_peserta/evaluasi';



//nanti, lakukan penguban nama untuk semua url panitia/..
$route['panitia'] = "c_panitia/index";
$route['panitia'] = "c_panitia/index";

$route['panitia/news'] = "c_panitia/news";

$route['panitia/pengajar'] = "c_panitia/pengajar";

$route['panitia/pengajar/aktivasi'] = "c_panitia/aktivasi_pengajar";
$route['panitia/pengajar/tambah/:any'] = "c_panitia/add_pengajar";
$route['panitia/pengajar/notiftambah/sukses'] = "c_panitia/pengajar";
$route['panitia/pengajar/notiftambah/gagal'] = "c_panitia/pengajar";

$route['panitia/pengajar/hapus/:any'] = "c_panitia/delete_pengajar";
$route['panitia/pengajar/notifhapus/sukses'] = "c_panitia/pengajar";
$route['panitia/pengajar/notifhapus/gagal'] = "c_panitia/pengajar";

$route['panitia/mahasiswa'] = "c_panitia/mhs";
$route['panitia/hapusmahasiswa/:any'] = "c_panitia/Deletemhs/";

$route['panitia/mahasiswa'] = "c_panitia/mhs";
//proses tambah/aktivasi peserta
$route['panitia/peserta'] = "c_panitia/peserta";
$route['panitia/peserta/aktivasi'] = "c_panitia/aktivasi_peserta";
$route['panitia/peserta/tambah/:any'] = "c_panitia/add_peserta/";
$route['panitia/peserta/notiftambah/sukses'] = "c_panitia/peserta";
$route['panitia/peserta/notiftambah/gagal'] = "c_panitia/peserta";
//proses hapus peserta
$route['panitia/peserta/hapus/:any'] = "c_panitia/delete_peserta";
$route['panitia/peserta/notifhapus/sukses'] = "c_panitia/peserta";
$route['panitia/peserta/notifhapus/gagal'] = "c_panitia/peserta";


$route['panitia/panitia'] = "c_panitia/panitia";
$route['panitia/panitia/tambah/:any'] = "c_panitia/add_panitia";

$route['panitia/profile'] = "c_panitia/profile";

$route['panitia/jadwal'] = "c_panitia/jadwal";
$route['panitia/jadwal/:any'] = "c_panitia/kelompok";

$route['panitia/gantipementor/:any'] = "c_panitia/ganti_pementor";
$route['panitia/editpementor/:any'] = "c_panitia/query_ganti_pementor";

// danar & gugun ROUTES
$route['pengajar'] = "c_pengajar";
$route['pengajar/login'] = "c_login";
$route['pengajar/logout'] = "c_login/logout";
$route['pengajar/ceklogin'] = "c_login/ceklogin";
$route['pengajar/beranda'] = "c_pengajar/beranda";
$route['pengajar/profile'] = "c_pengajar/profile";
$route['pengajar/editProfile'] = "c_pengajar/editProfile";
$route['pengajar/jadwal'] = "c_pengajar/jadwal";
$route['pengajar/addjadwal/:num'] = "c_pengajar/addJadwal";
$route['pengajar/absensi'] = "c_pengajar/absensi";
$route['pengajar/absensi/:num'] = "c_pengajar/getAbsen";
$route['pengajar/absensitambah/:num'] = "c_pengajar/addAbsen";
$route['pengajar/absensiedit/:num'] = "c_pengajar/editAbsen";
$route['pengajar/updateAbsen/:num'] = "c_pengajar/updateAbsen";
$route['pengajar/addAbsen/:num'] = "c_pengajar/insertAbsen";
$route['pengajar/nilai'] = "c_pengajar/nilai";
$route['pengajar/evaluasi'] = "c_pengajar/evaluasi";
$route['pengajar/catatan'] = "c_pengajar/catatan";

/* End of file routes.php */
/* Location: ./application/config/routes.php */