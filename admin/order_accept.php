<table align="center">
	<thead>
    	<th>
         <?php
		 	if(isset($_GET['kode'])){
				$sql	='SELECT * FROM order_detail WHERE id_detail="'.$_GET['kode'].'" LIMIT 1';
				$query	= mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
				$arr	= mysqli_fetch_array($query);
				
				$id		= $arr['id_detail'];
				$stt  	= $arr['status'];
				
			if($stt=='waiting'){
				
				echo'
				Are You Sure Do you Want To Accept this Order?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="id" value="'.$id.'" />
                        <input type="submit" name="accept" value="Yes" />
                        <a href="index.php?page=order"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>				
				';
		 	if(isset($_POST['accept'])){
				$p	= $_POST['id'];
				$q	='UPDATE order_detail SET status="processed" WHERE id_detail="'.$p.'"';
				$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
				if($n){
					echo'
					<script>
						alert("You Accepted Successfuly");
						window.location="index.php?page=order";
					</script>';
				}
			}
				
			}elseif($stt=='Waiting'){
				echo'
					<script>
						alert("This order has not been paid");
						window.location="index.php?page=order";
					</script>';
			}else{
				echo'
					<script>
						alert("This order has been Accepted");
						window.location="index.php?page=order";
					</script>';
			}
		}
		 ?>         
        </th>
    </thead>
</table>