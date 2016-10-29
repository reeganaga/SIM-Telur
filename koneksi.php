<?php
$hostname="localhost";
$user="root";
$pass="root";
$db="inv";

$koneksi=mysql_connect($hostname, $user, $pass);
$koneksi_db=mysql_select_db($db);
?>