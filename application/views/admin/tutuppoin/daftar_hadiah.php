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
            <div class="col-md-6"><h3>Daftar Hadiah Tutup Poin</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">           	
			<h4><?php echo $detail['title'];?></h4>
				<?php
				foreach($list_hadiah as $row)
				{
				?>
				<div class="row" style="background-color:#ddd8ed; padding:5px; margin:0 5px 20px 5px;">
					<div class="col col-md-2">
						<img src="<?php echo base_url(); ?>assets/gambar_tutup_poin/thumbnail/<?php echo $row['thumbnail'];?>" height="120" class="img-circle">
					</div>

					<div class="col col-md-10">
						<h4><?php echo $row['nama_hadiah'];?></h4>
						Poin: <?php echo $row['poin_min'];?> - <?php echo $row['poin_max'];?> <br>

						<div style="margin-top:15px;">
							<a href="<?php echo base_url(); ?>backend/tutuppoin/edit_hadiah?id_detail=<?php echo $row['id_detail'];?>" class="btn btn-primary"><i class='fa fa-edit'></i>Edit</a> 

							<a href="<?php echo base_url(); ?>backend/tutuppoin/hapus_hadiah?id_detail=<?php echo $row['id_detail'];?>" class="btn btn-danger hapuskan"><i class='fa fa-times'></i>Hapus</a> 
						</div>
					</div>
				</div>
				<?php } ?>

				<div style="background-color:#cce3eb; padding:5px; margin 5px;">
					<h4>Tambah Hadiah</h4>
					<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/tutuppoin/do_tambah_hadiah">

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="nama_hadiah">Nama Hadiah</label>
								<input type="text" class="form-control" id="nama_hadiah" name="nama_hadiah" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="poin_min">Poin Minimal</label>
								<input type="number" class="form-control" id="poin_min" name="poin_min" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="poin_max">Poin Maksimal</label>
								<input type="number" class="form-control" id="poin_max" name="poin_max" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Foto Hadiah</label> <br>
								<button type="button" class="btn btn-primary" onClick="mulai_upload2();" name="btnuploader2" id="btnuploader2"><i class='fa fa-image'></i> Browse</button>
								<div id="preview_gambar2" style="margin-bottom:20px; margin-top:10px;">
								</div>
							</div>
							<div id="uploadbar2">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<input type="hidden" name="id_umum" id="id_umum" value="<?php echo $detail['id_umum'];?>">
							<input type="hidden" name="daftarfilelogo2" id="daftarfilelogo2">
							<input type="hidden" name="daftarfilelogo_thumb2" id="daftarfilelogo_thumb2">
							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
							<input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
						</div>
					</div>
					</form>

					<form name="uploadform2" id="uploadform2" method="post" class="hide" action="<?php echo base_url();?>backend/tutuppoin/do_foto_item" enctype="multipart/form-data">
						<input type="file" name="gambar2" id="gambar2">
					</form>
					

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
<script src="<?php echo base_url(); ?>assets/components/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/components/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){

$('#tgl_pelaksanaan').datepicker({
	format: "dd-mm-yyyy",
		todayHighlight: true
	});



});

//begin uploader foto 


        function mulai_upload2()
        {
            $('#gambar2').click();
        }

        $('#gambar2').on('change',function(){
            $('#uploadform2').submit();
            })

    $("#uploadform2").submit(function(event){
        event.preventDefault();
        //$("#totalfoto").val($(".boximage").length);
        var formData = new FormData(this);
        //$("#photoCropperData").html("");
        //counterPhoto++;
        //$('#uploadbar').html('uploading... ');

        $.ajax({
            xhr: function()
              {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                  if (evt.lengthComputable) {
                    var percentComplete = Math.round(100*evt.loaded / evt.total);

                    if(percentComplete==100){
                        uploading = "completed";
                        $("#btnuploader2").html("<i class='fa fa-image'></i> Ganti Gambar");
                        $('#uploadbar2').html('Upload completed');
                    }else{
                        uploading = "";
                        //$('#uploadbar').show();
                        $('#uploadbar2').html('uploading... ' + percentComplete + '%');
                        //$('#btnuploader').html("<i class='fa fa-circle-o-notch fa-spin'></i><br> Uploading.."+(percentComplete)+"%");
                    }
                  }
                }, false);

                return xhr;
            },
            url:"<?=base_url()?>backend/tutuppoin/do_foto_item",
            type:"POST",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
        })
        .done(function(result){
            var htmlData = result;
            arrmsg = result.split('|');
            benergak = arrmsg[0];
            pesan = arrmsg[1];
            nama_aja_thumb = arrmsg[2];
            nama_aja = arrmsg[3];

            if(benergak == '0')
            {
                alert('Gagal Upload');
            }
            else
            {
                $('#daftarfilelogo2').val(nama_aja);
                $('#daftarfilelogo_thumb2').val(nama_aja_thumb);
                $('#preview_gambar2').html(pesan);
            }
        });
    });

    
//end uploader foto    


</script>
</body>
</html>
