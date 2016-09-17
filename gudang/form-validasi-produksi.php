<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form data Produksi</title>
</head>

<body>
<?php
include "../koneksi.php";
extract($_GET);
// query untuk menampilkan mahasiswa berdasarkan id_user
$query=mysql_query("select * from produksi where id_produksi ='$id' " );
$data=mysql_fetch_array($query);

// jika kd_mhs > 0 / form ubah data

	$idprod = $data['id_produksi'];
	$tgl = $data['tgl_produksi'];
	$jml = $data['jml_produksi'];
	$status='y';
	$aksi="edit";
//form tambah data
?>

<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Data Validasi Produksi</h3>
              <!-- tools box -->
  </div>
  <div class="box-body">
  	<form action="proses-validasi-produksi.php" method="post">
  	<input type="hidden" value="<?php echo $idprod; ?>" name="id">
  	<input type="hidden" name="aksi" value="<?php echo $aksi; ?>">
    <div class="form-group">
      <label>Tanggal Produksi</label>
      <input type="date" id="tgl" class="form-control input-sm" name="tgl" value="<?php echo $tgl ?>" required readonly>
    </div>
    <div class="form-group">
      <label>Jumlah Produksi</label>
      <input type="number" id="jml" class="form-control input-sm" name="jml" value="<?php echo $jml ?>" required readonly>
    </div>
    <div class="form-group">
      <input type="hidden" id="status" class="form-control input-sm" name="status" value="<?php echo $status ?>" required>
    </div>
    <div class="form-group">
      <label>Jumlah Terima</label>
      <input type="number" id="jmlterima" class="form-control input-sm" name="jmlterima" required>
    </div>
  </div>
  <div class="box-footer clearfix">
    <input type="submit" class="pull-right btn btn-info" id="send" value="Send">
  </div>
</div>
</form>
</body>
</html>







