<?php
class Entrydata_model extends CI_Model 
{
	
	function __construct()
    {
        parent::__construct();
	}
	
	public function getCabangByRegional($idregonal)
	{
		$sql = "select * from kota where idregional = $idregonal";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) {
			return $res->result_array();
		} else {
			return "";
		}
	}

	public function getCabangByRegional_kompetitor($idregonal)
	{
		$sql = "select * from kota_kompetitor where idregional = $idregonal";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) {
			return $res->result_array();
		} else {
			return "";
		}
	}
	
	public function getListDataPerformance()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		$aColumns 	= array('a.*', 'b.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY b.nama asc";
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
				$sOrder = "ORDER BY b.nama asc";
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
				   FROM data_performance a, kota b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			
			$cs = number_format($entry['cs'],2,'.',','); 
			$teller = number_format($entry['teller'],2,'.',','); 
			$security = number_format($entry['security'],2,'.',','); 
			$tangible = number_format($entry['tangible'],2,'.',','); 
			$marketing = number_format($entry['marketing'],2,'.',','); 
			$overall = number_format(($entry['overall']),2,'.',','); 
			$nama = $entry['nama'];
			$action = "";

						
			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/edit?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i> </a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/delete?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i> </a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $overall,
							 $cs,
							 $teller,
							 $security,
							 //$tangible,
							 //$marketing,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from data_performance a, kota b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM data_performance a, kota b ".$sWhere;
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

	public function getListDataPerformance_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		$sqlText = "a.idkota = b.id";    

		$aColumns 	= array('a.*', 'b.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY b.nama asc";
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
				$sOrder = "ORDER BY b.nama asc";
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
				   FROM data_performance2 a, kota_kompetitor b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			
			$cs = number_format($entry['cs'],2,'.',','); 
			$teller = number_format($entry['teller'],2,'.',','); 
			$security = number_format($entry['security'],2,'.',','); 
			$tangible = number_format($entry['tangible'],2,'.',','); 
			$marketing = number_format($entry['marketing'],2,'.',','); 
			$overall = number_format(($entry['overall']),2,'.',','); 
			$nama = $entry['nama'];
			$action = "";

						
			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/edit_kompetitor?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i> </a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/delete_kompetitor?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i> </a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $overall,
							 $cs,
							 $teller,
							 $security,
							 //$tangible,
							 //$marketing,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from data_performance2 a, kota_kompetitor b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM data_performance2 a, kota_kompetitor b ".$sWhere;
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

	public function getListIndexCs()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		
		$aColumns 	= array('a.*', 'b.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY b.nama asc";
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
				$sOrder = "ORDER BY b.nama asc";
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
				   FROM data_indexcs a, kota b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			
			$sikap_melayani = number_format($entry['sikap_melayani'],2,'.',','); 
			$penampilan = number_format($entry['penampilan'],2,'.',','); 
			$skill = number_format($entry['skill'],2,'.',','); 
			$cross_selling = number_format($entry['cross_selling'],2,'.',','); 
			$overall = number_format($entry['overall'],2,'.',','); 
			$nama = $entry['nama'];
			$action = "";

						
			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/editcs?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i> </a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/deletecs?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i> </a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $overall,
							 $sikap_melayani,
							 $penampilan,
							 $skill,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from data_indexcs a, kota b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM data_indexcs a, kota b ".$sWhere;
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

	public function getListIndexCs_kompetitor()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional_kompetitor($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		
		$aColumns 	= array('a.*', 'b.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY b.nama asc";
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
				$sOrder = "ORDER BY b.nama asc";
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
				   FROM data_indexcs2 a, kota_kompetitor b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			
			$sikap_melayani = number_format($entry['sikap_melayani'],2,'.',','); 
			$penampilan = number_format($entry['penampilan'],2,'.',','); 
			$skill = number_format($entry['skill'],2,'.',','); 
			$cross_selling = number_format($entry['cross_selling'],2,'.',','); 
			$overall = number_format($entry['overall'],2,'.',','); 
			$nama = $entry['nama'];
			$action = "";

						
			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/editcs_kompetitor?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i> </a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/deletecs_kompetitor?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i> </a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $overall,
							 $sikap_melayani,
							 $penampilan,
							 $skill,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from data_indexcs2 a, kota_kompetitor b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM data_indexcs2 a, kota_kompetitor b ".$sWhere;
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

	public function getListIndexTeller()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		
		$aColumns 	= array('a.*', 'b.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY b.nama asc";
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
				$sOrder = "ORDER BY b.nama asc";
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
				   FROM data_indexteller a, kota b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			
			$sikap_melayani = number_format($entry['sikap_melayani'],2,'.',','); 
			$penampilan = number_format($entry['penampilan'],2,'.',','); 
			$skill = number_format($entry['skill'],2,'.',','); 
			$cross_selling = number_format($entry['cross_selling'],2,'.',','); 
			$overall = number_format($entry['overall'],2,'.',','); 
			$nama = $entry['nama'];
			$action = "";

						
			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/edit_teller?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i> </a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/delete_teller?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i> </a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $overall,
							 $sikap_melayani,
							 $penampilan,
							 $skill,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from data_indexteller a, kota b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM data_indexteller a, kota b ".$sWhere;
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
	
	public function getListIndexSatpamLuar()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		
		$aColumns 	= array('a.*', 'b.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY b.nama asc";
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
				$sOrder = "ORDER BY b.nama asc";
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
				   FROM data_index_satpam_luar a, kota b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			
			$sikap_melayani = number_format($entry['sikap_melayani'],2,'.',','); 
			$penampilan = number_format($entry['penampilan'],2,'.',','); 
			$skill = number_format($entry['skill'],2,'.',','); 
			$cross_selling = number_format($entry['cross_selling'],2,'.',','); 
			$overall = number_format($entry['overall'],2,'.',','); 
			$nama = $entry['nama'];
			$action = "";

						
			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/edit_satpam_luar?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i> </a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/delete_satpam_luar?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i> </a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $sikap_melayani,
							 $penampilan,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from data_index_satpam_luar a, kota b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM data_index_satpam_luar a, kota b ".$sWhere;
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
	
	public function getListIndexSatpamDalam()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$jabatan = $_SESSION[$this->config->item('sess_prefix')."JabatanSession"];
		$idcabang = $_SESSION[$this->config->item('sess_prefix')."IdCabangSession"];
		$idregonal = $_SESSION[$this->config->item('sess_prefix')."IdRegionalSession"];
		$iscabang = $_SESSION[$this->config->item('sess_prefix')."IsCabangSession"];
		$isregonal = $_SESSION[$this->config->item('sess_prefix')."IsRegionalSession"];

		if($jabatan == 13)
		{
			if ($isregonal == 1) {
				$region = $this->getCabangByRegional($idregonal);
				$regionArr = array();
				foreach ($region as $key => $valregion) {
					$regionArr[] = $valregion['id'];
				}
				$idkota = implode(',' , $regionArr);
				$sqlText = "a.idkota = b.id and a.idkota in ($idkota)";
			} else if ($iscabang = 1) {
				$sqlText = "a.idkota = b.id and a.idkota = $idcabang";
			}
				
		}
		else
		{
			$sqlText = "a.idkota = b.id";    
		}
		
		$aColumns 	= array('a.*', 'b.nama');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY b.nama asc";
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
				$sOrder = "ORDER BY b.nama asc";
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
				   FROM data_index_satpam_dalam a, kota b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id']; 
			
			$sikap_melayani = number_format($entry['sikap_melayani'],2,'.',','); 
			$penampilan = number_format($entry['penampilan'],2,'.',','); 
			$skill = number_format($entry['skill'],2,'.',','); 
			$cross_selling = number_format($entry['cross_selling'],2,'.',','); 
			$overall = number_format($entry['overall'],2,'.',','); 
			$nama = $entry['nama'];
			$action = "";

						
			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','ubah',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/edit_satpam_dalam?id=".$theid."' class='btn btn-xs btn-primary' title='Edit'><i class='fa fa-pencil-square-o'></i> </a> &nbsp;";			
			}

			if($this->dasarlib->apakahBolehMelakukan('ENTRY_DATA','hapus',$iduser))
			{			
				$action	.= "<a href='".base_url()."backend/entrydata/delete_satpam_dalam?id=".$theid."' class='btn btn-xs btn-danger hapus' title='Delete'><i class='fa fa-times'></i> </a> &nbsp;";			
			}
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $nama,
							 $overall,
							 $sikap_melayani,
							 $penampilan,
							 $skill,
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id) as jml from data_index_satpam_dalam a, kota b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id) as jml2 FROM data_index_satpam_dalam a, kota b ".$sWhere;
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


}
?>