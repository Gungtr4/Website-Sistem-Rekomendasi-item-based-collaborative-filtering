<?php
function IDOtomatis($table){
if($table=="produk"){
	$id_table	="id_produk";
	$kode		="PRO";
}else if($table=="kategori"){
	$id_table	="id_kategori";
	$kode		="KAT";
}else if($table=="`order`"){
	$id_table	="id_order";
	$kode		="ORD";
}else if($table=="order_detail"){
	$id_table	="id_detail";
	$kode		="DET";
}else if($table=="review"){
	$id_table	="id_review";
	$kode		="REV";
}
	global $koneksi;
	
$querycount		= "SELECT MAX(".$id_table.") as LastID FROM ".$table;
$result			= mysqli_query($koneksi,$querycount) or die(error_reporting(E_ERROR | E_PARSE));
$row			= mysqli_fetch_array($result);
$id				= $row['LastID'];
$num			= str_replace($kode,'',$id);
$num			= ( (int)$num +1 );
switch(strlen($num)){
		case 1		: $NoTrans	= $kode."0000".$num; break;
		case 2		: $NoTrans	= $kode."000".$num; break;
		case 3		: $NoTrans	= $kode."00".$num; break;
		case 4		: $NoTrans	= $kode."0".$num; break;
		default  	: $NoTrans	= $num;
}
return $NoTrans;
}

function format_rupiah($angka)
{
		$rupiah2   = number_format($angka,0,',','.');
		$rupiah	= "Rp.".$rupiah2;
		return $rupiah;
}

function formattgl()
{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal		= mkime(date("d"),date("m"),date("Y"));
		$tglsekarang	= datte("Y-m-d",$tanggal);
		return $tglsekarang;
}
?>
