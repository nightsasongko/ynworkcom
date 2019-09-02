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
            <div class="col-md-6"><h3>Edit Tutup Poin</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
               &nbsp;
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
           		<form name="dasarform" id="dasarform" method="post" action="<?php echo base_url(); ?>backend/tutuppoin/do_edit_tutup_poin">

					<div class="form-group">
						<label for="title">Nama Event</label>
						<input type="text" class="form-control" id="title" name="title" value="<?php echo $detail['title'];?>" required>
					</div>

					<div class="form-group">
						<label for="tgl_pelaksanaan">Tanggal Pelaksanaan </label>
						<input type="text" class="form-control" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="<?php echo @$tgl_pelaksanaan;?>">
                	</div>

					<div class="form-group">
					<input type="hidden" name="id" id="id" value="<?php echo $detail['id_umum'];?>">
							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
							<input type="reset" name="Reset" id="Reset" value="Reset" class="btn btn-default"> 
							<a href="<?php echo base_url(); ?>backend/tutuppoin/index" class="btn btn-warning">Kembali</a>
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
<script src="<?=base_url()?>assets/components/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){

$('#tgl_pelaksanaan').datepicker({
	format: "dd-mm-yyyy",
		todayHighlight: true
	});



});

//begin uploader foto produk
var potobesar = '';
var potokecil = '';
var arrpotobesar = '';
var arrpotokecil = '';

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
                        $("#btnuploader2").html("<i class='fa fa-image'></i> Tambah Gambar");
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
            url:"<?=base_url()?>backend/produk/do_foto_item",
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

                var daftarfilex = $('#daftarfilelogo2').val();
                daftarfilex = daftarfilex + nama_aja +'|';
                $('#daftarfilelogo2').val(daftarfilex);

                var daftarfilex100 = $('#daftarfilelogo_thumb2').val();
                daftarfilex100 = daftarfilex100 + nama_aja_thumb +'|';
                $('#daftarfilelogo_thumb2').val(daftarfilex100);

                var preview_lama = $('#preview_gambar2').html();
                var preview_baru = preview_lama + ' ' + pesan;
                $('#preview_gambar2').html(preview_baru);

            }


            //$("#photoCropperData").html(htmlData);
        });
    });

    function hapusgambar(namanya)
    {
        var texisi = '';
        var texisi60 = '';
        var isihtml = '';
        
        var isi_daftarfilemenu = $('#daftarfilelogo2').val();
        var isi_bersih_daftarfilemenu = isi_daftarfilemenu.slice(0, -1);

        var isi_daftarfilemenu60 = $('#daftarfilelogo_thumb2').val();
        var isi_bersih_daftarfilemenu60 = isi_daftarfilemenu60.slice(0, -1);
        
        arrisi = isi_bersih_daftarfilemenu.split('|');
        var jumlah = arrisi.length;
        arrisi60 = isi_bersih_daftarfilemenu60.split('|');
        
        if(jumlah == 1)
        {
            texisi = '';
            texisi60 = '';
            isihtml = '';
        }
        else
        {
        
            var indeks = arrisi.indexOf(namanya);
            arrisi.splice(indeks, 1);
            arrisi60.splice(indeks, 1);
            
            texisi = arrisi.join("|");
            texisi = texisi +'|';
            
            texisi60 = arrisi60.join("|");
            texisi60 = texisi60 +'|';
    
            for (i = 0; i < arrisi.length; i++) 
            {
                namaskr = arrisi[i];
                namaskr60 = arrisi60[i];
                isihtml = isihtml + "<span style='display: inline-block;'><img src='<?php echo base_url();?>assets/gambar_item/thumbnail/"+namaskr60+"' height='100'> <br> <a href='javascript:void(0)' onclick=hapusgambar('"+namaskr+"')>Delete <i class='fa fa-times'></i></a></span>";
            }
            
            //alert(namanya);
            //alert('bersih:' + isi_bersih_daftarfilemenu);
        }
        
        $('#daftarfilelogo2').val(texisi);
        $('#daftarfilelogo_thumb2').val(texisi60);
        $('#preview_gambar2').html(isihtml);
        
    }
//end uploader foto produk   


</script>
</body>
</html>
