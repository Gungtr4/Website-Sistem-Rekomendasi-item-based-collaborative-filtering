<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td><h3>REVIEW</h3></td>
    </tr>
</table>
<table align="center" class="customers" border="0">
	<tr>	
	<td><input type="text" name="idr" value="<?php $id_rev = IDOtomatis('review'); echo $id_rev ;?>" />
	</td>
    </tr>
    <tr>	
	<td><input type="hidden" name="ktp" value="<?php echo $_SESSION['user'] ;?>" />
	</td>
    </tr> 
	<tr	
	<td><input type="hidden" name="id_p" value="<?php echo $_GET['idp'];?>" />
	</td>
    </tr>
	<tr>
    	<th>Score</th>
        <td><input type="text" name="score" placeholder="1-5" required="required" /></td>
    </tr>
    <tr>
    	<th>Review</th>
        <td><textarea name="rev" style="min-width: 216px "></textarea></td>
    </tr>
	<tr>
		<td ><input type="submit" class="btn btn-primary" name="submit" value="Save" /></td>
        <td><a href="indexU.php?page=review"><input style="color: black" class="btn btn-primary" type="button" value="Cancel" /></a></td>
    </tr>
<?php
	$sqlcheck 			= 'SELECT * FROM review WHERE id_produk="'.$_GET['idp'].'" AND no_ktp="'.$_SESSION['user'].'"';
	$querycheck 	    = mysqli_query($koneksi,$sqlcheck) or die (mysqli_error($koneksi));
	$check	 				= mysqli_num_rows($querycheck);
	if($check ==0){
		if(isset($_POST['submit'])){
			$id_r	    = $_POST['idr'];
			$id_p	    = $_POST['id_p'];
			$ktp	    = $_POST['ktp'];
			$desk		= $_POST['rev'];
			$sco		= $_POST['score'];
			

			$sql2	     ='INSERT INTO review (id_review,no_ktp,id_produk,score,review) VALUE ("'.$id_r.'","'.$ktp.'","'.$id_p.'","'.$sco.'","'.$desk.'")';
			$query 	     = mysqli_query($koneksi,$sql2) or die (mysqli_error($koneksi));
			if($query){
				echo'
				<script>
					alert("Pesanan telah diterima dan terima kasih atas reviewnya");
					window.location="indexU.php?page=cek";
				</script>';
			}
		}
	}elseif($check !=0){
		if(isset($_POST['submit'])){
			$id_r	    = $_POST['idr'];
			$id_p	    = $_POST['id_p'];
			$ktp	    = $_POST['ktp'];
			$desk		= $_POST['rev'];
			$sco		= $_POST['score'];


			$sql3 		='UPDATE review set score="'.$sco.'", review="'.$desk.'" WHERE id_produk="'.$id_p.'" AND no_ktp="'.$ktp.'"';
			$query 	    = mysqli_query($koneksi,$sql3) or die (mysqli_error($koneksi));
			if($query){
				echo'
				<script>
					alert("Pesanan telah diterima dan terima kasih atas review baru anda");
					window.location="indexU.php?page=cek";
				</script>';
			}
		}
	}
?>
<?php
$sql1	= 'UPDATE order_detail SET status="Accepted" WHERE id_detail="'.$_GET['idt'].'"';
$query1   = mysqli_query($koneksi,$sql1) or die (mysqli_error($koneksi));
?>
</table>
</form>