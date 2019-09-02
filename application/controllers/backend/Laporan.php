<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
  	function __construct() {
      	parent::__construct();
		$this->load->model('laporanadmin_model');
	}		 
	  
	public function penjualan()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "laporan";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "penjualan";

		if(!($this->input->get('tahun')))
		{
  			$tahun = date('Y');
		}
		else
		{
		  	if(!(is_numeric($this->input->get('tahun'))))
		  	{
  				$tahun = date('Y');
		  	}
			else
			{
				$tahun = $this->input->get('tahun');
			}  
		}
		$data['tahun_dipilih'] = $tahun;


		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_categories'] = "'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'";

		$data['data_penjualan'] = $this->laporanadmin_model->get_series_penjualan($tahun);

		$data['last_10_penjualan'] = $this->laporanadmin_model->get_last_penjualan($tahun,10);


		$this->load->view('admin/laporan/penjualan', $data);
	}

	public function download_penjualan()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "laporan";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "penjualan";

		if(!($this->input->get('tahun')))
		{
  			$tahun = date('Y');
		}
		else
		{
		  	if(!(is_numeric($this->input->get('tahun'))))
		  	{
  				$tahun = date('Y');
		  	}
			else
			{
				$tahun = $this->input->get('tahun');
			}  
		}
		$data['tahun_dipilih'] = $tahun;

		$this->load->library('PHPExcel');

		$judul = "Laporan Penjualan ".$tahun;
		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Frontier Group")
									 ->setLastModifiedBy("Frontier Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('10');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('15');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('15');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('15');
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('15');
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('15');
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('40');
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth('15');

		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'LAPORAN PENJUALAN '.$tahun);
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);

		$start_row = 3;
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$start_row, 'NOMOR')
			->setCellValue('B'.$start_row, 'DISTRIBUTOR')
			->setCellValue('C'.$start_row, 'NO INVOICE')
			->setCellValue('D'.$start_row, 'TAGIHAN')
			->setCellValue('E'.$start_row, 'TGL BELANJA')
			->setCellValue('F'.$start_row, 'STATUS BAYAR')
			->setCellValue('G'.$start_row, 'TGL BAYAR')
			->setCellValue('H'.$start_row, 'STATUS KIRIM')
			->setCellValue('I'.$start_row, 'RESI KIRIM')
			->setCellValue('J'.$start_row, 'NAMA TERKIRIM')
			->setCellValue('K'.$start_row, 'ALAMAT TERKIRIM')
			->setCellValue('L'.$start_row, 'KOTA TERKIRIM')
			->setCellValue('M'.$start_row, 'KODE POS');

			$objPHPExcel->getActiveSheet()->getStyle("A3:M3")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A3:M3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cac1f5');

			$start_row = $start_row + 1;

		$sql2 = "SELECT a.*, b.nama, c.namakab 
        FROM transaksi_umum a, member b, master_wilayah c
        WHERE a.is_hapus=0 
		AND YEAR(a.posting_date)='$tahun' 
		AND a.id_member = b.id_member 
		AND a.id_kota_penerima = c.id 
		ORDER BY a.id_transaksi DESC";
		$q2 = $this->db->query($sql2);
		$res2 = $q2->result_array();
		$nourut = 1;
		foreach($res2 as $row2)
		{
			if($row2['status_bayar'] == 0)
			{
				$textatus = 'Belum Bayar';
			}
			elseif($row2['status_bayar'] == 1)
			{
				$textatus = 'Terbayar';
			}
			elseif($row2['status_bayar'] == 2)
			{
				$textatus = 'Gagal Bayar';
			}
			elseif($row2['status_bayar'] == 3)
			{
				$textatus = 'Bayar Pending';
			}
			elseif($row2['status_bayar'] == 4)
			{
				$textatus = 'Konfirmasi Bayar';
			}
			else
			{
				$textatus = 'Unknown';
			}

			if($row2['tanggal_bayar'] == '0000-00-00 00:00:00')
			{
				$textglbayar = '';
			}
			else
			{
				$textglbayar = $this->dasarlib->ubahTanggalPanjang3($row2['tanggal_bayar']);
			}

			if($row2['status_kirim'] == 0)
			{
				$texkirim = "Belum Kirim";
			}
			elseif($row2['status_kirim'] == 1)
			{
				$texkirim = "Dikirim";
			}
			else
			{
				$texkirim = "Diterima";
			}

			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$start_row, $nourut)
			->setCellValue('B'.$start_row, $row2['nama'])
			->setCellValue('C'.$start_row, $row2['nomor_transaksi'])
			->setCellValue('D'.$start_row, $row2['total_tagihan'])
			->setCellValue('E'.$start_row, $this->dasarlib->ubahTanggalPanjang3($row2['posting_date']))
			->setCellValue('F'.$start_row, $textatus)
			->setCellValue('G'.$start_row, $textglbayar)
			->setCellValue('H'.$start_row, $texkirim)
			->setCellValue('I'.$start_row, $row2['no_resi_pengiriman'])
			->setCellValue('J'.$start_row, $row2['nama_penerima'])
			->setCellValue('K'.$start_row, $row2['alamat_penerima'])
			->setCellValue('L'.$start_row, ucwords($row2['namakab']))
			->setCellValueExplicit('M'.$start_row, $row2['kodepos_penerima'], PHPExcel_Cell_DataType::TYPE_STRING);
			$nourut++;
			$start_row++;
		}
		$start_row++;

		$objPHPExcel->getActiveSheet()->getStyle('A'.$start_row.':M'.$start_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cac1f5');

		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "_", $date_created);
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle("Laporan");
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'.xls"');
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

	public function akuisisi_distributor()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "laporan";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "akuisisi_distributor";

		if(!($this->input->get('tahun')))
		{
  			$tahun = date('Y');
		}
		else
		{
		  	if(!(is_numeric($this->input->get('tahun'))))
		  	{
  				$tahun = date('Y');
		  	}
			else
			{
				$tahun = $this->input->get('tahun');
			}  
		}
		$data['tahun_dipilih'] = $tahun;

		$data['header1'] = $this->load->view('admin/header1', NULL, TRUE);
		$data['header2'] = $this->load->view('admin/header2', NULL, TRUE);
		$data['sidebar'] = $this->load->view('admin/sidebar', NULL, TRUE);
		$data['footer'] = $this->load->view('admin/footer', NULL, TRUE);

		$data['list_categories'] = "'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'";

		$data['series1'] = $this->laporanadmin_model->get_series_distributor($tahun);

		$data['last_10_data'] = $this->laporanadmin_model->get_last_distributor($tahun,10);

		$this->load->view('admin/laporan/akuisisi_distributor', $data);
	}

	public function download_akuisisi_distributor()
	{
		if(!(isset($_SESSION[$this->config->item('sess_prefix').'loggedinSession'])))
		{
			redirect(base_url('backend/login'));
			exit;
		}

		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$_SESSION[$this->config->item('sess_prefix')."NamaPageSession"] = "laporan";
		$_SESSION[$this->config->item('sess_prefix')."NamaSubPageSession"] = "akuisisi_distributor";

		if(!($this->input->get('tahun')))
		{
  			$tahun = date('Y');
		}
		else
		{
		  	if(!(is_numeric($this->input->get('tahun'))))
		  	{
  				$tahun = date('Y');
		  	}
			else
			{
				$tahun = $this->input->get('tahun');
			}  
		}
		$data['tahun_dipilih'] = $tahun;

		$this->load->library('PHPExcel');

		$judul = "Laporan Akuisisi Distributor ".$tahun;
		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Frontier Group")
									 ->setLastModifiedBy("Frontier Group")
									 ->setTitle($judul)
									 ->setSubject($judul)
									 ->setDescription($judul)
									 ->setKeywords($judul)
									 ->setCategory($judul);
		// Add some data
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('10');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('25');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('50');
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('35');
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('30');
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('25');
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('30');
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('50');
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth('20');
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth('25');

		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'LAPORAN AKUISISI DISTRIBUTOR '.$tahun);
		$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);

		$start_row = 3;
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$start_row, 'NOMOR')
			->setCellValue('B'.$start_row, 'NAMA')
			->setCellValue('C'.$start_row, 'ALAMAT')
			->setCellValue('D'.$start_row, 'KOTA')
			->setCellValue('E'.$start_row, 'KODEPOS')
			->setCellValue('F'.$start_row, 'TELEPON')
			->setCellValue('G'.$start_row, 'EMAIL')
			->setCellValue('H'.$start_row, 'BANK')
			->setCellValue('I'.$start_row, 'NOMOR REKENING')
			->setCellValue('J'.$start_row, 'ATAS NAMA REKENING')
			->setCellValue('K'.$start_row, 'INSTAGRAM')
			->setCellValue('L'.$start_row, 'JOIN DATE')
			->setCellValue('M'.$start_row, 'KUNJUNGAN MICRO SITE');

			$objPHPExcel->getActiveSheet()->getStyle("A3:M3")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A3:M3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cac1f5');

			$start_row = $start_row + 1;

		$sql2 = "SELECT a.*, b.namakab, c.nama as namabank 
		FROM member a 
		LEFT JOIN bank_list c 
		ON a.id_bank= c.kode 
		LEFT JOIN master_wilayah b 
		ON a.id_kota = b.id 
		ORDER BY a.id_member DESC";
		$q2 = $this->db->query($sql2);
		$res2 = $q2->result_array();
		$nourut = 1;
		foreach($res2 as $row2)
		{

			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$start_row, $nourut)
			->setCellValue('B'.$start_row, $row2['nama'])
			->setCellValue('C'.$start_row, $row2['alamat'])
			->setCellValue('D'.$start_row, ucwords($row2['namakab']))
			->setCellValueExplicit('E'.$start_row, $row2['kodepos'], PHPExcel_Cell_DataType::TYPE_STRING)
			->setCellValue('F'.$start_row, $row2['telepon'])
			->setCellValue('G'.$start_row, $row2['email'])
			->setCellValue('H'.$start_row, $row2['namabank'])
			->setCellValueExplicit('I'.$start_row, $row2['nomor_rekening'], PHPExcel_Cell_DataType::TYPE_STRING)
			->setCellValue('J'.$start_row, $row2['nama_rekening'])
			->setCellValue('K'.$start_row, $row2['link_instagram'])
			->setCellValue('L'.$start_row,  $this->dasarlib->ubahTanggalPendek2($row2['join_date']))
			->setCellValue('M'.$start_row, $row2['kunjungan']);

			$nourut++;
			$start_row++;
		}
		$start_row++;

		$objPHPExcel->getActiveSheet()->getStyle('A'.$start_row.':M'.$start_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('cac1f5');

		$date_created = date("d/m/Y/h/i/s");
		$date_created = str_replace("/", "_", $date_created);
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle("Laporan");
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$judul.'.xls"');
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


}
?>
