<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user-circle"></em>
				</a></li>
				<li class="active">PRODUK</li>
			</ol>
		</div>
<!--/.row--> 
        <div><table class="customers" >
            <tr>
                <th>Id produk</th>
                <th>Id kategori</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php
	$a	 ='SELECT * FROM produk p INNER JOIN kategori k ON p.id_kategori=K.id_kategori ';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_P			= $d['id_produk'];
			$id_k			= $d['id_kategori'];
			$nama_k			= $d['nama_kat'];
			$nama_p		    = $d['nama_produk'];
			$gambar			= $d['gambar'];
			$desk			= $d['deskripsi'];
			$harga			= $d['harga'];
			echo'
				<tr align="center">
					<td>'.$id_P.'</td>
					<td>'.$id_k.'</td>
					<td>'.$nama_k.'</td>
					<td>'.$nama_p.'</td>
					<td><img width="100px" height="100px" src =../assets/image/'.$gambar.'></td>
					<td>'.$desk.'</td>
					<td>'.$harga.'</td>
					<td><a href="index.php?page=produk&form=edit&kode='.$id_P.'">EDIT</td>
					<td><a href="index.php?page=produk&form=hapus&kode='.$id_P.'">DELETE</td>				
				</tr>';
		}
	}
?>

        </table></div>
		<a href="index.php?page=produk&form=tambah"><input type="button" value="Tambah"></a>
	    
<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("produk_tambah.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("produk_edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("produk_hapus.php");
}
?>
</div>