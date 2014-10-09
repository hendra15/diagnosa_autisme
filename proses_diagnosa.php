<?php
include_once("admin/koneksi/conn.php");
$query="select max(id_diagnosa) as maxid from diagnosa";
	$hasil=mysql_query($query);
	$data=mysql_fetch_array($hasil);
	$idmax=$data['maxid'];
	$nomor=$idmax++;
$sts= $_POST['sts'];
if($sts=="umur1"){





$pengguna=$_POST['pengguna'];
$g1a = $_POST['g1a'];
$g2a = $_POST['g2a'];
$g3a = $_POST['g3a'];
$g4a = $_POST['g4a'];
$g13a = $_POST['g13a'];
$g19a = $_POST['g19a'];
$g25a = $_POST['g25a'];
$g26a = $_POST['g26a'];
$g28a = $_POST['g28a'];
$g36a = $_POST['g36a'];
$dta= date('Y-m-d');
$poin=0;
$penyakit="";
$solusi="";
$idpen=0;


	if($g1a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g2a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g3a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g4a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g13a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g19a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g25a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g26a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g28a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g36a=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	$hasil=($poin/10)*100;
	if($hasil>=80){
	$idpen=1;
	$penyakit="Autis Infantil";
	$solusi="Ciluk-ba,Memberikan contoh suara untuk ditiru, Mengenal nama";
	
	}else{
	$idpen=4;
		$penyakit="tidak terjangkit Autisme";
		$solusi="-";
	
	}
	
	$query="insert into diagnosa values('$idmax','$idpen','$pengguna','$dta','$solusi')";
	$koneksi->Execute($query);
	echo "$penyakit";


}else if($sts=="umur2"){
	$pengguna=$_POST['pengguna'];
	$dta= date('Y-m-d');
	$poin=0;
	$penyakit="";
	$solusi="";
	$idpen=0;
	
	$g4b = $_POST['g4b'];
	$g5b = $_POST['g5b'] ;
	$g6b = $_POST['g6b'];
	$g7b = $_POST['g7b'];
	$g8b = $_POST['g8b'];
	$g9b = $_POST['g9b'];
	$g10b = $_POST['g10b'];
	$g11b = $_POST['g11b'];
	$g12b = $_POST['g12b'];
	$g14b = $_POST['g14b'];
	$g15b = $_POST['g15b'];
	$g16b = $_POST['g16b'];
	$g17b = $_POST['g17b'];
	$g18b = $_POST['g18b'];
	$g20b = $_POST['g20b'];
	$g21b = $_POST['g21b'];
	$g22b = $_POST['g22b'];
	$g23b = $_POST['g23b'];
	$g24b = $_POST['g24b'];
	$g25b = $_POST['g25b'];
	$g26b = $_POST['g26b'];
	$g27b = $_POST['g27b'];
	$g28b = $_POST['g28b'];
	$g30b = $_POST['g30b'];
	$g32b = $_POST['g32b'];
	$g35b = $_POST['g35b'];
	$g36b = $_POST['g36b'];
	$g38b = $_POST['g38b'];
	$g39b = $_POST['g39b'];
	$g41b = $_POST['g41b'];
	$g42b = $_POST['g42b'];
	$g43b = $_POST['g43b'];
	$g44b = $_POST['g44b'];
	$g45b = $_POST['g45b'];
	$g46b = $_POST['g46b'];
	$g47b = $_POST['g47b'];
	
	if($g4b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g5b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g6b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g7b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g8b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g9b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g10b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g11b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g12b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g14b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g15b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g16b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g17b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g18b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g20b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g21b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g22b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g23b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g24b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g25b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g26b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g27b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g28b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g30b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g32b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g35b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g36b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g38b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g39b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g41b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g42b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g43b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g44b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g45b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g46b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	if($g47b=="Y"){
		$poin=$poin+1;
	
	}else{
		$poin=$poin+0;
	
	}
	$hasil=($poin/36)*100;
	if($hasil>=80){
	$idpen=1;
	$penyakit="Autis Infantil";
	$solusi="Cilukba, Memberikan contoh suara untuk ditiru, mengenal nama";
	
	}else{
	$idpen=4;
		$penyakit="tidak terjangkit Autisme";
		$solusi="-";
	
	}
	
	$query="insert into diagnosa values('$idmax','$idpen','$pengguna','$dta','$solusi')";
	$koneksi->Execute($query);
	echo "$penyakit";

}else if($sts=="umur3"){
	
	$pengguna=$_POST['pengguna'];
	$dta= date('Y-m-d');
	$poin=0;
	$poin1=0;
	$poin2 = 0;
	$penyakit="";
	$solusi="";
	$idpen=0;
	
	$g5c = $_POST['g5c'];
	$g7c = $_POST['g7c'];
	$g8c = $_POST['g8c'];
	$g9c = $_POST['g9c'];
	$g10c = $_POST['g10c'];
	$g11c = $_POST['g11c'];
	$g12c = $_POST['g12c'];
	$g14c = $_POST['g14c'];
	$g15c = $_POST['g15c'];
	$g16c = $_POST['g16c'];
	$g17c = $_POST['g17c'];
	$g18c = $_POST['g18c'];
	$g19c = $_POST['g19c'];
	$g20c = $_POST['g20c'];
	$g21c = $_POST['g21c'];
	$g22c = $_POST['g22c'];
	$g23c = $_POST['g23c'];
	$g24c = $_POST['g24c'];
	$g26c = $_POST['g26c'];
	$g27c = $_POST['g27c'];
	$g29c = $_POST['g29c'];
	$g30c = $_POST['g30c'];
	$g31c = $_POST['g31c'];
	$g32c = $_POST['g32c'];
	$g33c = $_POST['g33c'];
	$g34c = $_POST['g34c'];
	$g35c = $_POST['g35c'];
	$g36c = $_POST['g36c'];
	$g37c = $_POST['g37c'];
	$g38c = $_POST['g38c'];
	$g39c = $_POST['g39c'];
	$g40c = $_POST['g40c'];
	$g41c = $_POST['g41c'];
	$g42c = $_POST['g42c'];
	$g43c = $_POST['g43c'];
	$g44c = $_POST['g44c'];
	$g45c = $_POST['g45c'];
	$g46c = $_POST['g46c'];
	$g47c = $_POST['g47c'];
	$g48c = $_POST['g48c'];
	$g49c = $_POST['g49c'];
	$g50c = $_POST['g50c'];
	$g51c = $_POST['g51c'];
	$g52c = $_POST['g52c'];
	$g53c = $_POST['g53c'];
	$g54c = $_POST['g54c'];
	$g55c = $_POST['g55c'];
	$g56c = $_POST['g56c'];
	$g57c = $_POST['g57c'];
	$g58c = $_POST['g58c'];
	$g59c = $_POST['g59c'];
	$g60c = $_POST['g60c'];
	$g61c = $_POST['g61c'];
	$g62c = $_POST['g62c'];
	$g63c = $_POST['g63c'];
	$g64c = $_POST['g64c'];
	$g65c = $_POST['g65c'];
	$g66c = $_POST['g66c'];
	$g67c = $_POST['g67c'];
	$g68c = $_POST['g68c'];
	$g69c = $_POST['g69c'];

	
	if($g5c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
		
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g7c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g8c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g9c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g10c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g11c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g12c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g14c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
		$poin2=$poin2+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
		$poin2=$poin2+0;
	}
	if($g15c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g16c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g17c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g18c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g19c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g20c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g21c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
		if($g22c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
		if($g23c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
		if($g24c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
		if($g26c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g27c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
		$poin2=$poin2+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
		$poin2=$poin2+0;
	}
	if($g29c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g30c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g31c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g32c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g33c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g34c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g35c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g36c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g37c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g38c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g39c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g40c=="Y"){
		$poin=$poin+1;
		$poin1=$poin1+1;
	}else{
		$poin=$poin+0;
		$poin1=$poin1+0;
	}
	if($g41c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g42c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g43c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g44c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g45c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g46c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	if($g47c=="Y"){
		$poin=$poin+1;
	}else{
		$poin=$poin+0;
	}
	
	
	if($g48c=="Y"){
		
		$poin1=$poin1+1;
	}else{

		$poin1=$poin1+0;
	}
	if($g49c=="Y"){
		$poin1=$poin1+1;
	}else{
		$poin1=$poin1+0;
	}
	if($g50c=="Y"){
		$poin1=$poin1+1;
	}else{
		$poin1=$poin1+0;
	}
	if($g51c=="Y"){
		$poin1=$poin1+1;
	}else{
		$poin1=$poin1+0;
	}
	if($g52c=="Y"){
		$poin1=$poin1+1;
	}else{
		$poin1=$poin1+0;
	}
	if($g53c=="Y"){
		$poin1=$poin1+1;
	}else{
		$poin1=$poin1+0;
	}
	if($g54c=="Y"){
		$poin1=$poin1+1;
	}else{
		$poin1=$poin1+0;
	}
	if($g55c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g56c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g57c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g58c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g59c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g60c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g61c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g62c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g63c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g64c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g65c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g66c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g67c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g68c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}
	if($g69c=="Y"){
		$poin2=$poin2+1;
	}else{
		$poin2=$poin2+0;
	}

$hasil=($poin/39)*100;
$hasil1=($poin1/33)*100;
$hasil2=($poin2/17)*100;

if($hasil>=80 || $hasil1>=80 || $hasil2>=80){
	if($hasil>$hasil1 || $hasil>$hasil2){
	$idpen=1;
	$penyakit="Autis Infantil";
	$solusi="Ciluk-ba,Memberikan contoh suara untuk ditiru, Mengenal nama";
	
	}else if($hasil1 > $hasil || $hasil1 > $hasil2){
	$idpen=2;
	$penyakit="Sindrom Asperger";
	$solusi="Kata-kata pertama, menirukan menyentuh bagian tubuh, menirukan menyisir dan menyikat gigi, minum dari cangkir, melempar dan menangkap";
	
	}else{
	$idpen=3;
	$penyakit="Hiperaktif";
	$solusi="Kontak mata saat diberi instruksi, menirukan gerakan pada motorik kasar, Interaksi main truk-trukan, melepas kaos kaki, hugging saat anak tatrum";
	
	}



}else{
		$idpen=4;
		$penyakit="tidak terjangkit Autisme";
		$solusi="-";

}
	
	$query="insert into diagnosa values('$idmax','$idpen','$pengguna','$dta','$solusi')";
	$koneksi->Execute($query);
	echo "$penyakit";







}
?>