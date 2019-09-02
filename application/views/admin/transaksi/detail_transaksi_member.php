<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    </head>
    <body>
        <table class="table" style="border-style: solid;border-width: 1px; border-color:#b7e8b4;padding:5px; margin:5px;">
			<thead>
				<tr>
					<th width="10%">No</th>
					<th width="40%">Produk</th>
					<th width="20%">Harga</th>
					<th width="10%">Jumlah</th>
					<th width="20%">Subtotal</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$nn = 1;
				$total = 0;
				foreach($list_belanja as $row)
				{
					$harga_subtotal = $row['harga_total'];
					$total = $total + $harga_subtotal;
				?>
				<tr>
					<td><?php echo $nn;?></td>
					<td><?php echo $row['nama'];?></td>
					<td><?php echo number_format($row['harga_satuan'],0,',','.');?></td>
					<td><?php echo $row['qty'];?></td>
					<td><?php echo number_format($harga_subtotal,0,',','.');?></td>
				</tr>
				<?php 
				$nn++;
				} 
				?>

				<tr class="bg-success">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><strong>Total</strong></td>
					<td><strong><?php echo number_format($total,0,',','.');?></strong></td>
				</tr>
			</tbody>
            
        </table>

		<div class="row" style="padding:2px; margin-bottom:10px;">
            <?php
            if(($detail['status_bayar'] == 1) || (($detail['status_bayar'] == 4)))
            {
            ?>
			<div class="col col-md-12 bg-success" style="border: 1px solid #3fd162;">
			<h4>Pembayaran</h4>
            
            Bank Pembeli: <?php echo $bank_pembeli['nama'];?> <br>
            Nomor Rekening Pembeli: <?php echo $detail['nomor_rekening'];?><br>
            Atas Nama Rekening: <?php echo $detail['nama_rekening'];?><br>
						</div>
            <?php } ?>
        </div>

		<div class="row" style="padding:2px; margin-bottom:10px;">  
            
			<div class="col col-md-12 bg-success" style="border: 1px solid #3fd162;">
			<h4>Pengiriman Kepada</h4>
			Nama: <?php echo $detail['nama_penerima'];?><br>
            Alamat: <?php echo $detail['alamat_penerima'];?><br>
            Kota: <?php echo ucwords($kota_penerima['namakab']);?><br>
            Kodepos: <?php echo $detail['kodepos_penerima'];?><br>
            Tanggal Kirim: <?php echo $tgl_kirim;?><br>
            Resi: <?php echo $detail['no_resi_pengiriman'];?><br>
			</div>
            
        </div>
        

    </body>
</html>
