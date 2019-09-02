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
            <div class="col-md-6"><h3>Edit Member Distributor</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
                &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body" >
			<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/member/do_edit_member">
				<img src="<?php echo base_url();?>assets/gambar_distributor/avatar/<?php echo $avatar;?>" width="100">

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $detail['nama'];?>" readonly>
				</div>

				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $detail['alamat'];?>">
				</div>

				<div class="form-group">
					<label for="kota">Kota</label>
					<select name="kota" id="kota" class="form-control">
					
					<?php
					foreach ($list_kota as $entry)
					{
						if($entry['id'] == $detail['id_kota']){
							echo "<option value=\"".$entry['id']."\" selected>".$entry['namakab']."</option>";                                          
						}else{
							echo "<option value=\"".$entry['id']."\">".$entry['namakab']."</option>";
						}
					}                                   
					?>                           
					</select>
				</div>

				<div class="form-group">
					<label for="kodepos">Kodepos</label>
					<input type="text" class="form-control" id="kodepos" name="kodepos" value="<?php echo $detail['kodepos'];?>">
				</div>

				<div class="form-group">
					<label for="telepon">Telepon</label>
					<input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $detail['telepon'];?>">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $detail['email'];?>">
				</div>

				<div class="form-group">
					<label for="id_bank">Bank</label>
					<select name="id_bank" id="id_bank" class="form-control">
					
					<?php
					foreach ($list_bank as $entry)
					{
						if($entry['kode'] == $detail['id_bank']){
							echo "<option value=\"".$entry['id']."\" selected>".$entry['nama']."</option>";                                          
						}else{
							echo "<option value=\"".$entry['kode']."\">".$entry['nama']."</option>";
						}
					}                                   
					?>                           
					</select>
				</div>

				<div class="form-group">
					<label for="nomor_rekening">Nomor Rekening</label>
					<input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" value="<?php echo $detail['nomor_rekening'];?>">
				</div>

				<div class="form-group">
					<label for="nama_rekening">Atas Nama Rekening</label>
					<input type="text" class="form-control" id="nama_rekening" name="nama_rekening" value="<?php echo $detail['nama_rekening'];?>">
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
