<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->helper('url', 'form');
        $this->load->model('home_model');
        $this->load->model('dasar_model');
        $this->load->model('distributor_model');
	}

	public function registrasi()
	{
		if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            $data['title'] = "Registrasi Distributor";

            // mengambil data wilayah
            $data['wilayah'] = $this->db->get('master_wilayah')->result_array();

            $this->load->view('public/header', $data);
            $this->load->view('public/registrasi_distributor', $data);
            $this->load->view('public/footer', $data);
		}
    }
	
	public function post_registrasi()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // validasi inputan
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', 
                array('required' => 'nama harus di isi!'));
            $this->form_validation->set_rules('email', 'Email', 'required|trim',
                array('required' => 'email harus di isi!')); 
				$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', 
            [
                'matches' => 'Password tidak sama!',
                'min_length' => 'Password terlalu pendek!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            
            $email = $this->input->post('email');
            $permalink = $this->dasarlib->buatPermalink($this->input->post('nama', true));
            //cek email sama
            if($this->dasar_model->cekDataOnTable('member','email', $email))
            {
                $data['dataerror'] = "Error: Email ini sudah terdaftar.";
                // exit;	
                $this->errorpage($data);
            }
            // cek pramalink sama
            elseif($this->dasar_model->cekDataOnTable('member','permalink', $permalink))
            {
                $data['dataerror'] = "Error: Nama ini sudah terdaftar.";	
                $this->errorpage($data);
            }

            else
            {
                if ($this->form_validation->run() == FALSE) 
                {
                    // ambil data di tabel produk_item, produk_image
                    $data['all_produk_item'] = $this->distributor_model->getlistproduk();

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
                    $this->load->view('public/index', $data);
                    $this->load->view('public/footer', $data);
                }
                else 
                {
                    $permalink= $this->dasarlib->buatPermalink($this->input->post('nama', true));
                    $data = array(
                        'nama' => htmlspecialchars($this->input->post('nama', true)),
                        'level' => 1,
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'password' => md5($this->input->post('password1')),
                        'join_date' => date('Y-m-d'), 
                        'permalink' => $permalink
                    );
                    $this->db->insert('member', $data);
                    $this->session->set_flashdata('rgs_success', 'Registrasi berhasil.');

                    // kirim email disini
                    $data['name']	= $this->input->post('nama');
                    

                    $data['link']	= "http://yawnetwork.com/form_pembayaran_registrasi?permalink=$permalink";
                    
                    $data['email_pengirim']	= "info@yawnetwork.com";
                    $data['email_tujuan']	= $this->input->post('email');
                    $data['subjek']			= "Registrasi Akun Distributor YAW Network";
                    $data['template']		= 'yaw_registrasi_member';
                    
                    //var_dump($data); exit;
                    $this->dasarlib->send_email($data);

                    redirect(base_url().'distributor/after_registrasi');
                }
            }

            
		}
    }

    public function errorpage($data)
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            $data['dataerror'];

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

            $this->load->view('public/error_page', $data);
        }
    }

    public function after_registrasi()
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

            $this->load->view('public/header', $data);
            $this->load->view('public/after_registrasi', $data);
            $this->load->view('public/footer', $data);
		}
    }
    
    public function save_registrasi()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
			// mengambil data wilayah
            $data['wilayah'] = $this->db->get('master_wilayah')->result_array();

            // validasi inputan
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', 
                array('required' => 'nama harus di isi!'));
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
                array('required' => 'alamat harus di isi!'));
            $this->form_validation->set_rules('id_kota', 'Kota', 'required|trim',
                array('required' => 'Kota harus di isi!'));
            $this->form_validation->set_rules('kodepos', 'Kodepos', 'required|trim',
                array('required' => 'kode pos harus di isi!'));
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',
                array('required' => 'telepon harus di isi!'));
            $this->form_validation->set_rules('email', 'Email', 'required|trim',
                array('required' => 'email harus di isi!')); 
    
            if ($this->form_validation->run() == FALSE) 
            {
                $data['title'] = "Registrasi Distributor";
                $this->load->view('public/header', $data);
                $this->load->view('public/registrasi_distributor', $data);
                $this->load->view('public/footer', $data);
            }
            else 
            {
                $data = array(
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                    'id_kota' => htmlspecialchars($this->input->post('id_kota', true)),
                    'kodepos' => htmlspecialchars($this->input->post('kodepos', true)),
                    'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                    'email' => htmlspecialchars($this->input->post('email', true))
                );
                $this->db->insert('member', $data);
                $this->session->set_flashdata('rgs_success', 'Registrasi berhasil.');
                redirect('distributor/registrasi');
            }
		}
        
    }

    public function profile()
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

            // join tabel member dan master_wilayah untuk mendapatkan namakab
            $this->db->select('*');
            $this->db->from('member');
            $this->db->where('member.id_kota', $id_kota);
            $this->db->join('master_wilayah', 'master_wilayah.id = member.id_kota');
            $query=$this->db->get();
            $data['kota']=$query->row_array();
			
			//mendapatkan list bank
            $data['bank'] = $this->db->get('bank_list')->result_array();
			
			// join tabel member dan master_wilayah untuk mendapatkan namakab
            $this->db->select('*');
            $this->db->from('member');
            $this->db->where('member.id_bank', $id_bank);
            $this->db->join('bank_list', 'bank_list.kode = member.id_bank');
            $query=$this->db->get();
            $data['d_bank']=$query->row_array();

            // mengambil data wilayah
            $data['wilayah'] = $this->db->get('master_wilayah')->result_array();

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/profile_distributor', $data);
            $this->load->view('dashboard/footer');
		}
        
    }

    public function edit_profile() 
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            // mendapatkan id_member
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
            $profile = $data['profile'];
            $id_member = $profile['id_member'];
                
            // proses update data
            $data = array(
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'id_kota' => htmlspecialchars($this->input->post('id_kota', true)),
                'kodepos' => htmlspecialchars($this->input->post('kodepos', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
				'id_bank' => htmlspecialchars($this->input->post('kode', true)),
                'nomor_rekening' => htmlspecialchars($this->input->post('nomor_rekening', true)),
                'nama_rekening' => htmlspecialchars($this->input->post('nama_rekening', true)),
                'link_instagram' => htmlspecialchars($this->input->post('link_instagram', true)),
                'link_lazada' => htmlspecialchars($this->input->post('link_lazada', true)),
                'link_tokopedia' => htmlspecialchars($this->input->post('link_tokopedia', true)),
                'link_bukalapak' => htmlspecialchars($this->input->post('link_bukalapak', true)),
                'link_shopee' => htmlspecialchars($this->input->post('link_shopee', true)),
                'link_blibli' => htmlspecialchars($this->input->post('link_blibli', true)),
            );
            $this->db->where('id_member', $id_member);
            $this->db->update('member', $data);
            $this->session->set_flashdata('rgs_success', 'Merubah data member berhasil.');
            redirect(base_url('profile'));
        }
    }
	
	public function avatar_upload()
    {
        // mendapatkan id_member
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
        $profile = $data['profile'];
        $id_member = $profile['id_member'];

        $image = $_FILES['profile_image']['name'];
        $config['upload_path'] = './assets/gambar_distributor/avatar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $data = array(
            'avatar' => $image, 
        );
        
        $this->db->where('id_member', $id_member);
        $this->db->update('member', $data);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('dashboard/error', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('dashboard/success', $data);
        }
    }

    public function img_toko_upload()
    {
        // mendapatkan id_member
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
        $profile = $data['profile'];
        $id_member = $profile['id_member'];

        $image = $_FILES['gambar_toko']['name'];
        $config['upload_path'] = './assets/gambar_distributor/gambar_toko/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $data = array(
            'gambar_toko' => $image, 
        );
        
        $this->db->where('id_member', $id_member);
        $this->db->update('member', $data);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar_toko')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('dashboard/error', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('dashboard/success', $data);
        }
    }
	
	public function gantipassword()
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

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/gantipassword');
            $this->load->view('dashboard/footer');
        }

    }
	
	public function edit_password()
    {
        if ($this->dasar_model->apakahMaintenance())
		{
			$this->load->view('public/maintenance');
		}
		else
		{
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            $this->load->library('form_validation');
            if ($this->form_validation->run() == false) {
                // cek session
                if(!isset($_SESSION[$this->config->item('sess_prefix_distributor').'loggedinSession'])){
                    redirect(base_url());
                }	

                // judul di header
                $data['title'] = "Detail Produk";
                $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);

                $data['title'] = 'Registration';
                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/gantipassword');
                $this->load->view('dashboard/footer');
            } else {
                $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
                $profile = $data['profile'];
                $id_member = $profile['id_member'];
                $data = [
                    'password' => md5($this->input->post('password1')),
                ];
                $this->db->where('id_member', $id_member);
                $this->db->update('member', $data);
                redirect('setting');
            }
        }
    }

    public function produk()
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

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/produk_distributor', $data);
            $this->load->view('dashboard/footer');
		}
        
    }

    public function detail_produk($permalink)
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

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/produk_distributor_detail',$data);
            $this->load->view('dashboard/footer');
        }
    }

    public function produk_cart($id)
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

            $data['image'] = $this->db->get_where('produk_image', ['id_produk' =>  $id_produk = $item_produk['id_produk']])->row_array();
            // var_dump($data['image']);die;

            $data = array(
                'id_member' => $id_member = $profile['id_member'], 
                'id_produk' => $id_produk = $item_produk['id_produk'], 
                'harga_umum' => $harga_umum = $item_produk['harga_umum'], 
                'harga_distributor' => $harga_distributor = $item_produk['harga_distributor'], 
                'berat' => $berat = $item_produk['berat'], 
                'permalink' => $permalink = $item_produk['permalink'],
            );
            $this->db->insert('cart', $data);
            redirect(base_url('cart'));

            // var_dump($data);die;
            
            $this->load->view('dashboard/cart_distributor');
        }
    }

    public function cart() 
    {
        //cek member
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
        $profile = $data['profile'];
        $id_member = $profile['id_member'];

        // mengambil data dari table cart, produk item, produk image
        $data['d_cart'] = $this->distributor_model->getlistcart($id_member);
        
        // judul di header
        $data['title'] = "News Distributor";
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/cart_distributor', $data);
        $this->load->view('dashboard/footer');
    }

    public function delete_cart($delete_id)
    {
        $this->db->delete('cart', array('id_cart' => $delete_id));
        $this->session->set_flashdata('dlt_success', 'delete sukses.');
        redirect('keranjang_belanja');
    }

    public function news()
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
            $data['title'] = "News Distributor";
            $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);

            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/news_distributor');
            $this->load->view('dashboard/footer');
		}   
    }
	
	public function shipment_post_plus() 
    {

        $id_member =  $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession'];
        // $id_cart = $this->input->post('id_cart');
        // $detail = $this->dasar_model->getDetailOnField('cart', 'id_cart', $id_cart);
        // $id_produk = $detail['id_produk'];

        // $this->distributor_model->cekbelanjadicart($id_member, $id_produk);

        $data = array(
            'qty' => $this->input->post('isi_sekarang'), 
            'total' => $this->input->post('sub_total') 
        );

        $this->db->where('id_cart', $this->input->post('id_cart'));
        $this->db->update('cart', $data);

        $texsubtotal = number_format($this->input->post('sub_total'), 0,',','.');

        $total = $this->distributor_model->hitung_total_belanja($id_member);

        $text_total = number_format($total,0,',','.');
        echo "$texsubtotal|$text_total";
    }

    public function shipment_post_minus() 
    {

        $id_member =  $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession'];
        $data = array(
            'qty' => $this->input->post('isi_sekarang'), 
            'total' => $this->input->post('sub_total') 
        );

        $this->db->where('id_cart', $this->input->post('id_cart'));
        $this->db->update('cart', $data);

        $texsubtotal = number_format($this->input->post('sub_total'), 0,',','.');

        $total = $this->distributor_model->hitung_total_belanja($id_member);

        $text_total = number_format($total,0,',','.');
        echo "$texsubtotal|$text_total";
    }

}
