<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">
<link href="<?php echo base_url();?>assets/components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/components/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Edit Transaksi</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
      <div class="box-body">
        <?php
        if($detail['status_bayar'] <> 1 )
        {
        ?>
				<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/transaksi/do_edit_transaksi">
        <div class="row">
            <div class="col col-md-6">
                <div class="form-group">
                    <label for="status">Ubah Status Pembayaran Menjadi</label>
                    <select name="status" id="status" class="form-control" >
                    <?php
                    
                        echo "<option value='1'>Terbayar</option>";
                        echo "<option value='2'>Gagal Bayar</option>";
                    
                    ?>
                    </select>
                </div>
								<div class="form-group ">
                    <input type="hidden" name="id" id="id" value="<?php echo $detail['id_transaksi'];?>">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" >
										<a href="<?php echo base_url(); ?>backend/transaksi/index" class="btn btn-warning">Batal</a>

                </div>

            </div>
            <div class="col col-md-6">
            </div>
        </div>
				</form>
				<?php 
				} 
				else 
				{
        ?>
            <div class="row">
                <h4 class="text-center">Transaksi ini sudah terbayar</h4>
            </div>
				<?php  
				if($detail['status_kirim'] < 2)
				{
				?>

				<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/transaksi/do_edit_kirim">
        <div class="row">
            <div class="col col-md-6">
                <div class="form-group">
                    <label for="status_kirim">Ubah Status Pengiriman Menjadi</label>
                    <select name="status_kirim" id="status_kirim" class="form-control" >
                    <?php
                    
                        echo "<option value='1'>Terkirim</option>";
                        echo "<option value='2'>Diterima</option>";
                    
                    ?>
                    </select>
                </div>
								<div class="form-group">
                    <label for="tgl_kirim">Tanggal Kirim </label>
                    <input type="text" class="form-control" id="tgl_kirim" name="tgl_kirim" value="<?php echo @$tgl_kirim;?>">
                </div>
								<div class="form-group">
                    <label for="tgl_terima">Tanggal Terima</label>
                    <input type="text" class="form-control" id="tgl_terima" name="tgl_terima" value="<?php echo @$tgl_terima;?>">
                </div>

								<div class="form-group ">
                    <input type="hidden" name="id" id="id" value="<?php echo $detail['id_transaksi'];?>">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" >
										<a href="<?php echo base_url(); ?>backend/transaksi/index" class="btn btn-warning">Batal</a>

                </div>

            </div>
            <div class="col col-md-6">
            </div>
        </div>
				</form>

				<?php
				}
				else
				{
					?>
					<div class="row">
							<h4 class="text-center">Barang Sudah Diterima Distributor</h4>
					</div>
			<?php  

				}
        }
        ?>

				<div class="row bg-info" style="padding:2px; margin-bottom:20px; margin-top:20px;">
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




        

      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php echo $footer;?>
<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>
<script src="<?php echo base_url();?>assets/components/select2/dist/js/select2.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/components/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){

	$('#tgl_kirim').datepicker({
		format: "dd-mm-yyyy",
			todayHighlight: true
		});

	$('#tgl_terima').datepicker({
		format: "dd-mm-yyyy",
			todayHighlight: true
		});

});
</script>
</body>
</html>
