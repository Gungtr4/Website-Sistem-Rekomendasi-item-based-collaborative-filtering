<?php
session_start();
if (!isset($_SESSION['user']) && $_SESSION['role']!='user'){
	header("location:login.php");}
	else {
		include("../koneksi.php");
		include("../function.php");
	}
		$q			='DELETE FROM order_detail WHERE id_detail="'.$_GET['kode'].'" LIMIT 1';
		$n			= mysqli_query($koneksi,$q) or die (mysqli_error($koneksi));
				if($n){
					echo'
					<script>
						alert("Berhasil Dihapus");
						window.location="indexU.php?page=cart";
					</script>';
				}
		 ?>