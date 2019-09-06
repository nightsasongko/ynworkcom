<?php
include "header.php";
?>
<?php
include "header2.php";
?>
<style type="text/css">
	.distributor-active{
		font-weight: bold;
	}
</style>

<section id="banner">
	<div class="banner ">
		<img src="<?= base_url()?>assets/home_assets/img/baner.jpg">
		<div class="bg-gradient-soft"></div>
	</div>	
</section>

<div id="" class=" py-5">
	<section id="">
		<div class="bg-img-about">
			<img src="<?= base_url()?>assets/home_assets/img/bg-img.png">
		</div>
		<div class="container">
			<div class="my-3">
				<h2 align="" class="title mb-3">Distributor List</h2>
			</div>

			<div class="row">
				<?php 
					$no = $this->uri->segment('3') + 1;
					foreach($list_member as $u) :
				?>
				<div class="col-12 col-sm-12 col-md-6 col-lg-3">
					<div class="distributor-card bg-white">
						<div class="cover">
							<?php if ($u->gambar_toko==null) { ?>
									<img style="width: 100%;" src="<?= base_url('assets/gambar_distributor/gambar_toko/display-shop.jpg') ?>" class="img-cover-card">
							<?php } else { ?>
								<img src="<?= base_url('assets/gambar_distributor/gambar_toko/') . $u->gambar_toko ?>" class="img-cover-card">
							<?php } ?>
							
							<div align="center">
								<?php if ($u->avatar==null) { ?>
									<img style="width: 100%;" src="<?= base_url('assets/gambar_distributor/avatar/default-logo-toko.jpg') ?>" class="logo-distributor">
								<?php } else { ?>
									<img src="<?= base_url('assets/gambar_distributor/avatar/') . $u->avatar ?>" class="logo-distributor">
								<?php } ?>
							</div>
						</div>
						<div class="body-panel px-3 pt-3 pb-5">
							<h5 class="name-distributor"><b><?php echo $u->nama ?></b></h5>
							<div class="pb-3">
								<p style="min-height: 3rem">
								<?php echo substr($u->alamat, 0,20).'...'; ?>
								</p>
							</div>
							<a href="<?= base_url('distributor/toko/') . $u->permalink ?>"  class="btn-outline-orange" role="button">
								Kunjungi
							</a>
						</div>	
					</div>
				</div>

				<?php endforeach; ?>
				<div class="col-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;margin-top: 10px">
				<table class="table table-striped">
				<p style="font-size: 18px;font-weight: bold;">
				<?php echo $this->pagination->create_links(); ?>
				</p>
				</table>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 100px;margin-bottom: -3rem">
					<?php
						include "footer.php";
					?>
				</div>
			</div>

		</div>
	</section>
</div>



