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
$query=mysql_query("select * from pemesanan where id_pemesanan ='$id' " );
$data=mysql_fetch_array($query);

// jika kd_mhs > 0 / form ubah data
if($id != "" && $proses="edit") 
{ 
  $idpemesanan = $data['id_pemesanan'];
  $nama = $data['nama_pemesan'];
  $alamat = $data['alamat_pemesan'];
  $tgl = $data['tgl_pemesanan'];
  $jml = $data['jml_pemesanan'];
  $status_kirim = $data['status_kirim'];
  $status_terima = $data['status_terima'];
  $aksi="edit";
//form tambah data
}
else
{
  $nama = "";
  $alamat = "";
  $tgl = "";
  $jml = "";
  $status_kirim = "";
  $status_terima = "";
  $aksi="tambah";
  $cari_kd=mysql_query("select max(id_pemesanan) as kode from pemesanan");
    $tm_cari=mysql_fetch_array($cari_kd);
    $kode=substr($tm_cari['kode'],4,10); 
    $tambah=$kode+1;
    if($tambah<10)
    {
        $idpemesanan="PMSN00000".$tambah;

    }
    else
    {
        $idpemesanan="PMSN0000".$tambah;
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
    <form action="operasi-data-pemesanan.php" method="post">
    <input type="hidden" value="<?php echo $idpemesanan; ?>" name="id">
    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>">
    <div class="form-group">
      <label>Nama Pemesan</label>
      <input type="nama" id="nama" class="form-control input-sm" name="nama" value="<?php echo $nama ?>" required>
    </div>
    <div class="form-group">
      <label>Alamat Pemesan</label>
      <input type="text" id="alamat" class="form-control input-sm" name="alamat" value="<?php echo $alamat ?>" required>
    </div>
    <div class="form-group">
      <label>Tanggal Pemesanan</label>
      <input type="date" id="tgl" placeholder="yyyy-mm-dd" class="form-control input-sm" name="tgl" value="<?php echo $tgl ?>" required>
    </div>
    <div class="form-group">
      <label>Jumlah Pemesanan</label>
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