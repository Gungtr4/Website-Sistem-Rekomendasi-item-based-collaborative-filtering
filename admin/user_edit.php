<form enctype="multipart/form-data" method="post">
	<table align="center"> 
    		<tr>
            	<td align="center">
                	EDIT USER
                 <?php
				 	if(isset($_GET['kode'])){
						$a	='SELECT * FROM user WHERE no_ktp="'.$_GET['kode'].'" LIMIT 1';
						$b	= mysqli_query($koneksi,$a) or die (mysqli_error()); 
						$c	= mysqli_fetch_array($b);
						
						$ktp	    = $c['no_ktp'];
						$name		= $c['nama'];
						$email	    = $c['email'];
						$alamat		= $c['alamat'];
						$gender		= $c['gender'];
						$notelp		= $c['no_telp'];
						$tgllahir	= $c['tgl_lahir'];
						$username	= $c['username'];
						$password	= $c['pass'];
						$level		= $c['role'];
					}
				 ?>
                </td>
            </tr>
     </table>
	 <table align="center" class="customers">   
   			<tr>
            	<th>No KTP</th>
                <td><input type="text" disabled="" value="<?php echo $ktp;?>"/>
                	<input type="hidden" name="ktp" value="<?php echo $ktp;?>" />
                </td>
            </tr>
            <tr>
            	<th>Nama</th>
                <td><input type="text" name="name" value="<?php echo $name;?>">
                </td>
            </tr>
            <tr>
            	<th>Email</th>
                <td><input type="text" name="email" value="<?php echo $email;?>">
                </td>
            </tr>
            <tr>
            	<th>Alamat</th>
                <td><textarea name="alamat"><?php echo $alamat;?></textarea>
                </td>
            </tr>
            <tr>
            	<th>Gender</th>
                <td><select name="gender">
					<option><?php echo $gender;?></option>
					<option>Laki-Laki</option>
					<option>Perempuan</option>
					</select>
                </td>
            </tr> 
		 	<tr>
            	<th>No Telpon</th>
                <td><input type="number" name="telp" value="<?php echo $notelp;?>">
                </td>
            </tr>
		 	<tr>
            	<th>Tanggal Lahir</th>
                <td><input type="date" name="tgllahir" value="<?php echo $tgllahir;?>">
                </td>
            </tr>
		 	<tr>
            	<th>Username</th>
                <td><input type="text" name="username" value="<?php echo $username;?>">
                </td>
            </tr>
			 <tr>
            	<th>Password</th>
                <td><input type="text" name="pass" value="<?php echo base64_decode($password);?>">
                </td>
            </tr>
		   <tr>
            	<th>Role</th>
                <td><select name="role">
					<option><?php echo $level;?></option>
					<option>Laki-Laki</option>
					<option>Perempuan</option>
					</select>
                </td>
            </tr> 
     <table align="center" class="customers">
     		<tr>
            	<td>
                	<input type="submit" name="submit" value="Save">
                    <a href="index.php?page=user"><input type="button" value="Cancel"></a>
                </td>
            </tr>
     </table>
     <?php
	 	if(isset($_POST['submit'])){
			$ktp	    = $_POST['ktp'];
			$name		= $_POST['name'];
			$email	    = $_POST['email'];
			$alamat		= $_POST['alamat'];
			$gender		= $_POST['gender'];
			$notelp		= $_POST['telp'];
			$tgllahir	= $_POST['tgllahir'];
			$username	= $_POST['username'];
			$password	= $_POST['pass'];
			$level		= $_POST['role'];
			
			$edit	= 'UPDATE user SET username="'.$username.'",pass="'.base64_encode($password).'",role="'.$level.'",
			nama="'.$name.'",email="'.$email.'",alamat="'.$alamat.'",gender="'.$gender.'",tgl_lahir="'.$tgllahir.'",no_telp="'.$notelp.'" WHERE no_ktp="'.$ktp.'"';
			$edit2   = mysqli_query($koneksi,$edit) or die (mysqli_error());
			if($edit2){
				echo'
				<script>
					alert("You Edited Successfuly ");
					window.location="index.php?page=user";
				</script>';
			}
		}
	 ?>
     </table>
</form>