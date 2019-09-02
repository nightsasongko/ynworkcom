<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct() {
		parent::__construct();
        $this->load->helper('url', 'form');
		$this->load->model('home_model');

    }	 
    
    public function index()
    {
        $this->load->view('dashboard/view_upload');
    }


    public function avatar_upload()
    {
        // mendapatkan id_member
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
        $profile = $data['profile'];
        $id_member = $profile['id_member'];
        $namafile = explode(".", $_FILES['profile_image']['name']);
		$fileext = end($namafile);

		$waktu = date("YmdHis");
		$acak = $this->dasarlib->getRandomString(4);

		$nama_file_baru = $waktu."_".$acak.".".$fileext;

        $image = $nama_file_baru;
        $config['file_name']  = $nama_file_baru;
        $config['upload_path'] = './assets/gambar_distributor/avatar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
		//$file_ext = pathinfo($image,PATHINFO_EXTENSION);
        $data = array(
            'avatar' => $image, 
			//'avatar_ext' => $file_ext
        );
        
        $this->db->where('id_member', $id_member);
        $this->db->update('member', $data);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('dashboard/error', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());
			$this->session->set_flashdata('upload_success', 'Upload Avatar Sukses.');
            redirect('setting', $data);
        }
    }

    public function img_toko_upload()
    {
        // mendapatkan id_member
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
        $profile = $data['profile'];
        $id_member = $profile['id_member'];
        $namafile = explode(".", $_FILES['gambar_toko']['name']);
		$fileext = end($namafile);

		$waktu = date("YmdHis");
		$acak = $this->dasarlib->getRandomString(4);

		$nama_file_baru = $waktu."_".$acak.".".$fileext;

        $image = $nama_file_baru;
        $config['file_name']  = $nama_file_baru;
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
			$this->session->set_flashdata('upload_success', 'Upload Cover Toko Sukses.');
            redirect('setting', $data);
        }
    }
	
	public function img_trs_umum_upload()
    {
        // mendapatkan id_member
        $data['profile'] = $this->dasar_model->getDetailOnField('member','id_member', $_SESSION[$this->config->item('sess_prefix_distributor').'IDSession']);
        $profile = $data['profile'];
        $id_member = $profile['id_member'];

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