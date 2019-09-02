<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Main content -->
    <section class="content container-fluid">
    <div class="box">
          <div class="box-body" >
        
              <div class="row" style="margin-bottom:50px;">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?php echo number_format($jumlah_agen,0,',','.');?></h3>

                      <p>Jumlah Distributor</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
								<div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?php echo number_format($jumlah_transaksi,0,',','.');?></h3>

                      <p>Jumlah Transaksi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-cash"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php echo number_format($jumlah_poin,0,',','.');?></h3>

                      <p>Total Point Reward</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-checkmark-circled"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php echo number_format($jumlah_item,0,',','.');?></h3>

                      <p>Jumlah Produk</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-cube"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
              </div>
<!--
              <div id="container" style="min-width: 310px; height: 400px; margin: 20px auto 20px;"></div> -->

							<div style="height:250px;"></div>

            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php echo $footer;?>
<script src="<?php echo base_url(); ?>assets/components/dasarjs/dasar.js"></script>
<script src="<?php echo base_url(); ?>assets/components/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/components/highcharts/modules/exporting.js" type="text/javascript"></script>

<script type="text/javascript">
/*
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Chart Laporan'
        },
        subtitle: {
            text: 'Akuisisi Member'
        },
        xAxis: {
            categories: [
                <?php echo $list_categories;?>
            ],
            crosshair: true
        },
        yAxis: {
      allowDecimals: false,
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:,.0f} orang</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true

  
      
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
    {name: 'Penjual',data: [<?php echo $data_penjual;?>]},
    {name: 'Pembeli',data: [<?php echo $data_pembeli;?>]}
    ]
    });
});

*/

</script>

</body>
</html>
