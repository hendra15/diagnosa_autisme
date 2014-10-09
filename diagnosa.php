<?php
	session_start();
	include_once("Admin/koneksi/conn.php");
	error_reporting(0);
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
	
	$rq="select a.id_pasien as 'id pasien' from pasein a, login_aja b where a.user=b.user and a.user='$user'";
					$bb=$koneksi->Execute($rq);
					if($bb->RecordCount()>=0){
						$pasienbaru=$bb->fields[0];
					
					}
					
	
	if($id_pasien=="PAS"){
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diagnosa</title>
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
	function tampil_login(){
	$("#btn_login").popover('show');
	
	}
	
	<!-- Script untuk menyembunyikan slider --!>
	
	$(function() {
    // run the currently selected effect
    function runEffect() {
      // get effect type from
      var selectedEffect = "fold";
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 600, height: 180 } };
      }
 
      // run the effect
      $( "#umur1" ).hide( selectedEffect, options, 1500);
	  $("#umur2").show(selectedEffect, options, 2000);
	  $( "#umur3" ).hide( selectedEffect, options, 1500);
	  $("#lama").hide();
	  $("#baru").show();
	  $("#baru1").hide();
	  $("#baru2").hide();
    };
	function runEffect1() {
      // get effect type from
      var selectedEffect = "fold";
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 600, height: 180 } };
      }
 
      // run the effect
      $( "#umur2" ).hide( selectedEffect, options, 1500);
	  $("#umur1").show(selectedEffect, options, 2000);
	  $("#lama").show();
	  $("#baru").hide();
	  $("#baru1").hide();
	  $("#baru2").hide();
    };
	function runEffect2() {
      // get effect type from
      var selectedEffect = "fold";
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 600, height: 180 } };
      }
 
      // run the effect
      $( "#umur2" ).hide( selectedEffect, options, 1500);
	  $("#umur3").show(selectedEffect, options, 2000);
	  $( "#umur4" ).hide( selectedEffect, options, 1500);
	  $("#baru1").show();
	  $("#baru").hide();
	  $("#baru2").hide();
	  $("#lama").hide();
    };
	function runEffect3() {
      // get effect type from
      var selectedEffect = "fold";
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 600, height: 180 } };
      }
 
      // run the effect
      $( "#umur3" ).hide( selectedEffect, options, 1500);
	  $("#umur4").show(selectedEffect, options, 2000);
	  $("#baru2").show();
	  $("#baru1").hide();
	  $("#baru").hide();
	  $("#lama").hide();
    };

 
    // set effect from select menu value
    $( "#next" ).click(function() {
      runEffect();
      return false;
    });
	   $( "#next1" ).click(function() {
      runEffect2();
      return false;
    });
	 $( "#next2" ).click(function() {
      runEffect3();
      return false;
    });
	$( "#previous" ).click(function() {
      runEffect1();
      return false;
    });
	$( "#previous1" ).click(function() {
      runEffect();
      return false;
    });
	$( "#previous2" ).click(function() {
      runEffect2();
      return false;
    });
	 $("#baru").hide();
	 $("#umur2").hide();
	 $("#umur3").hide();
	 $("#umur4").hide();
	 $("#baru1").hide();
	 $("#baru2").hide();
	 
	 
  });
	
