<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>


    </head>
    <body>
        <table class="table" style="border-style: solid;border-width: 1px; border-color:#b7e8b4;padding:5px; margin:5px;">
			<thead>
				<tr>
					<th width="10%">No</th>
					<th width="40%">Produk</th>
					<th width="20%">Harga</th>
					<th width="10%">Jumlah</th>
					<th width="20%">Subtotal</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$nn = 1;
				$total = 0;
				foreach($list_belanja as $row)
				{
					$harga_subtotal = $row['harga_total'];
					$total = $total + $harga_subtotal;
				?>
				<tr>
					<td><?php echo $nn;?></td>
					<td><?php echo $row['nama'];?></td>
					<td><?php echo number_format($row['harga_satuan'],0,',','.');?></td>
					<td><?php echo $row['qty'];?></td>
					<td><?php echo number_format($harga_subtotal,0,',','.');?></td>
				</tr>
				<?php 
				$nn++;
				} 
				?>

				<tr class="bg-success">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><strong>Total</strong></td>
					<td><strong><?php echo number_format($total,0,',','.');?></strong></td>
				</tr>
			</tbody>
            
        </table>
        

    </body>
</html>
