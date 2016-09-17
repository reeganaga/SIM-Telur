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
    <a class="btn btn-info btn-sm" href="index.php?menu=form-data-pemesanan&proses=tambah&id="><span class="glyphicon glyphicon-plus"></span> Tambah</a><br><br>
    <table class="table table-striped table-hover" id="datatabel">
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
        $query=mysql_query("select * from pemesanan");
        while($data=mysql_fetch_array($query))
        {
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['nama_pemesan'];  ?></td>
          <td><?php echo $data['alamat_pemesan'];  ?></td>
          <td><?php echo $data['tgl_pemesanan'];  ?></td>
          <td><?php echo $data['jml_pemesanan'];  ?> peti</td>

          <td>
            <a href="index.php?menu=form-data-pemesanan&proses=edit&id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-info" title="Edit">
            <i class="glyphicon glyphicon-edit"></i></a> 
            <a href="hapus-data-pemesanan.php?id=<?php echo $data['id_pemesanan']; ?>" class="btn btn-danger" title="Hapus">
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
  <div class="box-footer clearfix">
  </div>
</div>
</body>
</html>
