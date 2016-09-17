<?php
extract($_POST);
include '../koneksi.php';
if ($aksi=="tambah") 
{
  # code...
  $jml1=intval($jml);
  $data=mysql_fetch_array(mysql_query("select ((select sum(jml_terima) from produksi) - (select sum(jml_penjualan) from penjualan)) as Persediaan"));
  if ($data['Persediaan']>=$jml1) 
  {
    # code...
    $query=mysql_query("insert into penjualan values ('$id','$tgl','$jml1',$total) ");
    if ($query) {
    # code...
      header('location: index.php?menu=data_penjualan&sukses='.base64_encode('Data Penjualan Berhasil di Simpan'));
      exit(); 
    }
    else
    {
      header('location: index.php?menu=data_penjualan&error='.base64_encode('Data Penjualan Gagal di Simpan'));
      exit();
    }
  }
  else
  {
    header('location: index.php?menu=data_penjualan&error='.base64_encode('Persediaan Telur Tidak Memenuhi'));
    exit();
  }
}
elseif ($aksi=="edit") 
{
  # code...
  $query=mysql_query("update penjualan set id_penjualan='$id', tgl_penjualan='$tgl', jml_penjualan='$jml' where id_penjualan='$id' ");
  if ($query) {
    # code...
    header('location: index.php?menu=data_penjualan&sukses='.base64_encode('Data Penjualan Berhasil di Update'));
    exit(); 
  }
  else
  {
    header('location: index.php?menu=data_penjualan&error='.base64_encode('Data Penjualan Gagal di Update'));
    exit();
  }
}
?>