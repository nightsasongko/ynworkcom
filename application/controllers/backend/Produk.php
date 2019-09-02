<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller 
{

  	function __construct() {
      	parent::__construct();

      	$this->load->model('produkadmin_model');

  	}	 

	  //KATEGORI
	  
	public function kategori()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "kategori_produk";

		if($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser))
		{
			$data['boleh_tambah'] = TRUE;
		}
		else
		{
			$data['boleh_tambah'] = FALSE;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $data['list_kategori'] = $this->buat_kategori();

		$this->load->view('admin/produk/index_kategori', $data);
	}


	public function buat_kategori()
	{
		$array_kategori = array();

		$q = $this->db->query("SELECT id_kategori, nama FROM produk_kategori order by nama");
		$res = $q->result_array();
		foreach($res as $row)
		{
			$id_kategori = $row['id_kategori'];
			$nama = $row['nama'];
			$array_kategori[] = array("id_kategori" => $id_kategori, "nama" => $nama);
		}
		return $array_kategori;
	}

	public function tambah_kategori()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "kategori_produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/produk/tambah_kategori', $data);
	}

	public function do_tambah_kategori()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/kategori";

		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama']);

		$namatabel = "produk_kategori";

		if($this->dasar_model->cekDataOnTable($namatabel,'nama', $kedb['nama']))
		{
			$bener = 0;
			$pesan =  "Error: Nama Kategori Sudah Ada";		
		}
		else
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Tambah kategori produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$bener = 0;
				$pesan =  "Simpan Data Gagal";
			}		
		}
		echo "$bener|$tujuan|$pesan";
	}	

	public function edit_kategori()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "kategori_produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$data['id'] = $this->input->get('id');
			}  
		}
		
		$namatabel = "produk_kategori";
		$namafield = "id_kategori";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/produk/edit_kategori', $data);
	}

	public function do_edit_kategori()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/kategori";

		$id = $this->input->post('id');

		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['permalink '] = $this->dasarlib->buatPermalink($kedb['nama']);

		$namatabel = "produk_kategori";

		// cek apakah ada nama yg sama
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'nama', $kedb['nama'], 'id_kategori', $id))
		{
			$bener = 0;
			$pesan =  "Error: nama kategori Sudah ada";		
		}
		else
		{
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_kategori',$id);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Edit kategori produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Simpan Data Gagal";
			}

		}
		echo "$bener|$tujuan|$pesan";		
	}

	public function delete_kategori()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$id = $this->input->get('id');
			}  
		}
		
		$bener = 1;
		
		$namatabel = "produk_kategori";
		$namafield = "id_kategori";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		//$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus kategori produk: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}


	// ITEM PRODUK
	public function daftar_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "daftar_produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser))
		{
			$boleh_tambah = TRUE;
		}
		else
		{
			$boleh_tambah = FALSE;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);


		$data['boleh_tambah'] = $boleh_tambah;

		$this->load->view('admin/produk/index_item_produk', $data);
	}

	public function list_item_produk()
	{
		$hasil = $this->produkadmin_model->get_list_item_produk();
        echo $hasil;
	}

	public function tambah_item_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "daftar_produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kategori'] = $this->buat_kategori();

		$this->load->view('admin/produk/tambah_item_produk', $data);
	}

	public function do_foto_editor()
	{

		if(empty($_FILES['file']))
		{
		    echo base_url()."assets/gambar_editor/noimage.png";
		}
		
		$temp = explode(".", $_FILES["file"]["name"]);
		$waktu = round(microtime(true));
		$newfilename =  $waktu .'.' . end($temp);
		$newfilename_small = $waktu.'_small.' . end($temp);

		$destinationFilePath = './assets/gambar_editor/'.$newfilename ;

		if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
		    echo base_url()."assets/gambar_editor/noimage.png";
		}
		else
		{
		    $this->load->library('image_lib'); 

		    $image_info = getimagesize('./assets/gambar_editor/'.$newfilename);
        	$image_width = $image_info[0];
        	$image_height = $image_info[1];

        	if($image_width > 400)
        	{
				$config2['image_library'] = 'gd2';
				$config2['source_image'] = './assets/gambar_editor/'.$newfilename;
				$config2['maintain_ratio'] = TRUE;
				$config2['width']     = 400;
				$config2['new_image']   = './assets/gambar_editor/'.$newfilename_small;
				
				$this->image_lib->initialize($config2); 
				$this->image_lib->resize();

			    echo base_url()."assets/gambar_editor/".$newfilename_small;
			}
			else
			{
				echo base_url()."assets/gambar_editor/".$newfilename;
			}
		}

	}

	public function do_foto_item()
	{
		$bener = 1;

		$image_info = getimagesize($_FILES["gambar2"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];

		$namafile = explode(".", $_FILES['gambar2']['name']);
		$fileext = end($namafile);

		$waktu = date("YmdHis");
		$acak = $this->dasarlib->getRandomString(4);

		$nama_file_baru = $waktu."_".$acak.".".$fileext;
		$nama_file_baru_kotak = $waktu."_".$acak."_kotak.".$fileext;
		$nama_file_baru_small = $waktu."_".$acak."_small.".$fileext;

		$config['file_name']  = $nama_file_baru;
		$config['upload_path'] =  './assets/gambar_item/foto/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '0';
		$config['max_width']  = '';
		$config['max_height']  = '0';



		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar2'))
		{
			$bener = 0;
			//redirect(base_url()."uploader/daftar");
		}
		else
		{
			$bener = 1;
			$upload_data = $this->upload->data();
			$this->load->library('image_lib'); 

			// di-resize dulu jadi kotak
			$path = "./assets/gambar_item/foto/".$nama_file_baru;
			$widthimg = $upload_data['image_width'];
			$heightimg = $upload_data['image_height'];

			if($widthimg<$heightimg){
					$width		= $widthimg;
					$height 	= $widthimg;
					
					$fromtop 	= (0.5*$heightimg)-(0.5*$widthimg);
					$fromleft	= 0;
				}else{
					$width 		= $heightimg;
					$height		= $heightimg;
					
					$fromtop 	= 0;
					$fromleft 	= (0.5*$widthimg)-(0.5*$heightimg);
				}
			$config 					= null;
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $path;
			$config['maintain_ratio'] 	= FALSE;
			$config['quality'] 			= "130%";
			$config['width'] 			= $width;
			$config['height'] 			= $height;
			$config['x_axis'] 			= $fromleft;
			$config['y_axis'] 			= $fromtop;
			$config['new_image'] 		= './assets/gambar_item/foto/'.$nama_file_baru_kotak;
		
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			$this->image_lib->clear();		
			
			// resize thumb 160
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './assets/gambar_item/foto/'.$nama_file_baru_kotak;
			$config2['maintain_ratio'] = TRUE;
			$config2['height']     = 160;
			$config2['new_image']   = './assets/gambar_item/thumbnail/'.$nama_file_baru_small;
			
			$this->image_lib->initialize($config2); 
			$this->image_lib->resize();
			

			//unlink('./assets/avatar_member/'.$nama_file_baru);
			//$this->load->library('image_lib');

		}
		echo "$bener|<span style='display: inline-block;'><img src='".base_url()."assets/gambar_item/thumbnail/$nama_file_baru_small' height='100'> <br> <a href='javascript:void(0)' onclick=hapusgambar('$nama_file_baru')>Delete <i class='fa fa-times'></i></a> </span>|$nama_file_baru_small|$nama_file_baru";
		exit;		
	}

	public function do_tambah_item_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/daftar_produk";

		$kedb['id_kategori'] = trim($this->input->post('id_kategori'));
		$kedb['kode'] = trim($this->input->post('kode'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['deskripsi'] = trim($this->input->post('deskripsi_full'));
		$kedb['harga_umum'] = trim($this->input->post('harga_umum'));
		$kedb['harga_distributor'] = trim($this->input->post('harga_distributor'));
		$kedb['berat'] = 1;
		$kedb['ishapus'] = 0;
		$kedb['permalink'] = $this->dasarlib->buatPermalink($kedb['nama']);

		$daftarfilelogo2 = trim($this->input->post('daftarfilelogo2'));
		$daftarfilelogo_thumb2 = trim($this->input->post('daftarfilelogo_thumb2'));

		$namatabel = "produk_item";		
		
		// cek apakah ada gambar produk
		if($daftarfilelogo2 == '')
		{
			$bener = 0;
			$pesan =  "Error: Gambar produk setidaknya ada 1";
		}
		else
		{
			//masukkan item produk
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				// ambil id_item dari produk yg dimasukkan barusan
				$deproduk = $this->dasar_model->getDetailOnField('produk_item', 'permalink', $kedb['permalink']);
				$id_produk = $deproduk['id_produk'];

				
				// masukkan gambar produk
				$daftarnya = rtrim($daftarfilelogo2, "|");
				$arrmenu2 = explode('|',$daftarnya);
				
				$daftarnya60 = rtrim($daftarfilelogo_thumb2, "|");
				$arrmenu260 = explode('|',$daftarnya60);
				
				$jml2 = count($arrmenu2);
				for($xx = 0; $xx < $jml2; $xx++) 
				{
					$namafilegambar = $arrmenu2[$xx];
					$namafilegambar60 = $arrmenu260[$xx];
					
					$kefoto['id_produk'] = $id_produk;
					$kefoto['thumbnail'] = $namafilegambar60;
					$kefoto['foto'] = $namafilegambar;
					
					$image_info = getimagesize(base_url()."assets/gambar_item/foto/".$namafilegambar);
					$image_width = $image_info[0];
					$image_height = $image_info[1];

					$kefoto['img_width'] = $image_width;
					$kefoto['img_height'] = $image_height;

					$this->dasar_model->insertData('produk_image',$kefoto);
				}

				//begin masukkan ke audit trail
				$keterangan_trail = "Tambah item produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$bener = 0;
				$pesan =  "Simpan Data Gagal";
			}						

		}

		echo "$bener|$tujuan|$pesan";
	}	

	public function edit_item_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "daftar_produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$data['id'] = $this->input->get('id');
			}  
		}
		
		$namatabel = "produk_item";
		$namafield = "id_produk";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_kategori'] = $this->buat_kategori();
		
		$data['texdaftarfilegambar'] = $this->produkadmin_model->getTextDaftarGambarWarung($data['id']);
		$data['texdaftarfilegambar_thumb'] = $this->produkadmin_model->getTextDaftarGambarWarung_thumb($data['id']);
		$data['texdaftargambarwarung'] =  $this->produkadmin_model->getGambarWarungHtml($data['id']);


		$this->load->view('admin/produk/edit_item_produk', $data);
	}

	public function do_edit_item_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/daftar_produk";

		$id_produk = $this->input->post('id');
		$detail_lama = $this->dasar_model->getDetailOnField('produk_item', 'id_produk', $id_produk);

		$kedb['id_kategori'] = trim($this->input->post('id_kategori'));
		$kedb['kode'] = trim($this->input->post('kode'));
		$kedb['nama'] = trim($this->input->post('nama'));
		$kedb['deskripsi'] = trim($this->input->post('deskripsi_full'));
		$kedb['harga_umum'] = trim($this->input->post('harga_umum'));
		$kedb['harga_distributor'] = trim($this->input->post('harga_distributor'));
		$kedb['permalink'] = $this->dasarlib->buatPermalink($kedb['nama']);

		$daftarfilelogo2 = trim($this->input->post('daftarfilelogo2'));
		$daftarfilelogo_thumb2 = trim($this->input->post('daftarfilelogo_thumb2'));

		$namatabel = "produk_item";

		// cek apakah ada gambar produk
		if($daftarfilelogo2 == '')
		{
			$bener = 0;
			$pesan =  "Error: Gambar produk setidaknya ada 1";
		}
		else
		{
			//masukkan item produk
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_produk',$id_produk);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//hapus gambar item produk
				$this->produkadmin_model->hapusDaftarGambarItem($id_produk);

				// masukkan gambar produk
				$daftarnya = rtrim($daftarfilelogo2, "|");
				$arrmenu2 = explode('|',$daftarnya);
				
				$daftarnya60 = rtrim($daftarfilelogo_thumb2, "|");
				$arrmenu260 = explode('|',$daftarnya60);
				
				$jml2 = count($arrmenu2);
				for($xx = 0; $xx < $jml2; $xx++) 
				{
					$namafilegambar = $arrmenu2[$xx];
					$namafilegambar60 = $arrmenu260[$xx];
					
					$kefoto['id_produk'] = $id_produk;
					$kefoto['thumbnail'] = $namafilegambar60;
					$kefoto['foto'] = $namafilegambar;

					$image_info = getimagesize(base_url()."assets/gambar_item/foto/".$namafilegambar);
					$image_width = $image_info[0];
					$image_height = $image_info[1];

					$kefoto['img_width'] = $image_width;
					$kefoto['img_height'] = $image_height;

					$this->dasar_model->insertData('produk_image',$kefoto);
				}

				//begin masukkan ke audit trail
				$keterangan_trail = "Edit item produk: ".$kedb['nama'];
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$bener = 0;
				$pesan =  "Simpan Data Gagal";
			}						

		}
		
		echo "$bener|$tujuan|$pesan";		
	}	

	public function delete_item_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$id = $this->input->get('id');
			}  
		}
		
		
		$bener = 1;
		
		$namatabel = "produk_item";
		$namafield = "id_produk";

		$param['ishapus'] = 1;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus item produk: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}	

	
	// REVIEW PRODUK

	public function review_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "review_produk";

		if($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser))
		{
			$data['boleh_tambah'] = TRUE;
		}
		else
		{
			$data['boleh_tambah'] = FALSE;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/produk/index_review_produk', $data);
	}

	public function list_review_produk()
	{
		$hasil = $this->produkadmin_model->get_list_review_produk();
        echo $hasil;
	}

	public function tambah_review_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "review_produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_produk'] = $this->produkadmin_model->get_list_produk();

		$this->load->view('admin/produk/tambah_review_produk', $data);
	}

	public function do_foto_review()
	{
		$bener = 1;

		$image_info = getimagesize($_FILES["gambar2"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];

		$namafile = explode(".", $_FILES['gambar2']['name']);
		$fileext = end($namafile);

		$waktu = date("YmdHis");
		$acak = $this->dasarlib->getRandomString(4);

		$nama_file_baru = $waktu."_".$acak.".".$fileext;

		$config['file_name']  = $nama_file_baru;
		$config['upload_path'] =  './assets/gambar_item/review/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '0';
		$config['max_width']  = '';
		$config['max_height']  = '0';



		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar2'))
		{
			$bener = 0;
			//redirect(base_url()."uploader/daftar");
		}
		else
		{
			$bener = 1;
			$upload_data = $this->upload->data();

		}
		echo "$bener|<span style='display: inline-block;'><img src='".base_url()."assets/gambar_item/review/$nama_file_baru' height='60'></span>|$nama_file_baru";
		exit;		
	}

	public function do_tambah_review_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/review_produk";
		
		$kedb['id_produk'] = trim($this->input->post('id_produk'));
		$kedb['nama_orang'] = trim($this->input->post('nama_orang'));
		$kedb['avatar'] = trim($this->input->post('daftarfilelogo2'));
		$kedb['review'] = trim($this->input->post('review'));
		
		$namatabel = "produk_review";		
		
		$bener = $this->dasar_model->insertData($namatabel,$kedb);
		if($bener == 1)
		{
			$pesan =  "Simpan Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Tambah review produk: ".$kedb['nama_orang'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$bener = 0;
			$pesan =  "Simpan Data Gagal";
		}		
				
		echo "$bener|$tujuan|$pesan";
	}

	public function edit_review_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "produk";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "review_produk";

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$data['id'] = $this->input->get('id');
			}  
		}
		
		$namatabel = "produk_review";
		$namafield = "id_review";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		$data['list_produk'] = $this->produkadmin_model->get_list_produk();
		if($data['detail']['avatar'] == "")
		{
			$data['text_gambar_html'] = "";
		}
		else
		{
			$data['text_gambar_html'] =  $this->produkadmin_model->getGambarReviewHtml($data['id']);
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/produk/edit_review_produk', $data);
	}

	public function do_edit_review_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/produk/review_produk";

		$id = $this->input->post('id');

		$kedb['id_produk'] = trim($this->input->post('id_produk'));
		$kedb['nama_orang'] = trim($this->input->post('nama_orang'));
		$kedb['avatar'] = trim($this->input->post('daftarfilelogo2'));
		$kedb['review'] = trim($this->input->post('review'));

		$namatabel = "produk_review";

		$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_review',$id);
		if($bener == 1)
		{
			$pesan =  "Simpan Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Edit review produk: ".$kedb['nama_orang'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Simpan Data Gagal";
		}

		echo "$bener|$tujuan|$pesan";
	}

	public function delete_review_produk()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		if(!($this->input->get('id')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$id = $this->input->get('id');
			}  
		}
		
		$bener = 1;
		
		$namatabel = "produk_review";
		$namafield = "id_review";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		//$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus review produk: ".$detail['nama_orang'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}


}
?>
