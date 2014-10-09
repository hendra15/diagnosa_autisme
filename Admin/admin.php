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

	
	$id_admin=$_GET['id_admin'];
	$nama_admin=$_GET['nama_admin'];
	$alamat_admin=$_GET['alamat_admin'];
	$kota=$_GET['id_kota'];
	$user_admin=$_GET['user'];
	$pass_admin=$_GET['password'];
	$password = base64_decode($pass_admin);
	$sts=$_GET['sts'];
	
	
	
	/*Membuat kode unik */
	
	$query="select max(id_admin) as maxid from Admin";
	$hasil=mysql_query($query);
	$data=mysql_fetch_array($hasil);
	$idmax=$data['maxid'];
	
	
	$nomor=$idmax ++;
	if ($idmax==1){
	$id_adm=sprintf("%04s",$idmax);
	
	$id_admm="ADM-$id_adm";
	}else{
	$id_admm=sprintf("%04s",$idmax);
	
	}
	
if($id=="ADM"){
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
	.custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
    /* support: IE7 */
    *height: 1.7em;
    *top: 0.1em;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 0.3em;
  }
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
		var kt=$("#kt").val()
		$("#kota").val(kt);
		$("#peringatan").hide();
		$("#tambah_kota").colorbox({
	width:"40%",
	height:"60%",
	iframe:true,
	href:"input_kota.php",
	overlayClose:false,
	escKey:false,
	onClosed: function(){
			$('#cboxClose').show();
							location.reload();
			}
	
	
			});
			
			
	$("#nama_admin").keypress(function(event) {
				var charCode = (event.which) ? event.which : event.keyCode
				if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122)||(charCode == 32))
				return true;
				return false;
			});		

})
	$(function(){
		$("#accordion").accordion();
		$( "#datepicker" ).datepicker({
			inline: true
		});
		
		});
		
		
		
		function batal_admin(){
			$("#id").val("");
			$("#nama_admin").val("");
			$("#alamat_admin").val("");
			$("#user").val("");
			$("#pass").val("");
		
		}
	function test(nama){
	switch(nama.id){
		case "nama_admin": 
		if(nama.value==""){
		$("#nama_admin").popover('show');
		}
				break;
		case "alamat_admin": 
			if(nama.value==""){
				$("#alamat_admin").popover('show');
			}
			break;
		case "user": 	
			if(nama.value==""){
				$("#user").popover('show');
			}
			break;
		case "pass": 	
			if(nama.value==""){
				$("#pass").popover('show');
			}
			break;
		
	}
}	


function batal_admin1(){
	$("#nama_admin").val("");
	$("#alamat_admin").val("");
	$("#pass").val("");
	$("#peringatan").hide();

}
	
	//$("#tambah_kota").colorbox({inline:true,  href:"#tampilan"});
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
			hi,<?php echo $user ?>
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
				</div>
				</a>
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
						<li class="active">Input Admin</li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">ADMIN</p>
					</div>
					<input type="text" id="kt" value="<?php  echo $kota ?>" hidden />
					<div id="peringatan" class="alert alert-danger">
					Maaf Data tidak Boleh Kosong!
					</div>
					
					<p class="biodata lblnid"> ID  </p>
					<?php
						if($sts=="perbarui_admin"){
							echo"<p class=\"biodata nid\"><input type=\"text\" id=\"id\" name=\"id\" placeholder=\"ID\" value=\"$id_admin\" disabled/></p>";
							
						}else{
					
							echo"<p class=\"biodata nid\"><input type=\"text\" id=\"id\" name=\"id\" placeholder=\"ID\" value=\"$id_admm\" disabled/></p>";
						}
					?>
					<p class="biodata lblnama"> Nama </p>
					<p class="biodata nama"><input type="text" id="nama_admin" name="Nama_admin" placeholder="Nama Lengkap" value="<?php echo "$nama_admin"; ?>" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Nama tidak Boleh kosong"  onblur="test(this)" /></p>
					<p class="biodata lblalamat">Alamat</p>
					<p class="biodata alamat"><textarea rows="5" cols="5" id="alamat_admin" placeholder="Alamat" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Alamat tidak Boleh kosong" onblur="test(this)"><?php echo"$alamat_admin"; ?></textarea></p>
					<p class="biodata lblkota">Kota</p>
					<p class="biodata kota">
						<select id="kota" name="kota_admin">
							<?php
								$rs=$koneksi->Execute("select * from id_kota order by kota asc");
								if($rs->RecordCount() > 0){
									while(!$rs->EOF){
										$id_kota=$rs->fields[0];
										$nama_kota=$rs->fields[1];
										echo "<option value=\"$id_kota\">$nama_kota</option>";
									
									$rs->MoveNext();
									}
								
								}
							?>
						</select>
						<!--<a href="" id="tambah_kota"><img src="gambar/edit_add.png" width="28px" height="28px" /></a>-->
					</p>
					<p class="biodata lbluser">Username</p>
					<?php
						if($sts=="perbarui_admin"){
								echo"<p class=\"biodata user\"><input type=\"text\" id=\"user\" name=\"user\" placeholder=\"UserName\" value=\"$user_admin\" disabled /></p>";
						
						
						}else{
							echo"<p class=\"biodata user\"><input type=\"text\" id=\"user\" name=\"user\" placeholder=\"UserName\" value=\"$user_admin\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"right\" data-content=\"Inputan user tidak Boleh kosong\" onblur=\"test(this)\" /></p>";
						
						}
					
					?>
					<p class="biodata lblpass">Password</p>
					<p class="biodata pass"><input type="password" id="pass" name="pass" placeholder="password" value="<?php echo"$password"; ?>" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Password tidak Boleh kosong" onblur="test(this)" /></p>
					
					<?php
						if($sts=="perbarui_admin"){
							echo "<p class=\"biodata simpan1\"><input type=\"button\" id=\"perbarui\" name=\"perbarui\" value=\"perbarui\" onClick=\"perbarui_admin()\" /></p>"	;
						}else{
							echo"<p class=\"biodata simpan1\"><input type=\"button\" id=\"simpan\" name=\"simpan\" value=\"simpan\" onClick=\"simpan_admin()\" /></p>";
					}
					?>
					<p class="biodata batal1"><input type="button" id="batal" name="batal" value="bersihkan" onClick="batal_admin1()" /></p>
					
					
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