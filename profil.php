<?php
	include_once("Admin/koneksi/conn.php");
	error_reporting(0);
	session_start();

if(!isset($_SESSION['user'])){
	echo "<script type='text/javascript'>location.href='index.php'</script>";

}else{
	$user=$_SESSION['user'];
	$id_pasien = $_SESSION['id_pasien'];
	$tanggal_lahir = $_SESSION['tanggal_lahir'];
	$tgal = date('d-m-Y');
	
	$tanggal_lahir=substr($tanggal_lahir,0,4);
	$tgal= substr($tgal,6,10);
	$umur = $tgal-$tanggal_lahir;
	$jk="";
	
	$rq="select a.id_pasien as 'id pasien',a.nama_pasien,a.no_telp_pasien,a.alamat_pasien,c.id_kota,a.jenis_kelamin,a.tempat,a.tanggal_lahir,b.password,c.kota,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir' from pasein a, login_aja b,id_kota c where a.user=b.user and a.id_kota=c.id_kota and a.user='$user'";
					$bb=$koneksi->Execute($rq);
					if($bb->RecordCount()>=0){
						$pasienbaru=$bb->fields[0];
						$namapasienbaru=$bb->fields[1];
						$no_telppasien = $bb->fields[2];
						$alamat_pasienbaru = $bb->fields[3];
						$kotapasien= $bb->fields[4];
						$jenkel = $bb->fields[5];
							if($jenkel=="L"){
									$jk="Laki-Laki";
							
							}else{
									$jk="Perempuan";
								
							}
						
						$kota_lahir = $bb->fields[6];
						$tgl_lahirpas = $bb->fields[7];
							$tahun= substr($tgl_lahirpas,0,4);
								$bulan= substr($tgl_lahirpas,5,2);
								$hari = substr($tgl_lahirpas,8,2);
								$resul = $hari."-".$bulan."-".$tahun;
						$passwordpas = $bb->fields[8];
						$kotaa= $bb->fields[9];
						$tmpt_lahir = $bb->fields[10];
					
					}
					
	
	if($id_pasien=="PAS"){	
	

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Pasien</title>
    <link href="Admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="Admin/css/tampilan.css" rel="stylesheet">
	<link rel="stylesheet" href="Admin/css/ui-lightness/jquery-ui-1.10.3.custom.css">
	<script src="Admin/js/jquery-1.9.1.js"></script>
	<script src="Admin/js/jquery-ui-1.10.3.custom.js"></script>
	<link rel="stylesheet" href="Admin/js/colorbox.css" />
	 <script src="Admin/js/bootstrap.min.js"></script>
	 <script src="proses_pasien.js"></script>
	  <script type="text/javascript" src="Admin/js/jquery.colorbox-min.js"></script>
	<style type="text/css">
	body{
		position:relative;
		background-image:url('Admin/css/gambar/test.png');
	}
	</style>
	<script type="text/javascript">
		
	
	
	$(document).ready(function(){
	
	$("#perbarui").hide();
	$("#nmpas").hide();
	$("#telp_pas").hide();
	$("#alamat_pas").hide();
	$("#kota_pas").hide();
	$("#jkl").hide();
	$("#tempat_lahir").hide();
	$("#lahirtgl").hide();
	$("#peringatan").hide();
	$("#bersihkan_pas").hide();
	$("#pss").hide();
	$("#gbr").hide();
	$("#nama_pasien").keypress(function(event) {
				var charCode = (event.which) ? event.which : event.keyCode
				if ((charCode >= 65 && charCode <= 90)||(charCode >= 97 && charCode <= 122)||(charCode == 32))
				return true;
				return false;
			});
	
	
	
	})
	
	
		
	 function digitsOnly(obj){
      obj.value=obj.value.replace(/[^\d]/g,''); 
	  var len = obj.value.length;
	  
	  if(len>=12){
		obj.value = obj.value.substring(0,12);
	  }
    }  	
		
		

	function tests(nama){
	switch (nama.id){
	
		case "nama_pasien":
			if(nama.value==""){
				$("#nama_pasien").popover('show');
			}
			break;
		case "telp_pas":
			if(nama.value==""){
				$("#telp_pas").popover('show');
			}
			break;
		case "alamat_pas":
			if(nama.value==""){
				$("#alamat_pas").popover('show');
			}
			break;
		case "tempat_lahir"	:
			if(nama.value==""){
				$("#tempat_lahir").popover('show');
			}
			
		case "user_pasien":
			if(nama.value==""){
				$("#user_pasien").popover('show');
			}
			break;
			
		case "pass_pasien":
			if(nama.value==""){
				$("#pass_pasien").popover('show');
			}
			break;
	}
	}
	
	function tampil_login(){
	$("#btn_login").popover('show');
	
	}
	
	function set_datapas(){
		var as=$("#kotarhs").val();
		var ab=$("#kotalhr").val();
		$("#kota_pas").val(as);
		$("#tempat_lahir").val(ab);
	
	
	$("#perbarui_data").hide();
	$("#psiennama").hide();
	$("#psientelp").hide();
	$("#psienalamat").hide();
	$("#psienkota").hide();
	$("#jenkkel").hide();
	$("#tempat_lahirpas").hide();
	$("#lahirtglpas").hide();
	$("#passwordpas").hide();
	$("#perbarui").show();
	$("#nmpas").show();
	$("#telp_pas").show();
	$("#alamat_pas").show();
	$("#kota_pas").show();
	$("#jkl").show();
	$("#tempat_lahir").show();
	$("#lahirtgl").show();
	$("#pss").show();
	$("#gbr").show();
	$("#bersihkan_pas").show();

	}
	
	function bersihkan_pasien(){
	$("#nama_pasien").val("");
	$("#telp_pas").val("");
	$("#alamat_pas").val("");
	$("#tgl_lahir").val("");
	$("#pass_pasien").val("");

}


		
	</script> 
  </head>
  <body>
  <div class="hdr" align="right">
		<input type="text" id="kotarhs" value="<?php echo $kotapasien ?>" hidden />
		<input type="text" id="kotalhr" value="<?php echo $kota_lahir ?>" hidden />
				<?php
			if($user!=""){
			
				echo"
				<button type=\"button\" id=\"btn_login\" onFocus=\"tampil_login()\" class=\"btn btn-primary\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"bottom\" data-html=\"true\" data-content=\"<div class='test1'><a href='profil.php'>Profilku</a></div><hr border='3px'></hr><div class='test1'><a href='diagnosa.php'>Diagnosa</a></div><hr border='3px'></hr><div class='test1'><a href='history.php'>History</a></div><hr border='3px'></hr><div class='test1'><a href='keluar.php'>Keluar</a></div>\" >
				<p class=\"bs\">$user</p>
				</button>";
			
			}else{
			
				echo"
				<button type=\"button\" id=\"btn_login\" onFocus=\"tampil_login()\" class=\"btn btn-primary\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"bottom\" data-html=\"true\" data-content=\"<form action='login_pasien.php' method='post'><input type='text' id='user_pasien' name='user_pasien' placeholder='user' /><br /><input type='password' id='pass_pasien' name='pass_pasien' placeholder='password' /><br /><input type='submit' id='masuk_user' name='masuk_user' value='Masuk' /></form><br /><hr border='3px'></hr><a href='registrasi_pasien.php'>Daftar sekarang</a>\" >
				<p class=\"bs\">Login</p>
				</button>";
				}
			?>	
		</div>
		<div>
		<br />
		</div>
		<div id="contentpas">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ol class="breadcrumb">
						<li><a href="index.php">index</a></li>
						<li class="active">Profil Pasien</a></li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">PROFIL PASIEN</p>
					</div>
					<div id="peringatan" class="alert alert-danger">Data tidak boleh kosong</div>
					
					<p class="biodata lblnid"> Nama Pasien  </p>
						
							<div id="psiennama" class="biodata nid">
								<?php
									echo $namapasienbaru;
								
								?>
							</div>	
							<div id="nmpas" class="biodata nid">
							<input type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Lengkap" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Nama tidak Boleh kosong" onblur="tests(this)" value="<?php echo $namapasienbaru  ?>" />
							</div>
						
					<p class="biodata lblhp"> Handphone </p>
						
							<div class="biodata nama" id="psientelp">
								<?php 
									echo $no_telppasien 
									
								?>
							</div>
							<div class="biodata nama" id="telppsien">
							<input type="text" id="telp_pas" name="telp_pas" placeholder="Nomor Handphone" onKeyUp="digitsOnly(this)" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Nomor tidak Boleh kosong" onblur="tests(this)" value="<?php echo $no_telppasien ?>" />
							</div>
					<p class="biodata lblalamaat"> Alamat</p>
						
							<div class="biodata telp" id="psienalamat">
								<?php 
									echo $alamat_pasienbaru  
									
								?>
							</div>
							<div class="biodata telp" id="psalamat">
							<textarea rows="5" cols="5" id="alamat_pas" placeholder="Alamat" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Alamat tidak Boleh kosong" onblur="tests(this)">
								<?php 
								echo $alamat_pasienbaru  
								?>
							</textarea>
							</div>
					<p class="biodata lblkotaa">Kota</p>
						<div class="biodata alamat" id="psienkota">
							<?php
							
								echo $kotaa
						
							?>
						</div>
						<div id="pskota" class="biodata alamat">
						<select id="kota_pas" name="kota_pas">
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
						</div>
					<p class="biodata lbljenkel">Jenis Kelamin</p>
						
							<div id="jenkkel" class="biodata kota">
								<?php
									echo $jk
									
								?>
							</div>
							<div id="jkl" class="biodata kota">
						<?php 
							if($jenkel=="L"){
								echo"
										&nbsp;<input type=\"radio\" name=\"jenkel\" id=\"jenkel\" value=\"L\"  checked />&nbsp;Laki-Laki &nbsp; 
										<input type=\"radio\" name=\"jenkel\" id=\"jenkel\" value=\"P\" />&nbsp;Perempuan";
							
							}else{
								echo"
										&nbsp;<input type=\"radio\" name=\"jenkel\" id=\"jenkel\" value=\"L\" />&nbsp;Laki-Laki &nbsp; 
										<input type=\"radio\" name=\"jenkel\" id=\"jenkel\" value=\"P\" checked />&nbsp;Perempuan";
							
							}
						
						?>
						</div>
					
					<p class="biodata lbltmptlahir">Tempat Lahir</p>
						<div id="tempat_lahirpas" class="biodata spesial">
							<?php
								
								echo $tmpt_lahir
							?>
						</div>
						<div id="tempat_lahirr" class="biodata spesial">
						<select id="tempat_lahir" name="tempat_lahir">
						
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
						</div>
					
					<p class="biodata lbltgllahir">Tanggal Lahir</p>
					
						<div id="lahirtglpas" class="biodata user">
							<?php
							
								echo $resul
							?>
						</div>
						<div id="lahirtgl" class="biodata user">
						<input type="date" id="tgl_lahir" name="tgl_lahir"  value="<?php echo $tgl_lahirpas  ?>" />
						</div>
					
					<p class="biodata lblpasss">Password</p>
					
						<div id="passwordpas" class="biodata pass">
							<?php
								echo $passwordpas
								
							?>
						</div>
						<div id="pss" class="biodata pass">
						<input type="password" id="pass_pasien" name="pass_pasien" placeholder="Password" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Password tidak Boleh kosong" onblur="tests(this)" value="<?php $psp=base64_decode($passwordpas); echo $psp  ?>" />
						</div>
					
				
					
					<div  class="biodata simpan_pass">
						<input type="button" id="perbarui_data" name="perbarui_data" value="Perbarui Profil" onClick="set_datapas()" /><input type="button" id="perbarui" name="perbarui" value="Perbarui" onClick="perbarui_pas()" />
						&nbsp;&nbsp;
						<input type="button" id="bersihkan_pas" name="bersihkan_pas" value="bersihkan" onClick="bersihkan_pasien()" />
					</div>
					<input type="text" id="id_pass" value="<?php echo $pasienbaru ?>" hidden />
					<input type="text" id="user" value="<?php echo $user ?>" hidden />
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