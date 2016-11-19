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
$query=mysql_query("select * from harga where id_harga ='$id' " );
$data=mysql_fetch_array($query);

// jika kd_mhs > 0 / form ubah data
if($id != "" && $proses="edit") 
{ 
  $id_harga = $data['id_harga'];
  $jml_per_peti = $data['jml_per_peti'];
  $harga = $data['harga_jual'];
  $aksi="edit";
//form tambah data
}
else
{
  $jml_per_peti ="";
  $harga ="";
  $aksi="tambah";
  $id_harga="";
  // $cari_kd=mysql_query("select max(id_penjualan) as kode from penjualan");
  //   $tm_cari=mysql_fetch_array($cari_kd);
  //   $kode=substr($tm_cari['kode'],4,10); 
  //   $tambah=$kode+1;
  //   if($tambah<10)
  //   {
  //       $idpenjualan="PENJ00000".$tambah;

  //   }
  //   else
  //   {
  //       $idpenjualan="PENJ0000".$tambah;
  //   }
}

?>

<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Form Data Penjualan</h3>
              <!-- tools box -->
  </div>
  <div class="box-body">
    <form action="proses-data-harga.php" method="post">
    <input type="hidden" value="<?php echo $id_harga; ?>" name="id">
    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>">
    <div class="form-group">
      <label>Jumlah Per Peti</label>
      <div class="input-group">
        <input type="number" class="form-control input-sm" name="jml_per_peti" value="<?php echo $jml_per_peti ?>" required>
        <div class="input-group-addon">
          <i>kg</i>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label>Harga</label>
      <div class="input-group">
        <div class="input-group-addon">
          <b>Rp</b>
        </div>
        <input type="number" id="jml" class="form-control input-sm" name="harga" value="<?php echo $harga ?>" required>
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