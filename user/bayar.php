<?php
session_start();
include("../koneksi.php");
?>
<!-- Head -->
<head>

    <title>PAYMENT</title>

    <!-- Meta-Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

    <!-- fontawesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">

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
                <center><h1 style="color: aliceblue"> Transfer Ke Nomor Rekening Dibawah </h1></center>
            </div>
            <div class="content-bottom">
                <form method="post" enctype="multipart/form-data">
                    <div class="field-group">
                        <div class="wthree-field">
                            <label style="text-align: center"><h2>1808561098</h2></label>
                        </div>
                    </div>
                    <div class="field-group">
                        <div class="wthree-field">
                           <label style="text-align: center"><h2>1808561099</h2></label>
                        </div>
                    </div>
					
					<div class="logo">
                		<center><h1 style="color: aliceblue"> Invoice Anda </h1></center>
            		</div>
					<div class="field-group">			
                         <label style="text-align: center"><h3><?php echo $_GET['order']?></h3></label>
                    </div>
					
                    <div class="wthree-field">
                        <a href="indexU.php?page=cek"><input type="button" class="btn" value="Cek Order"></a>
                    </div>
    
                    <ul class="list-login-bottom">
                        <li class="">
                            <a href="cancel.php?order=<?php echo $_GET['order']?>" class="text-right">Back Home</a>
                        </li>
                        <li class="clearfix"></li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
</body>
<!-- //Body -->

</html>
