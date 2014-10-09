<?php
	include_once("koneksi/conn.php");
	error_reporting(0);

	
session_start();

if(!isset($_SESSION['user'])){
	echo "<script type='text/javascript'>location.href='login.php'</script>";

}else{
$user=$_SESSION['user'];
$pass=$_SESSION['password'];
$id = $_SESSION['id'];
$nid = $_SESSION['nid'];



if($id=="ADM")	{
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/tampilan.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css" />
	<link rel="stylesheet" href="js/colorbox.css" />
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	 <script src="js/bootstrap.min.js"></script>
	 <script src="proses.js"></script>
	   <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
	<style type="text/css">
	body{
		position:relative;
		background-image:url('css/gambar/test.png');
	}
	</style>
	<script type="text/javascript">
	$(function(){
		$("#accordion").accordion();
		$( "#datepicker" ).datepicker({
			inline: true
		});
		
		});
		
	</script> 
  </head>
  <body>
  
	<div class="alert alert-info">
		<p class="ss">Administrator</p>
	</div>
		<div id="sidebar">
			<div class="menusamping">
			<div class="aj">
			<p class="sj">Dashboard</p>
			</div>	
			<p class="profil" align="left">
					<img src="css/gambar/default.gif" height="120px" width="120px" />
					
			</p>
			<p class="tulis" align="left">
			hi,<?php echo"$user"; ?>
			</p>	
			<p class="tulis" align="left">
			<img src="css/gambar/user.png" hidden />&nbsp; &nbsp;
			</p>
			<p class="tulis" align="left">
			<a href="keluar.php">
			<img src="css/gambar/keluar.png" />Keluar
			</a>
			</p>
			<div id="accordion">
				<h3>Master</h3>
				<div>
				<div class="test">
				<a href="lihat_admin.php">
				<p align="left"><img src="css/gambar/user.png" height="15px" width="15px" />
				Admin</p>
				<hr />
				</a>
				</div>
				
				<a href="lihat_dokter.php">
				<div class="test">
				<p align="left"><img src="css/gambar/user.png" height="15px" width="15px" />
				Dokter</p>
				<hr />
				</div>
				</a>
				<a href="lihat_pasien.php">
				<div class="test">
				<p align="left"><img src="css/gambar/user.png" height="15px" width="15px" />
				Pasien</p>
				<hr />
				</div>
				</a>
				</div>
				<h3>Diagnosa</h3>
				<div>
				<a href="diagnosa.php">
				<div class="test">
				
				<p align="left"><img src="css/gambar/1402513703_reload_alt.png" height="15px" width="15px" />&nbsp; Diagnosa</p>
				<hr />
				</div>
				</a>
				</div>
				<h3>Laporan</h3>
				<div>
				<a href="laporan_pasien.php">
				<div class="test">
				<p align="left"><img src="css/gambar/1402513703_reload_alt.png" height="15px" width="15px" />&nbsp; Laporan Diagnosa Pasien</p>
				<hr />
				</div>
				</a>	
				</div>
			</div>
			<div id="datepicker"></div>
		</div>
		</div>
		<div id="content">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ol class="breadcrumb">
						<li><a href="index.php">index</a></li>
						<li><a href="lihat_admin.php">admin</a></li>
						<li class="active">detail Admin</li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">ADMIN</p>
					</div>
					
					<?php
					$ids=$_GET['idd'];
					$id=base64_decode($ids);
					$query=mysql_query("select a.user,b.kota,a.nama_admin,a.alamat_admin from admin a,id_kota b where a.id_kota=b.id_kota and a.id_admin='$id'");
					while($rs=mysql_fetch_array($query)){
					$user_adm=$rs['user'];
					$kota_adm = $rs['kota'];
					$nama_adm = $rs['nama_admin'];
					$alamat_adm = $rs['alamat_admin'];
					}
					
					?>
					<p class="biodata lblid"> ID  </p>
					<?php
							echo "<p class=\"biodata lihat_id\">$id</p>";
						
					?>
					<hr></hr>
					<p class="biodata lblnama_adm"> Nama </p>
					<?php
					
					echo"<p class=\"biodata nama_adm\">$nama_adm</p>";
					
					?>
					<hr></hr>
					<p class="biodata lblalamat_adm">Alamat</p>
					<p class="biodata alamat_adm">
					<?php 
						echo $alamat_adm; 
					?>
					</p>
					<hr></hr>
					<p class="biodata lblkota_adm">Kota</p>
					<p class="biodata kota_adm">
						<?php
							echo $kota_adm;
						?>
					</p>
					<hr></hr>
					</div>

			</div>
		</div>
  </body>
</html>
<?php
}else{
echo "<script type='text/javascript'>location.href='index.php'</script>";

}
}
?>