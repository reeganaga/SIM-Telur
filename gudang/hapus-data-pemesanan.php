<?php
extract($_GET);
include"../koneksi.php";
	$query=mysql_query(" delete from pemesanan where id_pemesanan='$id' ");
	if ($query) {
		# code...
		header('location: index.php?menu=data_pemesanan&sukses='.base64_encode('Data Pemesanan Berhasil di Hapus'));
		exit();	
	}
	else
	{
		header('location: index.php?menu=data_pemesanan&error='.base64_encode('Data Pemesanan Gagal di Hapus'));
		exit();
	}
?>