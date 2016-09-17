<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Data Penjualan</title>
</head>

<body>
<?php
include "../koneksi.php";
extract($_GET);
// query untuk menampilkan mahasiswa berdasarkan id_user

  $aksi="tambah";
  $cari_kd=mysql_query("select max(id_penjualan) as kode from penjualan");
    $tm_cari=mysql_fetch_array($cari_kd);
    $kode=substr($tm_cari['kode'],4,10); 
    $tambah=$kode+1;
    if($tambah<10)
    {
        $idpenjualan="PENJ00000".$tambah;

    }
    else
    {
        $idpenjualan="PENJ0000".$tambah;
    }

  // ambil data harga
  $q=mysql_query("select * from harga");
  $harga=mysql_fetch_array($q);
  $total = $jml*$harga['jml_per_peti']*$harga['harga_jual'];
?>

<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Form Data Penjualan</h3>
              <!-- tools box -->
  </div>
  <div class="box-body">
    <form action="proses-data-penjualan.php" method="post">
    <input type="hidden" value="<?php echo $idpenjualan; ?>" name="id">
    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>">
    <input type="hidden" name="total" value="<?php echo $total; ?>">
    <div class="form-group">
      <label>Tanggal Penjualan</label>
      <input type="date" id="tgl" class="form-control input-sm" name="tgl" required>
    </div>
    <div class="form-group">
      <label>Jumlah Penjualan</label>
      <input type="number" id="jml" class="form-control input-sm" name="jml" value="<?php echo $jml ?>" required readonly>
    </div>
    <div class="row">
      <div class="col-md-3"><b>Estimasi Pendapatan</b></div>
      <div class="col-md-9">
        <?= $jml; ?> <i class="label label-warning">peti</i> x <?php echo $harga['jml_per_peti']; ?> <i class="label label-warning">kg</i> x <?php echo $harga['harga_jual']; ?> = 
        <b>Rp <?php echo $total; ?></b>
      </div>
    </div>
  </div>
  <div class="box-footer clearfix">
    <input type="submit" class="pull-right btn btn-info" id="send" value="Send">
  </div>
</div>
</form>
</body>
</html>