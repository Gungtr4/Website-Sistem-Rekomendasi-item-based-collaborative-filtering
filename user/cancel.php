<?php
session_start();
if (!isset($_SESSION['user']) && $_SESSION['role']!='user'){
	header("location:login.php");}
	else {
		include("../koneksi.php");
		include("../function.php");
	}
		$q			='DELETE FROM `order` WHERE id_order="'.$_GET['order'].'"';
		$n			= mysqli_query($koneksi,$q) or die (mysqli_error($koneksi));
				if($n){
					echo'
					<script>
						window.location="indexU.php?page=shop";
					</script>';
				}
		 ?>