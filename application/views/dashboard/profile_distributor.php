<!-- alert success -->
<?php if($this->session->flashdata('rgs_success')): ?>
    <p><?= $this->session->flashdata('rgs_success'); ?></p>
<?php endif; ?>

<div class="row">
    <div class="col">
        <form action="<?= base_url('edit_profile') ?>" method="post">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $profile['nama'] ?>"><br><br>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?= $profile['alamat'] ?>"><br><br>
        <label for="kota">Kota</label>
        <select name="id_kota" id="id_kota">
            <option value="<?= $profile['id_kota']?>"><?= $kota['namakab'] ?></option>
            <?php foreach ($wilayah as $w_kota) : ?>
            <option value="<?= $w_kota['id']?>"><?= $w_kota['namakab'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <label for="kodepos">Kode Pos</label>
        <input type="text" name="kodepos" id="kodepos" value="<?= $profile['kodepos'] ?>"><br><br>

        <label for="telepon">Telepon</label>
        <input type="number" name="telepon" id="telepon" value="<?= $profile['telepon'] ?>"><br><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $profile['email'] ?>"><br><br>

        <label for="Nama Bank">Nama Bank</label>
        <select name="kode" id="kode">
            <option value="<?= $d_bank['id_bank']?>"><?= $d_bank['nama'] ?></option>
            <?php foreach ($bank as $bnk) : ?>
                <option value="<?= $bnk['kode']?>"><?= $bnk['nama'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        <label for="nomor_rekening">Nomor Rekening</label>
        <input type="number" name="nomor_rekening" id="nomor_rekening" value="<?= $profile['nomor_rekening'] ?>"><br><br>

        <label for="nama_rekening">Nama Rekening</label>
        <input type="text" name="nama_rekening" id="nama_rekening" value="<?= $profile['nama_rekening'] ?>"><br><br>
    </div>
    <div class="col">
        <label for="link_instagram">Link Instagram</label>
        <input type="text" name="link_instagram" id="link_instagram" value="<?= $profile['link_instagram'] ?>">
        <a href="<?= $profile['link_instagram'] ?>"><?= $profile['link_instagram'] ?></a>
        <br><br>
        <label for="link_lazada">Link Lazada</label>
        <input type="text" name="link_lazada" id="link_lazada" value="<?= $profile['link_lazada'] ?>">
        <a href="<?= $profile['link_lazada'] ?>"><?= $profile['link_lazada'] ?></a>
        <br><br>

        <label for="link_tokopedia">Link Tokopedia</label>
        <input type="text" name="link_tokopedia" id="link_tokopedia" value="<?= $profile['link_tokopedia'] ?>">
        <a href="<?= $profile['link_tokopedia'] ?>"><?= $profile['link_tokopedia'] ?></a>
        <br><br>

        <label for="link_bukalapak">Link Bukalapak</label>
        <input type="text" name="link_bukalapak" id="link_bukalapak" value="<?= $profile['link_bukalapak'] ?>">
        <a href="<?= $profile['link_bukalapak'] ?>"></a>
        <br><br>

        <label for="link_shopee">Link Shopee</label>
        <input type="text" name="link_shopee" id="link_shopee" value="<?= $profile['link_shopee'] ?>">
        <a href="<?= $profile['link_shopee'] ?>"></a>
        <br><br>

        <label for="link_blibli">Link Blibli</label>
        <input type="text" name="link_blibli" id="link_blibli" value="<?= $profile['link_blibli'] ?>">
        <a href="<?= $profile['link_blibli'] ?>"><?= $profile['link_blibli'] ?></a>
        <br><br>
		<input type="submit" value="Simpan">
    </form>
    </div>
    <div class="col">
        <form method="post" action="<?=base_url('distributor/avatar_upload')?>" enctype="multipart/form-data">
            <label for="avatar">Avatar</label><br>
            <input type="file" id="profile_image" name="profile_image" size="33" />
            <input type="submit" value="Upload Image" />
        </form>

        <img src="<?= base_url('assets/gambar_distributor/avatar/') . $profile['avatar'] ?>" alt="">

        <form method="post" action="<?=base_url('distributor/img_toko_upload')?>" enctype="multipart/form-data">
            <label for="avatar">Gambar Toko</label><br>
            <input type="file" id="gambar_toko" name="gambar_toko" size="33" />
            <input type="submit" value="Upload Image" />
        </form>

        <img src="<?= base_url('assets/gambar_distributor/gambar_toko/') . $profile['gambar_toko'] ?>" alt="">
    </div>
</div>
