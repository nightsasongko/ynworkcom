<p>page produk</p>

<div class="row">
    <?php foreach ($all_produk_item as $ap_item) : ?>
    <div class=".col-lg">
        <div class="card" style="width: 18rem;">
        <img src="<?= base_url('assets/gambar_item/thumbnail/') . $ap_item['thumbnail'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $ap_item['nama']?></h5>
            <style>.ellipsis { text-overflow: ellipsis; }</style>
            <div style="white-space: nowrap; 
                width: 100%; 
                overflow: hidden;
                text-overflow: ellipsis; 
                border: 1px solid #000000;" class="ellipsis">
                <p class="card-text"><?= $ap_item['deskripsi'] ?></p></div>
            <label for="hrg-u">Harga Umum</label>
            <p><?= number_format($ap_item['harga_umum'],0,',','.')?></p>
            <label for="hrg">Harga Distributor</label>
            <p><?= number_format($ap_item['harga_distributor'],0,',','.')?></p>
            <a href="<?= base_url('distributor/detail_produk/') . $ap_item['permalink']?>" class="btn btn-primary">Lihat</a>
        </div>
        </div>
    </div>
    <?php endforeach;?>
</div>


