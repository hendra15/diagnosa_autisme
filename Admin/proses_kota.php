<?php
include_once("koneksi/conn.php");
$sts=$_POST['sts'];
if($sts=="input_kota"){
	$id=$_POST['id'];
	$kota=$_POST['kota'];
	
	$query="insert into id_kota values('$id','$kota')";
	$koneksi->Execute($query);
	$result=$koneksi->Affected_Rows();
	echo"$result";


}else if($sts=="baru_kota"){
	$id=$_POST['id'];
	$kota=$_POST['kota'];
	
	$query="update id_kota set kota='$kota' where id_kota='$id'";
	$koneksi->Execute($query);
	$result=$koneksi->Affected_Row();
	
	echo"$result";


}else if($sts=="hapus_kota"){
	$id=$_POST['id'];
	$kota=$_POST['kota'];
	
	$query="delete from id_kota where ID_KOTA='$id'";
	$koneksi->Execute($query);
	$result=$koneksi->Affected_Row();
	
	echo"$result";


}

?>