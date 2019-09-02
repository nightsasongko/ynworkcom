<!-- alert error -->
<p><?= validation_errors(); ?></p>

<form action="<?= base_url('distributor/edit_password') ?>" method="post">
    <label for="password">password</label>
    <input type="password" name="password1" id="password1"><br><br>
    <label for="ulangi">ulangi</label>
    <input type="password" name="password2" id="password2"><br><br>
    <input type="submit" value="Ubah">
</form>
