<style>
.customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  .customers td, .customers th {
    border: 0.2px solid azure;
    padding: 8px;
  }
  
  .customers tr:nth-child(even){background-color: #f2f2f2;}
  
  .customers tr:hover {background-color: #ddd;}
  
  .customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #890002;
    color: white;
  }
</style>
<div class="jumbotron" style="min-height: 794px">
	<table class="customers" >
            <tr  align="center">
                <th >Invoice</th>   
                <th >No KTP</th>
                <th >Nama Customer</th>
                <th >Nama Produk</th>
                <th >Gambar</th>				
                <th >Jumlah</th>
				<th >Harga</th>                            
                <th >Hapus</th>
				
            </tr>
<?php
error_reporting(E_ALL  & ~E_STRICT);
	$a	 ='SELECT * 
		FROM (((order_detail d 
		INNER JOIN `order` o ON o.id_order=d.id_order) 
		INNER JOIN produk p ON p.id_produk=d.id_produk)
		INNER JOIN `user` u ON u.no_ktp = o.no_ktp) 
		WHERE o.no_ktp="'.$_SESSION['user'].'" AND d.status="cart"';
	$b	 = mysqli_query($koneksi,$a) or die ();
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_d			= $d['id_detail'];
			$id_o			= $d['id_order'];
			$id_P			= $d['id_produk'];
		
			$ktp			= $d['no_ktp'];
			$nama_u			= $d['nama'];
			
			$nama_p		    = $d['nama_produk'];
			$gambar		    = $d['gambar'];
			$jumlah			= $d['jumlah'];
			$harga			= $d['total_harga'];
			@$total			= $total + $harga;
			
			echo'
				<tr align="center">
					<td>'.$id_o.'</td>
					<td>'.$ktp.'</td>
					<td>'.$nama_u.'</td>
					<td>'.$nama_p.'</td>
					<td><img width="100px" height="100px" src =../assets/image/'.$gambar.'></td>
					<td>'.$jumlah.'</td>
					<td>'.format_rupiah($harga).'</td>					
					<td><a href="cancel2.php?&kode='.$id_d.'">DELETE</a></td>								
				</tr>
				';
		}
		echo'<tr align="center">
					<th colspan="7">Check Out : '.format_rupiah($total).'</th>
					<td><a href="bayarcart.php?order='.$id_o.'&user='.$ktp.'" >BAYAR</a></td>
				</tr>';
	}else{
		echo'
		<tr>
			<td colspan="8" align="center">Keranjang Kosong</td>
		</tr>
		';
	}
	?>        
</table></div>