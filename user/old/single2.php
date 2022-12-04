<?php
 if(!empty($_POST))
{
 	$output  = '';
	$idt	 = IDOtomatis('order_detail');
	$jum	 = mysqli_real_escape_string($koneksi, $_POST["jum"]);  
    $idp  	 = mysqli_real_escape_string($koneksi, $_POST["id_pro"]);  
    $ido  	 = mysqli_real_escape_string($koneksi, $_POST["id_ord"]);  
    $harga 	 = mysqli_real_escape_string($koneksi, $_POST["harga"]);
	$tharga	 = int($jum * $harga);

    $query   = "
    INSERT INTO order_detail (id_detail,id_order,id_produk,jumlah,total_harga,invoice,status) VALUE ('$idt','$ido','$idp',$jum,$tharga,'$ido''$idt''$idp','waiting')
    ";
	
    if(mysqli_query($koneksi, $query))
    {
     $output .= '<label class="text-success">Silahkan Bayar Disini</label>
	 			<a href="bayar.php">klik disini</a>';
     
}
 }
?>