<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// FORMAT INVOICE / nomor transaksi 1002: urutan dari tabel invoice_urutan

class Tutuppoin extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();
      	$this->load->model('tutuppoinadmin_model');
  	}	 
	 

	public function index()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "tutuppoin";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";


		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		if($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','tambah',$iduser))
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

		$this->load->view('admin/tutuppoin/index', $data);
	}

	public function list_tutuppoin()
	{
		$hasil = $this->tutuppoinadmin_model->get_list_tutuppoin();
        echo $hasil;
	}

	public function tambah_tutup_poin()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "tutuppoin";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/tutuppoin/tambah_tutup_poin', $data);
	}

	public function do_tambah_tutup_poin()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/tutuppoin/index";
		
		$kedb['title'] = trim($this->input->post('title'));
		$kedb['is_finished'] = 0;
		$kedb['tgl_pelaksanaan'] = $this->dasarlib->balikTanggalPendek(trim($this->input->post('tgl_pelaksanaan')));
		$kedb['permalink'] = $this->dasarlib->buatPermalink($kedb['title']);

		$namatabel = "tutup_poin_umum";		
		
		//masukkan item 
		$bener = $this->dasar_model->insertData($namatabel,$kedb);
		if($bener == 1)
		{
			$pesan =  "Simpan Data Sukses";

			// ambil id_umum yg dimasukkan barusan
			$deumum = $this->dasar_model->getDetailOnField('tutup_poin_umum', 'permalink', $kedb['permalink']);
			$id_umum = $deumum['id_umum'];

			$tujuan = base_url()."backend/tutuppoin/daftar_hadiah?id=$id_umum";

			//begin masukkan ke audit trail
			$keterangan_trail = "Tambah event tutup poin: ".$kedb['title'];
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


	public function daftar_hadiah()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "tutuppoin";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','lihat',$iduser)))
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
				$id_umum = $this->input->get('id');
			}  
		}

		$data['detail'] = $this->dasar_model->getDetailOnField('tutup_poin_umum', 'id_umum', $id_umum);

		$data['list_hadiah'] = $this->tutuppoinadmin_model->get_list_hadiah_on_id_umum($id_umum);


		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);


		$this->load->view('admin/tutuppoin/daftar_hadiah', $data);		
	}

	public function edit_tutup_poin()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "tutuppoin";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','lihat',$iduser)))
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
		
		$namatabel = "tutup_poin_umum";
		$namafield = "id_umum";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		$data['tgl_pelaksanaan'] = $this->dasarlib->ubahTanggalPendek($data['detail']['tgl_pelaksanaan']);

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/tutuppoin/edit_tutup_poin', $data);
	}

	public function do_edit_tutup_poin()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/tutuppoin/index";
		
		$kedb['title'] = trim($this->input->post('title'));
		$kedb['is_finished'] = 0;
		$kedb['tgl_pelaksanaan'] = $this->dasarlib->balikTanggalPendek(trim($this->input->post('tgl_pelaksanaan')));
		$kedb['permalink'] = $this->dasarlib->buatPermalink($kedb['title']);

		$id_umum = $this->input->post('id');

		$namatabel = "tutup_poin_umum";		
		
		//masukkan item 
		$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_umum',$id_umum);
		if($bener == 1)
		{
			$pesan =  "Simpan Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Edit event tutup poin: ".$kedb['title'];
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

	public function delete_tutup_poin()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','hapus',$iduser)))
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
		
		$namatabel = "tutup_poin_umum";
		$namafield = "id_umum";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		// hapus di tutup_poin_umum
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		//$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			// hapus di tutup_poin_detail
			$this->dasar_model->hapusData('tutup_poin_detail','id_umum',$id);

			$pesan =  "Hapus Data Sukses";
			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus tutup poin: ".$detail['title'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
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
		$config['upload_path'] =  './assets/gambar_tutup_poin/foto/';
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
			$path = "./assets/gambar_tutup_poin/foto/".$nama_file_baru;
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
			$config['new_image'] 		= './assets/gambar_tutup_poin/foto/'.$nama_file_baru_kotak;
		
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			$this->image_lib->clear();		
			
			// resize thumb 160
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './assets/gambar_tutup_poin/foto/'.$nama_file_baru_kotak;
			$config2['maintain_ratio'] = TRUE;
			$config2['height']     = 160;
			$config2['new_image']   = './assets/gambar_tutup_poin/thumbnail/'.$nama_file_baru_small;
			
			$this->image_lib->initialize($config2); 
			$this->image_lib->resize();
			

			//unlink('./assets/avatar_member/'.$nama_file_baru);
			//$this->load->library('image_lib');

		}
		echo "$bener|<span style='display: inline-block;'><img src='".base_url()."assets/gambar_tutup_poin/thumbnail/$nama_file_baru_small' height='100'></span>|$nama_file_baru_small|$nama_file_baru";
		exit;		
	}

	public function do_tambah_hadiah()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$id_umum = $this->input->post('id_umum');

		$bener = 1;
		$tujuan = base_url()."backend/tutuppoin/daftar_hadiah?id=".$id_umum;
		
		$kedb['id_umum'] = $id_umum;
		$kedb['nama_hadiah'] = trim($this->input->post('nama_hadiah'));
		$kedb['thumbnail'] = trim($this->input->post('daftarfilelogo_thumb2'));
		$kedb['gambar'] = trim($this->input->post('daftarfilelogo2'));
		$kedb['poin_min'] = trim($this->input->post('poin_min'));
		$kedb['poin_max'] = trim($this->input->post('poin_max'));
		
		$namatabel = "tutup_poin_detail";		
		
		//masukkan item 
		if($kedb['thumbnail'] == "")
		{
			$bener = 0;
			$pesan =  "Error: Gambar hadiah tidak ada";
		}
		else
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Tambah hadiah event tutup poin: ".$kedb['nama_hadiah'];
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

	public function hapus_hadiah()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','hapus',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		if(!($this->input->get('id_detail')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id_detail'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$id_detail = $this->input->get('id_detail');
			}  
		}
		
		
		$bener = 1;
		
		$namatabel = "tutup_poin_detail";
		$namafield = "id_detail";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id_detail);

		// hapus di tutup_poin_detail
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id_detail);
		//$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";
			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus hadiah tutup poin: ".$detail['nama_hadiah'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";
	}

	public function edit_hadiah()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "tutuppoin";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if(!($this->input->get('id_detail')))
		{
  			echo "ERROR: No item selected...";
			exit;
		}
		else
		{
		  	if(!(is_numeric($this->input->get('id_detail'))))
		  	{
  				echo "ERROR: invalid number...";
				exit;
		  	}
			else
			{
				$data['id_detail'] = $this->input->get('id_detail');
			}  
		}
		
		$namatabel = "tutup_poin_detail";
		$namafield = "id_detail";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id_detail']);
		
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['text_gambar_html'] =  $this->tutuppoinadmin_model->getGambarHtml($data['id_detail']);

		$data['file_gambar_full'] = $this->tutuppoinadmin_model->getDaftarGambarFull($data['id_detail']);
		$data['file_gambar_thumb'] = $this->tutuppoinadmin_model->getDaftarGambarThumb($data['id_detail']);

		$this->load->view('admin/tutuppoin/edit_hadiah', $data);
	}

	public function do_edit_hadiah()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		
		$id_detail = $this->input->post('id');
		
		$kedb['nama_hadiah'] = trim($this->input->post('nama_hadiah'));
		$kedb['thumbnail'] = trim($this->input->post('daftarfilelogo_thumb2'));
		$kedb['gambar'] = trim($this->input->post('daftarfilelogo2'));
		$kedb['poin_min'] = trim($this->input->post('poin_min'));
		$kedb['poin_max'] = trim($this->input->post('poin_max'));

		$namatabel = "tutup_poin_detail";		
		$detail = $this->dasar_model->getDetailOnField($namatabel, 'id_detail', $id_detail);
		$tujuan = base_url()."backend/tutuppoin/daftar_hadiah?id=".$detail['id_umum'];
		
		//update item 
		$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_detail',$id_detail);
		if($bener == 1)
		{
			$pesan =  "Simpan Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Edit hadiah tutup poin: ".$kedb['nama_hadiah'];
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


	// disini
	
}
?>
