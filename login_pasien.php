<?php
session_start();
include_once("admin/koneksi/conn.php");
error_reporting(0);
	$user = $_POST['user_pasien'];
	$pass = $_POST['pass_pasien'];
	
		$sql = "select user,password from login_aja where user='$user'";
			$rs = $koneksi->Execute($sql);
				if($rs->RecordCount() >0){
					$username = $rs->fields[0];
					$pass2 = $rs->fields[1];

				}				
				$pass2=base64_decode($pass2);
				if($user==$username and $pass==$pass2){
					$sq="select a.id_pasien as 'nid',a.tanggal_lahir from pasein a,login_aja b where a.user=b.user and a.user='$user'";
					$as=$koneksi->Execute($sq);
					if($as->RecordCount()>=0){
						$id=$as->fields[0];
						$tanggal_lahir = $as->fields[1];
				
					}
					$id=substr($id,0,3);
					echo "$id";
				
					if($id=="PAS"){
						$_SESSION['user'] = $user;
						$_SESSION['password'] = $password;
						$_SESSION['id_pasien']=$id;
						$_SESSION['tanggal_lahir']=$tanggal_lahir;
						header('Location:diagnosa.php');
						echo"sukses";
									
				}else{
				echo "Gagal";
				header('Location:index.php');
				session_destroy();
				echo mysql_error();

				}
				}else{
				echo "Gagal";
				header('Location:index.php');
				session_destroy();
				echo mysql_error();
				}

?>