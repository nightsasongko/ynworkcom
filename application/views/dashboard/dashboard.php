<?php
include "header.php";
?>
<style type="text/css">
	#footer
	{
		display: none;
	}
	.sidebar-nav .profil-active:after{
		content: url(<?=base_url('assets/home_assets/img/polygon.png')?>);
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .profil-active a{
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
			
			<div class="box-ava bg-white box-shadow mb-4">
				<div class="row">
					<div class="col-12 col-sm-4 col-md-4 col-lg-4">
						<div class="ava">
							<?php if ($profile['avatar'] == null) { ?>
							<img src="<?=base_url()?>assets/gambar_distributor/avatar/noimage.png">
							<?php } else { ?>
								<img src="<?=base_url('assets/gambar_distributor/avatar/')?><?=$profile['avatar'];?>">
							<?php } ?>
						</div>
					</div>
					<div class="col-12 col-sm-8 col-md-8 col-lg-8" align="left">
						<h5 class="blue">
							<b>								
								<?= $profile['nama']?>
							</b>
						</h5>
						<div class="d-flex bd-highlight mt-4">
							<div class="mr-auto p-2 bd-highlight">
								<h6 class="blue">Poin Reward</h6>
								<h6 class="blue">
									<b>
										13034
									</b>
								</h6>
							</div>
						</div>
						
					</div>
				</div>
			</div>		

			<div class="bg-white box-shadow mb-2 py-3 px-3">
				<div class="title-border mb-3">
					<div class="row">
						<div class="col-6 col-sm-6 col-md-6 col-lg-6">
							<h6 class="blue notif-text">
								<i class="fas fa-bell"></i><span> Notifikasi</span>
							</h6>						
						</div>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6">
												
						</div>
					</div>
				</div>

				<!-- isi notifikasi-->

				<div class="list-notification pb-3">
					<h5 class="blue">
						<b>
							<?= $last_history['judul']?>
						</b>
					</h5>
					<small class="blue">
						<b><?= $this->dasarlib->ubahTanggalPanjang3($last_history['posting_date'])?></b>
					</small>
					<p class="blue pt-5">
						<?= nl2br($last_history['isi_berita'])?>
					</p>
					
				</div>
				
			</div>
			
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>


<!-- Modal -->
<div class="modal fade modal-notification" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="blue">
					<b>
						Pengumuman Undian Trip Untuk Member Yaw Jumat
					</b>
				</h5>
				<small>
					19 Juli 2019 Pukul 12:00
				</small>
				<p class="pt-4">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
	</div>
</div>


<?php
include "footer.php";
?>