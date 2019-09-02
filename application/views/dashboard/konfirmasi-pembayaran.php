<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .histori-transaksi-active:after{
		content: url(<?=base_url('assets/home_assets/img/polygon.png')?>); 
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .histori-transaksi-active a{
		font-weight: bold;
	}
</style>

<div id="wrapper">

	<!-- Sidebar -->
	<?php
	include "sidebar.php";
	?>
	<!-- /#sidebar-wrapper -->

	<!-- Page Content -->
	<div id="page-content-wrapper">

		<!-- Header Dashboard-->

		<?php
		include "header-dashboard.php";
		?>

		<!-- Konten Dashboard-->

		<div class="container-fluid padding-content">
		
			
			<div class="bg-white box-shadow mb-2 py-3 px-3">
				<div class="title-border mb-3">
					<div class="row">
						<div class="col-6 col-sm-6 col-md-6 col-lg-6">
							<h6 class="blue notif-text">
							<i class="fas fa-newspaper"></i><span> Konfirmasi Pembayaran</span>
							</h6>						
						</div>
					</div>
				</div>

				<!-- isi notifikasi-->
				<form action="<?= base_url() ?>upload/img_trs_umum_upload" method="post" enctype="multipart/form-data">
				<table>
					<h4 class="blue notif-text">Pembayaran Melalui</h4>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Nama Bank
						</label>
						<div class="col-sm-6">
							<select name="kode" id="kode">
								<option value="<?= $d_bank['id_bank'] ?>"><?= $d_bank['nama'] ?></option>
								<?php foreach ($bank as $bnk) : ?>
									<option value="<?= $bnk['kode'] ?>"><?= $bnk['nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Nomor Rekening
						</label>
						<div class="col-sm-6">
							<input type="number" min="0" class="form-control" name="nomor_rekening" id="nomor_rekening" value="<?= $profile['nomor_rekening'] ?>" placeholder="No Rekening" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Atas Nama Rekening
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_rekening" id="nama_rekening" value="<?= $profile['nama_rekening'] ?>" placeholder="Nama" required>
						</div>
					</div>

					<h4 class="blue notif-text">Alamat Pengiriman</h4>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
						Nama Penerima
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_penerima" id="nama_penerima" value="<?= $profile['nama']?>" placeholder="Nama Penerima" required>
						</div>
					</div>
					<div class="form-group row ">
						<label for="" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-6">
							<textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3" required><?php echo htmlspecialchars($profile['alamat']); ?></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Kota
						</label>
						<div class="col-sm-6">
							<select name="id_kota_penerima" id="id_kota_penerima">
								<option value="<?= $profile['id_kota'] ?>"><?= $kota['namakab'] ?></option>
								<?php foreach ($wilayah as $w_kota) : ?>
									<option value="<?= $w_kota['id'] ?>"><?= $w_kota['namakab'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
						Kode Pos
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="kodepos_penerima" id="kodepos_penerima" value="" placeholder="Kode Pos" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
						Telepon
						</label>
						<div class="col-sm-6">
							<input type="number" class="form-control" name="telepon_penerima" id="telepon_penerima" value="<?= $profile['telepon'] ?>" placeholder="Telepon" required>
						</div>
					</div>
					
					<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">
						Bukti Transfer
						</label>
						<div class="col-sm-6">
							<input type="file" id="file_bukti_bayar" name="file_bukti_bayar" size="33" required/>
						</div>
					</div>
					<input type="hidden" name="nomor_transaksi" value="<?= $nomor_transaksi?>">
				</table>
					<div class="btn-submit">
						<button type="submit" class="btn">Submit</button>
					</div>
				</form>
			</div>
		</div>

	</div>
	<!-- /#page-content-wrapper -->

</div>

<footer id="footer" class="pt-2">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-6 col-lg-6">
				<ul class="footer-menu">
					<li>
						<a href="">FAQ</a>
					</li>
					<li>
						<a href="">
							Syarat & Ketentuan
						</a>
					</li>
				</ul>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-6">
				<div class="footer-right">
					<a href="">
						<img src="<?= base_url()?>assets/home_assets/img/yawnetwork.png" class="logo-footer">
					</a>
				</div>				
			</div>
		</div>
	</div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="http://localhost/yaw/yawnetwork/assets/components/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<!-- Owl Carousel -->
<script src="<?= base_url()?>assets/OwlCarousel/src/js/owl.carousel.js" data-cover></script>
<script src="<?= base_url()?>assets/OwlCarousel/src/js/owl.support.js" data-cover></script>
<script src="<?= base_url()?>assets/OwlCarousel/src/js/owl.autoplay.js" data-cover></script>

<!-- JS -->
<script type="text/javascript" src="<?= base_url()?>assets/js/script.js"></script>




</body>
</html>