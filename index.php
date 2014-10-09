<?php
	session_start();
	include_once("Admin/koneksi/conn.php");
	error_reporting(0);

	$user=$_SESSION['user'];
	$id_pasien = $_SESSION['id_pasien'];
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
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
      var selectedEffect = "drop";
	  var selectedEffect1 = "scale";
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 600, height: 180 } };
      }
 
      // run the effect
      $( "#artikel" ).hide( selectedEffect, options, 1500);
	  $("#artikel1").show(selectedEffect1, options, 5000);
	  $("#lama").hide();
	  $("#baru").show();
    };
	function runEffect1() {
      // get effect type from
      var selectedEffect = "drop";
	  var selectedEffect1 = "scale";
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 0 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 600, height: 180 } };
      }
 
      // run the effect
      $( "#artikel1" ).hide( selectedEffect, options, 1500);
	  $("#artikel").show(selectedEffect1, options, 5000);
	  $("#lama").show();
	  $("#baru").hide();
    };

 
    // set effect from select menu value
    $( "#next" ).click(function() {
      runEffect();
      return false;
    });
	 $( "#previous" ).click(function() {
      runEffect1();
      return false;
    });
	 $("#artikel1").hide();
	 $("#baru").hide();
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
		</div>	
		<div id="contentpasien">
			<div class="panel panel-default">
					<div class="panel-body">
					<div class="aj">
					<p class="dkt">AUTISME</p>
					</div>
					<p class="gambar1">
					<img src="Admin/gambar/AUTIS.jpg" width="300px" height="300px" />
				
					<div id="artikel" align="justify">
					Autisme adalah kelainan perkembangan sistem saraf pada seseorang yang kebanyakan diakibatkan oleh faktor hereditas dan kadang-kadang telah dapat dideteksi sejak bayi berusia 6 bulan. 
					Deteksi dan terapi sedini mungkin akan menjadikan si penderita lebih dapat menyesuaikan dirinya dengan yang normal.
					Kadang-kadang terapi harus dilakukan seumur hidup, walaupun demikian penderita Autisme yang cukup cerdas, 
					setelah mendapat terapi Autisme sedini mungkin, seringkali dapat mengikuti Sekolah Umum,
					menjadi Sarjana dan dapat bekerja memenuhi standar yang dibutuhkan,
					tetapi pemahaman dari rekan selama bersekolah dan rekan sekerja seringkali dibutuhkan, 
					misalnya tidak menyahut atau tidak memandang mata si pembicara, ketika diajak berbicara. 
					Karakteristik yang menonjol pada seseorang yang mengidap kelainan ini adalah kesulitan membina hubungan sosial, 
					berkomunikasi secara normal maupun memahami emosi serta perasaan orang lain.
					Autisme merupakan salah satu gangguan perkembangan yang merupakan bagian dari Kelainan Spektrum Autisme atau <i>Autism Spectrum Disorders</i> (ASD)
					dan juga merupakan salah satu dari lima jenis gangguan dibawah payung Gangguan Perkembangan Pervasif atau <i>Pervasive Development Disorder</i> (PDD).
					Autisme bukanlah penyakit kejiwaan karena ia merupakan suatu gangguan yang terjadi pada otak sehingga menyebabkan otak tersebut tidak dapat berfungsi selayaknya otak normal dan hal ini termanifestasi pada perilaku penyandang autisme.
					Autisme adalah yang terberat di antara PDD.
					<br />
					Gejala-gejala autisme dapat muncul pada anak mulai dari usia tiga puluh bulan sejak kelahiran hingga usia maksimal tiga tahun.
					Penderita autisme juga dapat mengalami masalah dalam belajar, komunikasi, dan bahasa.
					Seseorang dikatakan menderita autisme apabila mengalami satu atau lebih dari karakteristik berikut: kesulitan dalam berinteraksi sosial secara kualitatif, 
					kesulitan dalam berkomunikasi secara kualitatif, menunjukkan perilaku yang repetitif, dan mengalami perkembangan yang terlambat atau tidak normal.
					<br />
					
					</div>

					<div id="artikel1"  align="justify">
						<p id="gjl"><h2>Gejala</h2></p>
					Secara historis, para ahli dan peneliti dalam bidang autisme mengalami kesulitan dalam menentukan seseorang sebagai penyandang autisme atau tidak. 
					Pada awalnya, diagnosa disandarkan pada ada atau tidaknya gejala namun saat ini para ahli setuju bahwa autisme lebih merupakan sebuah kontinuum. 
					Gejala-gejala autisme dapat dilihat apabila seorang anak memiliki kelemahan di tiga domain tertentu, yaitu sosial, komunikasi, dan tingkah laku yang berulang.
					<br />
					Aarons dan Gittents (1992) merekomendasikan adanya suatu pendekatan deskriptif dalam mendiagnosa autisme sehingga menyertakan pengamatan-pengamatan yang menyeluruh di setting-setting sosial anak sendiri. 
					Settingya mungkin di sekolah, di taman-taman bermain atau mungkin di rumah sebagai lingkungan sehari-hari anak dimana hambatan maupun kesulitan mereka tampak jelas di antara teman-teman sebaya mereka yang normal.
					Persoalan lain yang memengaruhi keakuratan suatu diagnosa seringkali juga muncul dari adanya fakta bahwa perilaku-perilaku yang bermasalah merupakan atribut dari pola asuh yang kurang tepat. 
					Perilaku-perilaku tersebut mungkin saja merupakan hasil dari dinamika keluarga yang negatif dan bukan sebagai gejala dari adanya gangguan. 
					Adanya interpretasi yang salah dalam memaknai penyebab mengapa anak menunjukkan persoalan-persoalan perilaku mampu menimbulkan perasaan-perasaan negatif para orang tua. 
					Pertanyaan selanjutnya kemudian adalah apa yang dapat dilakukan agar diagnosa semakin akurat dan konsisten sehingga autisme sungguh-sungguh terpisah dengan kondisi-kondisi yang semakin memperburuk? 
					Perlu adanya sebuah model diagnosa yang menyertakan keseluruhan hidup anak dan mengevaluasi hambatan-hambatan dan kesulitan anak sebagaimana juga terhadap kemampuan-kemampuan dan keterampilan-keterampilan anak sendiri. 
					Mungkin tepat bila kemudian disarankan agar para profesional di bidang autisme juga mempertimbangkan keseluruhan area, misalnya: perkembangan awal anak, penampilan anak, mobilitas anak, kontrol dan perhatian anak, fungsi-fungsi sensorisnya, kemampuan bermain, perkembangan konsep-konsep dasar, kemampuan yang bersifat sikuen, kemampuan musikal, dan lain sebagainya yang menjadi keseluruhan diri anak sendiri.
					<br />
					<br />
					untuk melakukan pendaftaran proses diagnosa silahkan klik <a href="registrasi_pasien.php">disini</a>
					</div>
				
					</p>
					<div id="lama">
					<p class="tombol" >
						<ul class="pager">
							<li class="previous disabled"><a id="kembali" href="#">&larr; Kembali</a></li>
							<li class="next"><a id="next" href="#">Berikutnya &rarr;</a></li>
						</ul>
					</p>
					</div>
					<div id="baru">
					<p class="tombol">
						<ul class="pager">
							<li class="previous"><a id="previous" href="#">&larr; Kembali</a></li>
							<li class="next disabled"><a id="next" href="#">Berikutnya &rarr;</a></li>
						</ul>
					</p>
					</div>
							
					</div>

			</div>
		</div>
  </body>
</html>
