<!DOCTYPE html>
<html>
<head>
  <title>Data Produksi</title>  
</head>
<body onload="window.print()">
    <?php 
      include"../koneksi.php";
      extract($_GET);
            $query=mysql_query("select * from produksi where produksi.tgl_produksi like '$tgl%' ");
    ?>
    <br>
    <h3><center>Laporan Produksi Periode <?php echo $tgl ?></center></h3>
    <table border="1" width="80%" align="center">
          <thead>
            <th>Nomer</th>
            <th>Tanggal Produksi</th>
            <th>Jumlah Produksi</th>
            <th>Jumlah DiTerima</th>
          </thead>
        <tbody>
    <?php    
      $i=1;
      while ($data=mysql_fetch_array($query)) {
    ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['tgl_produksi']; ?></td>
        <td><?php echo $data['jml_produksi']; ?></td>
        <td><?php echo $data['jml_terima']; ?></td>
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
