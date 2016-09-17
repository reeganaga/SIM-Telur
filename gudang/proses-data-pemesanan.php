<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Data Pemesanan</title>
</head>

<body>
<?php
include "../koneksi.php";
extract($_GET);
// query untuk menampilkan mahasiswa berdasarkan id_user
$query=mysql_fetch_array(mysql_query("select * from pemesanan where id_pemesanan ='$id' " ));
$query1=mysql_fetch_array(mysql_query("select ((select sum(jml_terima) from produksi) - (select sum(jml_penjualan) from penjualan)) as Persediaan"));
$jumlah_pemesanan=intval($query['jml_pemesanan']);
$stok=intval($query1['Persediaan']);
if ($jumlah_pemesanan<=$stok) {
  # code...
  $kirim=mysql_query("update pemesanan set status_kirim='y' where id_pemesanan='$id' ");
  if ($kirim) {
    # code...
    header('location: index.php?menu=kirim_pesanan&jml='.$query['jml_pemesanan']);
    exit();
  } 
  else
  {
    header('location: index.php?menu=data_pemesanan&error='.base64_encode('Tidak Terkirim'));
    exit();
  }
}
else
{
  header('location: index.php?menu=data_pemesanan&error='.base64_encode('Stok Telur Tidak Memenuhi'));
  exit(); 
}
?>
</body>
</html>