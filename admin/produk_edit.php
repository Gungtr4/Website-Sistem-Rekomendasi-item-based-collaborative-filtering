<form enctype="multipart/form-data" method="post">
	<table align="center"> 
    		<tr>
            	<td align="center">
                	EDIT PRODUK
                 <?php
				 	if(isset($_GET['kode'])){
						$a	='SELECT * FROM produk WHERE id_produk="'.$_GET['kode'].'" LIMIT 1';
						$b	= mysqli_query($koneksi,$a) or die (mysqli_error()); 
						$c	= mysqli_fetch_array($b);
						
						$idp	    = $c['id_produk'];
						$idk	    = $c['id_kategori'];
						$nama		= $c['nama_produk'];
						$gambar	    = $c['gambar'];
						$desk		= $c['deskripsi'];
						$harga		= $c['harga'];
					}
				 ?>
                </td>
            </tr>
     </table>
	 <table align="center" class="customers">   
   			<tr>
            	<th>Id Produk</th>
                <td><input type="text" disabled="" value="<?php echo $idp;?>"/>
                	<input type="hidden" name="idp" value="<?php echo $idp;?>" />
                </td>
            </tr>
            <tr>
            	<th>Id Kategori</th>
                <td>
				<?php
	$qsk = 'select * from kategori';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="idk" class="form-control">
		 	<option>'.$idk.'</option>';
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
            	<th>Nama</th>
                <td><input type="text" name="nama" value="<?php echo $nama;?>">
                </td>
            </tr>
            <tr>
            	<th>Gambar</th>
                <td><input type="file" name="gambar" value="<?php echo($gambar)?>"/></textarea>
                </td>
            </tr>
			<tr>
            	<th>Deskripsi</th>
                <td><textarea name="desk"><?php echo($desk)?></textarea>
                </td>
            </tr>
            <tr>
            	<th>Harga</th>
                <td><input type="number" name="harga" value="<?php echo $harga;?>">
                </td>
            </tr> 	 	
     <table align="center" class="customers">
     		<tr>
            	<td>
                	<input type="submit" name="submit" value="Save"></td
				<td>
                    <a href="index.php?page=produk"><input type="button" value="Cancel"></a>
                </td>
            </tr>
     </table>
     <?php
	 	if(isset($_POST['submit'])){
		$id_p	    = $_POST['idp'];
		$id_k		= $_POST['idk'];
		$nama	    = $_POST['nama'];
		$desk		= $_POST['desk'];
		$file		= $_FILES['gambar']['tmp_name'];
		$harga		= $_POST['harga'];
		if(!empty($file)){
				$gambar1	=$id_p.''.$_FILES['gambar']['name'];
				$lokasi		='../assets/image/'.$gambar1.'';
				move_uploaded_file($file,$lokasi);
			}else{
				$gambar1=$gambar;
			}
			
			$sql	= 'UPDATE produk SET id_kategori="'.$id_k.'",nama_produk="'.$nama.'",
			gambar="'.$gambar1.'",deskripsi="'.$desk.'",harga="'.$harga.'" WHERE id_produk="'.$id_p.'"';
			$query   = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
			if($query){
				echo'
				<script>
					alert("You Edited Successfuly ");
					window.location="index.php?page=produk";
				</script>';
			}
		}
	 ?>
     </table>
</form>