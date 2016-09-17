<?php
extract($_POST);
include '../koneksi.php';
if ($aksi=="tambah") 
{
  # code...
    $query=mysql_query("insert into harga values ('null','$jml_per_peti','$harga') ");
    if ($query) {
    # code...
      header('location: index.php?menu=data_harga&sukses='.base64_encode('Data Harga Berhasil di Simpan'));
      exit(); 
    }
    else
    {
      header('location: index.php?menu=data_harga&error='.base64_encode('Data Harga Gagal di Simpan'));
      exit();
    }
}
elseif ($aksi=="edit") 
{
  # code...
  $query=mysql_query("update harga set jml_per_peti='$jml_per_peti', harga_jual='$harga' where id_harga='$id' ");
  if ($query) {
    # code...
    header('location: index.php?menu=data_harga&sukses='.base64_encode('Data Harga Berhasil di Update'));
    exit(); 
  }
  else
  {
    header('location: index.php?menu=data_harga&error='.base64_encode('Data Harga Gagal di Update'));
    exit();
  }
}
?>