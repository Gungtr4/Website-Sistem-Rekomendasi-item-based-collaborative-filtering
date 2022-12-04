<!-- Head -->
<head>

    <title>Sign-up</title>

    <!-- Meta-Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- style CSS -->
    <link rel="stylesheet" href="user/css/style.css" type="text/css" media="all">

    <!-- fontawesome -->
    <link rel="stylesheet" href="user/css/font-awesome.min.css" type="text/css" media="all">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Mukta:300,400,500" rel="stylesheet">
<style>
	.font{
		color: aliceblue;
	}	
	</style>
</head>
<!-- //Head -->

<!-- Body -->
<body>

    <section class="main">

        <div class="bottom-grid">
        </div>
        <div class="content-w3ls">
			<div class="logo">
                <center><h1> SIGN-UP </h1></center>
            </div>
            <div class="content-bottom">
                <form method="post" enctype="multipart/form-data">
					<label class="font">No KTP</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <input id="text1" type="text" value="" placeholder="No KTP" name="ktp" required>
                        </div>
                    </div>
					<label class="font">Nama</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <input id="text1" type="text" value="" placeholder="Nama" name="nama" required>
                        </div>
                    </div>
					<label class="font">Email</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <input id="text1" type="email" value="" placeholder="Email" name="email" required>
                        </div>
                      </div>
					<label class="font">Jenis Kelamin</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <select name="gender" style="color:#999; width:100%;">
							<option>Jenis Kelamin</option>
							<option>Laki - Laki</option>
							<option>Perempuan</option>
							</select>
                        </div>
                    </div>
					<label class="font">Alamat</label>
					<div class="field-group">
                        <div class="wthree-field">
							<input id="text1" type="text" value="" placeholder="Alamat" name="alamat" style="height: 90px;" required>
                    	</div>
                    </div>
					<label class="font">Tanggal Lahir</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <input type="date" value="" name="tgl" required>
                        </div>
                     </div>
					<label class="font">No Telpon</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <input id="text1" type="text" value="" placeholder="No Telp" name="telp" required>
                        </div>
                        </div>
					<label class="font">Username</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <input id="text1" type="text" value="" placeholder="Username" name="username" required>
                        </div>
                        </div>
					<label class="font">Password</label>
                    <div class="field-group">
                        <div class="wthree-field">
                            <input id="myInput" type="Password" placeholder="Password" name="pass">
                        </div>
                    </div>
                    <div class="wthree-field">
                        <input type="submit" name="submit" class="btn" value="Sign In">
                    </div>
    				<ul class="list-login-bottom">
                        <li class="">
                            <a href="user/login.php" class="text-right">Back</a>
                        </li>
                        <li class="clearfix"></li>
                    </ul>
                    
                </form>
            </div>
        </div>
    </section>
<?php
if (isset($_POST['submit'])){
	$user  = $_POST['username'];
	$pass  = $_POST['pass'];
	$nama  = $_POST['nama'];
	$ktp   = $_POST['ktp'];
	$alamat= $_POST['alamat'];
	$telp  = $_POST['telp'];
	$gender= $_POST['gender'];
	$email = $_POST['email'];
	$tgl   = $_POST['tgl'];
	$level = "user";
	
	$q = 'INSERT INTO user (no_ktp,username,pass,role,nama,email,alamat,gender,tgl_lahir,no_telp) VALUE ("'.$ktp.'","'.$user.'","'.$pass.'","'.$level.'","'.$nama.'","'.$email.'","'.$alamat.'","'.$gender.'","'.$tgl.'","'.$telp.'")';
	$p = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n = mysqli_num_rows($p);
	$r = mysqli_fetch_array($p);
	if ($n>0){			
			echo' 
				<script>
					alert("Berhasil Membuat Akun, Silahkan Cek Email Anda Lalu Login");
					window.location="user/login.php";
				</script>';}
			else{
				echo'
					<script>
						alert("Terjadi Kesalahan");
						window.location="user/login.php";
					</script>';	
	}
}
?>
</body>
<!-- //Body -->

</html>
