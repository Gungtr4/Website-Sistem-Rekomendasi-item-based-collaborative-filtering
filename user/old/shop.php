<div class="single-product-area">    			
				
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
                              <img width="300px" height="300px" src =../assets/image/'.$gambar.' >
						</div>
                        <h2><a href="">'.$produk.'</a></h2>
                        <div class="product-carousel-price">
                            <ins>'.$harga.'</ins>
                        </div>  
                        
                    <div class="product-option-shop">
					<a href="indexU.php?page=shop&form=cart&kode='.$id_p.'">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
					<i class="fa fa-shopping-cart"></i>Add To Cart</button></a>
					
					<i class="fa fa-link"></i>
					<input type="button" name="view" value="Buy This" id="'.$id_p.'" class="btn btn-warning btn-xs edit_data" />
                    </div>                       
						</div>
					</div>
					
		
			
';
		}
	}
			echo'</div>
			</div>
		';
	}
	}
 echo'   
    </div>
'; 
?> 
</div>
<div id="proses" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Proses Pembelian</h4>
   </div>
   <div class="modal-body" id="jumlah">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
<?php
if(isset($_GET['form']) && $_GET['form']=='cart'){
	include("cart.php");
}else if(isset($_GET['form']) && $_GET['form']=='single'){
	include("single.php");
}
?>
<script>
$(document).ready(function(){
// Begin Aksi Insert
 $(document).on('click', '.edit_data', function(){
  var id_produk = $(this).attr("id");
  $.ajax({
   url:"single.php",
   method:"POST",
   data:{id_produk:id_produk},
   success:function(data){
    $('#jumlah').html(data);
    $('#proses').modal('show');
   }
  });
 });
</script>