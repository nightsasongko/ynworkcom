<?php
include "header.php";
?>
<style type="text/css">
	#footer {
		display: none;
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
			<!-- alert success -->
			<?php if ($this->session->flashdata('rgs_success')) : ?>
				<p><?= $this->session->flashdata('rgs_success'); ?></p>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('upload_success')) : ?>
				<p><?= $this->session->flashdata('upload_success'); ?></p>
			<?php endif; ?>
			
			<!-- alert error -->
			<p><?= validation_errors(); ?></p>

			<div class="bg-white box-shadow mb-2 py-3 px-3">

				<ul class="nav menu-setting" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">
							<i class="fas fa-user-alt"></i> Edit Profil
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false">
							<i class="fas fa-university"></i> Akun Bank
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fas fa-key"></i> Ganti Password
						</a>
					</li>

				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
						<div class="mt-3">
							<div class="form-group row">
								<label for="avatar" class="col-sm-2 col-form-label">
									Avatar
								</label>
								<div class="col-sm-6 upload-btn">
									<div class="img-thumbnail-cover">
										<?php if ($profile['avatar'] == null) { ?>
											<img src="<?= base_url() ?>assets/gambar_distributor/avatar/noimage.png">
										<?php } else { ?>
											<img src="<?= base_url('assets/gambar_distributor/avatar/') ?><?= $profile['avatar']; ?>">
										<?php } ?>
									</div>
									<form method="post" action="<?= base_url('upload/avatar_upload') ?>" enctype="multipart/form-data">
										<input type="file" id="profile_image" name="profile_image" size="33" required/>
										<input type="submit" value="Upload Image" />
									</form>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">
									Cover Profil
								</label>
								<div class="col-sm-6 upload-btn">
									<div class="img-thumbnail-cover">
										<?php if ($profile['avatar'] == null) { ?>
											<img src="<?= base_url() ?>assets/gambar_distributor/gambar_toko/no-photo.jpg">
										<?php } else { ?>
											<img src="<?= base_url('assets/gambar_distributor/gambar_toko/') ?><?= $profile['gambar_toko']; ?>">
										<?php } ?>
									</div>
									<form method="post" action="<?= base_url('upload/img_toko_upload') ?>" enctype="multipart/form-data">
										<input type="file" id="gambar_toko" name="gambar_toko" size="33" required/>
										<input type="submit" value="Upload Image" />
									</form>
								</div>
							</div>
							<form action="<?= base_url('post_setting') ?>" method="post">
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Nama
									</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="nama" id="nama" value="<?= $profile['nama'] ?>" placeholder="Nama">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Alamat
									</label>
									<div class="col-sm-6">
										<textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($profile['alamat']); ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Kota
									</label>
									<div class="col-sm-6">
										<select name="id_kota" id="id_kota">
											<option value="<?= $profile['id_kota'] ?>"><?= $kota['namakab'] ?></option>
											<?php foreach ($wilayah as $w_kota) : ?>
												<option value="<?= $w_kota['id'] ?>"><?= $w_kota['namakab'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Telepon
									</label>
									<div class="col-sm-6">
										<input type="number" min="0" class="form-control" name="telepon" id="telepon" value="<?= $profile['telepon'] ?>" placeholder="089789xxx">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Email
									</label>
									<div class="col-sm-6">
										<input type="email" class="form-control" name="" id="" value="<?= $profile['email'] ?>" placeholder="Email" disabled>
									</div>
								</div>

								<h6 class="blue my-3"><b>Link Pembelian</b></h6>

								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Link Instagram
									</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="link_instagram" id="link_instagram" value="<?= $profile['link_instagram'] ?>" placeholder="Paste URL">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Link Lazada
									</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="link_lazada" id="link_lazada" value="<?= $profile['link_lazada'] ?>" placeholder="Paste URL">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Link Bukalapak
									</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="link_bukalapak" id="link_bukalapak" value="<?= $profile['link_bukalapak'] ?>" placeholder="Paste URL">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Link Tokopedia
									</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="link_tokopedia" id="link_tokopedia" value="<?= $profile['link_tokopedia'] ?>" placeholder="Paste URL">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Link Blibli
									</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="link_blibli" id="link_blibli" value="<?= $profile['link_blibli'] ?>" placeholder="Paste URL">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Link Shopee
									</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="link_shopee" id="link_shopee" value="<?= $profile['link_shopee'] ?>" placeholder="Paste URL">
									</div>
								</div>

								<div class="btn-submit">
									<button type="submit" class="btn">Simpan</button>
								</div>


						</div>
					</div>

					<div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
						<!-- Akun Bank-->
						<div class="mt-3">

							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">
									Nama Bank
								</label>
								<div class="col-sm-6">
									<select name="kode" id="kode">
										<option value="<?= $d_bank['id_bank'] ?>"><?= $d_bank['nama'] ?></option>
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
									<input type="number" min="0" class="form-control" name="nomor_rekening" id="nomor_rekening" value="<?= $profile['nomor_rekening'] ?>" placeholder="No Rekening">
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">
									Nama
								</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_rekening" id="nama_rekening" value="<?= $profile['nama_rekening'] ?>" placeholder="Nama">
								</div>
							</div>

							<div class="btn-submit">
								<button type="submit" class="btn">Simpan</button>
							</div>

							</form>
						</div>
					</div>

					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<!-- Ganti Password-->
						<div class="mt-3">
							<form action="<?= base_url('distributor/edit_password') ?>" method="post">
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Password Baru
									</label>
									<div class="col-sm-5">
										<input type="password" min="0" class="form-control" name="password1" id="password1" placeholder="Masukkan Password Baru">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">
										Ulangi
									</label>
									<div class="col-sm-5">
										<input type="password" min="0" class="form-control" name="password2" id="password2" placeholder="Ulangi Password">
									</div>
								</div>

								<div class="btn-submit">
									<button type="submit" class="btn">Simpan</button>
								</div>

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