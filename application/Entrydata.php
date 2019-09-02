<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrydata extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();

		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
		}
		$this->load->model('entrydata_model');
  	}		 
	 
	public function index()
	{		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser))
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

		$this->load->view('admin/entrydata/index', $data);
	}	

	public function index_kompetitor()
	{		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datakompetitor";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser))
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

		$this->load->view('admin/entrydata_kompetitor/index', $data);
	}	

	public function indexcs()
	{		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser))
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

		$this->load->view('admin/datacs/index', $data);
	}

	public function indexcs_kompetitor()
	{		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datakompetitor";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser))
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

		$this->load->view('admin/datacs_kompetitor/index', $data);
	}

	public function index_teller()
	{		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser))
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

		$this->load->view('admin/datateller/index', $data);
	}	

	public function index_satpam_luar()
	{		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser))
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

		$this->load->view('admin/datasatpamluar/index', $data);
	}

	public function index_satpam_dalam()
	{		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser))
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

		$this->load->view('admin/datasatpamdalam/index', $data);
	}	
	
	public function isilist()
	{
		$hasil = $this->entrydata_model->getListDataPerformance();
		echo $hasil;
	}

	public function isilist_kompetitor()
	{
		$hasil = $this->entrydata_model->getListDataPerformance_kompetitor();
		echo $hasil;
	}

	public function isilistcs()
	{
		$hasil = $this->entrydata_model->getListIndexCs();
		echo $hasil;
	}

	public function isilistcs_kompetitor()
	{
		$hasil = $this->entrydata_model->getListIndexCs_kompetitor();
		echo $hasil;
	}	

	public function isilist_teller()
	{
		$hasil = $this->entrydata_model->getListIndexTeller();
		echo $hasil;
	}

	public function isilist_satpam_luar()
	{
		$hasil = $this->entrydata_model->getListIndexSatpamLuar();
		echo $hasil;
	}

	public function isilist_satpam_dalam()
	{
		$hasil = $this->entrydata_model->getListIndexSatpamDalam();
		echo $hasil;
	}

	public function delete()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser)))
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
		
		$namatabel = "data_performance";
		$namafield = "id";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);
		$idkota= $detail['idkota'];

		$dekota = $this->dasar_model->getDetailOnField('kota', 'id', $idkota);
		
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		if($bener == 1)
		{
			//begin masukkan ke audit trail
			$keterangan_trail = "Hapus data performance, cabang: ".$dekota['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail	
					
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		
		
		echo "$bener|$pesan";
	}	

	public function delete_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser)))
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
		
		$namatabel = "data_performance2";
		$namafield = "id";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);
		$idkota= $detail['idkota'];

		$dekota = $this->dasar_model->getDetailOnField('kota_kompetitor', 'id', $idkota);
		
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		if($bener == 1)
		{
			//begin masukkan ke audit trail
			$keterangan_trail = "Hapus data performance kompetitor, cabang: ".$dekota['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail	
					
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		
		
		echo "$bener|$pesan";
	}

	public function deletecs()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser)))
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
		
		$namatabel = "data_indexcs";
		$namafield = "id";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);
		$idkota= $detail['idkota'];

		$dekota = $this->dasar_model->getDetailOnField('kota', 'id', $idkota);
		
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		if($bener == 1)
		{
			//begin masukkan ke audit trail
			$keterangan_trail = "Hapus data performance, cabang: ".$dekota['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail	
					
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		
		
		echo "$bener|$pesan";
	}

	public function deletecs_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser)))
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
		
		$namatabel = "data_indexcs2";
		$namafield = "id";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);
		$idkota= $detail['idkota'];

		$dekota = $this->dasar_model->getDetailOnField('kota_kompetitor', 'id', $idkota);
		
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		if($bener == 1)
		{
			//begin masukkan ke audit trail
			$keterangan_trail = "Hapus data performance, cabang: ".$dekota['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail	
					
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		
		
		echo "$bener|$pesan";
	}

	public function delete_teller()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser)))
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
		
		$namatabel = "data_indexteller";
		$namafield = "id";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);
		$idkota= $detail['idkota'];

		$dekota = $this->dasar_model->getDetailOnField('kota', 'id', $idkota);
		
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		if($bener == 1)
		{
			//begin masukkan ke audit trail
			$keterangan_trail = "Hapus data index teller, cabang: ".$dekota['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail	
					
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		
		
		echo "$bener|$pesan";

	}

	public function delete_satpam_luar()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser)))
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
		
		$namatabel = "data_index_satpam_luar";
		$namafield = "id";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);
		$idkota= $detail['idkota'];

		$dekota = $this->dasar_model->getDetailOnField('kota', 'id', $idkota);
		
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		if($bener == 1)
		{
			//begin masukkan ke audit trail
			$keterangan_trail = "Hapus data index satpam luar, cabang: ".$dekota['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail	
					
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";
	}

	public function delete_satpam_dalam()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser)))
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
		
		$namatabel = "data_index_satpam_dalam";
		$namafield = "id";
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);
		$idkota= $detail['idkota'];

		$dekota = $this->dasar_model->getDetailOnField('kota', 'id', $idkota);
		
		$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		if($bener == 1)
		{
			//begin masukkan ke audit trail
			$keterangan_trail = "Hapus data index satpam dalam, cabang: ".$dekota['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail	
					
			$pesan =  "Hapus Data Sukses";
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";
	}

	public function tambah()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$this->load->view('admin/entrydata/tambah', $data);		
	}	

	public function tambah_kompetitor()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datakompetitor";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $namatabel4 = "kota_kompetitor";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$this->load->view('admin/entrydata_kompetitor/tambah', $data);		
	}		

	public function tambahcs()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$this->load->view('admin/datacs/tambah', $data);	
	}	

	public function tambahcs_kompetitor()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datakompetitor";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $namatabel4 = "kota_kompetitor";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$this->load->view('admin/datacs_kompetitor/tambah', $data);	
	}
	public function tambah_data_teller()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$this->load->view('admin/datateller/tambah', $data);	
	}	

	public function tambah_data_satpam_luar()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$this->load->view('admin/datasatpamluar/tambah', $data);	
	}	

	public function tambah_data_satpam_dalam()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

        $namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$this->load->view('admin/datasatpamdalam/tambah', $data);	
	}

	public function do_tambah()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index";

		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['cs'] = trim($this->input->post('cs'));
		$kedb['teller'] = trim($this->input->post('teller'));
		$kedb['security'] = trim($this->input->post('security'));
		//$kedb['tangible'] = trim($this->input->post('tangible'));
		//$kedb['marketing'] = trim($this->input->post('marketing'));
		$kedb['overall'] = trim($this->input->post('overall'));

		//var_dump($kedb);exit;

		$namatabel = "data_performance";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'idkota', $kedb['idkota']))
		{
			$bener = 0;
			$pesan =  "Error: Data sudah ada, silahkan gunakan edit";	
		}
		else 
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
				$namax = $detailx['nama'];
				
				$pesan =  "Tambah Data Sukses";
				//begin masukkan ke audit trail
				$keterangan_trail = "Menambah data performance, cabang: ".$namax;
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}

		echo "$bener|$tujuan|$pesan";
	}

	public function do_tambah_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_kompetitor";

		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['cs'] = trim($this->input->post('cs'));
		$kedb['teller'] = trim($this->input->post('teller'));
		$kedb['security'] = trim($this->input->post('security'));
		//$kedb['tangible'] = trim($this->input->post('tangible'));
		//$kedb['marketing'] = trim($this->input->post('marketing'));
		$kedb['overall'] = trim($this->input->post('overall'));

		$namatabel = "data_performance2";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'idkota', $kedb['idkota']))
		{
			$bener = 0;
			$pesan =  "Error: Data sudah ada, silahkan gunakan edit";	
		}
		else 
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$detailx = $this->dasar_model->getDetailOnField('kota_kompetitor', 'id', $kedb['idkota']);
				$namax = $detailx['nama'];
				
				$pesan =  "Tambah Data Sukses";
				//begin masukkan ke audit trail
				$keterangan_trail = "Menambah data performance kompetitor, cabang: ".$namax;
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}

		echo "$bener|$tujuan|$pesan";
	}

	public function do_tambahcs()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/indexcs";

		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));
		
		$namatabel = "data_indexcs";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'idkota', $kedb['idkota']))
		{
			$bener = 0;
			$pesan =  "Error: Data sudah ada, silahkan gunakan edit";	
		}
		else 
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
				$namax = $detailx['nama'];
				
				$pesan =  "Tambah Data Sukses";
				//begin masukkan ke audit trail
				$keterangan_trail = "Menambah data index cs, cabang: ".$namax;
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}

		echo "$bener|$tujuan|$pesan";
	}

	public function do_tambahcs_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/indexcs_kompetitor";

		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));
		
		$namatabel = "data_indexcs2";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'idkota', $kedb['idkota']))
		{
			$bener = 0;
			$pesan =  "Error: Data sudah ada, silahkan gunakan edit";	
		}
		else 
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$detailx = $this->dasar_model->getDetailOnField('kota_kompetitor', 'id', $kedb['idkota']);
				$namax = $detailx['nama'];
				
				$pesan =  "Tambah Data Sukses";
				//begin masukkan ke audit trail
				$keterangan_trail = "Menambah data index cs kompetitor, cabang: ".$namax;
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}

		echo "$bener|$tujuan|$pesan";
	}

	public function do_tambah_teller()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_teller";

		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));
		
		$namatabel = "data_indexteller";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'idkota', $kedb['idkota']))
		{
			$bener = 0;
			$pesan =  "Error: Data sudah ada, silahkan gunakan edit";	
		}
		else 
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
				$namax = $detailx['nama'];
				
				$pesan =  "Tambah Data Sukses";
				//begin masukkan ke audit trail
				$keterangan_trail = "Menambah data index teller, cabang: ".$namax;
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}

		echo "$bener|$tujuan|$pesan";
	}

	public function do_tambah_satpam_luar()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_satpam_luar";

		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		
		$namatabel = "data_index_satpam_luar";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'idkota', $kedb['idkota']))
		{
			$bener = 0;
			$pesan =  "Error: Data sudah ada, silahkan gunakan edit";	
		}
		else 
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
				$namax = $detailx['nama'];
				
				$pesan =  "Tambah Data Sukses";
				//begin masukkan ke audit trail
				$keterangan_trail = "Menambah data index satpam luar, cabang: ".$namax;
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}

		echo "$bener|$tujuan|$pesan";
	}	

	public function do_tambah_satpam_dalam()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','tambah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_satpam_dalam";

		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));
		
		$namatabel = "data_index_satpam_dalam";
		
		if($this->dasar_model->cekDataOnTable($namatabel,'idkota', $kedb['idkota']))
		{
			$bener = 0;
			$pesan =  "Error: Data sudah ada, silahkan gunakan edit";	
		}
		else 
		{
			$bener = $this->dasar_model->insertData($namatabel,$kedb);
			if($bener == 1)
			{
				$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
				$namax = $detailx['nama'];
				
				$pesan =  "Tambah Data Sukses";
				//begin masukkan ke audit trail
				$keterangan_trail = "Menambah data index satpam dalam, cabang: ".$namax;
				$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
				//end masukkan ke audit trail
			}
			else
			{
				$pesan =  "Tambah Data Gagal";
			}
		}

		echo "$bener|$tujuan|$pesan";
	}

	public function edit()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
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
		
		$namatabel = "data_performance";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/entrydata/edit', $data);
	}

	public function edit_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datakompetitor";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
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
		
		$namatabel = "data_performance2";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$namatabel4 = "kota_kompetitor";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/entrydata_kompetitor/edit', $data);
	}	

	public function editcs()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
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
		
		$namatabel = "data_indexcs";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/datacs/edit', $data);
	}

	public function editcs_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datakompetitor";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
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
		
		$namatabel = "data_indexcs2";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$namatabel4 = "kota_kompetitor";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/datacs_kompetitor/edit', $data);
	}
	public function edit_teller()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
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
		
		$namatabel = "data_indexteller";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/datateller/edit', $data);
	}

	public function edit_satpam_luar()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
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
		
		$namatabel = "data_index_satpam_luar";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/datasatpamluar/edit', $data);
	}

	public function edit_satpam_dalam()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
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
		
		$namatabel = "data_index_satpam_dalam";
		$namafield = "id";
		$data['detail'] = $this->dasar_model->getDetailOnField($namatabel, $namafield, $data['id']);

		$namatabel4 = "kota";
		$namafield4 = "id,nama";
		$isiwhere4 = "";
		$orderby4 = "nama";				
		$data['list_cabang'] = $this->dasar_model->getDataOnTable($namatabel4, $namafield4, $isiwhere4, $orderby4);	

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/datasatpamdalam/edit', $data);
	}

	public function do_edit()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		
		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index";
		
		$id = trim($this->input->post('id'));
		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['cs'] = trim($this->input->post('cs'));
		$kedb['teller'] = trim($this->input->post('teller'));
		$kedb['security'] = trim($this->input->post('security'));
		//$kedb['tangible'] = trim($this->input->post('tangible'));
		//$kedb['marketing'] = trim($this->input->post('marketing'));
		$kedb['overall'] = trim($this->input->post('overall'));

		$namatabel = "data_performance";
			
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'idkota', $kedb['idkota'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: Data Sudah ada";		
		}else
			{
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
				if($bener == 1)
				{

					$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
					$namax = $detailx['nama'];
					
					$pesan =  "Simpan Data Sukses";
					//begin masukkan ke audit trail
					$keterangan_trail = "Melakukan edit data performance, cabang: ".$namax;
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

	public function do_edit_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		
		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_kompetitor";
		
		$id = trim($this->input->post('id'));
		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['cs'] = trim($this->input->post('cs'));
		$kedb['teller'] = trim($this->input->post('teller'));
		$kedb['security'] = trim($this->input->post('security'));
		//$kedb['tangible'] = trim($this->input->post('tangible'));
		//$kedb['marketing'] = trim($this->input->post('marketing'));
		$kedb['overall'] = trim($this->input->post('overall'));

		$namatabel = "data_performance2";
			
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'idkota', $kedb['idkota'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: Data Sudah ada";		
		}else
			{
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
				if($bener == 1)
				{

					$detailx = $this->dasar_model->getDetailOnField('kota_kompetitor', 'id', $kedb['idkota']);
					$namax = $detailx['nama'];
					
					$pesan =  "Simpan Data Sukses";
					//begin masukkan ke audit trail
					$keterangan_trail = "Melakukan edit data performance kompetitor, cabang: ".$namax;
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

	public function do_editcs()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		
		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/indexcs";
		
		$id = trim($this->input->post('id'));
		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));

		$namatabel = "data_indexcs";
			
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'idkota', $kedb['idkota'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: Data Sudah ada";		
		}else
			{
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
				if($bener == 1)
				{

					$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
					$namax = $detailx['nama'];
					
					$pesan =  "Simpan Data Sukses";
					//begin masukkan ke audit trail
					$keterangan_trail = "Melakukan edit data index cs, cabang: ".$namax;
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

	public function do_editcs_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		
		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/indexcs_kompetitor";
		
		$id = trim($this->input->post('id'));
		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));

		$namatabel = "data_indexcs2";
			
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'idkota', $kedb['idkota'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: Data Sudah ada";		
		}else
			{
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
				if($bener == 1)
				{

					$detailx = $this->dasar_model->getDetailOnField('kota_kompetitor', 'id', $kedb['idkota']);
					$namax = $detailx['nama'];
					
					$pesan =  "Simpan Data Sukses";
					//begin masukkan ke audit trail
					$keterangan_trail = "Melakukan edit data index cs kompetitor, cabang: ".$namax;
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

	public function do_edit_teller()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		
		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_teller";
		
		$id = trim($this->input->post('id'));
		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));

		$namatabel = "data_indexteller";
			
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'idkota', $kedb['idkota'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: Data Sudah ada";		
		}else
			{
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
				if($bener == 1)
				{

					$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
					$namax = $detailx['nama'];
					
					$pesan =  "Simpan Data Sukses";
					//begin masukkan ke audit trail
					$keterangan_trail = "Melakukan edit data index teller, cabang: ".$namax;
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

	public function do_edit_satpam_luar()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		
		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_satpam_luar";
		
		$id = trim($this->input->post('id'));
		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));

		$namatabel = "data_index_satpam_luar";
			
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'idkota', $kedb['idkota'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: Data Sudah ada";		
		}else
			{
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
				if($bener == 1)
				{

					$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
					$namax = $detailx['nama'];
					
					$pesan =  "Simpan Data Sukses";
					//begin masukkan ke audit trail
					$keterangan_trail = "Melakukan edit data index satpam luar, cabang: ".$namax;
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

	public function do_edit_satpam_dalam()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];
		
		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/entrydata/index_satpam_dalam";
		
		$id = trim($this->input->post('id'));
		$kedb['idkota'] = trim($this->input->post('cabang'));
		$kedb['sikap_melayani'] = trim($this->input->post('sikap_melayani'));
		$kedb['penampilan'] = trim($this->input->post('penampilan'));
		$kedb['skill'] = trim($this->input->post('skill'));
		$kedb['overall'] = trim($this->input->post('overall'));

		$namatabel = "data_index_satpam_dalam";
			
		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'idkota', $kedb['idkota'], 'id', $id ))
		{
			$bener = 0;
			$pesan =  "Error: Data Sudah ada";		
		}else
			{
				$bener = $this->dasar_model->updateData($namatabel,$kedb,'id',$id);
				if($bener == 1)
				{

					$detailx = $this->dasar_model->getDetailOnField('kota', 'id', $kedb['idkota']);
					$namax = $detailx['nama'];
					
					$pesan =  "Simpan Data Sukses";
					//begin masukkan ke audit trail
					$keterangan_trail = "Melakukan edit data index satpam dalam, cabang: ".$namax;
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

	
	//donwload data excel UOB
	public function getCabangByRegional($idregonal)
	{
		$sql = "select * from kota where idregional = $idregonal";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) {
			return $res->result_array();
		} else {
			return "";
		}
	}
	
	public function export_data(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_performance a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Per Dimensi";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Per Dimensi')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'CS')
					->setCellValue('E2', 'Teller')
					->setCellValue('F2', 'Security');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->cs,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->teller,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->security,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexcs(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_indexcs a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index CS";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index CS')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'Sikap Melayani')
					->setCellValue('E2', 'Penampilan')
					->setCellValue('F2', 'Skill');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->penampilan,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexteller(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_indexteller a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index Teller";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index Teller')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'Sikap Melayani')
					->setCellValue('E2', 'Penampilan')
					->setCellValue('F2', 'Skill');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->penampilan,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexsatpamluar(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_index_satpam_luar a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index Satpam Luar";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index Satpam Luar')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					//->setCellValue('C2', 'Overall')
					->setCellValue('C2', 'Sikap Melayani')
					->setCellValue('D2', 'Penampilan');
					//->setCellValue('F2', 'Skill');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						//->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('C'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->penampilan,2,'.',','));
						//->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexsatpamdalam(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_index_satpam_dalam a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index Satpam Dalam";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index Satpam Dalam')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'Sikap Melayani')
					->setCellValue('E2', 'Penampilan')
					->setCellValue('F2', 'Product Knowledge');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->penampilan,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	//end of donwload data excel UOB
	
	
	//donwload data excel kompetitor
	public function getCabangByRegionalKompetitor($idregonal)
	{
		$sql = "select * from kota_kompetitor where idregional = $idregonal";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) {
			return $res->result_array();
		} else {
			return "";
		}
	}
	
	public function export_data_kompetitor(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegionalKompetitor($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_performance2 a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Per Dimensi";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Per Dimensi')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'CS')
					->setCellValue('E2', 'Teller')
					->setCellValue('F2', 'Security');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->cs,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->teller,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->security,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexcs_kompetitor(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegionalKompetitor($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_indexcs2 a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index CS";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index CS')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'Sikap Melayani')
					->setCellValue('E2', 'Penampilan')
					->setCellValue('F2', 'Skill');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->penampilan,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexteller_kompetitor(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegionalKompetitor($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_indexteller2 a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index Teller";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index Teller')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'Sikap Melayani')
					->setCellValue('E2', 'Penampilan')
					->setCellValue('F2', 'Skill');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->penampilan,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexsatpamluar_kompetitor(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegionalKompetitor($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_index_satpam_luar2 a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index Satpam Luar";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index Satpam Luar')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					//->setCellValue('C2', 'Overall')
					->setCellValue('C2', 'Sikap Melayani')
					->setCellValue('D2', 'Penampilan');
					//->setCellValue('F2', 'Skill');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						//->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('C'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->penampilan,2,'.',','));
						//->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	
	public function export_data_indexsatpamdalam_kompetitor(){
		
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "datauob";

		if(!($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$this->load->library('PHPExcel');
		
		
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegionalKompetitor($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		$sWhere = "WHERE $sqlText ";
		$sOrder = "ORDER BY b.nama asc";
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM data_index_satpam_dalam2 a, kota b ".
				   $sWhere." ".
				   $sOrder;
		
		$res = $this->db->query($sql);
		
		
		//echo $res->num_rows();
		
		
		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "", $date_created);
		
		$judul = "UOB|Data Index Satpam Dalam";
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Frontier Consulting Group")
									 ->setLastModifiedBy("Frontier Consulting Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('30');
		
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Data Index Satpam Dalam')
					->setCellValue('A2', 'No')
					->setCellValue('B2', 'Nama Cabang')
					->setCellValue('C2', 'Overall')
					->setCellValue('D2', 'Sikap Melayani')
					->setCellValue('E2', 'Penampilan')
					->setCellValue('F2', 'Product Knowledge');
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->getFont()->setBold(true);
		
		// Miscellaneous glyphs, UTF-8
		
		$start_row = 3;
		$no = 1;
		
		if($res->num_rows() > 0){
			foreach($res->result() as $row){
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$start_row , $no)
						->setCellValue('B'.$start_row, $row->nama)
						->setCellValue('C'.$start_row, number_format(($row->overall),2,'.',','))
						->setCellValue('D'.$start_row, number_format($row->sikap_melayani,2,'.',','))
						->setCellValue('E'.$start_row, number_format($row->penampilan,2,'.',','))
						->setCellValue('F'.$start_row, number_format($row->skill,2,'.',','));
				$start_row++;
				$no++;
			}	
		}

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle($judul);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'_'.$date_created.'.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}
	//end of donwload data excel kompetitor
}
?>