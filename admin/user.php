<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user-circle"></em>
				</a></li>
				<li class="active">USER</li>
			</ol>
		</div>
<!--/.row--> 
        <div><table class="customers" >
            <tr>
                <th>Id User</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>Tanggal Lahir</th>
                <th>No Telpon</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php
	$a	 ='SELECT * FROM user';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id				= $d['no_ktp'];
			$username		= $d['username'];
			$pass			= $d['pass'];
			$nama		    = $d['nama'];
			$email			= $d['email'];
			$alamat			= $d['alamat'];
			$gender			= $d['gender'];
			$tgllahir		= $d['tgl_lahir'];
			$notelp			= $d['no_telp'];
			$role			= $d['role'];
			echo'
				<tr align="center">
					<td>'.$id.'</td>
					<td>'.$nama.'</td>
					<td>'.$email.'</td>
					<td>'.$alamat.'</td>
					<td>'.$gender.'</td>
					<td>'.$tgllahir.'</td>
					<td>'.$notelp.'</td>
					<td>'.$username.'</td>
					<td>'.base64_decode($pass).'</td>
					<td>'.$role.'</td>
					<td><a href="index.php?page=user&form=edit&kode='.$id.'">EDIT</td>
					<td><a href="index.php?page=user&form=hapus&kode='.$id.'">DELETE</td>				
				</tr>';
		}
	}
?>

        </table></div>
		<a href="index.php?page=user&form=tambah"><input type="button" value="Tambah"></a>
	    
<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("user_tambah.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("user_edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("user_hapus.php");
}
?>
</div>