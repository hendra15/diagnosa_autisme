<?php
include_once("koneksi/conn.php");
$sts=$_POST['sts'];
if($sts=="hapus_diagnosa"){
$id_diagnosa = $_POST['id_diagnosa'];

$query="delete from diagnosa where id_diagnosa='$id_diagnosa'";
$koneksi->Execute($query);
$result = $koneksi->Affected_Rows();
echo"$result";


}

?>