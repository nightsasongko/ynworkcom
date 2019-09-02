<?php echo $header1;?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/mycss.css">

<?php echo $header2;?>
<?php echo $sidebar;?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row" >
            <div class="col-md-6"><h3>Laporan Akuisisi Distributor</h3></div>
            <div class="col-md-6" style="text-align:right; margin-top:20px;">
              Tahun 
              <select name="pilihtahun" id="pilihtahun" onchange="ganti_tahun()">
                <?php
                $skr = date('Y');
                for($ii = 2018; $ii <= $skr; $ii++)
                {
                  echo "<option value='$ii'";
                  if($ii == $tahun_dipilih)
                  {
                    echo " selected";
                  }
                  echo ">$ii</option>";
                ?>
              <?php } ?>

              </select> 
            
              <a href="<?php echo base_url(); ?>backend/laporan/download_akuisisi_distributor?tahun=<?php echo $tahun_dipilih;?>"><span class="btn btn-success"><i class="fa fa-download"></i> Download Semua</span></a>

            </div>
      </div>  
    </section>

    <!-- Main content -->
    <section class="content container-fluid" style="margin-top:-10px;">
    <div class="box">
          <div class="box-body">
              <div id="container" style="min-width: 310px; height: 400px; margin: 20px auto 20px;"></div>
            
              <div>
                <h4>10 Distributor Terakhir</h4>
                <table width="100%" class="table table-condensed table-striped table-hover" cellspacing="0" >  
                    <thead>
						<tr style="background-color:#79d279">
							<th width="5%">NO</th>
							<th width="20%">DISTRIBUTOR</th>
							<th width="40%">ALAMAT</th>
							<th width="15%">KOTA</th>
							<th width="20%">JOIN DATE</th>
						</tr>
                    </thead>
                    <tbody>
                    <?php
                    $nn = 1;
                    foreach($last_10_data as $row)
                    {
                    ?>
                        <tr>
                            <td><?php echo $nn;?></td>
                            <td><?php echo $row['nama'];?></td>
                            <td><?php echo $row['alamat'];?></td>
                            <td><?php echo ucwords($row['namakab']);?></td>
                            <td><?php echo $this->dasarlib->ubahTanggalPendek2($row['join_date']);?></td>
                        </tr>
                    <?php 
                    $nn++;
                    } ?>
                    </tbody>
                </table>
            </div>

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

<script src="<?php echo base_url(); ?>assets/components/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/components/highcharts/modules/exporting.js" type="text/javascript"></script>

<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Chart Laporan'
        },
        subtitle: {
            text: 'Daftar Pendaftaran Distributor'
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
                '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true

      /*
      formatter: function() {
        // If you want to see what is available in the formatter, you can
        // examine the `this` variable.
        //     console.log(this);
      
        return '<b>'+ Highcharts.numberFormat(this.y, 0) +'</b><br/>'+
          'in year: '+ this.point.name;
      }
      */      
      
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
    {name: 'Pendaftaran Distributor',data: [<?php echo $series1;?>]}
    ]
    });
});

function ganti_tahun()
{
  var tahun = $('#pilihtahun').val();
  window.location.href = "<?php echo base_url()?>backend/laporan/akuisisi_distributor?tahun="+tahun;
}

</script>
</body>
</html>
