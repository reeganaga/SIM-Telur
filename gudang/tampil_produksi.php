<!DOCTYPE html>
<html>
<head>
  <title>Data Produksi</title>
</head>
<body>
<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>

    <h3 class="box-title">Data Produksi</h3>
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
  <table class="table table-hover table-bordered">
    <thead>
      <th>Nomer</th>
      <th>Tanggal Produksi</th>
      <th>Jumlah Produksi</th>
      <th>aksi</th>
    </thead>
    <tbody>
    <?php 
      include"../koneksi.php";
      extract($_GET);
      $query=mysql_query("select * from produksi where id_produksi='$id' ");
      $i=1;
      while ($data=mysql_fetch_array($query)) {
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['tgl_produksi']; ?></td>
        <td><?php echo $data['jml_produksi']; ?></td>
        <td>
        <a href="index.php?menu=form-validasi-produksi&id=<?php echo $data['id_produksi']; ?>" class="btn btn-info" title="Kirim">
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
</div>
</body>
</html>
