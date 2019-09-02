<?php
include "header.php";
?>
<div class="header3 header">
	<nav>
		<div class="container ">
			<div class="d-flex bd-highlight mb-3">
				<div class="mr-auto p-2 bd-highlight">
					<div class="brand-logo">
						<a href="<?= base_url()?>"><img src="<?= base_url() ?>assets/home_assets/img/brand-logo-white.png"></a>
					</div>
				</div>
				<div class="p-2 bd-highlight">
					<div class="mt-3">
						<a href="<?= base_url('purchase') ?>" class="btn-back">
							Back
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>

<div id="">
	<section id="banner">
		<div class="banner ">
			<img src="<?= base_url() ?>assets/home_assets/img/cover-product2.jpg">
			<div class="bg-gradient-soft"></div>
		</div>
	</section>
	<div class="pb-5">
		<div class="container">
			<div class="img-logo">
				<img src="<?= base_url() ?>assets/home_assets/img/default-logo-toko.jpg">
			</div>
			<div class="row my-5">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="mb-2">
						<h5 class="blue"><b><?= $item_produk['nama'] ?></b> (Yaw Network Shop)</h5>
						<h6 class="blue"></h6>
						<h6 class="blue">Kategori Produk : Healty Life</h6>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
						<div class="col-5 col-sm-5 col-md-5 col-lg-5">
							<div class="btn-submit" align="center">
								<form action="<?= base_url('dbrd_distributor/keranjangbelanja_post/') . $item_produk['id_produk'] ?>" method="post">
									<button class="btn btn-block py-2" type="submit" value="Beli">Beli</button>
								</form>
							</div>
						</div>
						<div class="col-7 col-sm-7 col-md-7 col-lg-7">

							<div class="box-view px-2" align="center">
								<i class="fas fa-shopping-cart"></i> Terjual : <?= $jml_tjl; ?> Produk
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="container">
			<div>
				<h5 class="mb-2 blue"><b>Tentang <?= $item_produk['nama'] ?></b></h5>
				<div class="row">
					<?php foreach ($foto_produk as $fp) : ?>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4 cmp-img">
						<a href="<?= base_url() ?>assets/gambar_item/foto/<?= $fp['foto']?>"><img src="<?= base_url() ?>assets/gambar_item/foto/<?= $fp['foto']?>" alt="" class="img-photo-b"></a>
					</div>
					<?php endforeach;?>
				</div>
				<p>
					<?= $item_produk['deskripsi'] ?>
				</p>
			</div>
		</div>
		<div class="bg-img-about">
			<img src="<?= base_url() ?>assets/home_assets/img/bg-img.png">
		</div>
	</div>

	<div class="py-5">
		<div class="container">
			<h2 align="center" class="title mb-4">
				Review Product
			</h2>
			
				
							
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php foreach ($review as $re => $item_class) { ?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $re;?>" <?php echo !$re ? ' class="active"' : ''; ?>></li>
					<?php }?>
				</ol>


				<div class="carousel-inner">
					<?php if ($review==null) { ?>
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item p-60 active">
									<div class="bg-blue-soft b-r-30 py-3 p-10">
										<div class="text-testimoni" align="center">
											<p>Belum ada review untuk produk ini.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } else { ?>

					<?php  $item_class = ' active'; foreach ($review as $re): ?>
					<div class="carousel-item<?php echo $item_class; ?> p-60">
						<div class="bg-blue-soft b-r-30 py-3 p-10">
							<div class="row ">
								<div class="col-12 col-sm-12 col-md-3 col-lg-3">
									<div class="avatar-testimoni pt-2" align="center">
										<img src="<?= base_url()?>assets/home_assets/img/default-ava.jpg">
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-9 col-lg-9">
									<div class="text-testimoni">
										<p><b><?= $re['nama_orang']?></b></p>
										<p>
											“ <?= $re['review']?> ”
										</p>
									</div>								
								</div>
							</div>
						</div>		
					</div>
					<?php  $item_class = ''; endforeach;?>
					<?php } ?>
				</div>
				

			</div>
		</div>			
	</div>

	<div class="py-3">
		<div class="container ">
			<div class="mt-2">
				<h2 align="" class="title mb-3">
					Cara Membeli Product Ini
				</h2>
			</div>
			<ol class="list-regis">
				<li>
					Login ke dashboard distributor Anda
				</li>
				<li>
					Klik menu Purchase / Order
				</li>
				<li>
					Klik Link beli di produk yang diinginkan
				</li>
				<li>
					Ubah jumlah sesuai keinginan
				</li>
				<li>
					Setelah dirasa cukup, klik Checkout
				</li>
				<li>
					Lakukan transfer pembayaran
				</li>
				<li>
					Lakukan konfirmasi pembayaran dengan klik Konfirmasi Pembayaran di menu History Transaction
				</li>
				<li>
					Barang segera kami kirimkan
				</li>
			</ol>
		</div>
	</div>

</div>



<?php
include "footer.php";
?>