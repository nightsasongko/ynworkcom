<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .upload-active:after{
		content: url('assets/img/polygon.png');
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .upload-active a{
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
			
			<div class="box-ava bg-white box-shadow px-3 py-2">
				<h5 class="blue">
					<b >
						Upload Payment
					</b>
				</h5>
				<hr>
				<p class="blue">
					Silahkan upload bukti transfer kamu untuk komfirmasi order 
				</p>
				<h6 class="blue mt-3"><b>File browser</b></h6>
				<div class="custom-file mb-3">
					<div class="upload-btn">
						<div class="">
							<form method="post" action="<?= base_url('upload/img_trs_umum_upload/')?><?= $nomor_transaksi ?>" enctype="multipart/form-data">
								<input type="file" id="file_bukti_bayar" name="file_bukti_bayar" size="33" required/>
								<input type="submit" value="Upload File" /><br><br>
							</form>
						</div>
					</div>
				</div>
			</div>	
			
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>





<?php
include "footer.php";
?>