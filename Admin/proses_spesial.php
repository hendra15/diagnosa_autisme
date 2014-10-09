<?php
include_once("koneksi/conn.php");
$sts=$_POST['sts'];
if($sts=="input_spesial"){
	$id=$_POST['id'];
	$spesial=$_POST['spesial'];
	
	$query="insert into spesialisasi values('$id','$spesial')";
	$koneksi->Execute($query);
	$result=$koneksi->Affected_Rows();
	echo"$result";


}else if($sts=="baru_spesial"){
	$id=$_POST['id'];
	$spesial=$_POST['spesial'];
	
	$query="update spesialisasi set spesialisasi='$spesial' where id_spesialisasi='$id'";
	$koneksi->Execute($query);
	$result=$koneksi->Affected_Row();
	
	echo"$result";


}else if($sts=="hapus_spesial"){
	$id=$_POST['id'];
	$spesial=$_POST['spesial'];
	
	$query="delete from spesialisasi where id_spesialisasi='$id'";
	$koneksi->Execute($query);
	$result=$koneksi->Affected_Row();
	
	echo"$result";


}

?>