<?php
extract($_GET);
include"../koneksi.php";
	$query=mysql_query(" delete from produksi where id_produksi='$id' ");
	if ($query) {
		# code...
		header('location: index.php?menu=data_produksi&sukses='.base64_encode('Data Produksi Berhasil di Hapus'));
		exit();	
	}
	else
	{
		header('location: index.php?menu=data_produksi&error='.base64_encode('Data Produksi Gagal di Hapus'));
		exit();
	}
?>