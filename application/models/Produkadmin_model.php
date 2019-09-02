<?php
class Produkadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

	public function get_list_item_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.ishapus=0 and a.id_kategori=b.id_kategori";    

		$aColumns 	= array('a.id_produk', 
		'a.kode',
		'a.nama as nama_produk', 
		'b.nama as namakat', 
		'a.harga_distributor' );
		
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
				   FROM produk_item a, produk_kategori b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();

		
		
		foreach ($res->result_array() as $entry)
 		{

			$theid = $entry['id_produk']; 
			$nama_produk = $entry['nama_produk'];
			$namakat = $entry['namakat'];
			$harga_distributor = number_format($entry['harga_distributor'],0,',','.');

			$action = "";

			
			if($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/edit_item_produk?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/delete_item_produk?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							$entry['kode'],
							 $nama_produk,
							 $namakat,
							 $harga_distributor,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_produk) as jml from produk_item a, produk_kategori b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_produk) as jml2 FROM produk_item a, produk_kategori b ".$sWhere;
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

	public function get_list_review_produk()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.id_produk = b.id_produk";    

		$aColumns 	= array('a.*', 'b.nama as nama_produk' );
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.id_review desc";
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
				$sOrder = "ORDER BY a.id_review desc";
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
				   FROM produk_review a, produk_item b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();

		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id_review']; 
			$nama_produk = $entry['nama_produk'];
			$nama_orang = $entry['nama_orang'];
			$avatar = $entry['avatar'];
			$review = nl2br($entry['review']);

			if($avatar == '')
			{
				$ava = "<img src='".base_url()."assets/gambar_item/review/noimage.png' width='30'>";
			}
			else
			{
				$ava = "<img src='".base_url()."assets/gambar_item/review/$avatar' width='30'>";
			}

			$action = "";

			if($this->dasarlib->apakahBolehMelakukan('PRODUK','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/edit_review_produk?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i></a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('PRODUK','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/produk/delete_review_produk?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							$nama_produk,
							$ava." ".$nama_orang,
							$review,
							$action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_review) as jml from produk_review a, produk_item b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_review) as jml2 FROM produk_review a, produk_item b ".$sWhere;
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

	public function get_list_produk()
	{
		$sql = "select id_produk, nama from produk_item order by nama asc";	
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function getGambarReviewHtml($id)
	{
		$rowx = "";
		$sql = "select avatar from produk_review where id_review = $id";	
		$res = $this->db->query($sql);
		$row2 = $res->row_array();
		
		$avatar = $row2['avatar'];
		$rowx .= "<span style='display: inline-block;'><img src='".base_url()."assets/gambar_item/review/$avatar' height='60'></span>";
		
		//var_dump($rowx);exit;
		
		return $rowx;
	}	


}
?>
