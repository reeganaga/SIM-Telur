<?php
extract($_GET);
if(isset($menu))
{
	if($menu=="beranda"){include "beranda.php";}
	elseif($menu=="data_stok"){include"data_stok.php";}
	elseif($menu=="input_data_stok"){include"input_data_stok.php";}
	elseif($menu=="data_pemesanan"){include "data_pemesanan.php";}
	elseif($menu=="data_order_produksi"){include "data_order_produksi.php";}
	elseif($menu=="data_penjualan"){include "data_penjualan.php";}
	elseif($menu=="form-data-stok"){include"form-data-stok.php";}
	elseif($menu=="proses-data-stok"){include"proses-data-stok.php";}
	elseif($menu=="proses-data-pemesanan"){include"proses-data-pemesanan.php";}
	elseif($menu=="form-data-order-produksi"){include"form-data-order-produksi.php";}
	elseif($menu=="proses-data-order-produksi"){include"proses-data-order-produksi.php";}
	elseif($menu=="form-data-penjualan"){include"form-data-penjualan.php";}
	elseif($menu=="proses-data-penjualan"){include"proses-data-penjualan.php";}
	elseif($menu=="edit_user"){include"form-data-user.php";}
	elseif($menu=="kirim_pesanan"){include"kirim_pesanan.php";}
	elseif($menu=="tampil_pemesanan"){include"tampil_pemesanan.php";}
	elseif($menu=="tampil_produksi"){include"tampil_produksi.php";}
	elseif($menu=="form-validasi-produksi"){include"form-validasi-produksi.php";}
	elseif($menu=="form-data-pemesanan"){include"form-data-pemesanan.php";}
	elseif($menu=="pesan-pemesanan"){include"pesan-pemesanan.php";}
	elseif($menu=="data_harga"){include"data_harga.php";}
	elseif($menu=="form-data-harga"){include"form-data-harga.php";}
}
?>