<!--review-->
<div style="min-height: 826px">
<div class="product-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-widget">
                        <h1 class="product-wid-title">Review</h1>
<?php
	$a	 ='SELECT * 
		FROM ((review r 
		INNER JOIN `user` u ON u.no_ktp=r.no_ktp) 
		INNER JOIN produk p ON p.id_produk=r.id_produk)';
	$b	 = mysqli_query($koneksi,$a) or die ();
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_P			= $d['id_produk'];		
			$ktp			= $d['no_ktp'];
			$nama_u			= $d['nama'];
			
			$nama_p		    = $d['nama_produk'];
			$gambar		    = $d['gambar'];
			$review		    = $d['review'];
			$score		    = $d['score'];
	echo'

	<div class="single-wid-product" style="width:500px">
             <img src="assets/image/'.$gambar.'" alt="" class="product-thumb"></a>
              <h3>'.$nama_p.'</h3>
               <p>'.$review.'</p>								

               <div class="product-wid-price">
				<h2>Score : '.$score.'/5 </h2>
                <p>review by : '.$nama_u.'</p>
                </div>                            
                </div>
	';  
		} 
	}
?>
             </div>
                </div>
            </div>
        </div>
    </div>
 </div>