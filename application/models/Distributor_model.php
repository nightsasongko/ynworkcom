<?php
class Distributor_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    function getlistproduk()
    {
        $sql = "select * from produk_item where ishapus = 0";
        $res = $this->db->query($sql);
        $result = $res->result_array();

        foreach ($result as $r_iprd) {
            $nama = $r_iprd['nama'];
            $id_produk = $r_iprd['id_produk'];
            $deskripsi = $r_iprd['deskripsi'];
            $harga_umum = $r_iprd['harga_umum'];
            $harga_distributor = $r_iprd['harga_distributor'];
            $permalink = $r_iprd['permalink'];

            $sql1 = "select * from produk_image where id_produk = $id_produk";
            $res1 = $this->db->query($sql1);
            $row1 = $res1->row_array();

            $thumbnail = $row1['thumbnail'];

            $rowx[] = array(
                "nama" => $nama,
                "id_produk" => $id_produk,
                "thumbnail" => $thumbnail,
                "deskripsi" => $deskripsi,
                "harga_umum" => $harga_umum,
                "harga_distributor" => $harga_distributor,
                "permalink" => $permalink,
            );
        }
        return $rowx;
    }

    function getlistcart($id_member)
    {
        $rowx = array();
        //mengambil data cart
        $sql = "select * from cart where id_member = $id_member";
        $res = $this->db->query($sql);
        $result = $res->result_array();

        foreach ($result as $r_iprd) {
            $id_produk = $r_iprd['id_produk'];
            $id_cart = $r_iprd['id_cart'];
            $qty = $r_iprd['qty'];
            $total = $r_iprd['total'];
            // mengambil data tb_produk_item dari tb_cart
            $sql1 = "select * from produk_item where id_produk = $id_produk";
            $res1 = $this->db->query($sql1);
            $row1 = $res1->row_array();
            $nama = $row1['nama'];
            $berat = $row1['berat'];
            $harga_umum = $row1['harga_umum'];
            $harga_distributor = $row1['harga_distributor'];

            // mengambil data tb_produk_image dari tb_cart
            $sql2 = "select * from produk_image where id_produk = $id_produk";
            $res2 = $this->db->query($sql2);
            $row2 = $res2->row_array();
            $thumbnail = $row2['thumbnail'];

            $rowx[] = array(
                "id_cart" => $id_cart,
                "id_produk" => $id_produk,
                "nama" => $nama,
                "thumbnail" => $thumbnail,
                "berat" => $berat,
                "harga_umum" => $harga_umum,
                "harga_distributor" => $harga_distributor,
                "qty" => $qty,
                "total" => $total
            );
        }
        return $rowx;
    }
	
	function num_keranjang_belanja($id_member)
    {
        $sql = "SELECT COUNT(id_cart) as 'num_kbl' from cart WHERE id_member=$id_member";
        $res = $this->db->query($sql);
        $result = $res->row_array();
        return $result;
    }
	
	function last_history()
    {
        $sql = "SELECT * FROM berita WHERE posting_date=(SELECT max(posting_date) FROM berita)";
        $res = $this->db->query($sql);
        $result = $res->row_array();
        return $result;
    }
	
	function hitung_total_belanja($id_member)
    {
        $sql = "select sum(total) as 'total_belanja' from cart where id_member=$id_member";
        $res = $this->db->query($sql);
        $result = $res->row_array();
        return $result['total_belanja'];
    }
	
	function jumlah_terjual($id_produk)
    {
        $sql = "select SUM(qty) as 'jumlah_terjual' from transaksi_detail where id_produk=$id_produk";
        $res = $this->db->query($sql);
        $result = $res->row_array();
        
        $jml_tj = $result['jumlah_terjual'];

        if ($jml_tj==null) {
            return "0";
        } else {
            return $jml_tj;
        }
    }
	
	function get_last_id_transaksi($id_member)
    {
        $sql = "select id_transaksi from transaksi_umum where id_member=$id_member order by id_transaksi desc limit 1";
        $res = $this->db->query($sql);
        $result = $res->row_array();
        return $result['id_transaksi'];
    }
	
	function list_histori($id_member)
    {
        $hasil = array();

        $sql = "select * from transaksi_umum where id_member=$id_member order by id_transaksi desc";
        $res = $this->db->query($sql);
        $result = $res->result_array();

        foreach ($result as $row) {
            $arraydetail = array();
            $id_transaksi = $row['id_transaksi'];
            $nomor_transaksi = $row['nomor_transaksi'];
            $tanggal_belanja = $this->dasarlib->ubahTanggalPanjang3($row['posting_date']);
            $status_bayar = $row['status_bayar'];

            if ($status_bayar==0) {
                $text_status_bayar = "Belum Terbayar";
            } elseif ($status_bayar==1) {
                $text_status_bayar = "Terbayar";
            } elseif ($status_bayar==4) {
                $text_status_bayar = "Konfirmasi Bayar";
            } else {
                $text_status_bayar = "Tidak diketahui";
            }

            $status_kirim = $row['status_kirim'];
            if ($status_kirim==0) {
                $text_status_kirim = "Belum dikirim";
            } elseif ($status_kirim==1) {
                $text_status_kirim = "Dikirim";
            } else {
                $text_status_kirim = "Diterima";                
            }

            $total_tagihan = number_format($row['total_tagihan'], 0,',','.');


            // cari detail item
            $sql2 = "select aa.*, bb.nama from transaksi_detail aa, produk_item bb 
            where aa.id_transaksi=$id_transaksi and aa.id_produk=bb.id_produk
            ";
            $res2 = $this->db->query($sql2);
            $result2 = $res2->result_array();
            
            foreach ($result2 as $row2) {
                $nama_produk = $row2['nama'];
                $harga_satuan = number_format($row2['harga_satuan'],0,',','.');
                $qty = $row2['qty'];
                $subtotal = number_format($row2['harga_total'],0,',','.');

                $arraydetail[] = array(
                    'nama_produk' => $nama_produk,
                    'harga_satuan' => $harga_satuan,
                    'qty' => $qty,
                    'subtotal' => $subtotal
                );

            }


            //susun hasil
            $hasil[] = array(
                'id_transaksi' => $id_transaksi, 
                'nomor_transaksi' => $nomor_transaksi,
                'tanggal_belanja' => $tanggal_belanja, 
                'status_bayar' => $status_bayar,
                'text_status_bayar' => $text_status_bayar, 
                'status_kirim' => $status_kirim,
                'text_status_kirim' => $text_status_kirim, 
                'total_tagihan' => $total_tagihan,
                'arraydetail' => $arraydetail
            );


        }

        return $hasil;
    }

    function list_detail($id_transaksi)
    {
        $hasil = array();

        

        // cari detail item
        $sql2 = "select aa.*, bb.nama from transaksi_detail aa, produk_item bb 
        where aa.id_transaksi=$id_transaksi and aa.id_produk=bb.id_produk
        ";
        $res2 = $this->db->query($sql2);
        $result2 = $res2->result_array();
        
        foreach ($result2 as $row2) {
            $nama_produk = $row2['nama'];
            $harga_satuan = number_format($row2['harga_satuan'],0,',','.');
            $qty = $row2['qty'];
            $subtotal = number_format($row2['harga_total'],0,',','.');

            $hasil[] = array(
                'nama_produk' => $nama_produk,
                'harga_satuan' => $harga_satuan,
                'qty' => $qty,
                'subtotal' => $subtotal
            );

        }

        return $hasil;
    }
	
	function detail_histori_transaksi($id_pembeli,$id_transaksi)
    {
        $sql2 = "select * from transaksi_detail where id_transaksi=$id_transaksi and id_pembeli=$id_pembeli";
        $res1 = $this->db->query($sql2);
        $row1 = $res1->result_array();

        return $row1;
    }
	
	function produkreview($id_produk)
    {
        $sql2 = "select * from produk_review where id_produk=$id_produk limit 3";
        $res1 = $this->db->query($sql2);
        $row1 = $res1->result_array();

        return $row1;
    }
	
	function number_view($permalink)
    {
        $sql2 = "select kunjungan from member where permalink = '$permalink'";
        $res1 = $this->db->query($sql2);
        $row1 = $res1->row_array();

        return $row1['kunjungan'];
    }

    function cekbelanjadicart($id_member,$id_produk)
	{
		$sql = "select count('id_cart') as jml from cart where id_member='$id_member' and id_produk = $id_produk";	
		$res = $this->db->query($sql);
		$row = $res->row_array();		
		$jml = $row['jml'];
		if($jml > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
    }	
    
    function getdetailcart($id_member,$id_produk)
	{
		$sql = "select * from cart where id_member='$id_member' and id_produk = $id_produk order by id_cart desc limit 1";
		$res = $this->db->query($sql);
		$row = $res->row_array();
		return $row;
    }	

    function cekkeranjangkosong($urutan)
	{
		$sql = "select count('nomor_transaksi') as jml from transaksi_umum where nomor_transaksi='$urutan'";	
		$res = $this->db->query($sql);
		$row = $res->row_array();		
		$jml = $row['jml'];
		if($jml > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
    }

    function getcekmemberbaru($permalink)
	{
		$sql = "select count('id_member') as jml from member where status=0 and permalink = '$permalink'";
		$res = $this->db->query($sql);
		$row = $res->row_array();		
		$jml = $row['jml'];
		if($jml > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
    }	

    function getcekkodetransaksipengiriman($nomor_transaksi)
	{
		$sql = "select status_bayar as jml from transaksi_umum where nomor_transaksi = $nomor_transaksi";
		$res = $this->db->query($sql);
		$row = $res->row_array();		
		$jml = $row['jml'];
		if($jml == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
    }	

    function getcekkonfirmasiterkirim($nomor_transaksi)
	{
		$sql = "select status_kirim as jml from transaksi_umum where status_kirim = 1 and nomor_transaksi = $nomor_transaksi";
		$res = $this->db->query($sql);
		$row = $res->row_array();		
		$jml = $row['jml'];
		if($jml > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
    }	

    function getlistdetail($id_transaksi)
	{
		$sql = "SELECT produk_item.nama as nama_produk, transaksi_detail.harga_satuan, transaksi_detail.qty, transaksi_detail.harga_total as subtotal FROM transaksi_detail 
        INNER JOIN transaksi_umum ON transaksi_detail.id_transaksi=transaksi_umum.id_transaksi
        INNER JOIN produk_item ON transaksi_detail.id_produk=produk_item.id_produk
        WHERE transaksi_umum.id_transaksi=$id_transaksi
        ";	
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
    }	
    
    function berita()
    {
        $sql = "select * from berita order by posting_date desc";
        $res = $this->db->query($sql);
        $result = $res->result_array();
        return $result;
    }
    
    
}