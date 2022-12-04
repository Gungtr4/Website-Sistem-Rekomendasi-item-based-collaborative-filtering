<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['role']=='user'){
	header("location:indexU.php");}
		else{
			include("koneksi.php");
				echo'
			<script>
				alert("Harap Membuat Akun / Login Terlebih Dahulu");
			</script>';
}
?>
<!-- Head -->
<head>

    <title>Login</title>

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

</head>
<!-- //Head -->

<!-- Body -->
<body>

    <section class="main">

        <div class="bottom-grid">
        </div>
        <div class="content-w3ls">
			<div class="logo">
                <center><h1> SIGN-IN </h1></center>
            </div>
            <div class="content-bottom">
                <form method="post" enctype="multipart/form-data">
                    <div class="field-group">
                        <span class="fa fa-user" aria-hidden="true"></span>
                        <div class="wthree-field">
                            <input id="text1" type="text" value="" placeholder="Username" name="username" required>
                        </div>
                    </div>
                    <div class="field-group">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <div class="wthree-field">
                            <input id="myInput" type="Password" placeholder="Password" name="pass">
                        </div>
                    </div>
                    <div class="wthree-field">
                        <input type="submit" name="submit" class="btn" value="Sign In">
                    </div>
    
                    <ul class="list-login-bottom">
                        <li class="">
                            <a href="signup.php" class="">Create Account</a>
                        </li>
                        <li class="">
                            <a href="index.php" class="text-right">Back Home</a>
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
	$level = "user";
	
	$q = 'SELECT * FROM user WHERE username="'.$user.'" AND pass="'.base64_encode($pass).'" AND role="'.$level.'" LIMIT 1';
	$p = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n = mysqli_num_rows($p);
	$r = mysqli_fetch_array($p);
	if ($n>0){
		$_SESSION['user'] = $r['no_ktp'];
		$_SESSION['role'] = $r['role'];		
			
			echo' 
				<script>
					alert("Sucessfully!");
					window.location="indexU.php";
				</script>';}
			else{
				echo'
					<script>
						alert("Sorry! your username or password is wrongs");
						window.location="login.php";
					</script>';	
	}
}
?>
</body>
<!-- //Body -->

</html>
