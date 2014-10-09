<?php
include_once("koneksi/conn.php");
$sts=$_POST['sts'];

if($sts=="simpan_dokter"){
	$nid= $_POST['nid'];
	$nama=$_POST['nama'];
	$telp=$_POST['telp'];
	$alamat=$_POST['alamat'];
	$kota=$_POST['kota'];
	$spesial=$_POST['spesial'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$password=base64_encode($pass);
	$simpan="insert into login_aja values('$user','$password')";
	$koneksi->Execute($simpan);
	$result= $koneksi->Affected_Rows();
	$simpan="insert into dokter values('$nid','$user','$kota','$spesial','$nama','$alamat','$telp')";
	$koneksi->Execute($simpan);
	$result= $koneksi->Affected_Rows();
	
	echo"$result";


}else if($sts=="hapus_dokter"){
	$nid=$_POST['nid'];
	$user=$_POST['user'];
	$hapus="delete from dokter where nid='$nid'";
	$koneksi->Execute($hapus);
	$result= $koneksi->Affected_Rows();
	$hapus="delete from login_aja where user='$user'";
	$koneksi->Execute($hapus);
	$result= $koneksi->Affected_Rows();	
	echo "$result";


}else if($sts=="perbarui_dokter"){
	$nid= $_POST['nid'];
	$nama=$_POST['nama'];
	$telp=$_POST['telp'];
	$alamat=$_POST['alamat'];
	$kota=$_POST['kota'];
	$spesial=$_POST['spesial'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$password=base64_encode($pass);
	$perbarui="update login_aja set password='$password' where user='$user'";
	$koneksi->Execute($perbarui);
	$result= $koneksi->Affected_Rows();
	$perbarui="update dokter set id_kota='$kota', id_spesialisasi='$spesial', nama_dokter='$nama', alamat_dokter='$alamat', no_telp_dokter='$telp' where nid='$nid'";
	$koneksi->Execute($perbarui);
	$result= $koneksi->Affecter_Rows();
	echo "$result";

}

?>