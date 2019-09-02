<?php
include "header.php";
?>
<style type="text/css">
	.btn-submit button{
		width: 250px;
	}
</style>
<div class="header3 header bg-blue" style="background-color: #469BAC">
	<nav>
		<div class="container ">
			<div class="d-flex bd-highlight mb-3">
				<div class="mr-auto p-2 bd-highlight">
					<div class="brand-logo">
						<img src="<?=base_url()?>assets/home_assets/img/brand-logo-white.png">
					</div>
				</div>
				<div class="p-2 bd-highlight">
					<div class="mt-3">
						<a href="<?= base_url('keranjang_belanja') ?>" class="btn-back">
							Back
						</a>
					</div>					
				</div>
			</div>
		</div>
	</nav>	
</div>

<div class ="p-t-8" >
	<div class="pb-5 mt-5">
		<div class="container">			
			<div class="box-checkout">
				<h5 class="blue mb-4"><b>Check Out Pembelian Produk</b></h5>
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">Nama Toko</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="" placeholder="Toko Jaya Usaha" value="<?= $profile['nama']?>" disabled>
					</div>
				</div>
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-5">
						<input type="email" class="form-control" id="" placeholder="example@gmail.com" value="<?= $profile['email']?>" disabled>
					</div>
				</div>
				<div class="form-group row ">
					<label for="" class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-5">
						<textarea class="form-control" id="" rows="3" disabled><?php echo htmlspecialchars($profile['alamat']); ?></textarea>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="" class="col-sm-2 col-form-label"><b>Pembelian</b></label>
					<div class="col-sm-5 list-product-checkout">
						<!-- list Produk yang dibeli-->
						<?php foreach ($d_cart as $dc) :?>
						<div class="mb-3">
							<h6>
								<b>
									<?= $dc['nama'] ?>
								</b>
							</h6>
							<h6>
								Harga : Rp<?= number_format($dc['total'], 0,',','.')?>
							</h6>
							<input type="number" class="form-control" id="" aria-describedby="" placeholder="<?= $dc['qty']?>" readonly="">
						</div>		
						<?php endforeach; ?>
	
					</div>
				</div>

				<!--Total Pembayaran-->

				<div class="form-group row ">
					<label for="" class="col-sm-2 col-form-label">Total Bayar</label>
					<div class="col-sm-5">
						<h6 class="mt-2">
							<b>
								Rp<?= number_format($total,0,'.','.')?>
							</b>
						</h6>
					</div>
				</div>

				<div class="btn-submit" align="center">
					<button type="submit" class="btn">Beli</button>
				</div>

			</div>
		</div>

	</div>

	

	
</div>

<?php
include "footer.php";
?>