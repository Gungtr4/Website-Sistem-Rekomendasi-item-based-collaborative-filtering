<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td><h3>ADD USER</h3></td>
    </tr>
</table>

<table align="center" class="customers" border="0">
	<tr>
    	<th>No KTP</th>
        <td><input type="text" name="ktp" required="required" />
        </td>
    </tr>
    <tr>
    	<th>Name</th>
        <td><input type="text" name="name" required="required" /></td>
    </tr>
    <tr>
    	<th>Email</th>
        <td><input type="email" name="email" required="required" /></td>
    </tr> 
	<tr>
    	<th>Alamat</th>
        <td><textarea name="alamat"></textarea></td>
    </tr>
    <tr>
    	<th>Gender</th>
        <td><select name="gender" required="required">
			<option>Laki-Laki</option>
			<option>Perempuan</option>
			</select></td>
    </tr>
    <tr>
    	<th>Tanggal Lahir</th>
        <td><input type="date" name="tgllahir" required="required" /></td>
    </tr>
	<tr>
    	<th>No Telpon</th>
        <td><input type="number" name="telp" required="required" /></td>
    </tr> 
    <tr>
    	<th>Username</th>
        <td><input type="text" name="username" required="required" /></td> 
    </tr>
    <tr>
    	<th>Password</th>
        <td><input type="password" name="pass" required="required" /></td>
    </tr>
    <tr>
    	<th>Role</th>
        <td>
        	<select name="role">
			<option>--Pilih Role--</option>
        	<option>admin</option>
            <option>member</option>
            </option>
        </td>
    </tr>
    
<table align="center">
	<tr>
    	<td><input type="submit" name="submit" value="Save" />
        	<a href="index.php?page=user"><input type="button" value="Cancel" /></a></td>
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
		
		$sql	     ='insert into user(no_ktp,username,pass,role,nama,email,alamat,gender,tgl_lahir,no_telp)value ("'.$ktp.'","'.$username.'","'.base64_encode($password).'","'.$level.'","'.$name.'","'.$email.'","'.$alamat.'","'.$gender.'","'.$tgllahir.'","'.$notelp.'")';
		$query 	    =mysqli_query($koneksi,$sql) or die (mysqli_error());
		if($query){
			echo'
			<script>
				alert("You Successfuly Added User Data");
				window.location="index.php?page=user";
			</script>';
		}
	}
?>
</table>
</form>