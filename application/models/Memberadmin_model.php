<?php
class Memberadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

	public function get_list_member()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.status <> 4 and a.id_kota=b.id";    

		$aColumns 	= array('a.id_member', 
		'a.nama',
		'a.alamat', 
		'a.telepon', 
		'a.status',
		'a.saldo_poin', 
		'b.namakab');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.nama asc";
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
				$sOrder = "ORDER BY a.nama asc";
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
				   FROM member a, master_wilayah b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();

		
		
		foreach ($res->result_array() as $entry)
 		{

			$theid = $entry['id_member']; 
			$nama = $entry['nama'];
			$alamat = $entry['alamat'];
			$telepon = $entry['telepon'];
			$status = $entry['status'];
			$saldo_poin = $entry['saldo_poin'];
			$namakab = $entry['namakab'];

			$action = "";

			$textatus = '';
			if($status == 0)
			{
				$textatus = 'Baru';
			}
			elseif($status == 1)
			{
				$textatus = 'Confirm Bayar';
				$action	.= "<a href='".base_url()."backend/member/aktivasi_member?id=".$theid."' class='btn btn-xs btn-success' title='Aktivasi'><i class='fa fa-check'></i></a> ";
			}
			elseif($status == 2)
			{
				$textatus = 'Aktif';
			}
			else
			{
				$textatus = 'Suspend';
			}
			
			

			$action	.= "<a href='".base_url()."backend/member/transaksi_member?id=".$theid."' class='btn btn-xs btn-info' title='Transaksi'><i class='fa fa-dollar'></i></a> ";
			
			$action	.= "<a href='".base_url()."backend/member/detail_member?id=".$theid."' class='btn btn-xs btn-info' title='Detail'><i class='fa fa-eye'></i></a> ";
			
			if($this->dasarlib->apakahBolehMelakukan('MEMBER','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/member/edit_member?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> ";			
			}

			if($this->dasarlib->apakahBolehMelakukan('MEMBER','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/member/delete_member?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> ";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
			$nama,
			$alamat."<br />".ucwords($namakab),
			$telepon,
			$saldo_poin,
			$textatus,
			$action
			);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_member) as jml from member a, master_wilayah b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_member) as jml2 FROM member a, master_wilayah b ".$sWhere;
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

	public function get_list_transaksi_umum_member($id_member)
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.id_member = $id_member";    

		$aColumns 	= array('a.id_transaksi', 
		'a.posting_date',
		'a.nomor_transaksi',
		'a.total_tagihan', 
		'a.status_bayar'
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
				   FROM transaksi_umum a ".
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

			$textatus = '';
			if($status == 0)
			{
				$textatus = 'Baru';
			}
			elseif($status == 1)
			{
				$textatus = 'Terbayar';
			}
			elseif($status == 2)
			{
				$textatus = 'Bayar Gagal';
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
			
			$action = "";
			
			$action	.= "<a href='".base_url()."backend/member/detail_transaksi?id=".$theid."' class='btn btn-xs btn-info' title='Detail' data-toggle='lightbox' data-title='".$nomor_transaksi."'><i class='fa fa-eye'></i></a> ";
			

			$row[]	= array(($number + $_GET['iDisplayStart']), 
			$nomor_transaksi,
			$total_tagihan,
			$posting_date,
			$textatus,
			$action
			);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_transaksi) as jml from transaksi_umum a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_transaksi) as jml2 FROM transaksi_umum a ".$sWhere;
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

	

	function getListKota()
	{
		$rowx = array();
		$sql = "select id,namakab from master_wilayah where id > 0 order by namakab";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		foreach($res2 as $row2)
		{
			$id = $row2['id'];
			$namakab = ucwords($row2['namakab']);
			$rowx[]	= array("id" => $id, "namakab" => $namakab);
		}
		return $rowx;
	}	

	function getListBank()
	{
		$sql = "select kode,nama from bank_list order by nama";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		return $res2;
	}	

	function get_list_transaksi_detail($id_transaksi)
	{
		$sql = "select a.*, b.nama from transaksi_detail a, produk_item b where id_transaksi=$id_transaksi and a.id_produk = b.id_produk";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		return $res2;
	}	


	// disini











	

	function getTextDaftarGambarWarung($id)
	{
		$rowx = "";
		$sql = "select foto from produk_image where id_produk = $id order by id asc";	
		$res = $this->db->query($sql);
		$rowcount = $res->num_rows();
		
		if($rowcount == 0)
		{
			$rowx = "";
		}
		else
		{		
			$res2 = $res->result_array();
			foreach($res2 as $row2)
			{
				$file_foto = $row2['foto'];
				$rowx .= $file_foto."|";
			}
		}
		//var_dump($rowx);exit;
		return $rowx;
	}	

	function getTextDaftarGambarWarung_thumb($id)
	{
		$rowx = "";
		$sql = "select thumbnail from produk_image where id_produk = $id order by id asc";
		$res = $this->db->query($sql);
		$rowcount = $res->num_rows();
		
		if($rowcount == 0)
		{
			$rowx = "";
		}
		else
		{		
			$res2 = $res->result_array();
			foreach($res2 as $row2)
			{
				$file_foto = $row2['thumbnail'];
				$rowx .= $file_foto."|";
			}
		}
		//var_dump($rowx);exit;
		return $rowx;
	}		

	function getGambarWarungHtml($id)
	{
		$rowx = "";
		$sql = "select foto,thumbnail from produk_image where id_produk = $id order by id asc";	
		$res = $this->db->query($sql);
		$rowcount = $res->num_rows();
		
		if($rowcount == 0)
		{
			$rowx = "";
		}
		else
		{		
			$res2 = $res->result_array();
			foreach($res2 as $row2)
			{
				$file_foto = $row2['foto'];
				$thumbnail = $row2['thumbnail'];
				$rowx .= "<span style='display: inline-block;'><img src='".base_url()."assets/gambar_item/thumbnail/$thumbnail' height='100'> <br> <a href='javascript:void(0)' onclick=hapusgambar('$file_foto')>Delete <i class='fa fa-times'></i></a> </span>";
			}
		}
		//var_dump($rowx);exit;
		
		return $rowx;
	}	

	function hapusDaftarGambarItem($id)
	{
		$this->db->delete('produk_image', array('id_produk' => $id));
		return 1;
	}








	











}
?>
