<?php
include_once("koneksi/conn.php");
$tgl_dari =$_GET['tgl_dari'];
	$tahun= substr($tgl_dari,0,4);
	$bulan= substr($tgl_dari,5,2);
	$hari = substr($tgl_dari,8,2);
	$resul = $hari."-".$bulan."-".$tahun;
$tgl_sampai =$_GET['tgl_sampai'] ;
	$tahun= substr($tgl_sampai,0,4);
	$bulan= substr($tgl_sampai,5,2);
	$hari = substr($tgl_sampai,8,2);
	$resul1 = $hari."-".$bulan."-".$tahun;
echo "$tgl_dari";
echo "$tgl_sampai";
	
include("MPDF54/mpdf.php");
$mpdf = new mPDF('utf-8','A4',0,'',10,10,5,1,1,1,'');
ob_start();

	if($tgl_dari=="--" and $tgl_sampai=="--"){
		$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit order by a.id_pasien asc");
	}else if($tgl_sampai=="--"){
		$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit and c.tanggal_periksa='$tgl_dari' order by a.id_pasien asc");
							
	}else if($tgl_dari=="--"){
		$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit and c.tanggal_periksa='$tgl_sampai' order by a.id_pasien asc");
								
	}else{
							
	$sql = mysql_query("Select a.id_pasien,a.nama_pasien,a.alamat_pasien,b.kota,a.jenis_kelamin,(select f.kota from pasein e,id_kota f where e.tempat=f.id_kota and e.id_pasien=a.id_pasien) as 'tempat_lahir',a.tanggal_lahir,a.no_telp_pasien,c.tanggal_periksa,d.penyakit,c.solusi from pasein a,id_kota b,diagnosa c, id_penyakit d where b.id_kota=a.id_kota and c.id_pasien=a.id_pasien and d.id_penyakit=c.id_penyakit and c.tanggal_periksa between '$tgl_dari' and '$tgl_sampai' order by a.id_pasien asc");
	}
	$no = 1;
		$jnk="";
	echo"
		<style type='css'>
			.textt{
				margin:0 0 0 190px;
				margin-top:-100px;
				
			}
			.tst{
				margin:0 0 0 130px;
				margin-top:-30px;
				
			}	
		
		</style>
		<hr border='4px solid'></hr>
		<img src='css/gambar/psikolog.jpeg' width='130px' height='130px' />
		<div class='textt'>
		<h1>Laporan Diagnosa Pasien</h1>
		</div>
		<div class='tst'>
		<h2> Periode dari <b>$resul</b> sampai <b>$resul1</b></h2>
		</div>
		<hr border='4px solid'></hr>
		<table border=1 cellpadding=1 cellspacing=1>
						<tr>
							<th>No</th>
							<th>Nama Pasien</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>Jenis Kelamin</th>
							
							<th>Tanggal Lahir</th>
							
							<th>Tanggal Periksa</th>
							<th>Penyakit</th>
							
						</tr>
			";			

			while($r=mysql_fetch_array($sql)){
				$id_pasien = $r['id_pasien'];
				$nama_pasien=$r['nama_pasien'];
				$alamat_pasien = $r['alamat_pasien']; 
				$kota = $r['kota'];
					$kota= substr($kota,5);
				
				$jenis_kelamin=$r['jenis_kelamin']; 
					if($jenis_kelamin=="L"){ 
						$jnk="Laki-Laki"; 
							
					}else{ 
					
						$jnk="Perempuan";
						}
				$tgl_lahir= $r['tanggal_lahir'];
					$tahun= substr($tgl_lahir,0,4);
					$bulan= substr($tgl_lahir,5,2);
					$hari = substr($tgl_lahir,8,2);
					$tgl_lahir = $hari."-".$bulan."-".$tahun;
				$tmpt_lahir = $r['tempat_lahir'];
				$tgl_periksa = $r['tanggal_periksa'];
					$tahun= substr($tgl_periksa,0,4);
					$bulan= substr($tgl_periksa,5,2);
					$hari = substr($tgl_periksa,8,2);
					$tgl_periksa = $hari."-".$bulan."-".$tahun;
				$penyakit = $r['penyakit'];
				$solusi = $r['solusi'];
							
						
				echo"<tr>
								<td>$no</td>
								<td>$nama_pasien</td>
								<td>$alamat_pasien</td>
								<td>$kota</td>
								<td>$jnk</td>
							
								<td>$tgl_lahir</td>
								<td>$tgl_periksa</td>
								<td>$penyakit</td>
								</tr>
					";
								$no++;
								
						}	
				echo"		
					</table>
					";
	$html= ob_get_contents();					

ob_end_clean();
$mpdf->WriteHTML($html);
$mpdf->Output();



?>