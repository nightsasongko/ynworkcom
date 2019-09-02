<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    </head>
    <body>

        <form name="dasarform_ekko" id="dasarform_ekko" method="post" action="<?php echo base_url(); ?>backend/transaksi/do_edit_transaksi">

        <?php
        if($detail['status_bayar'] <> 1 )
        {
        ?>
        <div class="row">
            <div class="col col-md-6">
                <div class="form-group">
                    <label for="status">Ubah Status Menjadi</label>
                    <select name="status" id="status" class="form-control" >
                    <?php
                    
                        echo "<option value='1'>Terbayar</option>";
                        echo "<option value='2'>Gagal Bayar</option>";
                    
                    ?>
                    </select>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="form-group ">
                    <label for="status">&nbsp;</label>
                    <input type="hidden" name="id" id="id" value="<?php echo $detail['id_transaksi'];?>">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success form-control" >

                </div>
            </div>

        </div>
        <?php } else {
        ?>
            <div class="row">
                <h3 class="text-center">Transaksi ini sudah selesai</h3>
            </div>
        <?php  
        }
        ?>


        </form>
        <div class="row bg-info" style="padding:2px; margin-bottom:20px;">
            <div class="col col-md-12">
                <strong>Distributor</strong><br>
                <?php echo $depembeli['nama'];?><br>
                <?php echo nl2br($depembeli['alamat']);?><br>
                <?php echo $kota_pembeli['namakab'];?>
            </div>
        </div>

        <div>
            <table class="table">
                <thead>
                  <tr style="background-color: #ddd;">
                    <th>Item</th>
                    <th style="text-align: right;">Jumlah</th>
                    <th style="text-align: right;">Harga</th>
                    <th style="text-align: right;">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($list_detail as $item)
                    {
                  ?>
                  <tr>
                    <td><?php echo $item['nama'];?></td>
                    <td style="text-align: right;"><?php echo $item['qty'];?></td>
                    <td style="text-align: right;"><?php echo number_format($item['harga_satuan'],0,',','.');?></td>
                    <td style="text-align: right;"><?php echo number_format($item['harga_total'],0,',','.');?></td>
                  </tr>
                    <?php } ?>

                  <tr style="background-color: #ddd;">
                    <td>&nbsp;</td>
                    <td style="text-align: right;">&nbsp;</td>
                    <td style="text-align: right;"><strong>Total</strong></td>
                    <td style="text-align: right;"><?php echo number_format($detail['total_tagihan'],0,',','.');?></td>
                  </tr>
                  

                </tbody>
              </table>
        </div>


        <div class="row" style="padding:2px; margin-bottom:10px;">
            <?php
            if(($detail['status_bayar'] == 1) || (($detail['status_bayar'] == 4)))
            {
            ?>
						<div class="col col-md-12 bg-success" style="border: 1px solid #3fd162;">
						<h4>Pembayaran</h4>
            
            Bank Pembeli: <?php echo $bank_pembeli['nama'];?> <br>
            Nomor Rekening Pembeli: <?php echo $detail['nomor_rekening'];?><br>
            Atas Nama Rekening: <?php echo $detail['nama_rekening'];?> aa<br>
						</div>
            <?php } ?>
        </div>

				<div class="row" style="padding:2px; margin-bottom:10px;">  
            <?php
            if($detail['status_kirim'] > 0)
            {
            ?>
						<div class="col col-md-12 bg-success" style="border: 1px solid #3fd162;">
						<h4>Pengiriman Kepada</h4>
						Nama: <?php echo $detail['nama_penerima'];?><br>
            Alamat: <?php echo $detail['alamat_penerima'];?><br>
            Kota: <?php echo ucwords($kota_penerima['namakab']);?><br>
            Kodepos: <?php echo $detail['kodepos_penerima'];?><br>
            Tanggal Kirim: <?php echo $tgl_kirim;?><br>
            Resi: <?php echo $detail['no_resi_pengiriman'];?><br>
						</div>
            <?php } ?>
        </div>



        <script src="<?php echo base_url(); ?>assets/components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>        
    </body>
</html>
