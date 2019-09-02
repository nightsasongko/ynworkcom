<?php
class Dashboard_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_jumlah_distributor()
	{
		$sql = "select count(id_member) as jml from member";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}


	public function get_jumlah_transaksi()
	{
		$sql = "select count(id_transaksi) as jml from transaksi_umum where is_hapus = 0";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}

	public function get_jumlah_poin()
	{
		$sql = "select sum(saldo_poin) as jml from member";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}

	
	public function get_jumlah_produk()
	{
		$sql = "select count(id_produk) as jml from produk_item";	
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row['jml'];
	}
	



}
?>
