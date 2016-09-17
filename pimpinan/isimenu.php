<?php
extract($_GET);
if(isset($menu))
{
	if($menu=="beranda"){include "beranda.php";}
	elseif($menu=="edit_user"){include"form-data-user.php";}
	elseif($menu=="data_stok"){include"data_stok.php";}
	elseif($menu=="laporan-data-produksi"){include"laporan-data-produksi.php";}
	elseif($menu=="laporan-data-penjualan"){include"laporan-data-penjualan.php";}
	elseif($menu=="laporan-data-stok"){include"laporan-data-stok.php";}
}
?>