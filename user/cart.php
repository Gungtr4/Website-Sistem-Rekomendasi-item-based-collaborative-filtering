<head>
    <title>Pembelian</title>

    <!-- Meta-Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

    <!-- fontawesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Mukta:300,400,500" rel="stylesheet">

</head>
<!-- //Head -->

<!-- Body -->
<body>

    <section class="main">

        <div class="bottom-grid">
        </div>
        <div class="content-w3ls">
			<div class="logo">
                <center><h1> Berapa Banyak Pesanan Anda </h1></center>
            </div>
            <div class="content-bottom">
                <form method="post" enctype="multipart/form-data">
                    <div class="field-group">
                        <div class="wthree-field">
                            <input type="text" value="" placeholder="jumlah.." name="jumlah">
                        </div>
                    </div>
                    
                    <div class="wthree-field">
                        <input type="submit" class="btn" value="Cek Order" name="submit">
                    </div>
    
                    <ul class="list-login-bottom">
                        <li class="">
                            <a href="cancel.php?kode=<?php echo $_GET['kode']?>" class="text-right">Back Home</a>
                        </li>
                        <li class="clearfix"></li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
</body>
<!-- //Body -->

</html>
<?php
session_start();
if (!isset($_SESSION['order'])){
	header("location:order_c.php?kode=".$_GET['kode']."");
}else {
include("../koneksi.php");
if(isset($_POST['submit'])){
		$jumlah	    = $_POST['jumlah'];
		
	$sql1	='SELECT * FROM produk WHERE id_produk="'.$_GET['kode'].'" LIMIT 1';
	$qry	= mysqli_query($koneksi,$sql1) or die (mysqli_error($koneksi)); 
	$arr	= mysqli_fetch_array($qry);
			
		$id_p	    = $arr['id_produk'];
		$harga		= $arr['harga'];
		$ido		= $_SESSION['order'];
	
	$query 	= mysqli_query($koneksi, "SELECT MAX(id_detail) as idTerbesar FROM order_detail`");
	$data 	= mysqli_fetch_array($query);
	$kodeOrder = $data['idTerbesar'];

	$urutan = (int) substr($kodeOrder, 4);
	$urutan	++;

	$huruf 			= "DET";
	$kodeOrder 		= $huruf . sprintf("%04s", $urutan);
	$idt			= $kodeOrder;
	
		$mydate		= getdate(date("U"));
		$invoice	= $_SESSION['user'].''.$id_p.'-'.$mydate['mday'].'-'.$mydate['mon'].'-'.$mydate['year'];
		$tharga		=(int)$jumlah * (int)$harga;
	
	$sql	= 'INSERT INTO order_detail (id_detail,id_order,id_produk,jumlah,total_harga,status) VALUES ("'.$idt.'","'.$ido.'","'.$id_p.'","'.$jumlah.'","'.$tharga.'","cart")';	
	$ins   = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
		if($ins){
				echo'
				<script>
					alert("Berhasil Menambahkan,Silahkan Cek Di Halaman Cart ");
					window.location="indexU.php?page=shop";
				</script>';
			}else{
				echo'
					<script>
						alert("Transaksi Gagal");
						window.location="cancel.php?kode='.$_GET['kode'].'";
					</script>';
		}
}	
	}	
?>