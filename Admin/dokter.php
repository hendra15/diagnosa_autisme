<?php
	include_once("koneksi/conn.php");
	error_reporting(0);
	session_start();
	
	$nid_dok=$_GET['nid'];
	$nama=$_GET['nama_dokter'];
	$telp=$_GET['no_telp_dokter'];
	$alamat=$_GET['alamat_dokter'];
	$kota=$_GET['kota'];
	$spesial=$_GET['spesialisasi'];
	$user_dok=$_GET['user'];
	$pass_dok=$_GET['password'];
	$pass_dok=base64_decode($pass_dok);
	$sts=$_GET['sts'];
	
	/* kode unik */
	$query="select max(nid) as maxid from dokter";
	$hasil=mysql_query($query);
	$data=mysql_fetch_array($hasil);
	$idmax=$data['maxid'];
	
	$nomor=$idmax ++;
	if($idmax==1){
	$id_dok=sprintf("%04s",$idmax);
	$id_dokt="DOK-$id_dok";
	}else{
	$id_dokt=sprintf("%04s",$idmax);
	
	}


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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dokter</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/tampilan.css" rel="stylesheet">
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.3.custom.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	<link rel="stylesheet" href="js/colorbox.css" />
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
	$(document).ready(function(){
		var kota= $("#kota_hd").val();
		var spesial = $("#spesial_hd").val();
		$("#kota").val(kota);
		$("#spesial").val(spesial);
	
	
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
			location.href = "http://localhost:8080/diagnosa_autisme/admin/";
			},
			onLoad: function(){
			$('#cboxClose').hide();
			}	
			});
			
			
		$("#tambah_spesial").colorbox({
	width:"40%",
	height:"60%",
	iframe:true,
	href:"input_spesial.php",
	overlayClose:false,
	escKey:false,
	onClosed: function(){
			$('#cboxClose').show();
							location.reload();
			}
	
	
			});	
			
	//validasi nama		
			
			$("#nama").keypress(function(event) {
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
		
	 function digitsOnly(obj){
      obj.value=obj.value.replace(/[^\d]/g,''); 
	  var len = obj.value.length;
	  
	  if(len>=12){
		obj.value = obj.value.substring(0,12);
	  }
    }  	
		
		
		function batal_dokter(){
			$("#nama").val("");
			$("#telp").val("");
			$("#alamat").val("");
			$("#user").val("");
			$("#pass").val("");
		
		}

	function tests(nama){
	switch (nama.id){
	
		case "nama":
			if(nama.value==""){
				$("#nama").popover('show');
			}
			break;
		case "telp":
			if(nama.value==""){
				$("#telp").popover('show');
			}
			break;
		case "alamat":
			if(nama.value==""){
				$("#alamat").popover('show');
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
						<li><a href="lihat_dokter.php">Dokter</a></li>
						<li class="active">Input Dokter</li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">DOKTER</p>
					</div>
					<input type="text" id="kota_hd" value="<?php echo $kota  ?>" hidden />
					<input type="text" id="spesial_hd" value="<?php echo $spesial  ?>" hidden />
					<div id="peringatan" class="alert alert-danger">Data tidak boleh kosong</div>
					<p class="biodata lblnid"> NID  </p>
					<?php
						if($sts=="perbarui_dokter"){
							echo"<p class=\"biodata nid\"><input type=\"text\" id=\"nid\" name=\"nid\" placeholder=\"NID\" value=\"$nid_dok\" /></p>";	
						}else{
							echo"<p class=\"biodata nid\"><input type=\"text\" id=\"nid\" name=\"nid\" placeholder=\"NID\" value=\"$id_dokt\" /></p>";	
					
						}
					?>
					
					<p class="biodata lblnama"> Nama </p>
					<p class="biodata nama"><input type="text" id="nama" name="Nama" placeholder="Nama Lengkap" value="<?php echo "$nama"; ?>" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Nama tidak Boleh kosong" onblur="tests(this)" /></p>
					<p class="biodata lbltelp"> Handphone </p>
					<p class="biodata telp"><input type="text" id="telp" name="Telp" placeholder="Nomor Handphone" onKeyUp="digitsOnly(this)" value="<?php echo "$telp"; ?>" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Nomor tidak Boleh kosong" onblur="tests(this)" /></p>
					<p class="biodata lblalamat">Alamat</p>
					<p class="biodata alamat"><textarea rows="5" cols="5" id="alamat" placeholder="Alamat" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Alamat tidak Boleh kosong" onblur="tests(this)"><?php echo"$alamat"; ?></textarea></p>
					<p class="biodata lblkota">Kota</p>
					<p class="biodata kota">
						<select id="kota" name="kota">
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
					<p class="biodata lblspesial">Spesialisasi</p>
					<p class="biodata spesial">
						<select id="spesial" name="spesial">
							<?php
								$rs=$koneksi->Execute("select * from spesialisasi order by spesialisasi asc");
								if($rs->RecordCount() >0){
									while(!$rs->EOF){
										$id_spesialisasi=$rs->fields[0];
										$spesialisasi=$rs->fields[1];
										echo"<option value=\"$id_spesialisasi\" selected>$spesialisasi</option>";
										
										$rs->MoveNext();
									}
								}
							?>
						</select><!--<a href="" id="tambah_spesial"><img src="gambar/edit_add.png" width="28px" height="28px" /></a> -->
					</p>
					<p class="biodata lbluser">Username</p>
					<?php
						if($sts=="perbarui_dokter"){
							echo"<p class=\"biodata user\"><input type=\"text\" id=\"user\" name=\"user\" placeholder=\"UserName\" value='$user_dok' disabled /></p>";
						}else{
							echo"<p class=\"biodata user\"><input type=\"text\" id=\"user\" name=\"user\" placeholder=\"UserName\" value='$user_dok' data-container=\"body\" data-toggle=\"popover\" data-placement=\"right\" data-content=\"Inputan User tidak Boleh kosong\" onblur=\"tests(this)\" /></p>";
						}
					
					?>
					<p class="biodata lblpass">Password</p>
					<p class="biodata pass"><input type="password" id="pass" name="pass" placeholder="password" value="<?php echo"$pass_dok"; ?>" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Password tidak Boleh kosong" onblur="tests(this)" /></p>
					
					<?php
					if($sts=="perbarui_dokter"){
						echo"<p class=\"biodata simpan_dokter\"><input type=\"button\" id=\"perbarui\" name=\"perbarui\" value=\"perbarui\" onClick=\"perbarui_dokter()\" /></p>";
					}else{
						echo"<p class=\"biodata simpan_dokter\"><input type=\"button\" id=\"simpan\" name=\"simpan\" value=\"simpan\" onClick=\"simpan_dokter()\" /></p>";
					}
					?>
					<p class="biodata batal_dokter"><input type="button" id="batal" name="batal" value="bersihkan" onClick="batal_dokter()" /></p>
					
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