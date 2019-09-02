<!-- alert error -->
<p><?= validation_errors(); ?></p>

<!-- alert success -->
<?php if($this->session->flashdata('rgs_success')): ?>
    <p><?= $this->session->flashdata('rgs_success'); ?></p>
<?php endif; ?>

<form action="<?= base_url() ?>distributor/save_registrasi" method="post">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama"><br><br>

    <label for="alamat">Alamat</label>
    <input type="text" name="alamat" id="alamat"><br><br>

    <label for="kota">Kota</label>
    <select name="id_kota" id="id_kota">
        <?php foreach ($wilayah as $w_kota) : ?>
        <option value="<?= $w_kota['id']?>"><?= $w_kota['namakab'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="kodepos">Kode Pos</label>
    <input type="text" name="kodepos" id="kodepos"><br><br>

    <label for="telepon">Telepon</label>
    <input type="number" name="telepon" id="telepon"><br><br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email"><br><br>

    <input type="submit" value="Registrasi">
</form>