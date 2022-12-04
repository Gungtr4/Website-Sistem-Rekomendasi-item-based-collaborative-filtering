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
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
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
		background-color: #890002;
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
<?php
	include("koneksi.php");
	include("function.php");
?>
  <!--navbar-->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #890002">
 <div class="container">
    <a class="navbar-brand" href="#">
    	 TRI AGUNG BUSANA </a>
 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
 
      	<ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=shop">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=review">Review</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user/login.php">Login</a>
        </li>
        
		</ul>
    	
   	</div>
   	</div>
</nav>
<!--gambar bergerak-->
<div class="jumbotron" id="section1" style="margin-left: 20%; margin-right: 20%">
 <?php
	if(isset($_GET['page'])){
		$hal=($_GET['page']);
		if($hal=="shop"){
			include("shop.php");
		}else if($hal=="about"){
			include("about.php");
		}else if($hal=="review"){
			include("review.php");
		}
	}else{ include("homeL.php"); }

?>	
	</div>



<!--footer-->
    <div class="footer-bottom-area">          
				<center>
                 <p>&copy; 2021 Electronics. All Rights Reserved.by <a href="index.php" target="_blank">Tri Agung Busana</a></p>
				</center>
    </div>

	<script src="assets/js/jquery.js"></script> 
	<script src="assets/js/popper.js"></script> 
	<script src="assets/js/bootstrap.js"></script>
</body>
</html>