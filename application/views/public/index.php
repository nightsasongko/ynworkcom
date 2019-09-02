<?php
include "header.php";
?>
<?php
include "header2.php";
?>
<style type="text/css">
	.home-active{
		font-weight: bold;
	}
	.btn-outline-orange{
		padding: 5px 50px;
	}
</style>
<!-- <div id="loading"></div> -->
<!-- <div id="body_page"> -->

<section id="banner">
	<div class="banner ">
		<img src="<?= base_url() ?>assets/home_assets/img/baner.jpg">
		<div class="bg-gradient-soft"></div>
	</div>	
</section>

<section id="about">
	
	<div class="container">
		<h2 align="center" class="title mb-3">Tentang YAW Office</h2>
		
		<p class="description-about">
			ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		</p>
	</div>
	
	<div class="container">
		<div class="content-product-about">
			<!-- <div class="row">
			<?php foreach ($all_produk_item as $ap_item) : ?>
				<div class="col-12 col-sm-6 col-md-4 col-lg-4">
					<div class="product-card">
						<div class="img-cover">
							<img src="<?= base_url('assets/gambar_item/thumbnail/') . $ap_item['thumbnail'] ?>">
						</div>
						<div class="body-card-product">
							<h5><?= substr($ap_item['nama'], 0,15).'...'?></h5>
							
								<p>
									<?php echo substr($ap_item['deskripsi'], 0,80).'...'; ?>
								</p>
							<a href="<?= base_url('home/detailproduk/') . $ap_item['permalink']?>" class="btn-outline-orange">Lihat</a>
						</div>
					</div>
				</div>
				<?php endforeach;?>
			</div> -->
			<?php foreach ($all_produk_item as $ap_item) : ?>
				<div class="product-card">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="img-cover">
								<img src="<?= base_url('assets/gambar_item/thumbnail/') . $ap_item['thumbnail'] ?>">
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="body-card-product">
								<h5><?= substr($ap_item['nama'], 0,20).''?></h5>

								<p>
									<!-- <?= $ap_item['deskripsi']?> -->
									<?php echo substr($ap_item['deskripsi'], 0,400).'...'; ?>
								</p>
								<a href="<?= base_url('home/detailproduk/') . $ap_item['permalink']?>" class="btn-outline-orange ">Lihat</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>

	<div class="bg-img-about">
		<img src="<?= base_url() ?>assets/home_assets/img/bg-img.png">
	</div>

	<div class="container">
		<div class="mt-5">
			<h2 align="center" class="title mb-3">
				Kenapa Harus Bergabung Dengan Kami ?
			</h2>

			<div class="content-product-about mt-4">
				<div class="row">
					<div class="col-12 col-sm-6 col-md-4 col-lg-4">
						<div class="panel-box">
							<div class="icon" align="center">
								<img src="<?= base_url() ?>assets/home_assets/img/icon.png">
							</div>
							<p class="mt-2 blue">
								Benefit 1 : Some quick example text to build on the card title and make up the bulk of the card's content.
							</p>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-lg-4">
						<div class="panel-box">
							<div class="icon" align="center">
								<img src="<?= base_url() ?>assets/home_assets/img/icon.png">
							</div>
							<p class="mt-2 blue">
								Benefit 2 : Some quick example text to build on the card title and make up the bulk of the card's content.
							</p>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-lg-4">
						<div class="panel-box">
							<div class="icon" align="center">
								<img src="<?= base_url() ?>assets/home_assets/img/icon.png">
							</div>
							<p class="mt-2 blue">
								Benefit 3 : Some quick example text to build on the card title and make up the bulk of the card's content.
							</p>
						</div>
					</div>
				</div>
			</div>

		</div>		

	</div>
</section>

<div class="mb-5">
	<section id="">
		<div class="container">
			<div class="mt-5">
				<h2 align="" class="title mb-3">
					Cara Bergabung Menjadi Distributor Pada Platform Yaw Network
				</h2>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
					<ol class="list-regis">
						<li>
							Mengisi form pendaftaran dibawah ini.
						</li>
						<li>
							Membayar uang pendaftaran distributor sebesar Rp 3.000.000 (Tiga juta rupiah) ke rekening berikut:<br><br>
							Bank : ABCD<br>
							Nomor Rekening: 123 456 789<br>
							Atas Nama Rekening: Eko Purnomo

						</li>
						<li>
							Anda akan otomatis mendapatkan starter kit sebagai berikut:<br><br>

							- King Pandanus sejumlah xx box, setiap box berisi xx botol<br>
							- Nano Fix Up sejumlah xx<br>
							- Halaman distributor Anda sendiri di website YAW Network (www.yawnetwork.com/nama-anda)<br><br>

							Starter kit akan dikirimkan ke alamat Anda dan ongkos kirim akan ditanggung YAW Network
						</li>
					</ol>
					<div class="form-register-distributor bg-gradient">
					<!-- alert error -->
					<h5 class="white"><?= validation_errors(); ?></h5>

					<!-- alert success -->
					<?php if($this->session->flashdata('rgs_success')): ?>
						<h5 class="white"><?= $this->session->flashdata('rgs_success'); ?></h5>
					<?php endif; ?>
						<div class="">
							<h2 align="" class="white mb-3">
								Daftar Menjadi Distributor
							</h2>
						</div>
						<form action="<?= base_url() ?>distributor/post_registrasi" method="post">
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Nama Toko</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Toko">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan E-Mail">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password1" id="password1" placeholder="Masukkan Password">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-3 col-form-label">Ulangi Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password2" id="password2" placeholder="Masukkan Password">
								</div>
							</div>
							<div class="form-group row checkbox-text">
								<label for="" class="col-sm-3 col-form-label"></label>
								<div class="col-sm-9">
									<input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox" required>
									<label for="checkbox-1" class="checkbox-custom-label">
										Dengan ini saya menyatakan setuju dengan <a href="<?= base_url()?>syarat-ketentuan">syarat dan ketentuan</a> yang berlaku
									</label>
								</div>
							</div>
							<div class="btn-submit" align="right">
								<button type="submit" class="btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-4">
					
				</div>
			</div>
			<div class="ilustation">
				<img src="<?= base_url() ?>assets/home_assets/img/ilustration.png">						
			</div>
		</div>
		
	</section>
</div>
<!-- </div> -->