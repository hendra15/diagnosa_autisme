<?php
	include_once("koneksi/conn.php");
	error_reporting(0);
	session_start();
	
	$query="select max(id_kota) as maxid from id_kota";
	$hasil=mysql_query($query);
	$data=mysql_fetch_array($hasil);
	$idmax=$data['maxid'];
	
	$nomor=$idmax++;
if(!isset($_SESSION['user'])){
	echo "<script type='text/javascript'>location.href='login.php'</script>";

}else{
$user=$_SESSION['user'];
$pass=$_SESSION['password'];
$id = $_SESSION['id'];
$nid = $_SESSION['nid'];

if($id=="ADM")
{


?>		
<head>				
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/tampilan.css" rel="stylesheet">
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	 <script src="js/bootstrap.min.js"></script>
	 <script src="js/proses1.js"></script>
	 <script>
	 $(document).ready(function(){
		$("#perbarui_kota").hide();
		
	 
	 
	 })
	 
	 
	 </script>
</head>
<body>	 
						
						<div id="tampilkan">
						<table>
							<tr>
								<td>ID</td>
								<td>:</td>
								<td><input type="text" id="id_kota" value="<?php echo"$idmax"; ?>"  disabled /></td>
							</tr>
							<tr>
								<td>Kota</td>
								<td>:</td>
								<td><input type="text" id="nama_kota" placeholder="masukkan nama Kota" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="button" id="tambahkan_kota" onClick="kota_masuk()" value="Simpan" /><input type="button" id="perbarui_kota" onClick="kota_perbarui()" value="Perbarui" /></td>
				
							</tr>	
						</table>
						<br />
						
						<div id="load_table_kota" align="center">
							<?php
								include_once("tabel_kota.php");
							
							?>
						</div>
						</div>
</body>		
<?php
}else{
echo "<script type='text/javascript'>location.href='index.php'</script>";

}
}
?>