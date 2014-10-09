<?php
session_start();
include_once("Admin/koneksi/conn.php");
error_reporting(0);
$sts=$_POST['sts'];

if($sts=="simpan_pasien"){
	$id_pasien= $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$no_telp = $_POST['no_telp'];
	$alamat_pas = $_POST['alamat_pas'];
	$kota = $_POST['kota'];
	$jenkel = $_POST['jenkel'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$user_pasien = $_POST['user_pasien'];
	$pass_pasien = $_POST['pass_pasien'];
	$password=Base64_encode($pass_pasien);
	
	
	$query="insert into login_aja values('$user_pasien','$password')";
	$koneksi->Execute($query);
	$query ="insert into pasein values('$id_pasien','$kota','$user_pasien','$nama_pasien','$alamat_pas','$jenkel','$tgl_lahir','$no_telp','$tempat_lahir')";
	$koneksi->Execute($query);
	$result="sukses";
	
	echo "$result";
	


}else if($sts=="perbarui_pasien"){
	$id= $_POST['id'];
	$nama = $_POST['nama'];
	$handphone = $_POST['handphone'];
	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];
	$jenkel = $_POST['jenkel'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$user = $_POST['user'];
	$pass_pasien = $_POST['pass_pasien'];
	$password = base64_encode($pass_pasien);
	$result="";
	if($id!=""||$nama!=""||$handphone !=""||$alamat !=""||$kota !=""|| $jenkel !=""||$tempat_lahir!=""||$tgl_lahir !=""||$pass_pasien !=""){
	
	$query="update pasein set nama_pasien='$nama', no_telp_pasien='$handphone', alamat_pasien='$alamat', id_kota='$kota', jenis_kelamin='$jenkel',tempat='$tempat_lahir', tanggal_lahir='$tgl_lahir' where id_pasien='$id'";
	$koneksi->Execute($query);
	$query="update login_aja set password='$password' where user='$user'";
	$koneksi->Execute($query);
	$result="sukses";
	
	}else{
	$result="gagal";
	
	
	}
	echo "$result";



}
?>