<?php
include "header.php";
?>
<?php
include "header2.php";
?>
<style type="text/css">
	.product-active{
		font-weight: bold;
	}
</style>
<div id="" >
	<section id="banner">
		<div class="banner ">
			<?php if ($item_produk['id_kategori']==1) { ?>
				<img src="<?= base_url()?>assets/home_assets/img/cover-product2.jpg">
			<?php } elseif ($item_produk['id_kategori']==2) { ?>
				<img src="<?= base_url()?>assets/home_assets/img/sanitation.jpg">
			<?php } else { ?>
				<img src="<?= base_url()?>assets/home_assets/img/default-carecare.jpg">
			<?php } ?>
			<!-- <img src="<?= base_url()?>assets/home_assets/img/cover-product2.jpg"> -->
			<div class="bg-gradient-soft"></div>
		</div>	
	</section>
	<div class="pb-5">
		<div class="container">
			<div class="img-logo">
				<img src="<?= base_url()?>assets/home_assets/img/default-logo-toko.jpg">
			</div>
			<div class="row my-5">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="mb-2">
						<h5 class="blue"><b><?= $item_produk['nama'] ?></b></h5>
						<h6 class="blue"></h6>
						<h6 class="blue">
							Kategori Produk : 
							<?php if ($item_produk['id_kategori']==1) { ?>
								 Healthy Life
							<?php } elseif ($item_produk['id_kategori']==2) { ?>
								Hygiene Sanitation
							<?php } else { ?>
								Care Care
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
					<?= nl2br($item_produk['deskripsi'] )?>
				</p>
			</div>
		</div>
		<div class="bg-img-about">
			<img src="<?= base_url()?>assets/home_assets/img/bg-img.png">
		</div>
		
		<!-- <div class="container">
			<div>
				<h5 class="my-3"><b>Varian Produk</b></h5>

				<div class="owl-nav">
					<div class="owl-next">
						<i class="fas fa-chevron-circle-left"></i>
					</div>
				</div>
				<div class="owl-carousel owl-theme owl-loaded margin-owl">
					<div class="owl-stage-outer pl-2">
						<div class="owl-stage">
						<?php foreach ($all_produk_item as $ap_item) :?>
							<div class="owl-item">
								<div class="box-product bg-white ">
									<div class="img-cover-product">
										<img src="<?= base_url('assets/gambar_item/thumbnail/') . $ap_item['thumbnail'] ?>">
									</div>
									<div class="py-3 px-3">
										<h6><b><?= substr($ap_item['nama'], 0,15).'...'?></b></h6>
										<p>
											<?php echo substr($ap_item['deskripsi'], 5,10).'...'; ?>
										</p>
										<div class=" mb-4 pt-3">
											<span href="<?= base_url('home/detailproduk/') . $ap_item['permalink']?>" class="btn-outline-orange" data-toggle="modal" data-target=".modal-buy-produk">	Lihat
											</span>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach;?>
						</div>
					</div>						
				</div>
			</div>
		</div>-->
		
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


<!-- Modal Beli Produk-->
<div class="modal fade modal-buy-produk " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg " role="document">
		<div class="modal-content bg-modal">
			<div class="modal-header  bg-modal">
				<h5 class="modal-title white" id="exampleModalLabel">
					<b>Request Pembelian Produk</b>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body  bg-modal">
				<form>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">Nama Toko</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="" placeholder="Masukkan Nama Toko">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="" placeholder="Masukkan E-Mail">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<h6 class="white">Request Produk 2</h6>
							<h6 class="white">Kategori : Hygiene Sanitation</h6>
						</div>
					</div>
					<div class="form-group row checkbox-text">
						<label for="" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
							<label for="checkbox-1" class="checkbox-custom-label">
								Dengan ini saya menyatakan setunju dengan syarat dan ketentuan yang berlaku
							</label>
						</div>
					</div>					
				</form>
			</div>
			<div class="modal-footer  bg-modal">
				<div class="btn-submit" align="right">
					<button type="submit" class="btn ">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>