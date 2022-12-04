<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td><h3>ADD PRODUCT</h3></td>
    </tr>
</table>
<?php
$LastID 	= IDOtomatis("produk");
	?>
<table align="center" class="customers" border="0">
	<tr>
    	<th>Id Produk</th>
        <td><input type="text" disabled="" value="<?php echo $LastID;?>"/>
            <input type="hidden" name="id_p" value="<?php echo $LastID;?>" />
        </td>
    </tr>
    <tr>
    	<th>Kategori</th>
        <td><?php
	$qsk = 'select * from kategori';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="id_k" class="form-control">
		 	<option>Kategori		:</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_kategori'];
				$kname = $rsk['nama_kat'];
				echo'<option value="'.$kcode.'">'.$kcode.'&nbsp;| &nbsp;'.$kname.'</option>';	
				}
			}
			echo "</select>"
			?>
			</td>
    </tr>
    <tr>
    	<th>Nama Produk</th>
        <td><input type="text" name="nama" required="required" /></td>
    </tr> 
	<tr>
    	<th>Gambar</th>
        <td><input type="file" name="gambar" required="required" /></td>
    </tr>
    <tr>
    	<th>Deskripsi</th>
        <td><textarea name="desk"></textarea></td>
    </tr>
    <tr>
    	<th>Harga</th>
        <td><input type="number" name="harga" required="required" /></td>
    </tr>
	<tr>
    	<td colspan="2"><input type="submit" name="submit" value="Save" />
        	<a href="index.php?page=user"><input style="color: black" type="button" value="Cancel" /></a></td>
    </tr>
<?php
	if(isset($_POST['submit'])){
		$id_p	    = $_POST['id_p'];
		$id_k		= $_POST['id_k'];
		$nama	    = $_POST['nama'];
		$desk		= $_POST['desk'];
		$file		= $_FILES['gambar']['tmp_name'];
		$harga		= $_POST['harga'];
		if(!empty($file)){
				$gambar	=$id_p.''.$_FILES['gambar']['name'];
				$lokasi	='../assets/image/'.$gambar.'';
				move_uploaded_file($file,$lokasi);
			}else{
				$gambar='';
			}
		$sql	     ='insert into produk(id_produk,id_kategori,nama_produk,gambar,deskripsi,harga)value ("'.$id_p.'","'.$id_k.'","'.$nama.'","'.$gambar.'","'.$desk.'","'.$harga.'")';
		$query 	    =mysqli_query($koneksi,$sql) or die (mysqli_error());
		if($query){
			echo'
			<script>
				alert("You Successfuly Added Product Data");
				window.location="index.php?page=produk";
			</script>';
		}
	}
?>
</table>
</form>