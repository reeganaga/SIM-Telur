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
  <a class="btn btn-info btn-sm" href="index.php?menu=form_produksi&proses=tambah&id="><span class="glyphicon glyphicon-plus"></span> Tambah</a><br><br>
  <table class="table table-hover table-bordered" id="datatabel">
    <thead>
      <th>Nomer</th>
      <th>Tanggal Produksi</th>
      <th>Jumlah Produksi</th>
      <th>Umur Ayam</th>
      <th>Populasi</th>
      <th>aksi</th>
    </thead>
    <tbody>
    <?php 
      include"../koneksi.php";
      $query=mysql_query("select * from produksi");
      $i=1;
      while ($data=mysql_fetch_array($query)) {
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['tgl_produksi']; ?></td>
        <td><?php echo $data['jml_produksi']; ?></td>
        <td><?php echo $data['umur_ayam']; ?></td>
        <td><?php echo $data['populasi']; ?></td>
        <td>
        <a href="index.php?menu=form_produksi&proses=edit&id=<?php echo $data['id_produksi']; ?>" class="btn btn-info" title="Edit">
        <i class="glyphicon glyphicon-edit"></i></a> 
        <a href="hapus_produksi.php?id=<?php echo $data['id_produksi']; ?>" class="btn btn-danger" title="Hapus">
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
</div>


</body>
</html>
