<!DOCTYPE html>
<html>
<head>
  <title>Data Penjualan</title> 
</head>
<body>
<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Data Penjualan</h3>
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
  
    <a class="btn btn-info btn-sm" href="index.php?menu=form-data-penjualan&proses=tambah&id="><span class="glyphicon glyphicon-plus"></span> Tambah</a><br><br>
    <table class="table table-striped table-hover" id="datatabel">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Tanggal Penjualan</th>
          <th>Jumlah Peti</th>
          <th>Total Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php  
        $i=1;
        include"../koneksi.php";
        $query=mysql_query("select * from penjualan");
        while($data=mysql_fetch_array($query))
        {
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['tgl_penjualan'];  ?></td>
          <td><?php echo $data['jml_penjualan'];  ?></td>
          <td><b>Rp <?php echo $data['total_harga'];  ?></b></td>
          <td>
            <a href="index.php?menu=form-data-penjualan&proses=edit&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-info" title="Edit">
            <i class="glyphicon glyphicon-edit"></i></a> 
            <a href="hapus-data-penjualan.php?id=<?php echo $data['id_penjualan']; ?>" class="btn btn-danger" title="Hapus">
            <i class="glyphicon glyphicon-remove"></i></a>
          </td>
        </tr>
        <?php
        $i++;
        }
        ?>
      </tbody>
    </table>
    
  </div>
  <!-- <div class="box-footer clearfix">
    <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
    <i class="fa fa-arrow-circle-right"></i></button>
  </div> -->
</div>
</body>
</html>
