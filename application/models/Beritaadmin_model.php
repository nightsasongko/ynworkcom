<?php
class Beritaadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
    public function get_list_berita()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "is_hapus = 0";    

		$aColumns 	= array('a.*');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.id_berita desc";
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
				$sOrder = "ORDER BY a.id_berita desc";
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
				   FROM berita a ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id_berita']; 
			$judul = $entry['judul'];
			$posting_date = $this->dasarlib->ubahTanggalPanjang3($entry['posting_date']);			
			
			$action ="";

			if($this->dasarlib->apakahBolehMelakukan('BERITA','ubah',$iduser))
			{				
				$action	.= "<a href='".base_url()."backend/berita/edit_berita?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-edit'></i></a> &nbsp;";	
			}

			if($this->dasarlib->apakahBolehMelakukan('BERITA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/berita/delete_berita?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i></a> &nbsp;";			
			}

			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $judul,
							 $posting_date,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_berita) as jml from berita a ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_berita) as jml2 FROM berita a ".$sWhere;
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

	public function get_list_hadiah_on_id_umum($id_umum)
	{
		$sql = "select * from tutup_poin_detail where id_umum=$id_umum";	
		$res = $this->db->query($sql);
		$res2 = $res->result_array();
		return $res2;
	}	

	function getGambarHtml($id)
	{
		$rowx = "";
		$sql = "select thumbnail from tutup_poin_detail where id_detail = $id order by id_detail asc limit 1";	
		$res = $this->db->query($sql);
		$row2 = $res->row_array();
		
		$thumbnail = $row2['thumbnail'];
		$rowx .= "<span style='display: inline-block;'><img src='".base_url()."assets/gambar_tutup_poin/thumbnail/$thumbnail' height='100'></span>";
		
		//var_dump($rowx);exit;
		
		return $rowx;
	}	

	function getDaftarGambarFull($id)
	{
		$rowx = "";
		$sql = "select gambar from tutup_poin_detail where id_detail = $id order by id_detail asc limit 1";	
		$res = $this->db->query($sql);
		$rowcount = $res->num_rows();
		$row2 = $res->row_array();
		return $row2['gambar'];
	}	

	function getDaftarGambarThumb($id)
	{
		$rowx = "";
		$sql = "select thumbnail from tutup_poin_detail where id_detail = $id order by id_detail asc limit 1";	
		$res = $this->db->query($sql);
		$rowcount = $res->num_rows();
		$row2 = $res->row_array();
		return $row2['thumbnail'];
	}	


	// disini


}
?>
