<?php
	session_start();
	if ( isset($_SESSION['level']) && $_SESSION['level'] != '') 
	{
		$halaman = $_SESSION['level'];

    	header('location:'. $halaman.'/index.php?menu=beranda');
    	exit();
	}
	else
	{
		header('location:order.php');
		exit();
	}
?>