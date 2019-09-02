<?php
include "header.php";
?>
<style type="text/css">
    #footer
    {
		display: none;
    }
</style>
<div class="bg-img-login">
	<div class="bg-gradient-login"></div>
	<div id="header-login">
		<div class="container">
			<div class="d-flex bd-highlight mb-3">
				<div class="mr-auto p-2 bd-highlight">
					<div class="brand-logo">
						<a href="<?= base_url()?>">
							<img src="assets/home_assets/img/brand-logo-white.png">
						</a>
					</div>
				</div>
				<div class="p-2 bd-highlight">
					<div class="pt-2">
						<a href="<?= base_url()?>" class="white">
							Home
						</a>
					</div>				
				</div>
			</div>
		</div>
	</div>
	<section id="body-login">
		<div class="container">
			<div class="title-login">
				<h1 class="white"><b>Selamat Datang,</b></h1>
			</div>			
			<div class="bg-login">
				<h5 class="white"><b>Login</b></h5>
				<form action="<?= base_url() ?>akun/logmein" method="post">
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan E-Mail">
						</div>
					</div>					
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
						</div>
					</div>
                    <!-- <div class="form-group row">
                        <a href="<?= base_url() ?>lupapassword">Lupa Password?</a>
                    </div> -->
					<div align="right" class="btn-submit">
						<button type="submit" class="btn btn-orange">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	<footer id="footer-login" class="footer-login">
		<div class="container">
			<div align="right">
				<p>
				<a href="<?= base_url()?>">
					<img src="assets/home_assets/img/yawnetwork.png" class="logo-footer">
				</a>
				</p>
			</div>
		</div>
	</footer>
</div>



<?php
include "footer.php";
?>