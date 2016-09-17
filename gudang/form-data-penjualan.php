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
$query=mysql_query("select * from penjualan where id_penjualan ='$id' " );
$data=mysql_fetch_array($query);

// jika kd_mhs > 0 / form ubah data
if($id != "" && $proses="edit") 
{ 
  $idpenjualan = $data['id_penjualan'];
  $tgl = $data['tgl_penjualan'];
  $jml = $data['jml_penjualan'];
  $aksi="edit";
//form tambah data
}
else
{
  $tgl ="";
  $jml ="";
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
}

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
    <div class="form-group">
      <label>Tanggal Penjualan</label>
      <input type="date" id="tgl" class="form-control input-sm" name="tgl" value="<?php echo $tgl ?>" required>
    </div>
    <div class="form-group">
      <label>Jumlah Penjualan</label>
      <input type="number" id="jml" class="form-control input-sm" name="jml" value="<?php echo $jml ?>" required>
    </div>
  </div>
  <div class="box-footer clearfix">
    <input type="submit" class="pull-right btn btn-info" id="send" value="Send">
  </div>
</div>
</form>
</body>
</html>