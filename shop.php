 <div class="single-product-area"  >    			
				
	<?php 
	$sql	 ='	SELECT * from kategori';
	$query	 = mysqli_query($koneksi,$sql) or die (mysqli_error());
	$row	 = mysqli_num_rows($query);
	if($row !=0){
		while($arr=mysqli_fetch_array($query))
		{
			
			$id_k			= $arr['id_kategori'];
			$kategori		= $arr['nama_kat'];
			echo'			
			<div class="container">            
			<h2 class="section-title"><b>'.$kategori.'</b></h2>
			<div class="row">';
			
	$sql2	 ='	SELECT * from produk WHERE id_kategori="'.$id_k.'"';
	$query2	 = mysqli_query($koneksi,$sql2) or die (mysqli_error());
	$row2	 = mysqli_num_rows($query2);
	if($row !=0){
		while($arr=mysqli_fetch_array($query2))
		{
			$id_p			= $arr['id_produk'];
			$produk	    	= $arr['nama_produk'];
			$gambar	    	= $arr['gambar'];
			$harga			= format_rupiah($arr['harga']);
			echo'  
                <div class="col-md-4 col-sm-7">
                    <div class="single-shop-product">
                        <div class="product-upper">
                              <img width="140px" height="140px" src =assets/image/'.$gambar.' >
						</div>
                        <h2><a href="">'.$produk.'</a></h2>
                        <div class="product-carousel-price">
                            <ins>'.$harga.'</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a href="login.php" class="add_to_cart_button"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
						<div class="product-option-shop">
						<a href="login.php" class="add_to_cart_button" style="padding:6px 30px"><i class="fa fa-link"></i> Buy This</a>
						</div>
						</div>
					</div>
			
';
		}
	}
			echo'</div>
</div>';
	}
	}
	?>        
    </div >