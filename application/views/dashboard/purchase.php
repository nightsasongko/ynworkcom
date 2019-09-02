<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .purchase-active:after{
		content: url(<?=base_url('assets/home_assets/img/polygon.png')?>);
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .purchase-active a{
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
		
			<!--<div class="bg-grey2 b-r-4 mb-4 pt-3 pb-1 px-3">
				<div class="form-group row etalase-category">
					<label for="" class="col-sm-2 col-md-2 col-lg-1 col-form-label">
						<b class="blue">Etalase</b>
					</label>
					<div class="col-sm-5 col-md-5 col-lg-3">
						<select class="form-control bg-orange" id="">
							<option>Semua Kategori </option>
							<option>Healty Life</option>
							<option>Hyginie Etalase</option>
							<option>Care Care</option>
						</select>
					</div>
				</div>
			</div>-->

			<div class="row">
			<?php foreach ($all_produk_item as $ap_item) : ?>	
				<div class="col-12 col-sm-12 col-md-6 col-lg-4">
					<div class="product-list">
						<div class="thumbnail-product">
							<img src="<?= base_url('assets/gambar_item/thumbnail/') . $ap_item['thumbnail'] ?>">
							<!--<div class="link-produk">
								<div class="link">
									<a href="<?= base_url('dbrd_distributor/detail_produk_tab/') . $ap_item['permalink']?>" class=" btn-outline-white"  role="button">
										Detail Produk
									</a>
								</div>
							</div>-->
						</div>
						<div class="px-3 py-4">
							<h5 class="blue">
								<b><?= $ap_item['nama']?></b>
							</h5>
							<p class="blue">
								<?= substr($ap_item['deskripsi'], 0,80).'...'; ?>
							</p>
							<div class="row">
								<div class="col-6 col-sm-6 col-md-6 btn-submit">
									<!--<div class="d-flex bd-highlight outline-grey" align="center">
										<div class="p-2 flex-fill bd-highlight">
											<a  class=" btn-sum">
												-
											</a> 
										</div>
										<div class="p-2 flex-fill bd-highlight box-outline">
											0
										</div>
										<div class="p-2 flex-fill bd-highlight">
											<a  class=" btn-sum">
												+
											</a> 
										</div>
									</div>-->
									<form action="<?= base_url('dbrd_distributor/keranjangbelanja_post/') . $ap_item['id_produk'] ?>" method="post">
										<button class="btn btn-block " type="submit" value="Beli">Beli
										</button>
									</form> 
								</div>								
								<div class="col-6 col-sm-6 col-md-6 btn-submit ">
									<form action="<?= base_url('dbrd_distributor/detail_produk_tab/') . $ap_item['permalink']?>">
										<button type="submit" class="btn btn-block">Detail </button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>	
			</div>	

			
		
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>



<?php
include "footer.php";
?>