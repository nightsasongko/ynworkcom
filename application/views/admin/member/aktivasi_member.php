<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">
<link href="<?php echo base_url();?>assets/components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Aktivasi Member</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
                &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body" >
			<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/member/do_aktivasi_member">
				<div class="form-group">
				<img src="<?php echo base_url();?>assets/gambar_distributor/avatar/<?php echo $avatar;?>" width="100">
				
					<h4><?php echo $detail['nama'];?></h4>
					<h5><?php echo $detail['alamat'];?></h5>
					<h5><?php echo ucwords($dekota['namakab']);?></h5>
				</div>

				

				<div class="form-group" style="margin-top:40px;">
					<h3>Melakukan konfirmasi pembayaran melalui</h3>
					<h4>Bank: <?php echo $debank['nama'];?> </h4>
					<h4>Nomor Rekening: <?php echo $detail['nomor_rekening'];?> </h4>
					<h4>Nama Rekening: <?php echo $detail['nama_rekening'];?> </h4>
					<img src="<?php echo base_url();?>assets/gambar_bayar_membership/<?php echo $bukti_transfer;?>" width="300">
					
					
				</div>

				

				<div class="form-group bg-success" style="margin-top:50px;">
					<label for="status">Ubah Status Menjadi</label>
					<select name="status" id="status" class="form-control">
						<option value="0">Pembayaran Tidak Ada, Member Tidak Aktif</option>
						<option value="2">Pembayaran Sukses, Member Aktif</option>
					</select>
				</div>


				<div class="form-group" style="margin-bottom:50px;margin-top:30px;">
					<input type="hidden" name="id" id="id" value="<?php echo $detail['id_member'];?>">

					<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
					<input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
					<a href="<?php echo base_url(); ?>backend/member/index" class="btn btn-warning">Kembali</a>
				</div>

			</form>

            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php echo $footer;?>
<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>
<script src="<?php echo base_url();?>assets/components/select2/dist/js/select2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/components/bootbox/bootbox.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){      
  $('#kota').select2();
  $('#id_bank').select2();
}); 
</script>
</body>
</html>
