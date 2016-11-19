<?php
	session_start();
	require_once("koneksi.php");
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$cekuser = mysql_query("SELECT * FROM user WHERE username = '$username' and password='$pass' ");
	$hasil = mysql_fetch_array($cekuser);
		// print_r($_SESSION);
	// exit();
	if(mysql_num_rows($cekuser)>0) 
	{
		$_SESSION['id_user'] = $hasil['id_user'];
		$_SESSION['nama_user'] = $hasil['nama_user'];
		$_SESSION['level'] = $hasil['level'];
		header('location:index.php?');	
		// print_r($_SESSION);
	} 
	else 
	{
		header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
        exit();		
	}
?>