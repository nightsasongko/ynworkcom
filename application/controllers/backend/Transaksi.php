<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// FORMAT INVOICE / nomor transaksi 1002: urutan dari tabel invoice_urutan

class Transaksi extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();
      	$this->load->model('transaksiadmin_model');
  	}	 
	 

	public function index()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "transaksi";

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}		

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/transaksi/index', $data);
	}

	public function list_invoice()
	{
		$hasil = $this->transaksiadmin_model->get_list_invoice();
        echo $hasil;
	}

	public function view_detail_transaksi()
	{
		$id_transaksi = $this->input->get('id');
		$data['list_belanja'] = $this->transaksiadmin_model->get_list_transaksi_detail($id_transaksi);

		
		$data['detail'] = $this->dasar_model->getDetailOnField('transaksi_umum', 'id_transaksi', $id_transaksi);

		$data['depembeli'] = $this->dasar_model->getDetailOnField('member', 'id_member', $data['detail']['id_member']);
		$data['kota_pembeli'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $data['depembeli']['id_kota']);


		$data['kota_penerima'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $data['detail']['id_kota_penerima']);
		if($data['detail']['tgl_kirim'] == "0000-00-00")
		{
			$data['tgl_kirim'] = '-';
		}
		else
		{
			$data['tgl_kirim'] = $this->dasarlib->ubahTanggalPendek2($data['detail']['tgl_kirim']);
		}

		if($data['detail']['status_bayar'] > 0)
		{ 
			$data['bank_pembeli'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $data['detail']['kode_bank']);

		}

		$this->load->view('admin/transaksi/detail_transaksi_member', $data);
	}

	public function edit_invoice()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "transaksi";

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','lihat',$iduser)))
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

		$data['list_detail'] = $this->transaksiadmin_model->get_list_transaksi_detail($id);
		
		$data['detail'] = $this->dasar_model->getDetailOnField('transaksi_umum', 'id_transaksi', $id);

		$data['depembeli'] = $this->dasar_model->getDetailOnField('member', 'id_member', $data['detail']['id_member']);
		$data['kota_pembeli'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $data['depembeli']['id_kota']);


		$data['kota_penerima'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $data['detail']['id_kota_penerima']);
		$data['tgl_kirim'] = $this->dasarlib->ubahTanggalPendek2($data['detail']['tgl_kirim']);
		

		if($data['detail']['status_bayar'] > 0)
		{ 
			$data['bank_pembeli'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $data['detail']['kode_bank']);

		}
		
		if($data['detail']['tgl_kirim'] == '0000-00-00')
		{
			$data['tgl_kirim'] = date("d-m-Y");
		}
		else
		{
			$data['tgl_kirim'] = $this->dasarlib->ubahTanggalPendek($data['detail']['tgl_kirim']);
		}

		if($data['detail']['tgl_terima'] == '0000-00-00')
		{
			$data['tgl_terima'] = date("d-m-Y");
		}
		else
		{
			$data['tgl_terima'] = $this->dasarlib->ubahTanggalPendek($data['detail']['tgl_terima']);
		}

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);


		$this->load->view('admin/transaksi/edit_transaksi', $data);		
	}

	public function do_edit_transaksi()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/transaksi/index";
		$kedb['status_bayar'] = trim($this->input->post('status'));


		$id = $this->input->post('id');

		$namatabel = "transaksi_umum";

		$detail = $this->dasar_model->getDetailOnField('transaksi_umum', 'id_transaksi', $id);
		$id_member = $detail['id_member'];
		$nomor_transaksi = $detail['nomor_transaksi'];
		
		$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_transaksi',$id);
		if($bener == 1)
		{
			//jika statusnya ke 1, maka saldo poin ditambah, dikonversi dulu 10% dari total tagihan
			if($kedb['status_bayar'] == 1)
			{
				$total_tagihan = $detail['total_tagihan'];
				$poin_reward = floor($total_tagihan / 100000);

				if($poin_reward > 0)
				{
					$keterangan = "Transaksi terbayar dari nomor transaksi: ".$nomor_transaksi;
					$this->transaksiadmin_model->tambahkan_poin_member($id_member, $poin_reward,$keterangan,$id);
				}

			}

			// kirim email disini
			
			$pesan =  "Simpan Data Sukses";
			//begin masukkan ke audit trail
			$keterangan_trail = 'ubah status invoice id: '. $id.', nomor: '.$nomor_transaksi;
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Simpan Data Gagal";
		}

		echo "$bener|$tujuan|$pesan";		
	}

	public function do_edit_kirim()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/transaksi/index";
		$kedb['status_kirim'] = trim($this->input->post('status_kirim'));
		$id = $this->input->post('id');

		if($kedb['status_kirim'] == 1)
		{
			$kedb['tgl_kirim'] = $this->dasarlib->balikTanggalPendek(trim($this->input->post('tgl_kirim')));
		}

		if($kedb['status_kirim'] == 2)
		{
			$kedb['tgl_kirim'] = $this->dasarlib->balikTanggalPendek(trim($this->input->post('tgl_kirim')));
			$kedb['tgl_terima'] = $this->dasarlib->balikTanggalPendek(trim($this->input->post('tgl_terima')));
		}

		$namatabel = "transaksi_umum";

		$detail = $this->dasar_model->getDetailOnField('transaksi_umum', 'id_transaksi', $id);
		$id_member = $detail['id_member'];
		$nomor_transaksi = $detail['nomor_transaksi'];
		
		$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_transaksi',$id);
		if($bener == 1)
		{
			
			$pesan =  "Simpan Data Sukses";
			//begin masukkan ke audit trail
			$keterangan_trail = 'ubah status kirim id: '. $id.', nomor: '.$nomor_transaksi;
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Simpan Data Gagal";
		}

		echo "$bener|$tujuan|$pesan";		
	}

	public function delete_transaksi()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','hapus',$iduser)))
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
		
		$namatabel = "transaksi_umum";
		$namafield = "id_transaksi";

		$param['is_hapus'] = 1;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus transaksi nomer trx: ".$detail['nomor_transaksi'];
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
