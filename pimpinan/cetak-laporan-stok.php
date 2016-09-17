<!DOCTYPE html>
<html>
<head>
  <title>Data Produksi</title>  
</head>
<body onload="window.print()">
    <?php 
      include"../koneksi.php";
      extract($_GET);
            $query=mysql_query("select ((select sum(jml_terima) from produksi) - (select sum(jml_penjualan) from penjualan)) as Persediaan ");
    ?>
    <br>
    <h3><center>Laporan Stok Periode <?php echo $tgl ?></center></h3>
    <table border="1" width="80%" align="center">
          <thead>
            <th>Nomer</th>
            <th>Nama</th>
            <th>Jumlah Persediaan</th>
          </thead>
        <tbody>
    <?php    
      $i=1;
      while ($data=mysql_fetch_array($query)) {
    ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo "Telur"; ?></td>
        <td><?php echo $data['Persediaan']; ?></td>
        </tr>      
    <?php
      $i++;
      }
    ?>
    </tbody>
  </table>
         
  </div>
</div>
</body>
</html>
