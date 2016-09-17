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
if($id != "" && $proses="edit") 
{ 
	$idprod = $data['id_produksi'];
	$tgl = $data['tgl_produksi'];
	$jml = $data['jml_produksi'];
	$aksi="edit";
//form tambah data
}
else
{
	$tgl ="";
	$jml ="";
	$aksi="tambah";
	$cari_kd=mysql_query("select max(id_produksi) as kode from produksi");
    $tm_cari=mysql_fetch_array($cari_kd);
    $kode=substr($tm_cari['kode'],4,10); 
    $tambah=$kode+1;
    if($tambah<10)
    {
        $idprod="PROD00000".$tambah;

    }
    else
    {
        $idprod="PROD0000".$tambah;
    }
}

?>

<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Data Produksi</h3>
              <!-- tools box -->
  </div>
  <div class="box-body">
  	<form action="proses_data_produksi.php" method="post">
  	<input type="hidden" value="<?php echo $idprod; ?>" name="id">
  	<input type="hidden" name="aksi" value="<?php echo $aksi; ?>">
    <div class="form-group">
      <label>Tanggal Produksi</label>
      <input type="text" id="tgl" class="form-control input-sm" name="tgl" value="<?php echo $tgl ?>" required>

    </div>
    <div class="form-group">
      <label>Jumlah Produksi</label>
      <input type="number" id="jml" class="form-control input-sm" name="jml" value="<?php echo $jml ?>" required>
    </div>
    <div class="form-group">
      <label>Umur Ayam</label>
      <input type="number" id="jml" class="form-control input-sm" name="umur" value="<?php echo $jml ?>" required>
    </div>
    <div class="form-group">
      <label>Populasi Ayam</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i>ekor</i>
        </div>
        <input type="number" id="jml" class="form-control input-sm" name="populasi" value="<?php echo $jml ?>" required>
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







