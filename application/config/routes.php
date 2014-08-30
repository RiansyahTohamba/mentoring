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

$route['default_controller'] = "akun/index";//untuk halaman login
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


$route['peserta'] = 'peserta_controller/index';
$route['peserta/news'] = 'peserta_controller/news';
$route['peserta/profile'] = 'peserta_controller/profile';
$route['peserta/profile/editprofile'] = 'peserta_controller/edit_profile';
$route['peserta/jadwal'] = 'peserta_controller/jadwal';
$route['peserta/ambiljadwal/:num'] = 'peserta_controller/add_jadwal';
$route['peserta/absensi'] = 'peserta_controller/absensi';
$route['peserta/nilai'] = 'peserta_controller/nilai';
$route['peserta/evaluasi'] = 'peserta_controller/evaluasi';


$route['panitia/login'] = "c_loginPanitia";
$route['panitia/logout'] = "c_loginPanitia/logout";

$route['admin'] = "c_Admin/index";

$route['admin/news'] = "c_Admin/news";

$route['admin/pengajar'] = "c_Admin/pengajar";
$route['admin/pengajar/tambah/:any'] = "c_Admin/add_pengajar";

$route['admin/mahasiswa'] = "c_Admin/mhs";
$route['admin/hapusmahasiswa/:any'] = "c_Admin/Deletemhs/";

$route['admin/mahasiswa'] = "c_Admin/mhs";

$route['admin/peserta'] = "c_Admin/peserta";
$route['admin/peserta/tambah/:any'] = "c_peserta/add/";
$route['admin/peserta/hapus/:any'] = "c_peserta/delete/";

$route['admin/panitia'] = "c_Admin/panitia";
$route['admin/panitia/tambah/:any'] = "c_Admin/add_panitia";

$route['admin/profile'] = "c_Admin/profile";

$route['admin/jadwal'] = "c_Admin/jadwal";
$route['admin/jadwal/:any'] = "c_Admin/get_kelompok";


$route['crud'] = "examples";
$route['pengajar'] = "c_pengajar";
$route['pengajar/login'] = "c_loginPengajar";
$route['pengajar/logout'] = "c_loginPengajar/logout";
$route['pengajar/ceklogin'] = "c_loginPengajar/ceklogin";
$route['pengajar/beranda'] = "c_pengajar/beranda";
$route['pengajar/profile'] = "c_pengajar/profile";
$route['pengajar/editProfile'] = "c_pengajar/editProfile";
$route['pengajar/jadwal'] = "c_pengajar/jadwal";
$route['pengajar/absensi'] = "c_pengajar/absensi";
$route['pengajar/absensi/:num'] = "c_pengajar/getAbsen";
$route['pengajar/nilai'] = "c_pengajar/nilai";
$route['pengajar/evaluasi'] = "c_pengajar/evaluasi";


/* End of file routes.php */
/* Location: ./application/config/routes.php */