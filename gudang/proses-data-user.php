<?php
extract($_POST);
include '../koneksi.php';

  # code...
  $query=mysql_query("update user set id_user='$id', nama_user='$nama', username='$username', password='$password', level='$lev' where id_user='$id' ");
  if ($query) {
    # code...
    header('location: index.php?menu=beranda&sukses='.base64_encode('Data User Berhasil di Update'));
    exit(); 
  }
  else
  {
    header('location: index.php?menu=beranda&error='.base64_encode('Data User Gagal di Update'));
    exit();
  }

?>