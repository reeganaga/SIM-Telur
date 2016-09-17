<?php
extract($_GET);
include"../koneksi.php";
	$query=mysql_query(" delete from penjualan where id_penjualan='$id' ");
	if ($query) {
		# code...
		header('location: index.php?menu=data_penjualan&sukses='.base64_encode('Data Penjualan Berhasil di Hapus'));
		exit();	
	}
	else
	{
		header('location: index.php?menu=data_penjualan&error='.base64_encode('Data Penjualan Gagal di Hapus'));
		exit();
	}
?>