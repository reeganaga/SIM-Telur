<!DOCTYPE html>
<html>
<head>
  <title>Data Penjualan</title>  
</head>
<body onload="window.print()">
    <?php 
      include"../koneksi.php";
      extract($_GET);
            $query=mysql_query("select * from penjualan where tgl_penjualan like '$tgl-%' ");
    ?>
    <br>
    <h3><center>Laporan Penjualan Periode <?php echo $tgl ?></center></h3>
    <table border="1" width="80%" align="center">
          <thead>
            <th>Nomer</th>
            <th>Tanggal Penjualan</th>
            <th>Jumlah Telur</th>
            <th>Total Harga</th>
          </thead>
        <tbody>
    <?php    
      $total="";

      while ($data=mysql_fetch_array($query)) {
      $total=$total+$data['total_harga'];
      $i=1;
    ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['tgl_penjualan']; ?></td>
        <td><?php echo $data['jml_penjualan']; ?></td>
        <td><?php echo $data['total_harga']; ?></td>
        </tr>      
    <?php
      $i++;
      }
    ?>
      <tr>
        <td colspan="3" class="text-right">Total</td>
        <td><?php echo $total ;?></td>
      </tr>
    </tbody>
  </table>
         
  </div>
</div>
</body>
</html>
