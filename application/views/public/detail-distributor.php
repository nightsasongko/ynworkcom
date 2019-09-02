<?php
include "header.php";
?>
<style type="text/css">
	.icon-link{
		box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
	}
	.klik-link-shop a{
		color: #111;
	}
	.btn-outline-orange{
		padding: 5px 50px;
	}
</style>
<div id="" >
	<div id="header" class="header">
		<div class="container">
			<nav>
				<div class="d-flex bd-highlight mb-3">
					<div class="mr-auto p-2 bd-highlight">
						<div class="brand-logo">
							<a href="<?= base_url()?>">
								<img src="<?= base_url()?>assets/home_assets/img/brand-logo-white.png">
							</a>							
						</div>
					</div>
					
				</div>
			</nav>
		</div>		
	</div>
	<section id="banner fix-baner">
		<div class="banner ">
			<?php if ($detail_member['avatar']==null) { ?>
				<img src="<?= base_url('assets/gambar_distributor/gambar_toko/display-shop.jpg') ?>">
			<?php } else { ?>
				<img src="<?= base_url('assets/gambar_distributor/gambar_toko/') . $detail_member['gambar_toko'] ?>">
			<?php } ?>
			
			<div class="bg-gradient-soft"></div>
		</div>	
	</section>
	<div class="pb-5">
		<div class="container">
			<div class="img-logo">
				<?php if ($detail_member['avatar']==null) { ?>
					<img src="<?= base_url('assets/gambar_distributor/avatar/default-logo-toko.jpg') ?>">
				<?php } else { ?>
					<img src="<?= base_url('assets/gambar_distributor/avatar/') . $detail_member['avatar'] ?>">
				<?php } ?>
				
			</div>
			<div class="row my-5">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="mb-2">
						<h5 class="blue">
							<b><?= $detail_member['nama'] ?></b>
						</h5>
						<h6 class="blue">

						</h6>
						<h6 class="blue">
						<?php if ($detail_member['alamat']==null) { ?>

						<?php } else { ?>
							Alamat : <?= $detail_member['alamat'] ?>
						<?php } ?>
						</h6>
					</div>					
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
						<div class="col-5 col-sm-5 col-md-5 col-lg-5">
						</div>
						<div class="col-7 col-sm-7 col-md-7 col-lg-7">
							<div class="box-view px-2" align="center">
								<i class="fas fa-child"></i> Dilihat <?= $banyak_view ?> Orang
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="bg-img-about">
			<img src="<?= base_url()?>assets/home_assets/img/bg-img.png">
		</div>

		<div class="container">
			<h5 class="my-3"><b>Varian Produk</b></h5>
			<div class="content-product-about">
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
										<?php echo substr($ap_item['deskripsi'], 0,200).'...'; ?>
									</p>
									<a href="<?= base_url('home/detailproduk/') . $ap_item['permalink']?>" class="btn-outline-orange ">Lihat</a>
									<br><br>
									<div class="row">
										<div class="col-3">
											<small class="grey"> Beli Di </small>
										</div>
										<div class="col-9">
											<ul class="link-buy">
												<li>
													<a href="<?= $detail_member['link_lazada'] ?>" target="blank" class="icon-link">
														<img src="<?= base_url()?>assets/home_assets/img/lazada.png">
													</a>
												</li>
												<li>
													<a href="<?= $detail_member['link_tokopedia'] ?>" target="blank" class="icon-link">
														<img src="<?= base_url()?>assets/home_assets/img/tokopedia.png">
													</a>
												</li>
												<li>
													<a href="<?= $detail_member['link_bukalapak'] ?>" target="blank" class="icon-link">
														<img src="<?= base_url()?>assets/home_assets/img/bl.png">
													</a>
												</li>
												<li>
													<a href="<?= $detail_member['link_instagram'] ?>" target="blank" class="icon-link">
														<img src="<?= base_url()?>assets/home_assets/img/ig.png">
													</a>
												</li>
												<li>
													<a href="<?= $detail_member['link_shopee'] ?>" target="blank" class="icon-link">
														<img src="<?= base_url()?>assets/home_assets/img/shopee.png">
													</a>
												</li>
												<li>
													<a href="<?= $detail_member['link_blibli'] ?>" target="blank" class="icon-link">
														<img src="<?= base_url()?>assets/home_assets/img/blibli.png">
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
		<br><br>
		<div class="container">
			<div class="klik-link-shop">
				<div>
					<h5 class="mb-2 blue"><b>Kunjungi Toko Online <?= $detail_member['nama'] ?></b></h5><br>
					<div class="mb-4">					
						<a  class="icon-link float-left">
							<img src="<?= base_url()?>assets/home_assets/img/ig.png" class="">
						</a>
						<div class="pt-1">
							<a href="<?= $detail_member['link_instagram'] ?>" class="ml-3 " target="blank">
								Lihat toko di instagram
							</a>
						</div>					
					</div>
					<div class="mb-4">					
						<a  class="icon-link float-left">
							<img src="<?= base_url()?>assets/home_assets/img/lazada.png" class="">
						</a>
						<div class="pt-1">
							<a href="<?= $detail_member['link_lazada'] ?>" class="ml-3 " target="blank">
								Lihat toko di Lazada
							</a>
						</div>					
					</div>
					<div class="mb-4">					
						<a  class="icon-link float-left">
							<img src="<?= base_url()?>assets/home_assets/img/tokopedia.png" class="">
						</a>
						<div class="pt-1">
							<a href="<?= $detail_member['link_tokopedia'] ?>" class="ml-3 " target="blank">
								Lihat toko di Tokopedia 
							</a>
						</div>					
					</div>
					<div class="mb-4">					
						<a  class="icon-link float-left">
							<img src="<?= base_url()?>assets/home_assets/img/blibli.png" class="">
						</a>
						<div class="pt-1">
							<a href="<?= $detail_member['link_blibli'] ?>" class="ml-3 " target="blank">
								Lihat toko di Blibli 
							</a>
						</div>					
					</div>
					<div class="mb-4">					
						<a  class="icon-link float-left">
							<img src="<?= base_url()?>assets/home_assets/img/shopee.png" class="">
						</a>
						<div class="pt-1">
							<a href="<?= $detail_member['link_shopee'] ?>" class="ml-3 " target="blank">
								Lihat toko di Shope 
							</a>
						</div>					
					</div>

					<!-- <h5>Instagram</h5>
					<p>
						<a href="<?= $detail_member['link_instagram'] ?>"><?= $detail_member['link_instagram'] ?></a>
					</p>
					<h5>Lazada</h5>
					<p>
						<a href="<?= $detail_member['link_lazada'] ?>"><?= $detail_member['link_lazada'] ?></a>
					</p>
					<h5>Tokopedia</h5>
					<p>
						<a href="<?= $detail_member['link_tokopedia'] ?>"><?= $detail_member['link_tokopedia'] ?></a>
					</p>
					<h5>Bukalapak</h5>
					<p>
						<a href="<?= $detail_member['link_bukalapak'] ?>"><?= $detail_member['link_bukalapak'] ?></a>
					</p>
					<h5>Shopee</h5>
					<p>
						<a href="<?= $detail_member['link_shopee'] ?>"><?= $detail_member['link_shopee'] ?></a>
					</p> -->
				</div>
			</div>
		</div>

	</div>
</div>



</div>

<?php
include "footer.php";
?>