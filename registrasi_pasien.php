<?php
	include_once("Admin/koneksi/conn.php");
	error_reporting(0);
	session_start();
	
	
	/* kode unik */
	$query="select max(id_pasien) as maxid from pasein";
	$hasil=mysql_query($query);
	$data=mysql_fetch_array($hasil);
	$idmax=$data['maxid'];
	
	$nomor=$idmax ++;
	
	if($idmax==1){
	$id_pass=sprintf("%04s",$idmax);
	$id_pasien="PAS-$id_pass";
	}else{
	$id_pasien=sprintf("%04s",$idmax);
	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Pasien</title>
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
	$("#peringatan").hide();
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
	
	function bersihkan_pasien(){
	$("#nama_pasien").val("");
	$("#telp_pas").val("");
	$("#alamat_pas").val("");
	$("#tgl_lahir").val("");
	$("#user_pasien").val("");
	$("#pass_pasien").val("");

}
		
	</script> 
  </head>
  <body>
  <div class="hdr" align="right">
				<button type="button" id="btn_login" onFocus="tampil_login()" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="<form action='login_pasien.php' method='post'><input type='text' id='user_pasien' name='user_pasien' placeholder='user' /><br /><input type='password' id='pass_pasien' name='pass_pasien' placeholder='password' /><br /><input type='submit' id='masuk_user' name='masuk_user' value='Masuk' /></form><br /><hr border='3px'></hr><a href='registrasi_pasien.php'>Daftar sekarang</a>" >
				<p class="bs">Login</p>
				
				</button>
		</div>
		<div>
		<br />
		</div>
		<div id="contentpas">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ol class="breadcrumb">
						<li><a href="index.php">index</a></li>
						<li class="active">Registrasi Pasien</a></li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">REGISTRASI PASIEN</p>
					</div>
					<div id="peringatan" class="alert alert-danger">Data tidak boleh kosong</div>
					
					<p class="biodata lblnid"> ID PASIEN  </p>
						<p class="biodata nid"><input type="text" id="id_pasien" name="id_pasien" placeholder="ID PASIEN" value="<?php echo $id_pasien; ?>" disabled/></p>
					<p class="biodata lblnama"> Nama Pasien </p>
						<p class="biodata nama"><input type="text" id="nama_pasien" name="nama_pasien" placeholder="Nama Lengkap" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Nama tidak Boleh kosong" onblur="tests(this)" /></p>
					<p class="biodata lbltelp"> Handphone </p>
						<p class="biodata telp"><input type="text" id="telp_pas" name="telp_pas" placeholder="Nomor Handphone" onKeyUp="digitsOnly(this)" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Nomor tidak Boleh kosong" onblur="tests(this)" /></p>
					<p class="biodata lblalamat">Alamat</p>
						<p class="biodata alamat"><textarea rows="5" cols="5" id="alamat_pas" placeholder="Alamat" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Alamat tidak Boleh kosong" onblur="tests(this)"></textarea></p>
					<p class="biodata lblkota">Kota</p>
						<p class="biodata kota">
						<select id="kota_pas" name="kota_pas">
							<?php
								$rs=$koneksi->Execute("select * from id_kota order by kota asc");
								if($rs->RecordCount() > 0){
									while(!$rs->EOF){
										$id_kota=$rs->fields[0];
										$nama_kota=$rs->fields[1];
										echo "<option value=\"$id_kota\" selected>$nama_kota</option>";
									
									$rs->MoveNext();
									}
								
								}
							?>
						</select>
					</p>
					<p class="biodata lblspesial">Jenis Kelamin</p>
					<p class="biodata spesial">&nbsp;<input type="radio" name="jenkel" id="jenkel" value="L"  checked>&nbsp;Laki-Laki &nbsp; <input type="radio" name="jenkel" id="jenkel" value="P">&nbsp;Perempuan</p>
					<p class="biodata lbluser">Tempat Lahir</p>
					<p class="biodata user">
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
					</p>
					<p class="biodata lblpass">Tanggal Lahir</p>
					<p class="biodata pass"><input type="date" id="tgl_lahir" name="tgl_lahir"  /></p>
					<p class="biodata lblpengguna">User</p>
					<p class="biodata pengguna"><input type="text" id="user_pasien" name="user_pasien"  placeholder="User" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan User tidak Boleh kosong" onblur="tests(this)" /></p>
						
					<p class="biodata lblpassword">Pass</p>
					<p class="biodata password"><input type="password" id="pass_pasien" name="pass_pasien" placeholder="Password" data-container="body" data-toggle="popover" data-placement="right" data-content="Inputan Password tidak Boleh kosong" onblur="tests(this)" /></p>
					
					
					<p class="biodata simpan_pas"><input type="button" id="simpan_pas" name="simpan_pas" value="simpan" onClick="simpan_pasien()" /></p>
					<p class="biodata batal_pas"><input type="button" id="bersihkan_pas" name="bersihkan_pas" value="bersihkan" onClick="bersihkan_pasien()" /></p>
					
					</div>

			</div>
		</div>
  </body>
</html>
