<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .purchase-active:after{
		content: url(<?= base_url()?>'assets/img/polygon.png');
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .purchase-active a{
		font-weight: bold;
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
			<?php if($this->session->flashdata('dlt_success')): ?>
				<p><?= $this->session->flashdata('dlt_success'); ?></p>
			<?php endif; ?>

			<?php if ($this->session->flashdata('mssd_kbl_kosong')) : ?>
				<p><?= $this->session->flashdata('mssd_kbl_kosong'); ?></p>
			<?php endif; ?>

			<div class="bg-white box-shadow px-3 py-4">
				<h5 class="blue">
					<b><i class="fas fa-shopping-cart"></i> Cart</b>
				</h5>
				<div class="table-responsive">

					<?php if ($null_cart==false) { ?>
						<p>Keranjang belanja kosong.</p>
					<?php } else { ?>
						<table class="table table-cart">
						<thead>
							<tr>
								<th scope="col">Produk</th>
								<th scope="col">Nama Produk</th>
								<th scope="col" >Qty</th>
								<th scope="col" style="text-align: right;">Harga Distributor</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; ?>
							<?php foreach ($d_cart as $dc) :?>
							<tr>
								<td>
									<div class="img-product-buy">
										<img src="<?= base_url('assets/gambar_item/thumbnail/'). $dc['thumbnail'] ?>" alt="">
									</div>
								</td>
								<td>
									<h6 class="pt-2">
										<?= $dc['nama'] ?>
									</h6>
								</td>
							  <td>
								<div class="d-flex bd-highlight outline-grey" align="center">
									<div class="p-2 flex-fill bd-highlight">
										<button class=" btn-sum" onclick="kurangkan(<?= $i ?>,<?= $dc['harga_distributor'] ?>, <?= $dc['id_cart']?>)"> - </button> 
									</div>
									<div class="p-2 flex-fill bd-highlight box-outline">
										<input type="number" id="jumlah_<?= $i ?>" name="jumlah_<?= $i ?>" value="<?= $dc['qty']?>">
									</div>
									<div class="p-2 flex-fill bd-highlight">
										<button class=" btn-sum" onclick="tambahkan(<?= $i ?>,<?= $dc['harga_distributor'] ?>, <?= $dc['id_cart']?>)"> + </button> 
									</div>
								</div>
							  </td>
							  <td><div id="sub_total_<?= $i ?>"><?= number_format($dc['total'], 0,',','.')?></div></td>
							  <td>  
								<form action="<?= base_url('distributor/delete_cart/') . $dc['id_cart']?>" method="post">
								  <input type="submit" class="btn btn-sm btn-danger" value="X">
								</form>
							  </td>
							</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
							<tr>
								<th scope="row">
									
								</th>
								<td>
									
								</td>
								<td align="right">
									<h6 class="pt-2">
										<b>Total</b>
									</h6>
								</td>
								<td >
									<h6 class="pt-2">
										<b>
											<div id='total_belanja'>
												<?= number_format($total, 0,',','.')?>
											</div>
										</b>
									</h6>
								</td>
								<td >
									
								</td>
								<td>
									
								</td>
							</tr>
						</tbody>
					</table>
					<?php } ?>
					


				</div>
				
				<div class="row">
					<?php if($null_cart==false) { ?>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12" align="center">					
							<a href="<?= base_url('purchase') ?>" class="btn-orange btn-block" >
								<b><i class="fas fa-shopping-cart"></i> Belanja</b>
							</a>
						</div>
					<?php } else { ?>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6" align="center">					
						<a href="<?= base_url('purchase') ?>" class="btn-orange btn-block" >
							<b><i class="fas fa-shopping-cart"></i> Belanja Lagi</b>
						</a>
						</div>
						<div class="col-6 col-sm-6 col-md-6 col-lg-6" align="center">
							<a href="<?= base_url('checkout_post') ?>" class="btn-orange btn-block" >
								<b><i class="fas fa-clipboard-check"></i> Checkout</b>
							</a>
						</div>	
					<?php } ?>
				</div>		
							
			</div>	
			
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>




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
    
    $.ajax({
      method: "POST",
				url: "<?php echo base_url().'distributor/shipment_post_plus'?>",
				data: {isi_sekarang: isi_sekarang, id_cart:id_cart, sub_total:sub_total}
			}).done(function( msg ) 
			{
				arrmsg = msg.split('|');
				let tex_subtotal = arrmsg[0];
				let tex_total = arrmsg[1];	
				$('#'+nama_sub_total).html(tex_subtotal);			
				$('#total_belanja').html(tex_total);			
				
			});
  }

  function kurangkan(angka,harga_satuan,id_cart){
    console.log(id_cart);
    let nama_inputan = 'jumlah_'+angka;
    let isi_awal = parseInt($('#'+nama_inputan).val());
	
	if (isi_awal==1) {
		alert('jumlah tidak buleh kurang dari 1');
	} else {
		console.log(isi_awal);
		let isi_sekarang = isi_awal - 1;
		console.log(isi_sekarang);
		let sub_total = parseInt(harga_satuan) * isi_sekarang;
		console.log(sub_total);
		let nama_sub_total = 'sub_total_'+ angka;
		$('#'+nama_sub_total).html(sub_total);
		$.ajax({
		  method: "POST",
					url: "<?php echo base_url().'distributor/shipment_post_minus'?>",
					data: {isi_sekarang: isi_sekarang, id_cart:id_cart, sub_total:sub_total}
				}).done(function( msg ) 
				{
					arrmsg = msg.split('|');
					let tex_subtotal = arrmsg[0];
					let tex_total = arrmsg[1];	
					$('#'+nama_sub_total).html(tex_subtotal);			
					$('#total_belanja').html(tex_total);			
					
				});


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
    
  }


    
</script>

<?php
include "footer.php";
?>