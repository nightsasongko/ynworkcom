<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">
<?php echo $header2;?>
<?php echo $sidebar;?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Edit Berita Distributor</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/berita/do_edit_berita">

					<div class="form-group">
						<label for="judul">Judul Berita</label>
						<input type="text" class="form-control" id="judul" name="judul" value="<?php echo $detail['judul'];?>" required>
					</div>

					<div class="form-group">
						<label for="isi_berita">Isi Berita </label>
						<textarea name="isi_berita" class="form-control" id="isi_berita" rows="8"><?php echo $detail['isi_berita'];?></textarea>
                	</div>

					<div class="form-group">
						<input type="hidden" name="id" id="id" value="<?php echo $detail['id_berita'];?>">
						<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
						<input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
						<a href="<?php echo base_url(); ?>backend/berita/index" class="btn btn-warning">Kembali</a>
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

<script type="text/javascript">

</script>
</body>
</html>
