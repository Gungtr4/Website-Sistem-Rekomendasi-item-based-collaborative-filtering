<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user-circle"></em>
				</a></li>
				<li class="active">ORDER</li>
			</ol>
		</div>
<!--/.row--> 
        <div><table class="customers" >
            <tr align="center">
                <th>Id Detail</th>
                <th>Id Order</th>
                <th>No KTP</th>
                <th>Nama Customer</th>
                <th>Id Produk</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
				<th>Harga</th>         
                <th>Status</th>
                <th>Accept</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php
	$a	 ='SELECT * 
		FROM (((order_detail d 
		INNER JOIN `order` o ON o.id_order=d.id_order) 
		INNER JOIN produk p ON p.id_produk=d.id_produk)
		INNER JOIN `user` u ON u.no_ktp = o.no_ktp)';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error($koneksi));
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_d			= $d['id_detail'];
			$id_o			= $d['id_order'];
			$id_P			= $d['id_produk'];
		
			$ktp			= $d['no_ktp'];
			$nama_u			= $d['nama'];
			
			$nama_p		    = $d['nama_produk'];
			$jumlah			= $d['jumlah'];
			$harga			= $d['total_harga'];
			$status			= $d['status'];
			
			echo'
				<tr align="center">
					<td>'.$id_d.'</td>
					<td>'.$id_o.'</td>
					<td>'.$ktp.'</td>
					<td>'.$nama_u.'</td>
					<td>'.$id_P.'</td>
					<td>'.$nama_p.'</td>
					<td>'.$jumlah.'</td>
					<td>'.$harga.'</td>
					<td>'.$status.'</td>
					<td><a href="index.php?page=order&form=accept&kode='.$id_d.'">ACCEPT</td>	
					<td><a href="index.php?page=order&form=edit&kode='.$id_d.'">EDIT</td>
					<td><a href="index.php?page=order&form=hapus&kode='.$id_d.'">DELETE</td>
								
				</tr>';
		}
	}
?>

        </table></div>
	    
<?php
if(isset($_GET['form']) && $_GET['form']=='accept'){
	include("order_accept.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("order_edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("order_hapus.php");
}
?>
</div>