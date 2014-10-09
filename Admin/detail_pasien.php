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
				<?php
				if($id=="ADM"){
					echo"<div class=\"test\">
				<a href=\"lihat_admin.php\">
				<p align=\"left\"><img src=\"css/gambar/user.png\" height=\"15px\" width=\"15px\" />
					Admin</p>
					<hr />
					</a>
					</div>";
				}
				
				
				if($id=="ADM"){
		
					echo"<div class=\"test\">
				<a href=\"lihat_dokter.php\">
				<p align=\"left\"><img src=\"css/gambar/user.png\" height=\"15px\" width=\"15px\" />
				Dokter</p>
				<hr />
				</a>
				</div>";
				}
				if($nid=="DOK"){
				echo"<div class=\"test\">
				<a href=\"detail_dokter.php\">
				<p align=\"left\"><img src=\"css/gambar/user.png\" height=\"15px\" width=\"15px\" />
				Dokter</p>
				<hr />
				</a>
				</div>";
				
				
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
						<li><a href="lihat_pasien.php">pasien</a></li>
						<li class="active">detail pasien</li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">PASIEN</p>
					</div>
					<?php
					$id_pasien=$_GET['psi'];
					$psi=base64_decode($id_pasien);
					$query=mysql_query("select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,b.kota as 'tempat',a.tanggal_lahir,a.no_telp_pasien from pasein a,id_kota b where a.id_kota=b.id_kota and a.id_pasien='$psi'");
					while($rs=mysql_fetch_array($query)){
					$id_pas=$rs['id_pasien'];
					$nama_pas= $rs['nama_pasien'];
					$alamat_pas = $rs['alamat_pasien'];
					$kota = $rs['kota'];
					$jenis_kel= $rs['jenis_kelamin'];
					$jnkel="";
					if($jenis_kel=="L"){
						$jnkel="Laki-Laki";
					}else{
						$jnkel="Perempuan";
					}
					$tempat_lah= $rs['tempat'];
					$tgl_lahir = $rs['tanggal_lahir'];
					$no_telp = $rs['no_telp_pasien'];
	
					}
					
					?>
					<p class="biodata lblid"> ID Pasien  </p>
					<?php
							echo "<p class=\"biodata lihat_id\">$id_pas</p>";
						
					?>
					<hr></hr>
					<p class="biodata lblnama_adm"> Nama Pasien </p>
					<?php
					
					echo"<p class=\"biodata nama_adm\">$nama_pas</p>";
					
					?>
					<hr></hr>
					<p class="biodata lblalamat_adm">Alamat</p>
					<p class="biodata alamat_adm">
					<?php 
						echo $alamat_pas; 
					?>
					</p>
					<hr></hr>
					<p class="biodata lblkota_adm">Kota</p>
					<p class="biodata kota_adm">
						<?php
							echo $kota;
						?>
					</p>
					<hr></hr>
					<p class="biodata lblkota_adm">Jenis Kelamin</p>
					<p class="biodata kota_adm">
						<?php
							echo $jnkel;
						?>
					</p>
					<hr></hr>
					<p class="biodata lblkota_adm">TTL</p>
					<p class="biodata kota_adm">
						<?php
							echo "$tempat_lah, $tgl_lahir";
						?>
					</p>
					<hr></hr>
					<p class="biodata lblkota_adm">No. Telp</p>
					<p class="biodata kota_adm">
						<?php
							echo "$no_telp";
						?>
					</p>
					<hr></hr>
					
					</div>

			</div>
		</div>
  </body>
</html>
<?php

}
?>