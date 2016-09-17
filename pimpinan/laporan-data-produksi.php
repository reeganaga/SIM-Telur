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
    <div class="row">
      <div class="col-md-4">
        <h3>Laporan Perhari</h3>
        <form action="index.php?menu=laporan-data-produksi" method="post">
          <input type="text" class="form-control input-sm" style="width:100%" id="tgl_hari" name="tgl" readonly required><br>
          <input type="submit" name="proses" class="btn btn-info btn-sm" value="Search"><br>
        </form>
      </div>
      <div class="col-md-4">
        <h3>Laporan Perbulan</h3>
        <form action="index.php?menu=laporan-data-produksi" method="post">
          <select name="tahun" class="pull-left form-control input-sm" style="width:50%;">
            <?php 
            for ($i=2015; $i <= date('Y'); $i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php }?>
          </select>
          <select name="bulan" class="pull-left form-control input-sm" style="width:50%;">
            <?php 
            for ($i=1; $i <= 12; $i++) { 
              if ($i==12) {
                $value=$i;
              }else{$value="0".$i;}
              ?>
            <option value="<?php echo $value; ?>"><?php echo date('F',mktime(0,0,0,$i,1,date("Y"))); ?></option>
            <?php }?>
          </select><br>
          <input type="hidden" name="tipe" value="bulan">
          <input type="submit" name="proses" class="btn btn-info btn-sm" value="Search" style="margin-top: 20px;"><br>
        </form>
      </div>
      <div class="col-md-4">
        <h3>Laporan Pertahun</h3>
        <form action="index.php?menu=laporan-data-produksi" method="post">
          <select name="tgl" class="form-control input-sm">
            <?php 
            for ($i=2015; $i <= date('Y'); $i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php }?>
          </select><br>
          <input type="submit" name="proses" class="btn btn-info btn-sm" value="Search"><br>
        </form>
      </div>
    </div>

    <?php 
      include"../koneksi.php";
      if (isset($_POST['proses'])) 
      {
        # code...
        // $tgl=$_POST['tgl'];
        if (isset($_POST['tipe'])) {
          $tgl=$_POST['tahun']."-".$_POST['bulan'];
        }else{
          $tgl=$_POST['tgl'];
        }
    ?>
    <br>
    <a href="cetak-laporan-produksi.php?tgl=<?php echo $tgl; ?>" target="_blank"><span class="btn btn-sm btn-info"><i class="glyphicon glyphicon-print"> Cetak</i></span></a>
    <a href="arsip_laporan_produksi.php?tgl=<?php echo $tgl; ?>"><span class="btn btn-sm btn-info"><i class="glyphicon glyphicon-download"> Download</i></span></a>
        <br><br><table class="table table-hover table-bordered">
          <thead>
            <th>Nomer</th>
            <th>Tanggal Produksi</th>
            <th>Jumlah Produksi</th>
            <th>Status Kirim ke Gudang</th>
            <th>Jumlah Terima Telur</th>
          </thead>
        <tbody>
    <?php    
      $query=mysql_query("select * from produksi where produksi.tgl_produksi like '$tgl%' ");
      $i=1;
      while ($data=mysql_fetch_array($query)) {
    ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data['tgl_produksi']; ?></td>
        <td><?php echo $data['jml_produksi']; ?></td>
        <td>
        <?php
          if($data['status_terima']=='y')
          {
        ?>
            <span class="btn btn-success">Telah di Terima Gudang</span>
        <?php
          }
          else
          {
        ?>
            <span class="btn btn-danger">Belum di Terima Gudang</span>
        <?php 
          }
        ?>
        </td>
        <td><?php  echo $data['jml_terima']; ?></td>
      </tr>      
    <?php
      $i++;
      }
    ?>
    </tbody>
  </table>
    <?php
      }      
    ?>      
  </div>
</div>
</body>
</html>
