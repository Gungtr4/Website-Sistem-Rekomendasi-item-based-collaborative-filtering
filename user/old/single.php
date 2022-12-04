 <script>
$('#jumlah').on("submit", function(event){  
  event.preventDefault();  
  if($('#jum').val() == "")  
  {  
   alert("Mohon Isi Jumlah Yang Akan Dipesan ");  
  }  
  else  
  {  
   $.ajax({  
    url:"single2.php",  
    method:"POST",  
    data:$('#jumlah').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#jumlah')[0].reset();  
     $('#add_data_Modal').modal('hide');  
    }  
   });  
  }  
 });
</script>
<?php 
if(isset($_POST["id_produk"]))
{
	$output = '';
	$LastIDorder 	= IDOtomatis("order");
	$mydate			= getdate(date("U"));
	$curent 		= $mydate['mday'].'-'.$mydate['mon'].'-'.$mydate['year'];
    $query 			= "INSERT INTO `order`(id_order, no_ktp, tgl_pesan)  
     				VALUES('$LastIDorder', ".$_SESSION['user'].", '$curent')    				";
	$ins   	= mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));		
	if($ins){
		session_start();
		$_SESSION['order'] = $LastIDorder;
	$output .= '	
	<div id="add_data_Modal" class="modal fade">
 	<div class="modal-dialog">
  	<div class="modal-content">
   	<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Masukan Jumlah Barang Yang Ingin Di Pesan</h4>
   	</div>
   <div class="modal-body">
    <form method="post" id="jumlah">
     <label>Jumlah</label>
     <input type="number" name="jum" id="jum" class="form-control" />
     <br />';
	 	$query 	= "SELECT * FROM produk WHERE id_produk= '".$_POST["id_produk"]."'";
 		$result = mysqli_query($connect, $query);
		$row 	= mysqli_fetch_array($result);
	'
	 <input type="hidden" name="harga" id="harga" class="form-control" value="'.$row['harga'].'" />
	 <input type="hidden" name="id_ord" id="id_ord" class="form-control" value="'.$LastIDorder.'" />
	 <input type="hidden" name="id_pro" id="id_pro" class="form-control" value="'.$$_POST["id_produk"].'" />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>';
}
}
?>
