<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">
<link href="<?php echo base_url();?>assets/components/ekko/ekko-lightbox.css" rel="stylesheet">
<style type="text/css">
.textright{
  text-align: right;
}       
</style>

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      	<div class="row" style="margin-top:-25px;">
            <div class="col-md-6"><h3>Daftar Transaksi</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
                 
            </div>
    	</div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
		<div class="box">
        	<div class="box-body">
				<table width="100%" class="table table-condensed table-striped table-hover dasarTable" id="example" cellspacing="0" > 
					<thead>
						<tr style="background-color:#79d279">
							<th width="5%">NO</th>
							<th width="20%">DISTRIBUTOR</th>
							<th width="10%">NO INVOICE</th>
							<th width="10%">TAGIHAN</th>
							<th width="15%">TGL BELANJA</th>
							<th width="15%">STATUS BAYAR</th>
							<th width="10%">STATUS KIRIM</th>
							<th width="15%">ACTION</th>
						</tr>
					</thead>
				</table>  
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php echo $footer;?>
<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>

<script src="<?php echo base_url(); ?>assets/components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/components/bootbox/bootbox.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/components/ekko/ekko-lightbox.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	if ($('table').hasClass('dasarTable')) {
		$('.dasarTable').dataTable({
            "columnDefs": [
            { targets: [3], className: 'textright' },
            ],
			"dom": '<"pull-right"f>tip',
			"autoWidth": false,
			"bSort": true,
			"paging": true,
			"info": true,
			"stateSave": false,
			"pagingType": "full_numbers",
			"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
			"pageLength": 50,
			"ajax": "<?php echo base_url(); ?>backend/transaksi/list_invoice?iDisplayStart=0&iDisplayLength=-1",
			"aoColumns": [
				{"bSortable": false, "bSearchable": false},
				null,
                null,
                null,
                null,
                null,
                null,
				{"bSortable": false}
			]
		});
	}
});

//ekko
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
    onShown: function() {
        var lightbox = this;
        document.addEventListener('someEventOrSomething', function () {
            lightbox.close();
        });
    }
});
}); 
//ekko
</script>
</body>
</html>
