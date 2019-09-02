<?php
class Transaksiadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
    public function get_list_invoice()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.is_hapus=0 AND a.id_member = b.id_member";    

		$aColumns 	= array(
		'a.id_transaksi', 
		'a.posting_date',
		'a.nomor_transaksi',
		'a.total_tagihan', 
		'a.status_bayar',
		'a.status_kirim',
		'b.nama'
		);
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.id_transaksi desc";
		if ( isset( $_GET['iSortCol_0'] ) ){
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
						".$_GET['sSortDir_'.$i].", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ){
				$sOrder = "ORDER BY a.id_transaksi desc";
			}
		}
		
		/** WHERE CLAUSA */	
		$sWhere = "WHERE $sqlText ";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ){
			$sWhere = " WHERE $sqlText AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ ){
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ){
					$sWhere .= $aColumns[$i]." LIKE '%". $_GET['sSearch'] ."%' OR ";
				}
			}
			
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ")";
		}
		 
		/** INDIVIDUAL KOLOM FILTERING */
		for ( $i=0 ; $i<count($aColumns) ; $i++ ){
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != "" ){
				if ( $sWhere == "" ){
					$sWhere = " ";
				}
				else{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
			}
		}
		
		
		$sql 	= "SELECT ".str_replace(" , ", " ", implode(", ", $aColumns))."
				   FROM transaksi_umum a, member b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id_transaksi']; 
			$nomor_transaksi = $entry['nomor_transaksi'];
			$posting_date = $this->dasarlib->ubahTanggalPanjang3($entry['posting_date']);
			$total_tagihan = number_format($entry['total_tagihan'],0,',','.');
			$status = $entry['status_bayar'];
			$status_kirim = $entry['status_kirim'];
			$nama_distributor = $entry['nama'];

			$textatus = '';
			if($status == 0)
			{
				$textatus = 'Belum Bayar';
			}
			elseif($status == 1)
			{
				$textatus = 'Terbayar';
			}
			elseif($status == 2)
			{
				$textatus = 'Gagal Bayar';
			}
			elseif($status == 3)
			{
				$textatus = 'Bayar Pending';
			}
			elseif($status == 4)
			{
				$textatus = 'Konfirmasi Bayar';
			}
			else
			{
				$textatus = 'Unknown';
			}

			if($status_kirim == 0)
			{
				$texkirim = "Belum Kirim";
			}
			elseif($status_kirim == 1)
			{
				$texkirim = "Dikirim";
			}
			else
			{
				$texkirim = "Diterima";
			}

			$action ="";
			
			if($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/transaksi/view_detail_transaksi?id=".$theid."' class='btn btn-xs btn-info' title='View' data-toggle='lightbox' data-title='Invoice ".$nomor_transaksi." - ".$nama_distributor."'><i class='fa fa-eye'></i></a> &nbsp;";		
				
				$action	.= "<a href='".base_url()."backend/transaksi/edit_invoice?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-edit'></i></a> &nbsp;";	
			}

			if($this->dasarlib->apakahBolehMelakukan('TRANSAKSI','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/transaksi/delete_transaksi?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}

			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama_distributor,
							 $nomor_transaksi,
							 $total_tagihan,
							 $posting_date,
							 $textatus,
							 $texkirim,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_transaksi) as jml from transaksi_umum a, member b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_transaksi) as jml2 FROM transaksi_umum a, member b ".$sWhere;
			$res3 = $this->db->query($sQueryTotal);
			$row3 = $res3->row(); 
			$iFilteredTotal = $res3->row(); 
		}else{
			$iFilteredTotal = $iTotal;
		}
		$json	= json_encode(array("draw" => 1,
							  "iTotalRecords" => $iTotal,
							  "iTotalDisplayRecords" => $iFilteredTotal,
							  "aaData" => $row));
		//echo var_dump($json); exit;
		return $json;	
	}

	function get_list_transaksi_detail($id_transaksi)
	{
		$sql = "select a.*, b.nama from transaksi_detail a, produk_item b where id_transaksi=$id_transaksi and a.id_produk = b.id_produk";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		return $res2;
	}	

	public function tambahkan_poin_member($id_member, $sejumlah,$keterangan,$id_transaksi)
	{
		$sql = "UPDATE member SET saldo_poin = saldo_poin + $sejumlah WHERE id_member = $id_member";	
		$this->db->query($sql);

		$kedb2['id_member'] = $id_member;
		$kedb2['sejumlah '] = $sejumlah;
		$kedb2['id_transaksi'] = $id_transaksi;
		$kedb2['keterangan '] = $keterangan;
		$kedb2['plus_minus'] = 1;
		$this->dasar_model->insertData('mutasi_poin_member',$kedb2);
		return 1;
	}



	// disini




	function getListKota()
	{
		$rowx = array();
		$sql = "select id,namakab from master_wilayah where id > 0 order by namakab";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		foreach($res2 as $row2)
		{
			$id = $row2['id'];
			$namakab = $row2['namakab'];
			$rowx[]	= array("id" => $id, "namakab" => $namakab);
		}
		
		return $rowx;
	}		

	

	public function kurangkan_saldo_penjual($id_penjual, $sejumlah,$keterangan)
	{
		$sql = "UPDATE penjual SET saldo = saldo - $sejumlah WHERE id_penjual = $id_penjual";	
		$this->db->query($sql);

		$kedb2['id_penjual'] = $id_penjual;
		$kedb2['plus_minus'] = 2;
		$kedb2['sejumlah '] = $sejumlah;
		$kedb2['keterangan '] = $keterangan;
		$this->dasar_model->insertData('mutasi_saldo_penjual',$kedb2);
		return 1;
	}


}
?>
