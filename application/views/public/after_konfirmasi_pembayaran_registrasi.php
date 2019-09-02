<?php
include "header.php";
?>
<style type="text/css">
	.home-active{
		font-weight: bold;
	}
	.eror_page{
		height: 100vh;
	}
	.img-eror img{
		max-height: 300px;
		width: 100%;
	}
	#page-eror{

	}
	#footer{
		display: none;
	}
	.width-btn a{
		padding: 5px 60px;
	}
	#footer-eror{
		position: absolute;
		bottom: 0;
		width: 100%;
	}
</style>	

<div class="eror_page">
	<div class="container">
		<div class="d-flex bd-highlight">
			<div class="mr-auto p-2 bd-highlight">
				<div class="brand-logo">
					<a href="">
						<img src="<?= base_url()?>assets/home_assets/img/brand-logo.png">
					</a>
				</div>
			</div>
			<div class="p-2 bd-highlight">
				<div class="pt-2">
					<!-- <a href="<?= base_url()?>login" class="blue">
						<b>Back</b>
					</a> -->
				</div>				
			</div>
		</div>
	</div>
	<section id="page-eror" class="pt-2">
		<div class="container">
			<div class="box-shadow px-5 py-5 mb-4">
				<div class="img-eror mb-4" align="center">
					<img src="<?= base_url()?>assets/home_assets/img/forgot.svg">
				</div>
				
				<h4 class="blue mb-3" align="center">
					<b>
					Trimakasih sudah melakukan konfirmasi pembayaran dan akan dilakukan pengecekan oleh admin. Informasi lebih lengkap cek email anda.
					</b>
				</h4>
				<div class="width-btn mt-4" align="center">
					<a href="<?= base_url()?>" class="btn-orange">
						<b><i class="fas fa-chevron-left"></i> Back</b>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
include "footer.php";
?>
