<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .upload-active:after{
		content: url(<?=base_url('assets/home_assets/img/polygon.png')?>);
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
				<div class="custom-file mb-3 col-7">
					<input type="file" class="custom-file-input" id="customFile" name="filename">
					<label class="custom-file-label" for="customFile">Choose file</label>
				</div>
				<div class="btn-submit" align="right">
					<button type="submit" class="btn ">Kirim</button>
				</div>
			</div>	
			
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>





<?php
include "footer.php";
?>