<!--- sampai sini --!>

	</script>
  </head>
  <body>
		<div class="hdr" align="right">
			<?php
			if($user!=""){
			
				echo"
				<button type=\"button\" id=\"btn_login\" onFocus=\"tampil_login()\" class=\"btn btn-primary\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"bottom\" data-html=\"true\" data-content=\"<div class='test1'><a href='profil.php'>Profilku</a></div><hr border='3px'></hr><div class='test1'><a href='keluar.php'>Keluar</a></div>\" >
				<p class=\"bs\">$user</p>
				</button>";
			
			}else{
			
				echo"
				<button type=\"button\" id=\"btn_login\" onFocus=\"tampil_login()\" class=\"btn btn-primary\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"bottom\" data-html=\"true\" data-content=\"<form action='login_pasien.php' method='post'><input type='text' id='user_pasien' name='user_pasien' placeholder='user' /><br /><input type='password' id='pass_pasien' name='pass_pasien' placeholder='password' /><br /><input type='submit' id='masuk_user' name='masuk_user' value='Masuk' /></form><br /><hr border='3px'></hr><a href='registrasi_pasien.php'>Daftar sekarang</a>\" >
				<p class=\"bs\">Login</p>
				</button>";
				}
			?>	
		<div style="visibility:hidden">	
			<input type="text" id="pengguna" name="pengguna" value="<?php echo"$pasienbaru"; ?>" />
		</div>
		</div>	
		<div id="contentpasien1">
			<div class="panel panel-default">
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">DIAGNOSA AUTISME</p>
					</div>
					<p class="gambar1">
				
					<?php
						if($umur<1){
							echo"<div id=\"umur1\" align=\"justify\">
								<p>1.  Bayi Tampak tenang dan Jarang Menangis ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g1a\" id=\"g1a\" value=\"Y\"  />Ya
								&nbsp; <input type=\"radio\" name=\"g1a\" id=\"g1a\" value=\"T\" checked/>Tidak
								</p>
								<p>2.  Apakah Bayi sulit bila digendong ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g2a\" id=\"g2a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g2a\" id=\"g2a\" value=\"T\" checked/>Tidak
								</p>
								<p>3.  Apakah Bayi tidak mengoceh ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g3a\" id=\"g3a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g3a\" id=\"g3a\" value=\"T\" checked/>Tidak
								</p>
								<p>4.  Apakah Bayi tidak senang di-ayun dilutut ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g4a\" id=\"g4a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g4a\" id=\"g4a\" value=\"T\" checked/>Tidak
								</p>
								<p>5.  Apakah Bayi tidak mau menatap mata ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g13a\" id=\"g13a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g13a\" id=\"g13a\" value=\"T\" checked/>Tidak
								</p>
								<p>6.  Apakah perkembangan agak terlambat misal dalam berjalan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g19a\" id=\"g19a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g19a\" id=\"g19a\" value=\"T\" checked/>Tidak
								</p>
								<p>7.  Apakah Bayi menolak untuk dipeluk ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g25a\" id=\"g25a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g25a\" id=\"g25a\" value=\"T\" checked/>Tidak
								</p>
								<p>8.  Apakah Bayi tiba-tiba suka menangis dan tertawa tanpa sebab ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g26a\" id=\"g26a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g26a\" id=\"g26a\" value=\"T\" checked/>Tidak
								</p>
								<p>9.  Apakah Bayi bermain dengan benda yang bukan mainan misal ujung selimut ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g28a\" id=\"g28a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g28a\" id=\"g28a\" value=\"T\" checked/>Tidak
								</p>
								<p>10. Tidak ada senyum sosial saat bertmu orang lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g36a\" id=\"g36a\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g36a\" id=\"g36a\" value=\"T\" checked/>Tidak
								</p>
				
							</div>
							<div id=\"lama\">
								<p class=\"tombol\" >
									<ul class=\"pager\">
										<li class=\"previous disabled\"><a id=\"kembali\" href=\"#\">&larr; Kembali</a></li>
										<li class=\"next\"><a id=\"proses\" href=\"Javascript:umur1();\">Proses&rarr;</a></li>
									</ul>
								</p>
							</div>							
							";
					}else if($umur <=2){
							echo"<div id=\"umur1\" align=\"justify\">
								<p>1.   Tidak senang di-ayun dilutut ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g4b\" id=\"g4b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g4b\" id=\"g4b\" value=\"T\" checked/>Tidak
								</p>
								<p>2.   Tidak tertarik dengan anak lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g5b\" id=\"g5b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g5b\" id=\"g5b\" value=\"T\" checked/>Tidak
								</p>
								<p>3.   Tidak suka memanjat benda seperti tangga ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g6b\" id=\"g6b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g6b\" id=\"g6b\" value=\"T\" checked/>Tidak
								</p>
								<p>4.   Tidak senang bermain petak umpet dan cilukba ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g7b\" id=\"g7b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g7b\" id=\"g7b\" value=\"T\" checked/>Tidak
								</p>
								<p>5.   Tidak suka bermain pura-pura misalkan masak-masakan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g8b\" id=\"g8b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g8b\" id=\"g8b\" value=\"T\" checked/>Tidak
								</p>
								<p>6.   Tidak pernah meminta sesuatu dengan tunjuk jari ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g9b\" id=\"g9b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g9b\" id=\"g9b\" value=\"T\" checked/>Tidak
								</p>
								<p>7.   Tidak pernah menggunakan jari untuk menunjuk ke sesuatu agar orang melihat kesana ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g10b\" id=\"g10b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g10b\" id=\"g10b\" value=\"T\" checked/>Tidak
								</p>
								<p>8.   Tidak dapat bermain dengan mainan kecil seperti mobil atau balok ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g11b\" id=\"g11b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g11b\" id=\"g11b\" value=\"T\" checked/>Tidak
								</p>
								<p>9.   Tidak pernah membawa dan memperlihatkan barang-barang kepada orang lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g12b\" id=\"g12b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g12b\" id=\"g12b\" value=\"T\" checked/>Tidak
								</p>
								<p>10.  Tidak bisa menjaga kontak mata minimal 10 detik ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g14b\" id=\"g14b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g14b\" id=\"g14b\" value=\"T\" checked/>Tidak
								</p>
							</div>
							<div id=\"umur2\" align=\"justify\">
								<p>11.  Tidak merespon ketika dipanggil namanya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g15b\" id=\"g15b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g15b\" id=\"g15b\" value=\"T\" checked/>Tidak
								</p>
								<p>12.  Tidak merespon jika kita menunjukkan sesuatu ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g16b\" id=\"g16b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g16b\" id=\"g16b\" value=\"T\" checked/>Tidak
								</p>
								<p>13.  Tidak peduli dengan orang lain didekatnya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g17b\" id=\"g17b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g17b\" id=\"g17b\" value=\"T\" checked/>Tidak
								</p>
								<p>14.  Sangat menyukai secara aneh sesuatu suatu benda seperti meraba tekstur seperti karpet atau sutera dalam waktu lama ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g18b\" id=\"g18b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g18b\" id=\"g18b\" value=\"T\" checked/>Tidak
								</p>
								<p>15.  Tidak berminat terhadap mainan seperti bola,mobil,boneka ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g20b\" id=\"g20b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g20b\" id=\"g20b\" value=\"T\" checked/>Tidak
								</p>
								<p>16.  Suka memperhatikan dan memainkan jari-jarinya didepan mata ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g21b\" id=\"g21b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g21b\" id=\"g21b\" value=\"T\" checked/>Tidak
								</p>
								<p>17.  Terpesona pada benda bergerak misal roda berputar ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g22b\" id=\"g22b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g22b\" id=\"g22b\" value=\"T\" checked/>Tidak
								</p>
								<p>18.  Suka melompat-lompat atau mengepak-ngepakkan tangan tanpa tujuan minimal 30 menit ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g23b\" id=\"g23b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g23b\" id=\"g23b\" value=\"T\" checked/>Tidak
								</p>
								<p>19.  Panik hingga menutup telinga jika mendengar suara keras maupun lirih ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g24b\" id=\"g24b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g24b\" id=\"g24b\" value=\"T\" checked/>Tidak
								</p>
								<p>20.  Menolak untuk dipeluk ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g25b\" id=\"g25b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g25b\" id=\"g25b\" value=\"T\" checked/>Tidak
								</p>
							</div>
							<div id=\"umur3\" align=\"justify\">
								<p>21.  Suka tiba-tiba menangis atau tertawa tanpa sebab ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g26b\" id=\"g26b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g26b\" id=\"g26b\" value=\"T\" checked/>Tidak
								</p>
								<p>22.  Seringkali berjalan mondar-mandir tanpa tujuan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g27b\" id=\"g27b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g27b\" id=\"g27b\" value=\"T\" checked/>Tidak
								</p>
								<p>23.  Bermain dengan benda yang bukan mainan misal ujung selimut ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g28b\" id=\"g28b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g28b\" id=\"g28b\" value=\"T\" checked/>Tidak
								</p>
								<p>24.  Suka bermain dengan cahaya atau pantulan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g30b\" id=\"g30b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g30b\" id=\"g30b\" value=\"T\" checked/>Tidak
								</p>
								<p>25.  Tidak bisa menunjukkan ekspresi wajah marah,senang dan sedih ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g32b\" id=\"g32b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g32b\" id=\"g32b\" value=\"T\" checked/>Tidak
								</p>
								<p>26.  Asik jika dibiarkan sendiri ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g35b\" id=\"g35b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g35b\" id=\"g35b\" value=\"T\" checked/>Tidak
								</p>
								<p>27.  Tidak ada senyum sosial saat bertemu orang lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g36b\" id=\"g36b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g36b\" id=\"g36b\" value=\"T\" checked/>Tidak
								</p>
								<p>28.  Suka menarik-narik tangan orang lain jika menginginkan sesuatu ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g38b\" id=\"g38b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g38b\" id=\"g38b\" value=\"T\" checked/>Tidak
								</p>
								<p>29.  Sangat marah jika terjadi perubahan dalam suatu hal ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g39b\" id=\"g39b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g39b\" id=\"g39b\" value=\"T\" checked/>Tidak
								</p>
								<p>30.  Belum dapat berbicara atau mengucapkan kata sesuai usianya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g41b\" id=\"g41b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g41b\" id=\"g41b\" value=\"T\" checked/>Tidak
								</p>
							</div>
							<div id=\"umur4\" align=\"justify\">
								<p>31.  Mengalami Gangguan Pendengaran ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g42b\" id=\"g42b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g42b\" id=\"g42b\" value=\"T\" checked/>Tidak
								</p>
								<p>32.  Tidak berminat untuk belajar bicara ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g43b\" id=\"g43b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g43b\" id=\"g43b\" value=\"T\" checked/>Tidak
								</p>
								<p>33.  Suka Menyakiti diri sendiri dengan cara menggigit atau mencakar ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g44b\" id=\"g44b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g44b\" id=\"g44b\" value=\"T\" checked/>Tidak
								</p>
								<p>34.  Tidak dapat menyatakan keinginannya dengan kata-kata ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g45b\" id=\"g45b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g45b\" id=\"g45b\" value=\"T\" checked/>Tidak
								</p>
								<p>35.  Suka membeo ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g46b\" id=\"g46b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g46b\" id=\"g46b\" value=\"T\" checked/>Tidak
								</p>
								<p>36.  Suka mengucapkan kata aneh yang tidak ada artinya secara berulang-ulang ?
								<br / ><br / >&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g47b\" id=\"g47b\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g47b\" id=\"g47b\" value=\"T\" checked/>Tidak
								</p>
							</div>
							<div id=\"lama\">
								<p class=\"tombol\" >
									<ul class=\"pager\">
										<li class=\"previous disabled\"><a id=\"kembali\" href=\"#\">&larr; Kembali</a></li>
										<li class=\"next\"><a id=\"next\" href=\"#\">Berikutnya &rarr;</a></li>
									</ul>
								</p>
							</div>
							<div id=\"baru\">
								<p class=\"tombol\">
								<ul class=\"pager\">
									<li class=\"previous\"><a id=\"previous\" href=\"#\">&larr; Kembali</a></li>
									<li class=\"next\"><a id=\"next1\" href=\"#\">Berikutnya &rarr;</a></li>
								</ul>
								</p>
							</div>
							<div id=\"baru1\">
								<p class=\"tombol\">
								<ul class=\"pager\">
									<li class=\"previous\"><a id=\"previous1\" href=\"#\">&larr; Kembali</a></li>
									<li class=\"next\"><a id=\"next2\" href=\"#\">Berikutnya &rarr;</a></li>
								</ul>
								</p>
							</div>
							<div id=\"baru2\">
								<p class=\"tombol\">
								<ul class=\"pager\">
									<li class=\"previous\"><a id=\"previous2\" href=\"#\">&larr; Kembali</a></li>
									<li class=\"next\"><a id=\"proses\" href=\"Javascript:umur2();\">Proses &rarr;</a></li>
								</ul>
								</p>
							</div>
							
							";	
					
					
					}else{
					echo"<div id=\"umur1\" align=\"justify\">
								<p>1.   Tidak tertarik dengan anak lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g5c\" id=\"g5c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g5c\" id=\"g5c\" value=\"T\" checked />Tidak
								</p>
								<p>2.   Tidak suka bermain petak umpet atau cilukba ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g7c\" id=\"g7c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g7c\" id=\"g7c\" value=\"T\" checked />Tidak
								</p>
								<p>3.   Tidak suka bermain pura-pura misal masak-masakan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g8c\" id=\"g8c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g8c\" id=\"g8c\" value=\"T\" checked />Tidak
								</p>
								<p>4.   Tidak pernah meminta sesuatu dengan menunjuk jari ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g9c\" id=\"g9c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g9c\" id=\"g9c\" value=\"T\" checked />Tidak
								</p>
								<p>5.   Tidak pernah menggunakan jari untuk menunjuk ke-sesuatu agar orang melihat kesana ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g10c\" id=\"g10c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g10c\" id=\"g10c\" value=\"T\" checked />Tidak
								</p>
								<p>6.   Tidak dapat bermain dengan mainan kecil seperti mobil atau balok ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g11c\" id=\"g11c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g11c\" id=\"g11c\" value=\"T\" checked />Tidak
								</p>
								<p>7.   Tidak pernah membawa dan memperlihatkan barang-barang kepada orang lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g12c\" id=\"g12c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g12c\" id=\"g12c\" value=\"T\" checked />Tidak
								</p>
								<p>8.   Tidak bisa menjaga kontak mata minimal 10 detik ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g14c\" id=\"g14c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g14c\" id=\"g14c\" value=\"T\" checked />Tidak
								</p>
								<p>9.   Tidak merespon saat dipanggil namanya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g15c\" id=\"g15c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g15c\" id=\"g15c\" value=\"T\" checked />Tidak
								</p>
								<p>10.  Tidak merespon jika kita menunjukkan sesuatu ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g16c\" id=\"g16c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g16c\" id=\"g16c\" value=\"T\" checked />Tidak
								</p>
								<p>11.  Tidak peduli dengan orang lain didekatnya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g17c\" id=\"g17c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g17c\" id=\"g17c\" value=\"T\" checked />Tidak
								</p>
								<p>12.  Sangat menyukai secara aneh sesuatu benda seperti meraba tekstur seperti karpet atau sutera dalam waktu lama ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g18c\" id=\"g18c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g18c\" id=\"g18c\" value=\"T\" checked />Tidak
								</p>
								<p>13.  Perkembangan agak terlambat misal dalam berjalan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g19c\" id=\"g19c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g19c\" id=\"g19c\" value=\"T\" checked />Tidak
								</p>
								<p>14.  Tidak berminat terhadap mainan seperti bola,mobil,boneka ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g20c\" id=\"g20c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g20c\" id=\"g20c\" value=\"T\" checked />Tidak
								</p>
								<p>15.  Suka memperhatikan dan memainkan jari-jarinya didepan matanya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g21c\" id=\"g21c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g21c\" id=\"g21c\" value=\"T\" checked />Tidak
								</p>
							</div>
							<div id=\"umur2\" align=\"justify\">
								<p>16.  Terpesona pada benda bergerak misal roda berputar ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g22c\" id=\"g22c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g22c\" id=\"g22c\" value=\"T\" checked />Tidak
								</p>
								<p>17.  Suka melompat-lompat atau mengepak-ngepakkan tangan tanpa tujuan minimal 30 menit ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g23c\" id=\"g23c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g23c\" id=\"g23c\" value=\"T\" checked />Tidak
								</p>
								<p>18.  Panik hingga menutup telinga jika mendengar suara keras maupun lirih ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g24c\" id=\"g24c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g24c\" id=\"g24c\" value=\"T\" checked />Tidak
								</p>
								<p>19. 	Suka tertawa atau menangis tanpa sebab ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g26c\" id=\"g26c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g26c\" id=\"g26c\" value=\"T\" checked />Tidak
								</p>
								<p>20. 	Seringkali berjalan mondar-mandir tanpa tujuan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g27c\" id=\"g27c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g27c\" id=\"g27c\" value=\"T\" checked />Tidak
								</p>
								<p>21.  Kurang imajinatif dalam permainan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g29c\" id=\"g29c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g29c\" id=\"g29c\" value=\"T\" checked />Tidak
								</p>
								<p>22.  Suka bermain dengan cahaya atau pantulan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g30c\" id=\"g30c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g30c\" id=\"g30c\" value=\"T\" checked />Tidak
								</p>
								<p>23.  Tidak berminat terhadap pembicaraan atau aktivitas disekitarnya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g31c\" id=\"g31c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g31c\" id=\"g31c\" value=\"T\" checked />Tidak
								</p>
								<p>24.  Tidak bisa menunjukkan ekspresi wajah marah,senang, sedih ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g32c\" id=\"g32c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g32c\" id=\"g32c\" value=\"T\" checked />Tidak
								</p>
								<p>25.  Tidak bisa memulai sebuah komunikasi dengan orang ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g33c\" id=\"g33c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g33c\" id=\"g33c\" value=\"T\" checked />Tidak
								</p>
								<p>26.  Tidak bisa memahami perintah yang diberikan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g34c\" id=\"g34c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g34c\" id=\"g34c\" value=\"T\" checked />Tidak
								</p>
								<p>27.  Asik jika dibiarkan sendiri ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g35c\" id=\"g35c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g35c\" id=\"g35c\" value=\"T\" checked />Tidak
								</p>
								<p>28.  Tidak ada senyum sosial saat bertemu orang lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g36c\" id=\"g36c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g36c\" id=\"g36c\" value=\"T\" checked />Tidak
								</p>
								<p>29.  Tidak bisa melakukan permainan bergiliran dengan teman ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g37c\" id=\"g37c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g37c\" id=\"g37c\" value=\"T\" checked />Tidak
								</p>
								<p>30.  Suka menarik-narik tangan orang lain jika menginginkan sesuatu ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g38c\" id=\"g38c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g38c\" id=\"g38c\" value=\"T\" checked />Tidak
								</p>
							</div>	
							<div id=\"umur3\" align=\"justify\">
								<p>31.  Sangat marah jika terjadi perubahan dalam suatu hal ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g39c\" id=\"g39c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g39c\" id=\"g39c\" value=\"T\" checked />Tidak
								</p>
								<p>32.  Terbentuk suatu rutinitas yang kaku ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g40c\" id=\"g40c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g40c\" id=\"g40c\" value=\"T\" checked />Tidak
								</p>
								<p>33.  Belum dapat berbicara atau mengucapkan kata sesuai usianya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g41c\" id=\"g41c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g41c\" id=\"g41c\" value=\"T\" checked />Tidak
								</p>
								<p>34. 	Mengalami gangguan pendengaran ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g42c\" id=\"g42c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g42c\" id=\"g42c\" value=\"T\" checked />Tidak
								</p>
								<p>35. 	Tidak berminat untuk belajar bicara ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g43c\" id=\"g43c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g43c\" id=\"g43c\" value=\"T\" checked />Tidak
								</p>
								<p>36.  Suka menyakiti diri sendiri dengan menggigit atau mencakar ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g44c\" id=\"g44c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g44c\" id=\"g44c\" value=\"T\" checked />Tidak
								</p>
								<p>37.  Tidak dapat menyatakan keinginannya dengan kata-kata ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g45c\" id=\"g45c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g45c\" id=\"g45c\" value=\"T\" checked />Tidak
								</p>
								<p>38.  Suka Membeo ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g46c\" id=\"g46c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g46c\" id=\"g46c\" value=\"T\" checked />Tidak
								</p>
								<p>39.  Suka mengucapkan kata-kata aneh yang tidak ada artinya secara berulang-ulang ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g47c\" id=\"g47c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g47c\" id=\"g47c\" value=\"T\" checked />Tidak
								</p>
								<p>40.  Sangat spontan dalam mengucapkan sesuatu ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g48c\" id=\"g48c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g48c\" id=\"g48c\" value=\"T\" checked />Tidak
								</p>
								<p>41.  Sering bernyanyi tetapi tidak mengerti arti nyanyiannya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g49c\" id=\"g49c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g49c\" id=\"g49c\" value=\"T\" checked />Tidak
								</p>
								<p>42.  Tidak mempunyai rasa takut terhadap benda atau binatang berbahaya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g50c\" id=\"g50c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g50c\" id=\"g50c\" value=\"T\" checked />Tidak
								</p>
								<p>43.  Sering mengulang kata-kata yang sama dengan artikulasi yang tidak baik dan tanpa intonasi ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g51c\" id=\"g51c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g51c\" id=\"g51c\" value=\"T\" checked />Tidak
								</p>
								<p>44.  Apakah Sering mencari perhatian dengan berbicara keras dan tidak peduli bila orang lain ingin mengalihkan pembicaraan ke topik lain ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g52c\" id=\"g52c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g52c\" id=\"g52c\" value=\"T\" checked />Tidak
								</p>
								<p>45. Tidak memiliki rasa humor dan tidak mengerti bila orang lain membuat lelucon dan tertawa karenanya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g53c\" id=\"g53c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g53c\" id=\"g53c\" value=\"T\" checked />Tidak
								</p>
							</div>
							<div id=\"umur4\" align=\"justify\">
								<p>46.  Gaya bicaranya monoton, kaku dan datar sangat cepat, tidak seperti umumnya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g54c\" id=\"g54c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g54c\" id=\"g54c\" value=\"T\" checked />Tidak
								</p>
								<p>47.  Gagal dalam menyimak suatu yang rinci misal instruksi  ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g55c\" id=\"g55c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g55c\" id=\"g55c\" value=\"T\" checked />Tidak
								</p>
								<p>48.  Sulit bertahan pada satu aktivitas ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g56c\" id=\"g56c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g56c\" id=\"g56c\" value=\"T\" checked />Tidak
								</p>
								<p>49. 	Cepat beralih perhatian oleh stimulus dari luar ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g57c\" id=\"g57c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g57c\" id=\"g57c\" value=\"T\" checked />Tidak
								</p>
								<p>50. 	Menghindar dari tugas yang memerlukan perhatian lama ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g58c\" id=\"g58c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g58c\" id=\"g58c\" value=\"T\" checked />Tidak
								</p>
								<p>51.  Saat ditanya anak sering menjawab sebelum pertnyaan selesai ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g59c\" id=\"g59c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g59c\" id=\"g59c\" value=\"T\" checked />Tidak
								</p>
								<p>52.  Sering memotong atau menyela pembicaraan orang ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g60c\" id=\"g60c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g60c\" id=\"g60c\" value=\"T\" checked />Tidak
								</p>
								<p>53.  Tidak sabar dalam menunggu giliran ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g61c\" id=\"g61c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g61c\" id=\"g61c\" value=\"T\" checked />Tidak
								</p>
								<p>54.  Sembrono ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g62c\" id=\"g62c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g62c\" id=\"g62c\" value=\"T\" checked />Tidak
								</p>
								<p>55.  Permintaan harus segera dipenuhi ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g63c\" id=\"g63c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g63c\" id=\"g63c\" value=\"T\" checked />Tidak
								</p>
								<p>56.  Sangat usil dan suka mengganggu anak lainnya ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g64c\" id=\"g64c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g64c\" id=\"g64c\" value=\"T\" checked />Tidak
								</p>
								<p>57.  Mudah frustasi dan putus asa ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g65c\" id=\"g65c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g65c\" id=\"g65c\" value=\"T\" checked />Tidak
								</p>
								<p>58.  Tidak bisa diam, selalu menggerakan kaki atau tangan dan sering menggeliat ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g66c\" id=\"g66c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g66c\" id=\"g66c\" value=\"T\" checked />Tidak
								</p>
								<p>59.  Sering berlari-lari dan memanjat serta sulit melakukan kegiatan dengan tenang ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g67c\" id=\"g67c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g67c\" id=\"g67c\" value=\"T\" checked />Tidak
								</p>
								<p>60.  Sering bicara berlebihan ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g68c\" id=\"g68c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g68c\" id=\"g68c\" value=\"T\" checked />Tidak
								</p>
								<p>61.  Sering bergerak seolah diatur oleh motor penggerak ?
								<br / ><br / >&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"radio\" name=\"g69c\" id=\"g69c\" value=\"Y\" />Ya
								&nbsp; <input type=\"radio\" name=\"g69c\" id=\"g69c\" value=\"T\" checked />Tidak
								</p>
							</div>
							<div id=\"lama\">
								<p class=\"tombol\" >
									<ul class=\"pager\">
										<li class=\"previous disabled\"><a id=\"kembali\" href=\"#\">&larr; Kembali</a></li>
										<li class=\"next\"><a id=\"next\" href=\"#\">Berikutnya &rarr;</a></li>
									</ul>
								</p>
							</div>
							<div id=\"baru\">
								<p class=\"tombol\">
								<ul class=\"pager\">
									<li class=\"previous\"><a id=\"previous\" href=\"#\">&larr; Kembali</a></li>
									<li class=\"next\"><a id=\"next1\" href=\"#\">Berikutnya &rarr;</a></li>
								</ul>
								</p>
							</div>
							<div id=\"baru1\">
								<p class=\"tombol\">
								<ul class=\"pager\">
									<li class=\"previous\"><a id=\"previous1\" href=\"#\">&larr; Kembali</a></li>
									<li class=\"next\"><a id=\"next2\" href=\"#\">Berikutnya &rarr;</a></li>
								</ul>
								</p>
							</div>
							<div id=\"baru2\">
								<p class=\"tombol\">
								<ul class=\"pager\">
									<li class=\"previous\"><a id=\"previous2\" href=\"#\">&larr; Kembali</a></li>
									<li class=\"next\"><a id=\"proses\" href=\"Javascript:umur3();\">Proses &rarr;</a></li>
								</ul>
								</p>
							</div>
							";
					
					
					}
					?>
					</p>
					
							
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
