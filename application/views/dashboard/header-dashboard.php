<div class="header-dashboard">
	<div class="row">
		<div class="col-5 col-sm-6 col-md-6 col-lg-6">
			<ul class="header-dashboard-left">
				<li>
					<i href="#menu-toggle" id="menu-toggle" class="fas fa-stream"></i>
				</li>
				<li>
					<div class="logo-mobile">
						<img src="<?= base_url() ?>assets/home_assets/img/brand-logo.png">
					</div>
				</li>
			</ul>
		</div>
		<div class="col-7 col-sm-6 col-md-6 col-lg-6" align="right">
			<div>
				<ul class="menu-header-dashboard">
					<li>
						<a href="<?= base_url('keranjang_belanja') ?>">
							<span class="badge"><?= $num_kjngbln['num_kbl'] ?></span> <i class="fas fa-shopping-cart"></i>
						</a>
					</li>
					<li>
						<div class="dropdown">
							<a onclick="dropdownClick()" class="dropbtn"><i class="fas fa-user"></i></a>
							<div id="myDropdown" class="dropdown-content">
								<a href="<?= base_url('setting') ?>">Setting</a>
								<a href="<?= base_url() ?>logout">Logout</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>