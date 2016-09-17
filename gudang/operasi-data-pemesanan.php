<?php
extract($_POST);
include '../koneksi.php';
if ($aksi=="tambah") 
{
  # code...
  $query=mysql_query("insert into pemesanan values ('$id','$nama','$alamat','$tgl','$jml','n','n') ");
  if ($query) {
    # code...
    header('location: index.php?menu=data_pemesanan&sukses='.base64_encode('Data Pemesanan Berhasil di Simpan'));
    exit(); 
  }
  else
  {
    header('location: index.php?menu=data_pemesanan&error='.base64_encode('Data Pemesanan Gagal di Simpan'));
    exit();
  }
}
elseif ($aksi=="edit") 
{
  # code...
  $query=mysql_query("update pemesanan set id_pemesanan='$id', nama_pemesan='$nama', alamat_pemesan='$alamat', tgl_pemesanan='$tgl', jml_pemesanan='$jml' where id_pemesanan='$id' ");
  if ($query) {
    # code...
    header('location: index.php?menu=data_pemesanan&sukses='.base64_encode('Data Pemesanan Berhasil di Update'));
    exit(); 
  }
  else
  {
    header('location: index.php?menu=data_pemesanan&error='.base64_encode('Data Pemesanan Gagal di Update'));
    exit();
  }
}
?>