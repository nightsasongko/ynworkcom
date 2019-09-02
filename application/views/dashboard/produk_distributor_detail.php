<form action="<?= base_url('distributor/produk_cart/').$item_produk['id_produk'] ?>" method="post">
    <label for="nama">Nama : </label>
    <?= $item_produk['nama'] ?><br><br>
    <label for="small"> small pic </label>
    <?php foreach ($foto_produk as $fp) : ?>
    <img style="width: 100px;" src="<?= base_url() ?>assets/gambar_item/foto/<?= $fp['foto']?>" alt="">
    <?php endforeach;?><br><br>
    <label for="deskripsi">Deskripsi : </label>
    <?= $item_produk['deskripsi'] ?><br><br>
    <label for="hrg_u">Harga Umum : </label>
    <?= $item_produk['harga_umum'] ?><br><br>
    <label for="hrg_d">Harga Distributor : </label>
    <?= $item_produk['harga_distributor'] ?><br><br>
    <label for="berat">Berat : </label>
    <?= $item_produk['berat'] ?><br><br>
    <input type="submit" value="Beli">
</form>