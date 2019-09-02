<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbrd_distributor extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('home_model');
        $this->load->model('dasar_model');
        $this->load->model('distributor_model');
        $this->load->library('upload');
    }

    public function index() 
    {
		 if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
			}	

			$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
			$profile = $data['profile'];
			$id_member = $profile['id_member'];
			
			// jumlah belanja
			$data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);
			
			// jumlah belanja
			$data['last_history'] = $this->distributor_model->last_history();

			$this->load->view('dashboard/dashboard', $data);
		}
    }

    public function setting()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                redirect(base_url());
            }	

            // judul di header
            $data['title'] = "Profile Distributor";
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];
            $id_kota = $profile['id_kota'];
            $id_bank = $profile['id_bank'];
			$id_member = $profile['id_member'];

            // join tabel member dan master_wilayah untuk mendapatkan namakab
            $this->db->select('*');
            $this->db->from('member');
            $this->db->where('member.id_kota', $id_kota);
            $this->db->join('master_wilayah', 'master_wilayah.id = member.id_kota');
            $query=$this->db->get();
            $data['kota']=$query->row_array();

            //mendapatkan list bank
            $data['bank'] = $this->db->get('bank_list')->result_array();
            
            //join tabel member dan master_wilayah untuk mendapatkan namakab
            $this->db->select('*');
            $this->db->from('member');
            $this->db->where('member.id_bank', $id_bank);
            $this->db->join('bank_list', 'bank_list.kode = member.id_bank');
            $query=$this->db->get();
            $data['d_bank']=$query->row_array();

            //mengambil data wilayah
            $data['wilayah'] = $this->db->get('master_wilayah')->result_array();
			
			// jumlah belanja
			$data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);

            $this->load->view('dashboard/setting', $data);
		}
    }

    public function post_setting()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                redirect(base_url());
            }	
			
            // mendapatkan id_member
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];
            $id_member = $profile['id_member'];

            // upload foto
            // ./assets/gambar_distributor/avatar/
            
            
            // proses update data
            $data = array(
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'id_kota' => htmlspecialchars($this->input->post('id_kota', true)),
                'kodepos' => htmlspecialchars($this->input->post('kodepos', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'id_bank' => htmlspecialchars($this->input->post('kode', true)),
                'nomor_rekening' => htmlspecialchars($this->input->post('nomor_rekening', true)),
                'nama_rekening' => htmlspecialchars($this->input->post('nama_rekening', true)),
                'link_instagram' => htmlspecialchars($this->input->post('link_instagram', true)),
                'link_lazada' => htmlspecialchars($this->input->post('link_lazada', true)),
                'link_tokopedia' => htmlspecialchars($this->input->post('link_tokopedia', true)),
                'link_bukalapak' => htmlspecialchars($this->input->post('link_bukalapak', true)),
                'link_shopee' => htmlspecialchars($this->input->post('link_shopee', true)),
                'link_blibli' => htmlspecialchars($this->input->post('link_blibli', true))

            );
            $this->db->where('id_member', $id_member);
            $this->db->update('member', $data);
            $this->session->set_flashdata('rgs_success', 'Merubah data member berhasil.');
            redirect(base_url('setting'));
        
        }
    }

    public function purchase() 
    {
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // cek session
            if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                redirect(base_url());
            }	

            // judul di header
            $data['title'] = "Produk Distributor";
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];
            $id_member = $profile['id_member'];

            // ambil data di tabel produk_item, produk_image
            $data['all_produk_item'] = $this->distributor_model->getlistproduk();
			//var_dump($data['all_produk_item']);die;
			
			// jumlah belanja
			$data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);

            $this->load->view('dashboard/purchase', $data);
		}
        
    }
	
	public function detail_produk_tab($permalink)
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // cek session
            if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                redirect(base_url());
            }	

            // judul di header
            $data['title'] = "Detail Produk";
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);

            // mendapatakan id_produk
            $data['item_produk'] = $this->db->get_where('produk_item', ['permalink' => $permalink])->row_array();
            $item_produk = $data['item_produk'];
            $data['id_produk'] = $item_produk['id_produk'];
            $id_produk = $data['id_produk'];

            // mendapatakan foto dari tabel produk_image
            $data['foto_produk'] = $this->db->get_where('produk_image', ['id_produk' => $id_produk])->result_array();
			
			// jumlah terjual
            $data['jml_tjl'] = $this->distributor_model->jumlah_terjual($id_produk);
            
            // review produk
            $data['review'] = $this->distributor_model->produkreview($id_produk);
            // jika null review
			$data['null_review'] = $this->dasar_model->cekDataOnTable("produk_review","id_produk","$id_produk");

            $this->load->view('dashboard/detail-produk-tab', $data);
        }
	}

    public function historitransaksi()
    {
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
			}	

			$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
			$profile = $data['profile'];
            $id_member = $profile['id_member'];
			
			// jumlah belanja
			$data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);
			
			//list histori
			$data['list_histori'] = $this->distributor_model->list_histori($id_member);
			
			$this->load->view('dashboard/histori-transaksi', $data);
		}
			
    }

    public function upload()
    {
		 if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
			}	

			$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
			$profile = $data['profile'];
			$id_member = $profile['id_member'];
			
			// jumlah belanja
			$data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);
			
			$this->load->view('dashboard/upload', $data);
		}
        
    }

    public function keranjangbelanja()
    {
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                redirect(base_url());
            }	
            //cek member
            $data['title'] = "Cart";
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];
            $id_member = $profile['id_member'];

            // mengambil data dari table cart, produk item, produk image
            $data['d_cart'] = $this->distributor_model->getlistcart($id_member);
			//var_dump($data['d_cart']);die;

            $data['cart_all'] = $this->db->get('cart')->result_array();
            //var_dump($data['d_cart']);die;
			
			$data['total'] = $this->distributor_model->hitung_total_belanja($id_member);
			
			// jumlah belanja
            $data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);
            
            // jika null cart
            $data['null_cart'] = $this->dasar_model->cekDataOnTable("cart","id_member","$id_member");
            // var_dump( $data['null_cart']);die;

            $this->load->view('dashboard/keranjang-belanja', $data);
        }
        
    }
	
	public function keranjangbelanja_post($id)
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // cek session
            if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                redirect(base_url());
            }

            //cek member
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];

            //mendaptakan id_produk
            $data['item_produk'] = $this->db->get_where('produk_item', ['id_produk' => $id])->row_array();
            $item_produk = $data['item_produk'];
            $id_member = $profile['id_member'];
            $id_produk = $item_produk['id_produk'];


            //$data['image'] = $this->db->get_where('produk_image', ['id_produk' =>  $id_produk = $item_produk['id_produk']])->row_array();
            // var_dump($data['image']);die;

            if ($this->distributor_model->cekbelanjadicart($id_member,$id_produk)) {
               $detailcart = $this->distributor_model->getdetailcart($id_member,$id_produk);
               $id_cart = $detailcart['id_cart'];
               $hargadistributor = $detailcart['harga_distributor'];
               $qty_lama = $detailcart['qty'];

               $qty_baru = $qty_lama + 1;

               $total_baru = $hargadistributor * $qty_baru;

               $kedb['qty'] = $qty_baru;
               $kedb['total'] = $total_baru;
               
               $this->dasar_model->updateData('cart',$kedb,'id_cart',$id_cart);
            }
            else 
            {
                $data = array(
                    'id_member' => $id_member = $profile['id_member'], 
                    'id_produk' => $id_produk = $item_produk['id_produk'], 
                    'harga_umum' => $harga_umum = $item_produk['harga_umum'], 
                    'harga_distributor' => $harga_distributor = $item_produk['harga_distributor'],
                    'qty' => 1,
                    'total' => $harga_distributor,				
                    'berat' => $berat = $item_produk['berat'], 
                    'permalink' => $permalink = $item_produk['permalink']
                );
                $this->db->insert('cart', $data);
            }

            


            redirect(base_url('keranjang_belanja'));
        }
	}

    public function checkout()
    {
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                redirect(base_url());
            }	

            //cek member
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];
            $id_member = $profile['id_member'];

            // mengambil data dari table cart, produk item, produk image
            $data['d_cart'] = $this->distributor_model->getlistcart($id_member);
			
			$data['total'] = $this->distributor_model->hitung_total_belanja($id_member);

            $this->load->view('dashboard/checkout', $data);
		}
    }

    public function news()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
			}	

			$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
			$profile = $data['profile'];
            $id_member = $profile['id_member'];
            
            $data['berita'] = $this->distributor_model->berita();
			
			// jumlah belanja
			$data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);
			
			$this->load->view('dashboard/news', $data);
		}
        
    }

    public function detail_histori()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
			}	

			$data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
			$profile = $data['profile'];
            $id_member = $profile['id_member'];
			
			// jumlah belanja
            $data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);
            
            $this->load->view('dashboard/detail-histori', $data);
        }
    }
	
	public function checkout_post()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
            }

            // data member
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];
            $id_member = $profile['id_member'];
            $email = $profile['email'];

            // mengambil data dari table cart, produk item, produk image
            $data['d_cart'] = $this->distributor_model->getlistcart($id_member);
            $d_cart = $data['d_cart'];
            
            
            // total belanja
            $data['total'] = $this->distributor_model->hitung_total_belanja($id_member);
            $total = $data['total'];

            // antrian transaksi
            $data['trs_utn'] = $this->db->get('transaksi_urutan')->row_array();
            $trs_utn = $data['trs_utn'];
            $urutan = $trs_utn['urutan'];

            $tambahan_urutan = $urutan + 1;
            $data = array(
                'urutan' => $tambahan_urutan, 
            );
            $this->db->where('id', 1);
            $this->db->update('transaksi_urutan', $data);

            $data = array(
                'id_member' => $id_member,
                'nomor_transaksi' => $urutan,
                'total_harga' => $total,
                'total_kurir' => 0,
                'total_harga_dan_kurir' => $total,
                'total_tagihan' => $total,
                'status_bayar' => 0,
            );

            //jika total kosong
            if ($total==null) {
                $this->session->set_flashdata('mssd_kbl_kosong', 'Keranjang belanja tidak boleh kosong!');
                redirect(base_url('keranjang_belanja'));
            } else {
                // insert ke umum
                $this->db->insert('transaksi_umum', $data);
                 // id_transaksi yg harus di masuk kan
                $id_transaksi = $this->distributor_model->get_last_id_transaksi($id_member);

                //masukan ke transaksi detail
                foreach ($d_cart as $row2) {
                    $data2 = array(
                        'id_transaksi' => $id_transaksi,
                        'id_pembeli' => $id_member,
                        'id_produk' => $row2['id_produk'],
                        'qty' => $row2['qty'],
                        'harga_satuan' => $row2['harga_distributor'],
                        'harga_total' => $row2['total'],
                        'total_berat' => 1
                    );
                    $this->db->insert('transaksi_detail', $data2);
                    // var_dump($data2);die;

                     
                }
                // kirim email disini
                $data['name']	= $this->input->post('nama');
                //list histori
                $data['detail_umum'] = $this->dasar_model->getDetailOnField('transaksi_umum','id_transaksi', $id_transaksi);
                $data['list_detail'] = $this->distributor_model->list_detail($id_transaksi);
                // $data['list_detail'] = $this->distributor_model->getlistdetail($id_transaksi);
                // var_dump($data['list_detail']);die;
                    
                $data['link']	= "http://yawnetwork.com/dbrd_distributor/konfirmasi_pembayaran/$urutan";
                
                $data['email_pengirim']	= "info@yawnetwork.com";
                $data['email_tujuan']	= $email;
                $data['subjek']			= "Checkout Pembayaran Produk YAW Network";
                $data['template']		= 'yaw_checkout_pembayaran';
                
                // var_dump($data); exit;
                $this->dasarlib->send_email($data);
                
                // hapus cart
                $this->db->delete('cart', array('id_member' => $id_member));
                
                redirect(base_url('histori_transaksi'));
            }
        }
    }
	
	public function konfirmasi_pembayaran($nomor_transaksi)
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // cek bila status_bayar 0 true
            if ($this->distributor_model->getcekkodetransaksipengiriman($nomor_transaksi)) {
                 // cek session aktif
                if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                    redirect(base_url());
                }

                // data member
                $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
                $profile = $data['profile'];
                $id_member = $profile['id_member'];
                $profile = $data['profile'];
                $id_kota = $profile['id_kota'];
                $id_bank = $profile['id_bank'];

                // jumlah belanja
                $data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);

                // join tabel member dan master_wilayah untuk mendapatkan namakab
                $this->db->select('*');
                $this->db->from('member');
                $this->db->where('member.id_kota', $id_kota);
                $this->db->join('master_wilayah', 'master_wilayah.id = member.id_kota');
                $query=$this->db->get();
                $data['kota']=$query->row_array();
                
                //mengambil data wilayah
                $data['wilayah'] = $this->db->get('master_wilayah')->result_array();

                //mendapatkan list bank
                $data['bank'] = $this->db->get('bank_list')->result_array();

                //join tabel member dan master_wilayah untuk mendapatkan namakab
                $this->db->select('*');
                $this->db->from('member');
                $this->db->where('member.id_bank', $id_bank);
                $this->db->join('bank_list', 'bank_list.kode = member.id_bank');
                $query=$this->db->get();
                $data['d_bank']=$query->row_array();

                //nomor_transaksi
                $data['nomor_transaksi'] = $nomor_transaksi;

                $this->load->view('dashboard/konfirmasi-pembayaran', $data);
            } else {
                redirect(base_url('histori_transaksi'));
            }
            
            
        }
    }

    public function konfirmasi_terima_barang()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            $nomor_transaksi = $this->input->get('nomor_transaksi');
            if ($this->distributor_model->getcekkonfirmasiterkirim($nomor_transaksi)) {
                $data['nomor_transaksi'] = $this->input->get('nomor_transaksi');

                // cek session aktif
               if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                   redirect(base_url());
               }
   
               // data member
               $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
               $profile = $data['profile'];
               $id_member = $profile['id_member'];
   
               // jumlah belanja
               $data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);
   
               $this->load->view('dashboard/konfirmasi-terima-barang', $data);
            } else {
                redirect(base_url('histori_transaksi'));
            }
            
           
        }
    }

    public function konfirmasi_status_bayar()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
             // cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
            }

            $nomor_transaksi = $this->input->get('nomor_transaksi');

            $datar = array(
                'status_kirim' => 2 
            );

            $this->db->where('nomor_transaksi', $nomor_transaksi);
            $this->db->update('transaksi_umum', $datar);
            redirect(base_url('histori_transaksi'));
        }
    }
	
	public function gambar_bukti_transfer()
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
		$config['upload_path'] =  './assets/gambar_bukti_bayar/';
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
		echo "$bener|<span style='display: inline-block;'><img src='".base_url()."assets/gambar_bukti_bayar/$nama_file_baru' height='60'></span>|$nama_file_baru";
		exit;		
	}
	
	public function upload_gambar_bukti_transfer($nomor_transaksi)
    {
        // cek session aktif
        if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
            redirect(base_url());
        }

        // data member
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
        $profile = $data['profile'];
        $id_member = $profile['id_member'];

        // jumlah belanja
        $data['num_kjngbln'] = $this->distributor_model->num_keranjang_belanja($id_member);

        //nomor_transaksi
        $data['nomor_transaksi'] = $nomor_transaksi;

        $this->load->view('dashboard/konfirmasi-upload-bukti-gambar', $data);
    }
	
	public function konfirmasi_pembayaran_post()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // cek session aktif
			if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
				redirect(base_url());
            }

            $namafile = explode(".", $_FILES['file_bukti_bayar']['name']);
            $fileext = end($namafile);
    
            $waktu = date("YmdHis");
            $acak = $this->dasarlib->getRandomString(4);
    
            $nama_file_baru = $waktu."_".$acak.".".$fileext;
    
            $image = $nama_file_baru;
            $config['file_name']  = $nama_file_baru;
            $config['upload_path'] = './assets/gambar_bukti_bayar/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1500;
            $config['max_height'] = 1500;
    
            $data = array(
                'kode_bank' => $this->input->post('kode'), 
                'nomor_rekening' => $this->input->post('nomor_rekening'), 
                'status_bayar' => 4, 
                'nama_rekening' => $this->input->post('nama_rekening'), 
                'nama_penerima' => $this->input->post('nama_penerima'), 
                'alamat_penerima' => $this->input->post('alamat_penerima'), 
                'id_kota_penerima' => $this->input->post('id_kota_penerima'), 
                'kodepos_penerima' => $this->input->post('kodepos_penerima'), 
                'telepon_penerima' => $this->input->post('telepon_penerima'),
                'nomor_transaksi' => $this->input->post('nomor_transaksi'),
                'file_bukti_bayar' => $image
            );

            $this->db->where('nomor_transaksi', $this->input->post('nomor_transaksi'));
            $this->db->update('transaksi_umum', $data);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_bukti_bayar')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('dashboard/error', $error);
            } else {
                $data = array('image_metadata' => $this->upload->data());

                redirect(base_url('histori_transaksi'));
            }




            
            
        }
    }
	
	
}