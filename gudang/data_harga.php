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
    
    <?php
    $q=mysql_query("select * from harga"); 
    $ada=mysql_num_rows($q);
    $data=mysql_fetch_array($q);
     ?>
     <?php if ($ada==0): ?>
      <a class="btn btn-info btn-sm" href="index.php?menu=form-data-harga&proses=tambah&id="><span class="glyphicon glyphicon-plus"></span> Tambah</a><br><br>
    <?php else: ?>
      <a class="btn btn-warning btn-sm" href="index.php?menu=form-data-harga&proses=edit&id=<?php echo $data['id_harga']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a><br><br>
     <?php endif ?>

    <table class="table table-striped table-hover" id="datapenjualan">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Jml per peti</th>
          <th>Harga Jual</th>
          <!-- <th>Aksi</th> -->
        </tr>
      </thead>
      <tbody>
        <?php  
        $i=1;
        include"../koneksi.php";
        $query=mysql_query("select * from harga");
        while($data=mysql_fetch_array($query))
        {
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['jml_per_peti'];  ?> kg</td>
          <td><?php echo $data['harga_jual'];  ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
      </tbody>
    </table>
    
  </div>
 <!--  <div class="box-footer clearfix">
    <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
    <i class="fa fa-arrow-circle-right"></i></button>
  </div> -->
</div>
</body>
</html>
