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

	
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pasien</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/tampilan.css" rel="stylesheet">
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	 <script src="js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="js/colorbox.css" />
	  <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
	 <script src="proses.js"></script>
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
				<?php
				if($id=="ADM"){
				
				echo"
				<div class=\"test\">
				<a href=\"lihat_admin.php\">
				<p align=\"left\"><img src=\"css/gambar/user.png\" height=\"15px\" width=\"15px\" />
				Admin</p>
				<hr />
				</a>
				</div>";
				
				}
				if($nid=="DOK"){
				echo"
				<a href=\"detail_dokter.php\">
				<div class=\"test\">
				<p align=\"left\"><img src=\"css/gambar/user.png\" height=\"15px\" width=\"15px\" />
				Dokter</p>
				<hr />
				</div>
				</a>";
				}else{
				echo"
				<a href=\"lihat_dokter.php\">
				<div class=\"test\">
				<p align=\"left\"><img src=\"css/gambar/user.png\" height=\"15px\" width=\"15px\" />
				Dokter</p>
				<hr />
				</div>
				</a>";
				
				}
				?>
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
						<li class="active">pasien</li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">PASIEN</p>
					</div>	
					<table class="table">
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>Nama Pasien</th>
							<th>Alamat Pasien</th>
							<th>Kota</th>
							<th>Jenis Kelamin</th>
							<th colspan="3"><p align="center">Menu</p></th>

						</tr>
						<?php
							$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,c.user from pasein a,id_kota b,login_aja c where a.id_kota=b.id_kota and a.user=c.user order by a.id_pasien asc");
							$no = 1;
							$jnk="";
							while($r=mysql_fetch_array($sql)){
							$id_pasien = $r['id_pasien'];
							$psi=base64_encode($id_pasien);
							$nama_pasien=$r['nama_pasien'];
							$alamat_pasien = $r['alamat_pasien'];
							$kota = $r['kota'];
							$jenis_kelamin=$r['jenis_kelamin'];
							if($jenis_kelamin=="L"){
								$jnk="Laki-Laki";
							
							}else{
							
								$jnk="Perempuan";
							}
							$user_pasien=$r['user'];
							
							echo "<tr>
								<td>$no</td>
								<td>$id_pasien</td>
								<td>$nama_pasien</td>
								<td>$alamat_pasien</td>
								<td>$kota</td>
								<td>$jnk
								<td><a href='detail_pasien.php?psi=$psi'>Detail</a></td>
								<td><a href=\"Javascript:hapus_pasien('$r[id_pasien]','$user_pasien');\">hapus</a></td>
								</tr>";
							$no++;
				
							}
						?>
					</table>

					</div>
			</div>
		</div>
  </body>
</html>
<?php

}
?>