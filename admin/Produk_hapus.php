<table align="center">
	<thead>
    	<th>
         <?php
		 	if(isset($_GET['kode'])){
				$sql	='SELECT * FROM produk WHERE id_produk="'.$_GET['kode'].'" LIMIT 1';
				$query	= mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
				$arr	= mysqli_fetch_array($query);
				
				$id		= $arr['id_produk'];
				$nama  	= $arr['nama_produk'];
			}
		 ?>
         Are You Sure Do you Want To Delete "<?php echo $nama;?>" with id "<?php echo  $id;?> "?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="id" value="<?php echo $id;?>" />
                        <input type="submit" name="delete" value="Yes" />
                        <a href="index.php?page=produk"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$p	= $_POST['id'];
				$q	='DELETE FROM produk WHERE id_produk="'.$p.'"';
				$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
				if($n){
					echo'
					<script>
						alert("You Deleted Successfuly");
						window.location="index.php?page=produk";
					</script>';
				}
			}
		 ?>
        </th>
    </thead>
</table>