<?php
include_once("koneksi/conn.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/tampilan.css" rel="stylesheet">
	<style type="text/css">
		body{
		position:relative;
		background-image:url('css/gambar/test.png');
		
	}
	</style>
	<script type="text/javascript">
	 function masuk(){
	 window.location="index.php";
	 
	 }
	</script>
	 <script src="js/jquery-1.9.1.js"></script>
	 <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
	<div class="container">
		<div class="login">
		<h1><img src="css/gambar/psikolog.jpeg" width="30%" height="30%" /><Strong>LOGIN</strong></h1>
		<form action="login_cek.php" method="post">
		<p><input type="text" name="user" placeholder="Username" /></p>
		<p><input type="password" name="password" placeholder="Password" /></p>	
		<p class="submit"><input type="submit" name="masuk" value="Masuk" /></p>
		</form>
		</div>
	</div>
  </body>
</html>