<!-- alert success -->
<?php if($this->session->flashdata('dlt_success')): ?>
    <p><?= $this->session->flashdata('dlt_success'); ?></p>
<?php endif; ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produk</th>
      <th scope="col">Berat</th>
      <th scope="col">Harga Umum</th>
      <th scope="col">Harga Distributor</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach ($d_cart as $dc) :?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $dc['nama'] ?><br><img src="<?= base_url('assets/gambar_item/thumbnail/'). $dc['thumbnail'] ?>" alt=""></td>
      <td>
        <button onclick="kurangkan(<?= $i ?>,<?= $dc['harga_distributor'] ?>, <?= $dc['id_cart']?>)"> - </button> 
        <input type="number" id="jumlah_<?= $i ?>" name="jumlah_<?= $i ?>" value="1"> 
        <button onclick="tambahkan(<?= $i ?>,<?= $dc['harga_distributor'] ?>, <?= $dc['id_cart']?>)"> + </button> 
      </td>
      <td><?= $dc['harga_distributor'] ?></td>
      <td><div id="sub_total_<?= $i ?>"><?=$dc['harga_distributor']?></div></td>
      <td>  
            <form action="<?= base_url('distributor/delete_cart/') . $dc['id_cart']?>" method="post">
                <input type="submit" value="delete">
            </form>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
<form action="" method="post">
    <input type="submit" value="Beli">
</form>

<?php
  include "script.php";
?>

<script type="text/javascript">
  function tambahkan(angka,harga_satuan,id_cart){
    console.log(id_cart);
    let nama_inputan = 'jumlah_'+angka;
    let isi_awal = parseInt($('#'+nama_inputan).val());
    let isi_sekarang = isi_awal + 1;
    console.log(isi_sekarang);
    $('#'+nama_inputan).val(isi_sekarang);
    let sub_total = isi_sekarang * parseInt(harga_satuan);
    console.log(sub_total);
    let nama_sub_total = 'sub_total_'+ angka;
    $('#'+nama_sub_total).html(sub_total);
  }

  function kurangkan(angka,harga_satuan,id_cart){
    console.log(id_cart);
    let nama_inputan = 'jumlah_'+angka;
    let isi_awal = parseInt($('#'+nama_inputan).val());
    console.log(isi_awal);
    let isi_sekarang = isi_awal - 1;
    console.log(isi_sekarang);
    let sub_total = parseInt(harga_satuan) * isi_sekarang;
    console.log(sub_total);
    let nama_sub_total = 'sub_total_'+ angka;
    $('#'+nama_sub_total).html(sub_total);
    if(isi_sekarang == 0)
    {
        $('#'+nama_inputan).val(1);
        $('#'+nama_sub_total).html(harga_satuan);
        $('#'+sub_total).val(harga_satuan);
    }
    else
    {
        $('#'+nama_inputan).val(isi_sekarang);
    }
  }
    
</script>