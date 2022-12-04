<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user-circle"></em>
				</a></li>
				<li class="active">DASHBOARD</li>
			</ol>
		</div>
	<?php
	$sql1	='SELECT COUNT(id_order) AS c_order FROM `order`;';
	$sql2	='SELECT COUNT(no_ktp) AS c_ktp FROM user;';
	$sql3	='SELECT COUNT(id_produk) AS c_review FROM review;';
	$sql4	='SELECT COUNT(id_produk) AS c_produk FROM produk;';
	?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Site Traffic Overview
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">	
		<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
						<?php
							$qry	 	= mysqli_query($koneksi,$sql1) or die (mysqli_error());
							$row	 	= mysqli_num_rows($qry);
							$arr		= mysqli_fetch_array($qry);

							$ord		= $arr['c_order'];
							echo'
							<div class="large">'.$ord.'</div>
							';
						?>
							<div class="text-muted">Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<?php
							$qry	 	= mysqli_query($koneksi,$sql3) or die (mysqli_error());
							$row	 	= mysqli_num_rows($qry);
							$arr		= mysqli_fetch_array($qry);

							$rev		= $arr['c_review'];
							echo'
							<div class="large">'.$rev.'</div>
							';
							?>
							<div class="text-muted">Review</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<?php
							$qry	 	= mysqli_query($koneksi,$sql2) or die (mysqli_error());
							$row	 	= mysqli_num_rows($qry);
							$arr		= mysqli_fetch_array($qry);

							$ktp		= $arr['c_ktp'];
							echo'
							<div class="large">'.$ktp.'</div>
							';
						?>
							<div class="text-muted">Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-dollar color-red"></em>
							<?php
							$qry	 	= mysqli_query($koneksi,$sql4) or die (mysqli_error());
							$row	 	= mysqli_num_rows($qry);
							$arr		= mysqli_fetch_array($qry);

							$pro		= $arr['c_produk'];
							echo'
							<div class="large">'.$pro.'</div>
							';
						?>
							<div class="text-muted">Product</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	