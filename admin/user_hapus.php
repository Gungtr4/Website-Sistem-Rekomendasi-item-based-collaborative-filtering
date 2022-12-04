<table align="center">
	<thead>
    	<th>
         <?php
		 	if(isset($_GET['kode'])){
				$sql	='SELECT * FROM user WHERE no_ktp="'.$_GET['kode'].'" LIMIT 1';
				$query	= mysqli_query($koneksi,$sql) or die (mysqli_error());
				$arr	= mysqli_fetch_array($query);
				
				$ktp	= $arr['no_ktp'];
				$username  = $arr['username'];
				$role		    = $arr['role'];
			}
		 ?>
         Are You Sure Do you Want To Delete "<?php echo $username;?>" who is an "<?php echo  $role;?> "?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="ktp" value="<?php echo $ktp;?>" />
                        <input type="submit" name="delete" value="Yes" />
                        <a href="index.php?page=user"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$p	= $_POST['ktp'];
				$q	='DELETE FROM user WHERE no_ktp="'.$ktp.'"';
				$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
				if($n){
					echo'
					<script>
						alert("You Deleted Successfuly");
						window.location="index.php?page=user";
					</script>';
				}
			}
		 ?>
        </th>
    </thead>
</table>