<div class="col-2 float-right">
<div class="dropdown">
   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filter By
    <span class="caret"></span></button>
	<ul class="dropdown-menu">
	<?php
	$qsk = 'select * from kategori';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_kategori'];
				$kname = $rsk['nama_kat'];
				echo'<li class="dropdown-item"><a href="indexU.php?page=shop&fil=kat&idk='.$kcode.'">'.$kname.'</a></li>';	
				}
			}
		echo'
		<li class="dropdown-item"><a href="indexU.php?page=shop&fil=rec">Recomend For You</a></li>
		<li class="dropdown-item"><a href="indexU.php?page=shop">Reset Filter</a></li>';
			?>
	</ul>
  </div>
</div>
<?php
if($_GET['fil'] == 'kat' && isset($_GET['idk'])){
	echo'<div class="single-product-area" style="min-height: 794px">';
	$sql	 ='	SELECT * from kategori WHERE id_kategori="'.$_GET['idk'].'"';
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
			
	$sql2	 ='	SELECT * from produk WHERE id_kategori="'.$_GET['idk'].'"';
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
                              <img width="160px" height="160px" src =../assets/image/'.$gambar.' >
						</div>
                        <h2><a href="">'.$produk.'</a></h2>
                        <div class="product-carousel-price">
                            <ins>'.$harga.'</ins>
                        </div>  
                        
                    <div class="product-option-shop">
					<a href="cart.php?page=shop&form=cart&kode='.$id_p.'">
					<button type="button" class="btn btn-primary">
					<i class="fa fa-shopping-cart"></i> Add To Cart</button></a>
					</div>
					<div class="product-option-shop">
					<a href="indexU.php?page=shop&fil='.$kcode.'&form=single&kode='.$id_p.'">
					<button type="button" class="btn btn-primary" style="padding:6px 36px">
 					<i class="fa fa-link"></i> Buy This</button></a>
                    </div>                       
						</div>
					</div>';
		}
	}
			echo'</div>
</div>';
	}
	}
 echo'   
    </div>
'; 
echo'
</div>';
}elseif(!isset($_GET['fil'])){
	echo'
	<div class="single-product-area"  >    			
	';
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
	if($row2 !=0){
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
					  <img width="160px" height="160px" src =../assets/image/'.$gambar.' >
				</div>
				<h2><a href="">'.$produk.'</a></h2>
				<div class="product-carousel-price">
					<ins>'.$harga.'</ins>
				</div>  
				
			<div class="product-option-shop">
			<a href="cart.php?page=shop&form=cart&kode='.$id_p.'">
			<button type="button" class="btn btn-primary">
			<i class="fa fa-shopping-cart"></i> Add To Cart</button></a>
			</div>
			<div class="product-option-shop">
			<a href="indexU.php?page=shop&idk='.$kcode.'&form=single&kode='.$id_p.'">
			<button type="button" class="btn btn-primary" style="padding:6px 36px">
			 <i class="fa fa-link"></i> Buy This</button></a>
			</div>                       
				</div>
			</div>';
		}
	}
			echo'</div>
</div>';
	}
	}        
    echo'</div >';
}
elseif(isset($_GET['fil'])&& $_GET['fil']=='rec'){
echo' 
<div class="container">          
<h2 class="section-title"><b>Recomend For You</b></h2>
	<div class="row">
';
include("recommend.php");
$product=mysqli_query($koneksi, 'select * from review');

$matrix=array();
while($p=mysqli_fetch_array($product))
{
	$users=mysqli_query($koneksi,'select nama from user where no_ktp="'.$p['no_ktp'].'"');
	$username=mysqli_fetch_array($users);
	
	$matrix[$username['nama']][$p['id_produk']]=$p['score'];  

}
$users=mysqli_query($koneksi,'select nama from user where no_ktp="'.$_SESSION['user'].'"');
$username=mysqli_fetch_array($users);
?>
	<?php 
			$recommendation=array();
			$recommendation=getRecommendation($matrix,$username['nama']);
			
			foreach($recommendation as $product=>$rating) if($rating>=3)
			{	
					 
	$sql3	 ='	SELECT * from produk WHERE id_produk="'.$product.'"';
	$query3	 = mysqli_query($koneksi,$sql3) or die (mysqli_error());
	$row3	 = mysqli_num_rows($query3);
	if($row3 !=0){
		while($arr=mysqli_fetch_array($query3))
		{
			$id_p			= $arr['id_produk'];
			$produk	    	= $arr['nama_produk'];
			$gambar	    	= $arr['gambar'];
			$harga			= format_rupiah($arr['harga']);
			echo'  
			<div class="col-md-4 col-sm-7">
			<div class="single-shop-product">
				<div class="product-upper">
					  <img width="160px" height="160px" src =../assets/image/'.$gambar.' >
				</div>
				<h2><a href="">'.$produk.'</a></h2>
				<div class="product-carousel-price">
					<ins>'.$harga.'</ins>
				</div>  
				
			<div class="product-option-shop">
			<a href="cart.php?page=shop&form=cart&kode='.$id_p.'">
			<button type="button" class="btn btn-primary">
			<i class="fa fa-shopping-cart"></i> Add To Cart</button></a>
			</div>
			<div class="product-option-shop">
			<a href="indexU.php?page=shop&idk='.$kcode.'&form=single&kode='.$id_p.'">
			<button type="button" class="btn btn-primary" style="padding:6px 36px">
			 <i class="fa fa-link"></i> Buy This</button></a>
			</div>                       
				</div>
			</div>';
		}
	}		
}
}
if(isset($_GET['form']) && $_GET['form']=='single'){
	include("order_s.php");
} 
?>
</div>