<?php
session_start();
if (!isset($_SESSION['user']) && $_SESSION['role']!='user'){
	header("location:login.php");}
	else {
		include("../koneksi.php");
		include("../function.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tri Agung Busana</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
	<!-- CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/style.css">
	<link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<body>                                      
	 <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b48af1685d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<!--style-->
<style>
  html{
    scroll-behavior: smooth;
  }
	body{
		background-color: azure;
	}
	a{
		font-family: sans-serif;
	}
	footer{
    left: 0;
    bottom: 0;
    width: 100%;
		background-color: #1E90FF;
		border-top: 1px solid #ececec;
		color: white;
		font-size: 12px;
		letter-spacing: 1px;
		padding: 15px 0;
		text-align: center;
		text-transform: uppercase;
	}
	.wrap{
		margin: 0 auto;
	}
	.jumbotron{
		background-color: azure;
	}
  #section2{
    background:#ADD8E6;
  }
  .gallery{
    width: 200px;
    height: 200px;
    padding: 10px;
    margin: 20px;
  }

</style>

<body>
  <!--navbar-->
  <div>
	<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #890002">
 <div class="container">
    <a class="navbar-brand" href="#">
    	TRI AGUNG BUSANA </a>
 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
 
      	<ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="indexU.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="indexU.php?page=about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="indexU.php?page=shop">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="indexU.php?page=cart">Cart</a>
        </li>
         
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="indexU.php?page=settings"><?php echo $_SESSION['user'] ?></a>
            <a class="dropdown-item" href="indexU.php?page=cek">Cek Status</a>
            <a class="dropdown-item" href="logout.php">Log out</a>
          </div>
    	</li>
		</ul>
    	
   	</div>
   	</div>
</nav>
</div>
<!--gambar bergerak-->
<div class="jumbotron" id="section1" style="margin-left: 20%; margin-right: 20%">
 <?php
	if(isset($_GET['page'])){
		$hal=($_GET['page']);
		if($hal=="shop"){
			include("shop.php");
		}else if($hal=="about"){
			include("about.php");
		}else if($hal=="cart"){
			include("cek_cart.php");
		}else if($hal=="settings"){
			include("settings.php");
		}else if($hal=="logout"){
			include("logout.php");
		}else if($hal=="cek"){
			include("tabelcek.php");
		}
	}else{ include("home.php"); }

?>	
	</div>


<!--footer-->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2021 Electronics. All Rights Reserved.by <a href="indexU.php" target="_blank">Tri Agung Busana</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script src="../assets/js/jquery.js"></script> 
	<script src="../assets/js/popper.min.js"></script> 
	<script src="../assets/js/bootstrap.js"></script>
</body>
</html>