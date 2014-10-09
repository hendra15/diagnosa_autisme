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
	 <script src="proses_cari.js"></script>
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
		$("#tgl_dari").datepicker();
		$("#tgl_sampai").datepicker();
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
						<li class="active">Laporan admin</li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">LAPORAN PASIEN</p>
					</div>	
					<br />
					<div>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
						<p align="center">
							<b>Periode dari</b> <input type="text" id="tgl_dari" name="tgl_dari" /> 
							<b>sampai</b> 
							<input type="text" id="tgl_sampai" name="tgl_sampai" />
				
							<input type="submit" name="submit" id="cari_pas" value="cari"  />
						</p>
					</form>	
					<?php
					$tgl_dari = $_POST['tgl_dari'];
					$tgl_sampai = $_POST['tgl_sampai'];
					$tahun= substr($tgl_dari,6,10);
						$bulan= substr($tgl_dari,0,2);
						$hari = substr($tgl_dari,3,2);
						$result1 = $tahun."-".$bulan."-".$hari;
						
					$tahun1= substr($tgl_sampai,6,10);
						$bulan1= substr($tgl_sampai,0,2);
						$hari1 = substr($tgl_sampai,3,2);
						$result2 = $tahun1."-".$bulan1."-".$hari1;
					echo"<p><a href='konversi.php?tgl_dari=$result1&tgl_sampai=$result2'><img src='css/gambar/1403352208_pdf.png' /></a></p>";
					
					?>
					<div id="table_baru">
					<table class="table">
						<tr>
							<th>No</th>
							<th>Nama Pasien</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>Jenis Kelamin</th>
							
							<th>Tanggal Lahir</th>
							<th>No Telpon</th>
							<th>Tanggal Periksa</th>
							<th>Penyakit</th>
							
							
						</tr>
						<?php
						
						if($_POST['submit']){
							if($tgl_dari=="" and $tgl_sampai==""){
								$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit order by a.id_pasien asc");
							}else if($tgl_sampai==""){
								$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit and c.tanggal_periksa='$result1' order by a.id_pasien asc");
							
							}else if($tgl_dari==""){
								$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit and c.tanggal_periksa='$result2' order by a.id_pasien asc");
								
							}else{
							$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit and c.tanggal_periksa between '$result1' and '$result2' order by a.id_pasien asc");
							}
						}else{
							$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit order by a.id_pasien asc");
							
							}
							$no = 1;
							$jnk="";
							while($r=mysql_fetch_array($sql)){
							$id_pasien = $r['id_pasien'];
							$nama_pasien=$r['nama_pasien'];
							$alamat_pasien = $r['alamat_pasien'];
							$kota = $r['kota'];
							$jenis_kelamin=$r['jenis_kelamin'];
							if($jenis_kelamin=="L"){
								$jnk="Laki-Laki";
							
							}else{
							
								$jnk="Perempuan";
							}
							$tgl_lahir= $r['tanggal_lahir'];
								$tahun= substr($tgl_lahir,0,4);
								$bulan= substr($tgl_lahir,5,2);
								$hari = substr($tgl_lahir,8,2);
								$resul = $hari."-".$bulan."-".$tahun;
							$no_telp = $r['no_telp_pasien'];
							$tmpt_lahir = $r['tempat_lahir'];
							$tgl_periksa = $r['tanggal_periksa'];
								$tahun= substr($tgl_periksa,0,4);
								$bulan= substr($tgl_periksa,5,2);
								$hari = substr($tgl_periksa,8,2);
								$tgl_periksa = $hari."-".$bulan."-".$tahun;
							$penyakit = $r['penyakit'];
							$solusi = $r['solusi'];
							echo "<tr>
								<td>$no</td>
								<td>$nama_pasien</td>
								<td>$alamat_pasien</td>
								<td>$kota</td>
								<td><p align='center'>$jnk</p></td>
							
								<td><p align='center'>$resul</p></td>
								<td>$no_telp</td>
								<td><p align='center'>$tgl_periksa</p></td>
								<td>$penyakit</td>
								
								</tr>";
							$no++;
				
							}
						?>
					</table>
					</div>
					</div>	
					</div>
			</div>
		</div>
  </body>
</html>
<?php

}
?>