<?php
$host		='localhost';
$db			='triagungbusana';
$usname		='root';
$pass		='';

$koneksi	=mysqli_connect($host,$usname,$pass,$db);
if    (!$koneksi){
	die("connection Failed". mysqli_connect_error());
	
}
?>