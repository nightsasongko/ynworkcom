<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Detail Member Distributor</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
                &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
            	<div style="margin-bottom:20px; padding: 10px;" class="bg-green">
					<h3 ><?php echo $detail['nama'];?></h3>
					<span>Join Date <?php echo $join_date;?></span>
				</div>

				<div class="row" style="margin-bottom:50px;">
					<div class="col-md-4">
						<label>Alamat</label>
						<div>
							<?php echo $detail['alamat'];?> <br />
							<?php echo ucwords($dekota['namakab']);?> <br />
							<?php echo $detail['kodepos'];?>
						
						</div>
					</div>

					<div class="col-md-4">
						<label>Telepon</label>
						<div><?php echo $detail['telepon'];?></div>
					</div>

					<div class="col-md-4">
						<label>Email</label>
						<div><?php echo $detail['email'];?></div>
					</div>
				</div>

				<h3 style="margin-bottom:20px;">Info Bank</h3>
				<div class="row" style="margin-bottom:50px;">
					<div class="col-md-4">
						<label>Nama Bank</label>
						<div><?php echo $debank['nama'];?></div>
					</div>
					<div class="col-md-4">
						<label>Nomor Rekening</label>
						<div><?php echo $detail['nomor_rekening'];?></div>
					</div>
					<div class="col-md-4">
						<label>Atas NAma</label>
						<div><?php echo $detail['nama_rekening'];?></div>
					</div>
				</div>

				<h3 style="margin-bottom:20px;">Instagram dan Marketplace</h3>
				<div class="row">
					<div class="col-md-12" style="margin-bottom:15px;">
						<label>Link Instagram</label>
						<div><?php echo $detail['link_instagram'];?></div>
					</div>
					<div class="col-md-12" style="margin-bottom:15px;">
						<label>Link Lazada</label>
						<div><?php echo $detail['link_lazada'];?></div>
					</div>
					<div class="col-md-12" style="margin-bottom:15px;">
						<label>Link Tokopedia</label>
						<div><?php echo $detail['link_tokopedia'];?></div>
					</div>
					<div class="col-md-12" style="margin-bottom:15px;">
						<label>Link Bukalapak</label>
						<div><?php echo $detail['link_bukalapak'];?></div>
					</div>
					<div class="col-md-12" style="margin-bottom:15px;">
						<label>Link Shopee</label>
						<div><?php echo $detail['link_shopee'];?></div>
					</div>
					<div class="col-md-12" style="margin-bottom:15px;">
						<label>Link Blibli</label>
						<div><?php echo $detail['link_blibli'];?></div>
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

<script src="<?php echo base_url(); ?>assets/components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/components/bootbox/bootbox.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
</script>
</body>
</html>
