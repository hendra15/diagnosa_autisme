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

	
					
	
	if($id_pasien=="PAS"){	
	

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
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
	
	

		
	</script> 
  </head>
  <body>
  <div class="hdr" align="right">
		<input type="text" id="kotarhs" value="<?php echo $kotapasien ?>" hidden />
		<input type="text" id="kotalhr" value="<?php echo $kota_lahir ?>" hidden />
				<?php
			if($user!=""){
			
				echo"
				<button type=\"button\" id=\"btn_login\" onFocus=\"tampil_login()\" class=\"btn btn-primary\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"bottom\" data-html=\"true\" data-content=\"<div class='test1'><a href='profil.php'>Profilku</a></div><hr border='3px'></hr><div class='test1'><a href='diagnosa.php'>Diagnosa</a></div><hr border='3px'></hr><div class='test1'><a href='keluar.php'>Keluar</a></div>\" >
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
						<li class="active">History Pasien</a></li>
					</ol>
				</div>
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">HISTORY PASIEN</p>
					</div>
					<table class="table">
						<tr>
							<th>No</th>
							<th>Tanggal Periksa</th>
							<th>Penyakit</th>
							<th>Solusi</th>
						</tr>
						<?php
							$sql = mysql_query("Select b.tanggal_periksa,c.penyakit,b.solusi from pasein a,diagnosa b,id_penyakit c,login_aja d where b.id_penyakit=c.id_penyakit and b.id_pasien=a.id_pasien and a.user=d.user and a.user='$user' order by b.tanggal_periksa asc");
							$no = 1;
							$jnk="";
							while($r=mysql_fetch_array($sql)){
							$tgl_periksa = $r['tanggal_periksa'];
							$penyakit=$r['penyakit'];
							$solusi = $r['solusi'];
							
							
							echo "<tr>
								<td>$no</td>
								<td>$tgl_periksa</td>
								<td>$penyakit</td>
								<td>$solusi</td>
	
								</tr>";
							$no++;
				
							}
						?>
					</table>

						

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