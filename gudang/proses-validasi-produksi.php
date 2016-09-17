<?php
extract($_POST);
include '../koneksi.php';
$jmlproduksi=intval($jml);
$jmltrm=intval($jmlterima);
if ($jmltrm<=$jmlproduksi) {
  # code...
  $query=mysql_query("update produksi set id_produksi='$id', tgl_produksi='$tgl', jml_produksi='$jml', status_terima='$status', jml_terima='$jmlterima' where id_produksi='$id' ");
  if ($query) {
    # code...
    header('location: index.php?menu=beranda&sukses='.base64_encode('Data Produksi Berhasil di Validasi'));
    exit(); 
  }
  else
  {
    header('location: index.php?menu=tampil_produksi&id='.$id.'&error='.base64_encode('Data Produksi Gagal di Validasi'));
    exit();
  }
}
else
{
  header('location: index.php?menu=tampil_produksi&id='.$id.'&error='.base64_encode('Jumlah Terima Tidak Boleh Lebih dari Jumlah Produksi'));
  exit();
}
?>