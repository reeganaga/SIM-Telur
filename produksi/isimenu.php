<?php
extract($_GET);
if(isset($menu))
{
	if($menu=="beranda"){include "beranda.php";}
	elseif($menu=="data_produksi"){include"data_produksi.php";}
	elseif($menu=="form_produksi"){include"form_produksi.php";}
	elseif($menu=="proses_data_produksi"){include"proses_data_produksi.php";}
	elseif($menu=="edit_user"){include"form-data-user.php";}
}
?>