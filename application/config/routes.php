<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Dashboard Distributor
$route['profile'] = "distributor/profile";
$route['edit_profile'] = "distributor/edit_profile";
$route['produk'] = "distributor/produk";
$route['news'] = "distributor/news";
$route['logout'] = "akun/dologout";
$route['cart'] = "distributor/cart";
$route['gantipassword'] = "distributor/gantipassword";

// upgrade Dashboard frontend
$route['dashboard'] = "dbrd_distributor";
$route['setting'] = "dbrd_distributor/setting";
$route['purchase'] = "dbrd_distributor/purchase";
$route['histori_transaksi'] = "dbrd_distributor/historitransaksi";
$route['upload'] = "dbrd_distributor/upload";
$route['keranjang_belanja'] = "dbrd_distributor/keranjangbelanja";
$route['checkout'] = "dbrd_distributor/checkout";
$route['post_setting'] = "dbrd_distributor/post_setting";
$route['detail_produk_tab'] = "dbrd_distributor/post_setting";
$route['news'] = "dbrd_distributor/news";
$route['detail_histori'] = "dbrd_distributor/detail_histori";
$route['checkout_post'] = "dbrd_distributor/checkout_post";

// page home
$route['registrasi'] = "distributor/registrasi";
$route['login'] = "akun/login";
$route['lupapassword'] = "akun/lupapassword";
$route['distributor-list'] = "home/distributorlist";
$route['detail-distributor'] = "home/detaildistributor";
$route['detail-produk'] = "home/detailproduk";
$route['faq'] = "home/faq";
$route['syarat-ketentuan'] = "home/syaratketentuan";
$route['management-board'] = "home/management_board"; 
$route['distributor/toko/(:any)'] = "home/detaildistributor/$1";
$route['form_pembayaran_registrasi'] = "home/pembayaran_registrasi";
$route['konfirmasi_pembayaran_sukses'] = "home/after_konfirmasi_pembayaran_registrasi";
$route['error_page'] = "distributor/errorpage";

$route['404_override'] = "home/error404";

