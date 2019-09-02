<?php
include "header.php";
?>
<?php
include "header2.php";
?>
<style type="text/css">
	.home-active{
		font-weight: bold;
	}
</style>	
</div>

<section id="banner">
	<div class="banner ">
		<img src="<?= base_url() ?>assets/home_assets/img/baner.jpg">
		<div class="bg-gradient-soft"></div>
	</div>	
</section>
<section id="" class="">
	<div class="container mt-5">
		<div class="bg-white box-shadow px-3 py-3 mb-5">
			<h2 class="blue mb-3" style="padding-bottom: 40px" align="center">
				<b>Konfirmasi Pembayaran Registrasi</b>
			</h2>



			<!-- isi notifikasi-->
			<form action="<?= base_url() ?>/home/pembayaran_registrasi_post?permalink=<?= $permalink?>" method="post" enctype="multipart/form-data">
				<table>
					<h4 class="blue notif-text">Sudah Melakukan Pembayaran Melalui</h4><br>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Nama Bank
						</label>
						<div class="col-sm-6">
							<select name="kode" id="kode">
								<?php foreach ($bank as $bnk) : ?>
									<option value="<?= $bnk['kode'] ?>"><?= $bnk['nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Nomor Rekening
						</label>
						<div class="col-sm-6">
							<input type="number" min="0" class="form-control" name="nomor_rekening" id="nomor_rekening" value="" placeholder="No Rekening" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Atas Nama Rekening
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama_rekening" id="nama_rekening" value="" placeholder="Nama" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="avatar" class="col-sm-2 col-form-label">
							Bukti Transfer
						</label>
						<div class="col-sm-6 upload-btn">
							<input type="file" id="bukti_transfer" name="bukti_transfer" size="33" required/>
						</div>
					</div>

					<h4 class="blue notif-text">Data Alamat Untuk Pengiriman Produk</h4>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Alamat
						</label>
						<div class="col-sm-6">
							<textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Kota
						</label>
						<div class="col-sm-6">
							<select name="id_kota" id="id_kota" required>
								<?php foreach ($wilayah as $w_kota) : ?>
									<option value="<?= $w_kota['id'] ?>"><?= $w_kota['namakab'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Kode Pos
						</label>
						<div class="col-sm-6">
							<input type="number" min="0" class="form-control" name="kodepos" id="kodepos" value="" placeholder="" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-2 col-form-label">
							Telepon
						</label>
						<div class="col-sm-6">
							<input type="number" min="0" class="form-control" name="telepon" id="telepon" value="" placeholder="089789xxx" required>
						</div>
					</div>

				</table>
					<input type="hidden" name="daftarfilelogo2" id="daftarfilelogo2">
					<div class="btn-submit" style="padding-top: 20px">
						<button type="submit" class="btn">Submit</button>
					</div>
				</form>


		</div>
	</div>
</section>
