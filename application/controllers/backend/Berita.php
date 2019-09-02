<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();
      	$this->load->model('beritaadmin_model');
  	}	 
	 

	public function index()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "berita";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";


		if(!($this->dasarlib->apakahBolehMelakukan('BERITA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		if($this->dasarlib->apakahBolehMelakukan('BERITA','tambah',$iduser))
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

		$this->load->view('admin/berita/index', $data);
	}

	public function list_berita()
	{
		$hasil = $this->beritaadmin_model->get_list_berita();
        echo $hasil;
	}

	public function tambah_berita()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "berita";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		if(!($this->dasarlib->apakahBolehMelakukan('BERITA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/berita/tambah_berita', $data);
	}

	public function do_tambah_berita()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('BERITA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/berita/index";
		
		$kedb['judul'] = trim($this->input->post('judul'));
		$kedb['isi_berita'] = trim($this->input->post('isi_berita'));

		$namatabel = "berita";		
		
		//masukkan item 
		$bener = $this->dasar_model->insertData($namatabel,$kedb);
		if($bener == 1)
		{
			$pesan =  "Simpan Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Tambah berita distributor: ".$kedb['judul'];
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

	public function edit_berita()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "berita";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		if(!($this->dasarlib->apakahBolehMelakukan('BERITA','lihat',$iduser)))
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
		
		$namatabel = "berita";
		$namafield = "id_berita";

		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);
		
		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/berita/edit_berita', $data);
	}

	public function do_edit_berita()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('BERITA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/berita/index";
		
		$kedb['judul'] = trim($this->input->post('judul'));
		$kedb['isi_berita'] = trim($this->input->post('isi_berita'));

		$id_berita = $this->input->post('id');

		$namatabel = "berita";		
		
		//simpan data 
		$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_berita',$id_berita);
		if($bener == 1)
		{
			$pesan =  "Simpan Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Edit berita distributor: ".$kedb['judul'];
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

	public function delete_berita()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('BERITA','hapus',$iduser)))
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
		
		$namatabel = "berita";
		$namafield = "id_berita";

		$param['is_hapus'] = 1;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";
			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus berita distributor: ".$detail['judul'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";		
	}	

	// disini
	
}
?>
