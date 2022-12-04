<?php
session_start();
include("../koneksi.php");
if(isset($_GET['kode'])){
	$query 	= mysqli_query($koneksi, "SELECT MAX(id_order) as idTerbesar FROM `order`");
	$data 	= mysqli_fetch_array($query);
	$kodeOrder = $data['idTerbesar'];

	$urutan = (int) substr($kodeOrder, 4);
	$urutan	++;

	$huruf 			= "ORD";
	$kodeOrder 		= $huruf . sprintf("%04s", $urutan);
	$LastIDorder 	= $kodeOrder;
	$mydate			= getdate(date("U"));
	$curent 		= $mydate['mday'].'-'.$mydate['mon'].'-'.$mydate['year'];
	$sql_or	= 'insert into `order`(id_order,no_ktp,tgl_pesan) value ("'.$LastIDorder.'","'.$_SESSION['user'].'","'.$curent.'")';
	$ins   	= mysqli_query($koneksi,$sql_or) or die (mysqli_error($koneksi));
		
	if($ins){
		session_start();
		$_SESSION['order'] = $LastIDorder;
			echo'
				<script>
					alert("Mohon Tunggu Sebentar");
					window.location="cart.php?kode='.$_GET['kode'].'";
				</script>';
	}
}
?>