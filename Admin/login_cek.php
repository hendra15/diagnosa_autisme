<?php
session_start();
include_once("koneksi/conn.php");

$user=$_POST['user'];
$password=$_POST['password'];


//$pass=Base64_encode($password);

/*$query=mysql_query("select user,password from login_aja where user='$user' and password='$pass'");
$cek=mysql_num_rows($query);
if($cek){
	$_SESSION['user']=$user;
	header('Location:index.php');
}else{
	echo"Gagal";

}*/

	$sql = "select user,password from login_aja where user='$user'";
			$rs = $koneksi->Execute($sql);
				if($rs->RecordCount() >0){
					$username = $rs->fields[0];
					$pass2 = $rs->fields[1];

				}				
				$pass2=base64_decode($pass2);
				if($user==$username and $password==$pass2){
					$sq="select a.nid as 'nid' from dokter a,login_aja b where a.user=b.user and a.user='$user'";
					$as=$koneksi->Execute($sq);
					if($as->RecordCount()>=0){
						$nid=$as->fields[0];
				
					}
					$nid=substr($nid,0,3);
					echo "'$nid'";
					$qq="select a.id_admin as 'id' from admin a,login_aja b where a.user=b.user and a.user='$user'";
					$jj=$koneksi->Execute($qq);
					if($jj->RecordCount()>=0){
					
						$id=$jj->fields[0];
				
					}
					$id=substr($id,0,3);
					echo"'$id'";
					
					$rq="select a.id_pasien as 'id pasien' from pasein a, login_aja b where a.user=b.user and a.user='$user'";
					$bb=$koneksi->Execute($rq);
					if($bb->RecordCount()>=0){
						$pasi=$bb->fields[0];
					
					}
					$pasi=substr($pasi,0,3);
					echo"$pasi";
					
					if($nid=="DOK"){
						$_SESSION['user'] = $user;
						$_SESSION['password'] = $password;
						$_SESSION['nid']=$nid;
						header('Location:index.php');
					
					}else{
							header('Location:login.php');
							
							
					}
					if($id=="ADM"){
						$_SESSION['user'] = $user;
						$_SESSION['password'] = $pass;
						$_SESSION['id'] = $id;
						header('Location:index.php');
					
					}else{
						header('Location:login.php');
						
						
					}
					if($pasi=="PAS"){
						$_SESSION['id_pasien']=$id_pass;
						header('Location:login.php');
						
						
					}
									
				}else{
				echo "Gagal";
				header('Location:login.php');
				echo mysql_error();
/*				echo "'$user'='$username' dan '$password'='$pass2' dan nid='$nid' dan id='$id'"; */

				}
							

?>