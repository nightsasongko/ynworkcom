<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .news-active:after{
		content: url(<?=base_url('assets/home_assets/img/polygon.png')?>); 
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .news-active a{
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
							<i class="fas fa-newspaper"></i><span> Berita Baru</span>
							</h6>						
						</div>

						<!-- <div class="col-6 col-sm-6 col-md-6 col-lg-6">
							<div class="page-number">
								<ul>
									<li>
										<h6 >3 dari 100</h6>
									</li>
									<li>
										<div class="arow-page">
											<i class="fas fa-chevron-circle-left"></i>
											<i class="fas fa-chevron-circle-right"></i>
										</div>
									</li>						
								</ul>
							</div>						
						</div> -->

					</div>
				</div>
				<?php foreach ($berita as $brt) : ?>
				<!-- isi notifikasi-->
				<div class="list-notification pb-3">
					<h5 class="blue">
						<b>
							<?= $brt['judul']?>
						</b>
					</h5>
					<small class="blue">
						<b>
							<?= $this->dasarlib->ubahTanggalPanjang3($brt['posting_date'])?>
						</b>
						<!-- <b>18 Juli 2019 Pukul 12:00</b> -->
					</small>
					<p class="blue pt-3">
						<?= nl2br($brt['isi_berita']) ?>
					</p>
					<!-- <div class="readMore">
						<a data-toggle="modal" data-target=".modal-notification">
							(Read More)
						</a>
					</div> -->
				</div>
				<?php endforeach; ?>
			</div>	
		

			
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>





<?php
include "footer.php";
?>