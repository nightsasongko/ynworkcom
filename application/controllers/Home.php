<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

        $this->load->library('form_validation');
		$this->load->model('home_model');
		$this->load->model('distributor_model');

	}	 

	public function error404()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
            {
                $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
                $data['cek_login'] = "1";
            } 
            else 
            {
                $data['cek_login'] = "0";
            }

            $data['all_produk_item'] = $this->distributor_model->getlistproduk();

            $this->load->view('public/error404', $data);
        }
    }


	public function index()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// ambil data di tabel produk_item, produk_image
			$data['all_produk_item'] = $this->distributor_model->getlistproduk();
			
			// kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}
			
			$data['title'] = "YAW";
			$this->load->view('public/header', $data);
			$this->load->view('public/index');
			$this->load->view('public/footer');
		}
	}
	
	public function detailproduk($permalink)
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}
			
			// judul di header
            $data['title'] = "Detail Produk";

            // mendapatakan id_produk
            $data['item_produk'] = $this->db->get_where('produk_item', ['permalink' => $permalink])->row_array();
            $item_produk = $data['item_produk'];
            $data['id_produk'] = $item_produk['id_produk'];
			$id_produk = $data['id_produk'];
			// var_dump($data['item_produk']);die;

            // mendapatakan foto dari tabel produk_image
			$data['foto_produk'] = $this->db->get_where('produk_image', ['id_produk' => $id_produk])->result_array();

			// jumlah terjual
			$data['jml_tjl'] = $this->distributor_model->jumlah_terjual($id_produk);
			// var_dump($data['jml_tjl']);die;
			
			// ambil data di tabel produk_item, produk_image
			$data['all_produk_item'] = $this->distributor_model->getlistproduk();
			
			// review produk
			$data['review'] = $this->distributor_model->produkreview($id_produk);
			// jika null review
			$data['null_review'] = $this->dasar_model->cekDataOnTable("produk_review","id_produk","$id_produk");
			
			$this->load->view('public/detail-produk', $data);
		}
	}
	
	public function distributorlist()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			
			// ambil data di tabel produk_item, produk_image
			$data['all_produk_item'] = $this->distributor_model->getlistproduk();

			// kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}
				
			$data['list_member'] = $this->db->get_where('member', ['status' => 2])->result_array();
			$this->load->view('public/distributor-list', $data);
			
		}
	}
	
	public function detaildistributor($permalink)
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			if($this->dasar_model->cekDataOnTable("member","permalink", $permalink))
			{
				// ambil data di tabel produk_item, produk_image
				$data['all_produk_item'] = $this->distributor_model->getlistproduk();

				// detail member
				$data['detail_member'] = $this->db->get_where('member', ['permalink' => $permalink])->row_array();
				
				//banyak view
				$data['banyak_view'] = $this->distributor_model->number_view($permalink);
				
				//tambah view
				$banyak_view = $data['banyak_view'];
				$kunjungan = $banyak_view+1;
				$datarr = array(
					'kunjungan' => $kunjungan, 
				);
				$this->db->where('permalink', $permalink);
				$this->db->update('member', $datarr);
				
				$this->load->view('public/detail-distributor', $data);
			}
			else
			{
				$this->load->view('public/error404');
			}
		}
	}
	
	public function faq()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// ambil data di tabel produk_item, produk_image
			$data['all_produk_item'] = $this->distributor_model->getlistproduk();
			
			// kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}
			$this->load->view('public/faq', $data);
		}
		
	}
	
	public function syaratketentuan()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// ambil data di tabel produk_item, produk_image
			$data['all_produk_item'] = $this->distributor_model->getlistproduk();
			
			// kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}
			$this->load->view('public/syarat-ketentuan', $data);
		}
		
	}
	
	public function management_board()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// ambil data di tabel produk_item, produk_image
			$data['all_produk_item'] = $this->distributor_model->getlistproduk();
			
			// kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}

            $this->load->view('public/management-board', $data);
		}
		
	}

	public function pembayaran_registrasi()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}

			$data['permalink'] = $this->input->get('permalink');
			$permalink = $data['permalink'];
			
			if ($this->distributor_model->getcekmemberbaru($permalink)) {
				// ambil data di tabel produk_item, produk_image
				$data['all_produk_item'] = $this->distributor_model->getlistproduk();

				//mendapatkan list bank
				$data['bank'] = $this->db->get('bank_list')->result_array();
				
				//mengambil data wilayah
				$data['wilayah'] = $this->db->get('master_wilayah')->result_array();

				$data['title'] = "YAW";
				$this->load->view('public/header', $data);
				$this->load->view('public/konfirmasi_pembayaran_registrasi', $data);
				$this->load->view('public/footer');
			} else {
				$this->load->view('public/error404');
			}
			
		}
	}

	public function pembayaran_registrasi_post()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			$permalink = $this->input->get('permalink');

			$namafile = explode(".", $_FILES['bukti_transfer']['name']);
			$fileext = end($namafile);

			$waktu = date("YmdHis");
			$acak = $this->dasarlib->getRandomString(4);

			$nama_file_baru = $waktu."_".$acak.".".$fileext;

			$image = $nama_file_baru;
			$config['file_name']  = $nama_file_baru;
			$config['upload_path'] = './assets/gambar_bayar_membership/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;

			$data = array(
				'alamat' => $this->input->post('alamat', true),
                'id_kota' => $this->input->post('id_kota', true),
                'kodepos' => $this->input->post('kodepos', true),
                'telepon' => $this->input->post('telepon', true),
				'status' => 1, 
				'id_bank' => $this->input->post('kode'), 
				'nomor_rekening' => $this->input->post('nomor_rekening'), 
				'nama_rekening' => $this->input->post('nama_rekening'), 
				'bukti_transfer' => $image, 
			);
			
			$this->db->where('permalink', $permalink);
			$this->db->update('member', $data);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti_transfer')) {
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('dashboard/error', $error);
			} else {
				$data = array('image_metadata' => $this->upload->data());

				redirect(base_url('konfirmasi_pembayaran_sukses'));
			}
			
		}
	}

	public function after_konfirmasi_pembayaran_registrasi()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            $data['title'] = "Registrasi Distributor";

            // kondisi cek login
			if ($this->session->userdata($this->config->item('sess_prefix_distributor').'IDSession')) 
			{
				$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
				$data['cek_login'] = "1";
			} 
			else 
			{
				$data['cek_login'] = "0";
			}
			
			$data['all_produk_item'] = $this->distributor_model->getlistproduk();

            $this->load->view('public/header', $data);
            $this->load->view('public/after_konfirmasi_pembayaran_registrasi', $data);
            $this->load->view('public/footer', $data);
		}
	}
	

}
