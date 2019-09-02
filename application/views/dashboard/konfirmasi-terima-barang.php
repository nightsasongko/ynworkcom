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
							<i class="fas fa-newspaper"></i><span> Konfirmasi Terima Barang</span>
							</h6>						
						</div>
					</div>
				</div>
				<p>Apakah ada yakin sudah menerima barang?</p>
                <form action="<?=base_url()?>/dbrd_distributor/konfirmasi_status_bayar?nomor_transaksi=<?= $nomor_transaksi ?>" method="post">
					<div class="btn-submit">
						<button class="btn" type="submit">Sudah terima barang</button>
					</div>
                </form>

			</div>
		</div>

	</div>
	<!-- /#page-content-wrapper -->

</div>





<?php
include "footer.php";
?>