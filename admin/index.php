<?php
session_start();
if (!isset($_SESSION['admin']) && $_SESSION['role']!='admin'){
	header("location:login.php");}
	else {
		include("../koneksi.php");
		include("../function.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>TRI Agung Busana</span> Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em><img src="../assets/image/PngItem_4212617.png" width="10px"></em>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="">
								<div><em></em><?php echo($_SESSION['admin'])?>
								</div>
							</a></li>
							<li class="divider"></li>
							<li><a href="index.php?page=logout">
								<div><em></em>Logut
								</div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
<!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<!-- profile pic
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
				-->
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo($_SESSION['admin'])?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<!-- search
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em>Dashboard</a></li>
			<li class="active"><a href="index.php?page=order"><em class="fa fa-shopping-cart">&nbsp;</em> Order</a></li>
			<li class="active"><a href="index.php?page=produk"><em class="fa fa-dollar">&nbsp;</em> Produk</a></li>
			<li class="active"><a href="index.php?page=user"><em class="fa fa-user-circle">&nbsp;</em> User</a></li>
			
	</ul>
	</div>
<!--/.sidebar-->
<?php
	if(isset($_GET['page'])){
		$hal=($_GET['page']);
		if($hal=="order"){
			include("order.php");
		}else if($hal=="produk"){
			include("produk.php");
		}else if($hal=="user"){
			include("user.php");
		}else if($hal=="logout"){
			include("logout.php");
		}
	}
		else{ include("home_admin.php"); }

?>	
		</div><!--/.row-->
	</div><!--/.row-->
</div>	<!--/.main-->
	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/chart.min.js"></script>
	<script src="../assets/js/chart-data.js"></script>
	<script src="../assets/js/easypiechart.js"></script>
	<script src="../assets/js/easypiechart-data.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>		
</body>
</html>