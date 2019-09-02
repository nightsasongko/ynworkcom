<?php
class Laporanadmin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
	}
	
	public function get_series_penjualan($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
        	if($ii < 10)
        	{
        		$texbulan = '0'.$ii;
        	}
        	else
        	{
        		$texbulan = $ii;
        	}
        	
        	$awal = "$tahun-$texbulan-01 00:00:01";
        	$akhir = "$tahun-$texbulan-31 23:59:59";

        	$sql = "SELECT count(id_transaksi) as jml FROM transaksi_umum WHERE is_hapus = 0 AND posting_date >= '$awal' and posting_date <= '$akhir'";
        	$res = $this->db->query($sql);
        	$row = $res->row_array();
        	$jml = $row['jml'];
        	$hasil .= $jml .',';

        	//$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
	}

	public function get_last_penjualan($tahun,$sejumlah)
    {
        $sql = "SELECT a.id_transaksi, a.posting_date, a.nomor_transaksi, a.total_tagihan, a.status_bayar, a.status_kirim, b.nama 
        FROM transaksi_umum a, member b 
        WHERE a.is_hapus=0 AND a.id_member = b.id_member 
        ORDER BY a.id_transaksi DESC LIMIT $sejumlah
		";
        $q = $this->db->query($sql);
        $res = $q->result_array();
        return $res;
	}
	
	public function get_last_distributor($tahun,$sejumlah)
    {
        $sql = "SELECT a.*, b.namakab 
        FROM member a, master_wilayah b 
        WHERE a.id_kota = b.id 
        ORDER BY a.id_member DESC LIMIT $sejumlah";
        $q = $this->db->query($sql);
        $res = $q->result_array();
        return $res;
	}
	
	public function get_series_distributor($tahun)
	{
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
        	if($ii < 10)
        	{
        		$texbulan = '0'.$ii;
        	}
        	else
        	{
        		$texbulan = $ii;
        	}
        	
        	$awal = "$tahun-$texbulan-01";
        	$akhir = "$tahun-$texbulan-31";

        	$sql = "SELECT count(id_member) as jml FROM member WHERE join_date >= '$awal' and join_date <= '$akhir'";
        	$res = $this->db->query($sql);
        	$row = $res->row_array();
        	$jml = $row['jml'];
        	$hasil .= $jml .',';

        	//$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
	}
	

	
	// disini



	


   

    public function get_last_kupon_ditukar($tahun,$sejumlah)
    {
        
        $awal = "$tahun-01-01 00:00:01";
        $akhir = "$tahun-12-31 23:59:59";
            

        $sql = "SELECT aa.kode, aa.nama_konsumen, aa.tgl_ditukar, bb.nama_campaign, cc.nama_item  
        FROM kupon_paket_hadiah aa, campaign bb, item_hadiah cc 
        WHERE aa.status > 0 
        AND aa.tgl_ditukar >= '$awal' 
        AND tgl_ditukar <= '$akhir' 
        AND aa.id_campaign = bb.id_campaign 
        AND aa.ditukar_id_item = cc.id_item 
        ORDER BY aa.id_kupon DESC LIMIT $sejumlah
        ";
        $q = $this->db->query($sql);
        $res = $q->result_array();
        return $res;
    }

    public function get_list_campaign()
	{
		$iduser = $_SESSION[$this->config->item('sess_prefix')."IDSession"];
		$sqlText = "a.id_klien = b.id_klien and a.is_hapus=0";    

		$aColumns 	= array('a.id_campaign', 'a.nama_campaign', 'a.jml_kupon', 'b.nama as namaklien');
		
		/** PAGING */
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
			//$sLimit = "LIMIT ". $_GET['iDisplayLength'] ." OFFSET ". $_GET['iDisplayStart'];
			$sLimit = "LIMIT ". $_GET['iDisplayStart'] .", ". $_GET['iDisplayLength'];
		}
		/** ORDERING */
		$sOrder = "ORDER BY a.nama_campaign asc";
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
				$sOrder = "ORDER BY a.nama_campaign asc";
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
				   FROM campaign a, klien b ".
				   $sWhere." ".
				   $sOrder." ".
				   $sLimit;
				   
		//var_dump($sql); exit;		   
		
		$res = $this->db->query($sql);
		
		$number		= 1;
		$row 		= array();
		
		foreach ($res->result_array() as $entry)
 		{
			$theid = $entry['id_campaign']; 
			$nama_campaign = $entry['nama_campaign'];
			$jml_kupon = $entry['jml_kupon'];
			$namaklien = $entry['namaklien'];

            $action ="";
            
			$action	.= "<a href='".base_url()."backend/laporan/download_kupon_per_campaign?id_campaign=".$theid."' class='btn btn-xs btn-success' title='Download Kupon'><i class='fa fa-download'></i></a> &nbsp;";
			
			
			$row[]	= array(($number + $_GET['iDisplayStart']), 
							 $namaklien,
							 $nama_campaign,
							 $jml_kupon, 
							 $action
							);
			$number++;
		}
		/**	ROW COUNT */
		$sql2 = "select count(a.id_campaign) as jml from campaign a, klien b ".$sWhere;
		$res2 = $this->db->query($sql2);
		$row2 = $res2->row(); 
		
		$iTotal = $row2->jml;
						
		if ( $sWhere != "" ){
			$sQueryTotal = " SELECT count(a.id_campaign) as jml2 FROM campaign a, klien b ".$sWhere;
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








    public function get_series_data_penjual($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
        	if($ii < 10)
        	{
        		$texbulan = '0'.$ii;
        	}
        	else
        	{
        		$texbulan = $ii;
        	}
        	
        	$awal = "$tahun-$texbulan-01 00:00:01";
        	$akhir = "$tahun-$texbulan-31 23:59:59";

        	$sql = "SELECT count(id_penjual) as jml FROM penjual WHERE join_date >= '$awal' and join_date <= '$akhir'";
        	$res = $this->db->query($sql);
        	$row = $res->row_array();
        	$jml = $row['jml'];
        	$hasil .= $jml .',';

        	//$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    }

    public function get_series_data_pembeli($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
        	if($ii < 10)
        	{
        		$texbulan = '0'.$ii;
        	}
        	else
        	{
        		$texbulan = $ii;
        	}
        	
        	$awal = "$tahun-$texbulan-01 00:00:01";
        	$akhir = "$tahun-$texbulan-31 23:59:59";

        	$sql = "SELECT count(id_pembeli) as jml FROM pembeli WHERE join_date >= '$awal' and join_date <= '$akhir'";
        	$res = $this->db->query($sql);
        	$row = $res->row_array();
        	$jml = $row['jml'];
        	$hasil .= $jml .',';

        	//$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    }

    public function get_series_data_toko_baru($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
        	if($ii < 10)
        	{
        		$texbulan = '0'.$ii;
        	}
        	else
        	{
        		$texbulan = $ii;
        	}
        	
        	$awal = "$tahun-$texbulan-01 00:00:01";
        	$akhir = "$tahun-$texbulan-31 23:59:59";

        	$sql = "SELECT count(id_toko) as jml FROM tokolapak WHERE create_date >= '$awal' and create_date <= '$akhir'";
        	$res = $this->db->query($sql);
        	$row = $res->row_array();
        	$jml = $row['jml'];
        	$hasil .= $jml .',';

        	//$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    }   

    public function get_series_data_warung_baru($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
            if($ii < 10)
            {
                $texbulan = '0'.$ii;
            }
            else
            {
                $texbulan = $ii;
            }
            
            $awal = "$tahun-$texbulan-01 00:00:01";
            $akhir = "$tahun-$texbulan-31 23:59:59";

            $sql = "SELECT count(id_warung) as jml FROM warung WHERE posting_date >= '$awal' and posting_date <= '$akhir'";
            $res = $this->db->query($sql);
            $row = $res->row_array();
            $jml = $row['jml'];
            $hasil .= $jml .',';

            //$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    }    

    public function get_series_data_tanya_jawab_root($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
        	if($ii < 10)
        	{
        		$texbulan = '0'.$ii;
        	}
        	else
        	{
        		$texbulan = $ii;
        	}
        	
        	$awal = "$tahun-$texbulan-01 00:00:01";
        	$akhir = "$tahun-$texbulan-31 23:59:59";

        	$sql = "SELECT count(idtj) as jml from tanya_jawab WHERE id_root = 0 AND posting_date >= '$awal' and posting_date <= '$akhir'";
        	$res = $this->db->query($sql);
        	$row = $res->row_array();
        	$jml = $row['jml'];
        	$hasil .= $jml .',';

        	//$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    }    

    public function get_series_data_pembelian($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
        	if($ii < 10)
        	{
        		$texbulan = '0'.$ii;
        	}
        	else
        	{
        		$texbulan = $ii;
        	}
        	
        	$awal = "$tahun-$texbulan-01 00:00:01";
        	$akhir = "$tahun-$texbulan-31 23:59:59";

        	$sql = "SELECT count(id_invoice_master) as jml from invoice_master WHERE posting_date >= '$awal' and posting_date <= '$akhir'";
        	$res = $this->db->query($sql);
        	$row = $res->row_array();
        	$jml = $row['jml'];
        	$hasil .= $jml .',';

        	//$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    } 

    public function get_series_data_withdraw_all($tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
            if($ii < 10)
            {
                $texbulan = '0'.$ii;
            }
            else
            {
                $texbulan = $ii;
            }
            
            $awal = "$tahun-$texbulan-01 00:00:01";
            $akhir = "$tahun-$texbulan-31 23:59:59";

            $sql = "SELECT count(id_request) as jml FROM request_withdraw WHERE waktu_request  >= '$awal' and waktu_request  <= '$akhir'";
            $res = $this->db->query($sql);
            $row = $res->row_array();
            $jml = $row['jml'];
            $hasil .= $jml .',';

            //$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    }     

    public function get_series_data_withdraw($status,$tahun)
    {
        $hasil = "";
        for($ii = 1; $ii < 13; $ii++)
        {
            if($ii < 10)
            {
                $texbulan = '0'.$ii;
            }
            else
            {
                $texbulan = $ii;
            }
            
            $awal = "$tahun-$texbulan-01 00:00:01";
            $akhir = "$tahun-$texbulan-31 23:59:59";

            $sql = "SELECT count(id_request) as jml FROM request_withdraw WHERE waktu_request  >= '$awal' and waktu_request  <= '$akhir' and status=$status";
            $res = $this->db->query($sql);
            $row = $res->row_array();
            $jml = $row['jml'];
            $hasil .= $jml .',';

            //$hasil .=($ii+5).",";
        }
        $hasil = rtrim($hasil, ",");
        return $hasil;
    } 


}
?>
