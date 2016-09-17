<!DOCTYPE html>
<html>
<head>
  <title>Data Pemesanan</title> 
</head>
<body>
<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Data Pemesanan</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fa fa-times"></i></button>
    </div>
    <!-- /. tools -->
  </div>
  <div class="box-body">

    <?php if (isset($_GET['sukses'])) : ?>
        <div class="alert alert-success alert-dismissible alert-sm" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=base64_decode($_GET['sukses']);?>
        </div>
    <?php endif;?>
  <?php if (isset($_GET['error'])) : ?>
        <div class="alert alert-danger alert-dismissible alert-sm" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>
    <table class="table table-striped table-hover" id="datapemesanan">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Nama Pemesan</th>
          <th>Alamat Pemesan</th>
          <th>Tanggal Pemesanan</th>
          <th>Jumlah Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php  
        $i=1;
        include"../koneksi.php";
        $query=mysql_query("select * from pemesanan where status_kirim='n' ");
        while($data=mysql_fetch_array($query))
        {
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['nama_pemesan'];  ?></td>
          <td><?php echo $data['alamat_pemesan'];  ?></td>
          <td><?php echo $data['tgl_pemesanan'];  ?></td>
          <td><?php echo $data['jml_pemesanan'];  ?></td>
          <td>
            <a href="proses-data-pemesanan.php?id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-info" title="Kirim">
            <i class="glyphicon glyphicon-send"></i></a> 
          </td>
        </tr>
        <?php
        $i++;
        }
        ?>
      </tbody>
    </table>
    
  </div>
  <div class="box-footer clearfix">
  </div>
</div>
</body>
</html>
