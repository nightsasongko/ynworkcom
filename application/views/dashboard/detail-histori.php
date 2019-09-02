<?php
include "header.php";
?>
<style type="text/css">
	#footer{
		display: none;
	}
	.sidebar-nav .histori-transaksi-active:after{
		content: url(<?=base_url('assets/home_assets/img/polygon.png')?>); 
		color: #fff;
		max-height: 30px;
		right: 0;
		float: right;
		top: -39px;
		font-weight: bold;
		position: relative;
	}
	.sidebar-nav .histori-transaksi-active a{
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
		<div class="bg-white box-shadow px-3 py-4">
				<h5 class="blue">
					<b><i class="fas fa-history"></i> Detail History</b>
				</h5>
				<div class="table-responsive">
					<table class="table table-cart">
						<thead>
							<tr>
								<th>No</th>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php $i++; ?>
						</tbody>
					</table>
				</div>			
			</div>	

			
		</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>





<?php
include "footer.php";
?>