<table align="center">
	<thead>
    	<th>
         <?php
		 	if(isset($_GET['kode'])){
				$sql	='SELECT * FROM order_detail WHERE id_detail="'.$_GET['kode'].'" LIMIT 1';
				$query	= mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
				$arr	= mysqli_fetch_array($query);
				
				$id		= $arr['id_detail'];
			}
		 ?>
         Are You Sure Do you Want To Delete Order with id "<?php echo  $id;?> "?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="id" value="<?php echo $id;?>" />
                        <input type="submit" name="delete" value="Yes" />
                        <a href="index.php?page=order"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$p	= $_POST['id'];
				$q	='DELETE FROM order_detail WHERE id_detail="'.$p.'"';
				$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
				if($n){
					echo'
					<script>
						alert("You Deleted Successfuly");
						window.location="index.php?page=order";
					</script>';
				}
			}
		 ?>
        </th>
    </thead>
</table>