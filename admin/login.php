<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['role']=='admin'){
	header("location:index.php");}
		else{
			include("../koneksi.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password">
							</div>
							<div class="checkbox">
							</div>
							<input type="submit" name="submit" value="Login" />
							<a href="../index.php" style="color: black"><input type="button" value="Back"></a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
<?php
if (isset($_POST['submit'])){
	$user  = $_POST['username'];
	$pass  = $_POST['pass'];
	$level = "admin";
	
	$q = 'SELECT * FROM user WHERE username="'.$user.'" AND pass="'.base64_encode($pass).'" AND role="'.$level.'" LIMIT 1';
	$p = mysqli_query($koneksi,$q) or die (mysqli_error($koneksi));
	$n = mysqli_num_rows($p);
	$r = mysqli_fetch_array($p);
	if ($n>0){
		$_SESSION['admin'] = $r['no_ktp'];
		$_SESSION['role'] = $r['role'];		
			
			echo' 
				<script>
					alert("Sucessfully!");
					window.location="index.php";
				</script>';}
			else{
				echo'
					<script>
						alert("Sorry! your username or password is wrongs");
						window.location="index.php";
					</script>';	
	}
}
?>
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
