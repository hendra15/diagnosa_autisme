<?php
include_once("koneksi/conn.php");
$sts=$_POST['sts'];

if($sts=="simpan_admin"){
	$id= $_POST['id'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$kota=$_POST['kota'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$password=base64_encode($pass);
	$hasil="sukses";
	$simpan="insert into login_aja values('$user','$password')";
	$koneksi->Execute($simpan);
	$result= $koneksi->Affected_Rows();
	$simpan="insert into admin values('$id','$user','$kota','$nama','$alamat')";
	$koneksi->Execute($simpan);
	$result= $koneksi->Affected_Rows();
	echo"$hasil";


}else if($sts=="hapus_admin"){
	$id_admin=$_POST['id_admin'];
	$user=$_POST['user'];
	$hapus="delete from admin where id_admin='$id_admin'";
	$koneksi->Execute($hapus);
	$result=$koneksi->Affected_Rows();
	$hapus="delete from login_aja where user='$user'";
	$koneksi->Execute($hapus);
	$result=$koneksi->Affected_Rows();
	echo"$result";


}else if($sts=="perbarui_admin"){
	$id= $_POST['id'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$kota=$_POST['kota'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$password=base64_encode($pass);
	$perbarui="update login_aja set password='$password' where user='$user'";
	$koneksi->Execute($simpan);
	$result= $koneksi->Affected_Rows();
	$simpan="update admin set id_kota='$kota', nama_admin='$nama', alamat_admin='$alamat' where id_admin='$id'";
	$koneksi->Execute($simpan);
	$result= $koneksi->Affected_Rows();
	echo"$result";
	

}

?>