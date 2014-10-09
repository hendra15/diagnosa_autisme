<?php
include_once("koneksi/conn.php");

	$id=$_POST['id'];
	$user=$_POST['user'];
	$hapus="delete from diagnosa where id_pasien='$id'";
	$koneksi->Execute($hapus);
	$hapus="delete from pasein where id_pasien='$id'";
	$koneksi->Execute($hapus);
	$result= $koneksi->Affected_Rows();
	$hapus="delete from login_aja where user='$user'";
	$koneksi->Execute($hapus);
	$result= $koneksi->Affected_Rows();	
	echo "$result";

?>