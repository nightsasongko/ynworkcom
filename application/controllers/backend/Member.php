<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('memberadmin_model');

    }

    public function index() {
        if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "member";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
        $data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$this->load->view('admin/member/index', $data);
    }

	public function list_member()
	{
		$hasil = $this->memberadmin_model->get_list_member();
        echo $hasil;
	}

	public function detail_member()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "member";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

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
				$id_member = $this->input->get('id');
			}  
		}

		$data['detail'] = $this->dasar_model->getDetailOnField('member', 'id_member', $id_member);
		$data['join_date'] = $this->dasarlib->ubahTanggalPendek2($data['detail']['join_date']);
		
		$id_kota = $data['detail']['id_kota'];
		$data['dekota'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $id_kota);

		$id_bank = $data['detail']['id_bank'];
		$data['debank'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $id_bank);

		$this->load->view('admin/member/detail_member', $data);
	}

	public function transaksi_member()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "member";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

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
				$id_member = $this->input->get('id');
			}  
		}

		$data['detail'] = $this->dasar_model->getDetailOnField('member', 'id_member', $id_member);
		$data['join_date'] = $this->dasarlib->ubahTanggalPendek2($data['detail']['join_date']);
		
		$id_kota = $data['detail']['id_kota'];
		$data['dekota'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $id_kota);

		$id_bank = $data['detail']['id_bank'];
		$data['debank'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $id_bank);

		$this->load->view('admin/member/transaksi_member', $data);
	}

	public function list_belanja_member()
	{
		$id_member = $this->input->get('id_member');
		$hasil = $this->memberadmin_model->get_list_transaksi_umum_member($id_member);
        echo $hasil;
	}
	
	public function detail_transaksi()
	{
		$id_transaksi = $this->input->get('id');
		$data['list_belanja'] = $this->memberadmin_model->get_list_transaksi_detail($id_transaksi);

		$this->load->view('admin/member/detail_transaksi_member', $data);
	}

	public function edit_member()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','lihat',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "member";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

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
				$id_member = $this->input->get('id');
			}  
		}

		$data['list_kota'] = $this->memberadmin_model->getListKota();
		$data['list_bank'] = $this->memberadmin_model->getListBank();

		$data['detail'] = $this->dasar_model->getDetailOnField('member', 'id_member', $id_member);
		$data['join_date'] = $this->dasarlib->ubahTanggalPendek2($data['detail']['join_date']);

		if($data['detail']['avatar'] == "")
		{
			$data['avatar'] = "noimage.png";
		}
		else
		{
			$data['avatar'] = $data['detail']['avatar'];
		}
		
		$id_kota = $data['detail']['id_kota'];
		$data['dekota'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $id_kota);

		$id_bank = $data['detail']['id_bank'];
		$data['debank'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $id_bank);

		$this->load->view('admin/member/edit_member', $data);
	}

	public function do_edit_member()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/member/index";

		$id_member = $this->input->post('id');
		$nama_member = $this->input->post('nama');

		$kedb['alamat'] = trim($this->input->post('alamat'));
		$kedb['id_kota'] = trim($this->input->post('kota'));
		$kedb['kodepos'] = trim($this->input->post('kodepos'));
		$kedb['telepon'] = trim($this->input->post('telepon'));
		$kedb['email'] = trim($this->input->post('email'));
		$kedb['id_bank'] = trim($this->input->post('id_bank'));
		$kedb['nomor_rekening'] = trim($this->input->post('nomor_rekening'));
		$kedb['nama_rekening'] = trim($this->input->post('nama_rekening'));

		$namatabel = "member";

		if($this->dasar_model->cekDataOnTableForEdit($namatabel,'email', $kedb['email'], 'id_member', $id_member ))
		{
			$bener = 0;
			$pesan =  "Error: Email sudah digunakan";
		}
		else
		{
			//simpan data
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_member',$id_member);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Edit member: ".$nama_member;
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
	
	public function delete_member()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','hapus',$iduser)))
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
		
		$namatabel = "member";
		$namafield = "id_member";
		$param['status'] = 4;
		
		$detail = $this->dasar_model->getDetailOnField($namatabel, $namafield, $id);

		//$bener = $this->dasar_model->hapusData($namatabel,$namafield,$id);
		$bener = $this->dasar_model->updateData($namatabel,$param,$namafield,$id);
		if($bener == 1)
		{
			$pesan =  "Hapus Data Sukses";

			//begin masukkan ke audit trail
			$keterangan_trail = "Menghapus/suspend member: ".$detail['nama'];
			$this->dasar_model->insertTrail($iduser, $username_user, $keterangan_trail);
			//end masukkan ke audit trail
		}
		else
		{
			$pesan =  "Hapus Data Gagal";
		}
		echo "$bener|$pesan";	
	}

	public function aktivasi_member()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "member";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "";

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
        $data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
        $data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

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
				$id_member = $this->input->get('id');
			}  
		}

		$data['detail'] = $this->dasar_model->getDetailOnField('member', 'id_member', $id_member);
		$data['join_date'] = $this->dasarlib->ubahTanggalPendek2($data['detail']['join_date']);

		if($data['detail']['avatar'] == "")
		{
			$data['avatar'] = "noimage.png";
		}
		else
		{
			$data['avatar'] = $data['detail']['avatar'];
		}

		if($data['detail']['bukti_transfer'] == "")
		{
			$data['bukti_transfer'] = "noimage.png";
		}
		else
		{
			$data['bukti_transfer'] = $data['detail']['bukti_transfer'];
		}
		
		$id_kota = $data['detail']['id_kota'];
		$data['dekota'] = $this->dasar_model->getDetailOnField('master_wilayah', 'id', $id_kota);

		$id_bank = $data['detail']['id_bank'];
		$data['debank'] = $this->dasar_model->getDetailOnField('bank_list', 'kode', $id_bank);

		$this->load->view('admin/member/aktivasi_member', $data);
	}

	public function do_aktivasi_member()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$username_user = $_SESSION[$this->config->item('sess_prefix')."UsernameSession"];

		if(!($this->dasarlib->apakahBolehMelakukan('MEMBER','ubah',$iduser)))
		{
			redirect(base_url('backend/login'));
			exit;
		}
		
		$bener = 1;
		$tujuan = base_url()."backend/member/index";
		$id_member = $this->input->post('id');

		$data['detail'] = $this->dasar_model->getDetailOnField('member', 'id_member', $id_member);
		$nama_member = $data['detail']['nama'];

		$kedb['status'] = trim($this->input->post('status'));

		if($kedb['status'] == 2)
		{

			$namatabel = "member";

			//simpan data
			$bener = $this->dasar_model->updateData($namatabel,$kedb,'id_member',$id_member);
			if($bener == 1)
			{
				$pesan =  "Simpan Data Sukses";

				//begin masukkan ke audit trail
				$keterangan_trail = "Aktivasi member: ".$nama_member;
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
	


}
?>
