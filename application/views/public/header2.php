<style type="text/css">
	.btn-orange {

	}
</style>
<div id="header" class="header">
	<div class="container">
		<nav>
			<div class="d-flex bd-highlight mb-3">
				<div class="mr-auto p-2 bd-highlight">
					<div class="brand-logo">
						<a href="<?= base_url()?>"><img src="<?= base_url()?>assets/home_assets/img/brand-logo-white.png"></a>
					</div>
				</div>
				<div class="p-2 bd-highlight">
					<div class="menu">
						<ul>
							<li>
								<a href="<?= base_url()?>" class="home-active">
									Home
								</a>
							</li>
							<li>
								<a href="<?= base_url('management-board')?>" class="management-active">
									Management Board
								</a>
							</li>
							<li>
								<div class="dropdown">
									<a class="white product-active"data-toggle="dropdown">
										Product
									</a>
									

										<ul class="dropdown-menu">
											<?php foreach ($all_produk_item as $ap_item) : ?>
												<li>
													<a tabindex="-1" href="<?= base_url('home/detailproduk/') . $ap_item['permalink']?>">
														<?= substr($ap_item['nama'], 0,15).''?>
													</a>
												</li>
											<?php endforeach;?>
										
										
											<!--<li class="dropdown-submenu">
												<a class="test" tabindex="-1" href="#">
													Healthy Life
													<span class="float-right">
														<i class="fas fa-angle-right"></i>
													</span>
													
												</a>
												<ul class="dropdown-menu">
													<li>
														<a tabindex="-1" href="#">
															Healthy Life 2
														</a>
													</li>
													<li>
														<a tabindex="-1" href="#">	
															Healthy Life 3
														</a>
													</li>
													<li>
														<a tabindex="-1" href="#">	
															Healthy Life 4
														</a>
													</li>
													<li>
														<a tabindex="-1" href="#">	
															Healthy Life 5
														</a>
													</li>
												</ul>
											</li>
											<li class="dropdown-submenu">
												<a class="test" tabindex="-1" href="#">
													Sanitation
													<span class="float-right">
														<i class="fas fa-angle-right"></i>
													</span>
													
												</a>
												<ul class="dropdown-menu">
													<li>
														<a tabindex="-1" href="#">
															Sanitation 2
														</a>
													</li>
												</ul>
											</li>
											<li class="dropdown-submenu">
												<a class="test" tabindex="-1" href="#">
													Care Care
													<span class="float-right">
														<i class="fas fa-angle-right"></i>
													</span>
													
												</a>
												<ul class="dropdown-menu">
													<li>
														<a tabindex="-1" href="#">
															Care Care 2
														</a>
													</li>
													<li>
														<a tabindex="-1" href="#">	
															Care Care 3
														</a>
													</li>
												</ul>
											</li>-->
											
											
											
										</ul>
										
										
									</div>
							</li>
							<li>
								<a href="<?= base_url() ?>distributor-list" class="distributor-active">
									Distributor List
								</a>
							</li>
							<li>
								<?php if ($cek_login==1) {?>
									<a href="<?= base_url() ?>dashboard" class="btn-orange">
										profile
									</a>
								<?php } if ($cek_login==0) { ?>
									<a href="<?= base_url() ?>login" class="btn-orange">
										Login
									</a>
								<?php } ?>
							</li>
						</ul>
					</div>
					<div class="humberger">
						<i class="fas fa-bars"  onclick="openNav()"></i>
					</div>
				</div>
			</div>
		</nav>
	</div>		
</div>

<!--Header menu mobile -->
<div id="myNav" class="overlay">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<div class="overlay-content">
		<a href="<?= base_url()?>">Home</a>
		<a href="<?= base_url('management-board')?>">Management Board</a>
		<a  class="accordion">
			Product List 
			<span class="float-right mr-3">
				<i class="fas fa-angle-down"></i>
			</span>
		</a>
		<div class="panel">
			<ul class="menu-product-list">
				<?php foreach ($all_produk_item as $ap_item) : ?>
					<li>
						<a tabindex="-1" href="<?= base_url('home/detailproduk/') . $ap_item['permalink']?>">
							<?= substr($ap_item['nama'], 0,15).''?>
						</a>
					</li>
				<?php endforeach;?>

				<!--<li>
					<a href="">
						Healthy Life
					</a>
					<ul class="submenu-product-list">
						<li>
							<a href="">
								Healthy Life 1
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="">
						Hygiene Sanitation
					</a>
					<ul class="submenu-product-list">
						<li>
							<a href="">
								Hygiene Sanitation 1
							</a>
						</li>
						<li>
							<a href="">
								Hygiene Sanitation 2
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="">
						Care Care
					</a>
					<ul class="submenu-product-list">
						<li>
							<a href="">
								Care Care 1
							</a>
						</li>
						<li>
							<a href="">
								Care Care 2
							</a>
						</li>
						<li>
							<a href="">
								Care Care 3
							</a>
						</li>
					</ul>
				</li>-->
				
				
				
			</ul>
		</div>
		<a href="<?= base_url() ?>distributor-list">Distributor List</a>
		<?php if ($cek_login==1) {?>
			<a href="<?= base_url() ?>dashboard" class="btn-orange mr-4">
				Profile
			</a>
		<?php } if ($cek_login==0) { ?>
			<a href="<?= base_url() ?>login" class="btn-orange mr-4">
				Login
			</a>
		<?php } ?>
	</div>
</div>