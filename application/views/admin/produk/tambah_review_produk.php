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
            <div class="col-md-6"><h3>Tambah Review Produk</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/produk/do_tambah_review_produk">
                                
					<div class="form-group">
						<label for="id_produk">Produk</label>
						<select name="id_produk" id="id_produk" class="form-control">
						
						<?php
							foreach ($list_produk as $entry)
							{
									echo "<option value=\"".$entry['id_produk']."\">".$entry['nama']."</option>";
							}                                   
						?>                      
						</select>
					</div>

					<div class="form-group">
							<label for="review">Isi Review</label>
							<textarea name="review" class="form-control" id="review" rows="5"></textarea>
					</div> 

					<div class="form-group">
							<label for="nama_orang">Nama Orang</label>
							<input type="text" class="form-control" id="nama_orang" name="nama_orang" required>
					</div>

					<div class="form-group">
						<label>Foto Orang - 200 x 200 pixel</label> <br>
						<button type="button" class="btn btn-primary" onClick="mulai_upload2();" name="btnuploader2" id="btnuploader2"><i class='fa fa-image'></i> Browse</button>
							<div id="preview_gambar2" style="margin-bottom:20px; margin-top:10px;">
									
							</div>
					</div>
					<div id="uploadbar2">
					</div>

					<div class="form-group">
						<input type="hidden" name="daftarfilelogo2" id="daftarfilelogo2">

							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
							<input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
							<a href="<?php echo base_url(); ?>backend/produk/review_produk" class="btn btn-warning">Kembali</a>
					</div>

				</form>
				<form name="uploadform2" id="uploadform2" method="post" class="hide" action="<?php echo base_url();?>backend/produk/do_foto_review" enctype="multipart/form-data">
							<input type="file" name="gambar2" id="gambar2">
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

<script type="text/javascript">
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
            url:"<?=base_url()?>backend/produk/do_foto_review",
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
            nama_aja = arrmsg[2];

            if(benergak == '0')
            {
                alert('Gagal Upload');
            }
            else
            {
                $('#daftarfilelogo2').val(nama_aja);
                $('#preview_gambar2').html(pesan);
            }
        });
    });

    
//end uploader foto   
</script>
</body>
</html>
