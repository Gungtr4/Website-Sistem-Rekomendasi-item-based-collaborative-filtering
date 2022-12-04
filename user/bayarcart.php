<?php
session_start();
if (!isset($_SESSION['order'])){
	header("location:cancel.php");
}else {
include("../koneksi.php");
		
	$sql1	='UPDATE order_detail d
		INNER JOIN `order` o ON o.id_order=d.id_order
		SET status="waiting"
		WHERE o.no_ktp="'.$_GET['user'].'" AND o.id_order="'.$_SESSION['order'].'"
		';
	$qry	= mysqli_query($koneksi,$sql1) or die (mysqli_error($koneksi)); 
		if($qry){
			
				echo'
				<script>
					alert("Proses Pembayaran ");
					window.location="bayar.php?order='.$_SESSION['order'].'";
				</script>';
			unset($_SESSION['order']);
			}else{
				echo'
					<script>
						alert("Transaksi Gagal");
						window.location="cancel.php?kode='.$_GET['kode'].'&order='.$_GET['order'].'";
					</script>';
		}	}	
?>