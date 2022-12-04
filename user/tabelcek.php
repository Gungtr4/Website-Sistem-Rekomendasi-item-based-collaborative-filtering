<!-- <head>
	<title>Tri Agung Busana</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <!-- Google Fonts 
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
	<!-- CSS 
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/style.css">
	<link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	 <!-- Font Awesome 
    <script src="https://kit.fontawesome.com/b48af1685d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
<style>
tr.hide-table-padding td {
  padding: 0;
}

.expand-button {
	position: relative;
}

.accordion-toggle .expand-button:after
{
  position: absolute;
  left:.75rem;
  top: 50%;
  transform: translate(0, -50%);
  content: '-';
}
.accordion-toggle.collapsed .expand-button:after
{
  content: '+';
}	
	</style>
</head>
<?php
include("../koneksi.php");
	$sql	='SELECT * 
			FROM (((order_detail d 
			INNER JOIN `order` o ON o.id_order=d.id_order) 
			INNER JOIN produk p ON p.id_produk=d.id_produk)
			INNER JOIN `user` u ON u.no_ktp = o.no_ktp)
			WHERE u.no_ktp="'.$_SESSION['user'].'" AND d.status<>"Accepted"';
	$qry	= mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
	$no		= 1;
		echo'      
		<div class="table-responsive">
			  <table class="table" >
				<thead>
				  <tr>
					<th scope="col">No</th>
					<th scope="col">Detail</th>
					<th scope="col">Expand</th>
				  </tr>
				</thead>
				<tbody>';
						while($d=mysqli_fetch_array($qry))
						{
						$id_d			= $d['id_detail'];
						$id_o			= $d['id_order'];
						$id_P			= $d['id_produk'];

						$ktp			= $d['no_ktp'];
						$nama_u			= $d['nama'];

						$nama_p		    = $d['nama_produk'];
						$harga_p		= $d['harga'];
						$jumlah			= $d['jumlah'];
						$harga			= $d['total_harga'];
						$status			= $d['status'];
				echo'
				  <tr class="accordion-toggle collapsed" id="accordion'.$no.'" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
			<td>'.$no.'</td>
			<td>'.$nama_p.'</td>
			<td class="expand-button"></td>

			</tr>
			<tr class="hide-table-padding">
			<td></td>
			<td colspan="3">
			<div id="collapseOne" class="collapse in p-3">
			  <div class="row">
				<div class="col-2">Invoice</div>
				<div class="col-6"><input type="text" disabled="" value="'.$id_o.'"/></div>
			  </div>
			  <div class="row">
				<div class="col-2">No KTP</div>
				<div class="col-6"><input type="text" disabled="" value="'.$ktp.'"></div>
			  </div>
			  <div class="row">
				<div class="col-2">Nama Produk</div>
				<div class="col-6"><input type="text" disabled="" value="'.$nama_p.'"/></div>
			  </div>
			  <div class="row">
				<div class="col-2">Nama Customer</div>
				<div class="col-6"><input type="text" disabled="" value="'.$nama_u.'"></div>
			  </div>
			  <div class="row">
				<div class="col-2">Jumlah Pembelian</div>
				<div class="col-6"><input type="text" disabled="" value="'.$jumlah.'"/></div>
			  </div>
			  <div class="row">
				<div class="col-2">Status</div>
				<div class="col-6"><input type="text" disabled="" value="'.$status.'"/></div>
			  </div>
			  <div class="row">
				<div class="col-8 float-right"><a href="indexU.php?page=cek&form=tambah&idp='.$id_P.'&idt='.$id_d.'"><button class="btn btn-primary" type="button">Terima Pesanan</button></a>
			  </div>
			</div></td>
			</tr>
';
	$no++;}

?>
<?php
if(isset($_GET['form']) && $_GET['form']=='tambah' && $_GET['idp'] && $_GET['idt']){
	include("rev_tambah.php");
}
	?>
<tr>
<th colspan="3"><a href="indexU.php?page=cek">Back</a></th>
</tr>
 </tbody>
  </table>
</div>
<!--
<script src="../assets/js/jquery.js"></script> 
	<script src="../assets/js/popper.js"></script> 
	<script src="../assets/js/bootstrap.js"></script>-->