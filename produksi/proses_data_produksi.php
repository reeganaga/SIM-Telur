<?php
extract($_POST);
include '../koneksi.php';
if ($aksi=="tambah") 
{
	# code...
	$query=mysql_query("insert into produksi values ('$id','$tgl','$jml','n','0','$umur','$populasi') ");
	if ($query) {
		# code...
		header('location: index.php?menu=data_produksi&sukses='.base64_encode('Data Produksi Berhasil di Simpan'));
		exit();	
	}
	else
	{
		header('location: index.php?menu=data_produksi&error='.base64_encode('Data Produksi Gagal di Simpan'));
		exit();
	}
}
elseif ($aksi=="edit") 
{
	# code...
	$query=mysql_query("update produksi set id_produksi='$id', tgl_produksi='$tgl', jml_produksi='$jml', status_terima='n', jml_terima='0' where id_produksi='$id' ");
	if ($query) {
		# code...
		header('location: index.php?menu=data_produksi&sukses='.base64_encode('Data Produksi Berhasil di Update'));
		exit();	
	}
	else
	{
		header('location: index.php?menu=data_produksi&error='.base64_encode('Data Produksi Gagal di Update'));
		exit();
	}
}
?>