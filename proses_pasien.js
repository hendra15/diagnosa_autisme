function simpan_pasien(){
	var id_pasien= $("#id_pasien").val();
	var nama_pasien= $("#nama_pasien").val();
	var no_telp = $("#telp_pas").val();
	var alamat_pas = $("#alamat_pas").val();
	var kota = $("#kota_pas").val();
	var jenkel = $("#jenkel:checked").val();
	var tempat_lahir = $("#tempat_lahir").val();
	var tgl_lahir = $("#tgl_lahir").val();
	var user_pasien = $("#user_pasien").val();
	var pass_pasien = $("#pass_pasien").val();
	
	if(nama_pasien=="" || no_telp=="" || alamat_pas=="" ||tempat_lahir=="" || user_pasien=="" || tgl_lahir=="" || pass_pasien==""){
	
		$("#peringatan").show();
	
	}else{
	
	
	
	$.ajax({
		type:"POST",
		url:"proses_pasien.php",
		data:"id_pasien="+id_pasien+"&nama_pasien="+nama_pasien+"&no_telp="+no_telp+"&alamat_pas="+alamat_pas+"&kota="+kota+"&jenkel="+jenkel+"&tempat_lahir="+tempat_lahir+"&tgl_lahir="+tgl_lahir+"&user_pasien="+user_pasien+"&pass_pasien="+pass_pasien+"&sts=simpan_pasien",
		success:function(balik){
			if(balik=="sukses"){
			
				$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='admin/css/gambar/ok.png'/><b>Data Berhasil Diperbarui</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";}});
			
			}
	
	
	}
	});

}
}

function perbarui_pas(){
var id = $("#id_pass").val();
var nama = $("#nama_pasien").val();
var handphone = $("#telp_pas").val();
var alamat = $("#alamat_pas").val();
var kota = $("#kota_pas").val();
var jenkel = $("#jenkel:checked").val();
var tempat_lahir = $("#tempat_lahir").val();
var tgl_lahir = $("#tgl_lahir").val();
var user = $("#user").val();
var pass_pasien = $("#pass_pasien").val();

if(nama=="" || handphone=="" || alamat=="" ||tempat_lahir=="" || tgl_lahir=="" || pass_pasien==""){
	
		$("#peringatan").show();
	
	}else{

$.ajax({
	type:"POST",
	url:"proses_pasien.php",
	data:"id="+id+"&nama="+nama+"&handphone="+handphone+"&alamat="+alamat+"&kota="+kota+"&jenkel="+jenkel+"&tempat_lahir="+tempat_lahir+"&tgl_lahir="+tgl_lahir+"&user="+user+"&pass_pasien="+pass_pasien+"&sts=perbarui_pasien",
	success:function(balik){
		if(balik=="sukses"){
		
			$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='admin/css/gambar/ok.png'/><b>Data Berhasil Diperbarui</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();location.reload();}});
			
		}else{
		
			$.colorbox({html:"<style type='text/css'>.tr{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tr'><img src='admin/css/gambar/sad.png'/><b>Data Gagal Diperbarui</b> </div>", overlayClose: false});
			
		}

	}

});

}

}

function umur1(){
var pengguna = $("#pengguna").val();
var g1a = $("#g1a:checked").val();
var g2a = $("#g2a:checked").val();
var g3a = $("#g3a:checked").val();
var g4a = $("#g4a:checked").val();
var g13a = $("#g13a:checked").val();
var g19a = $("#g19a:checked").val();
var g25a = $("#g25a:checked").val();
var g26a = $("#g26a:checked").val();
var g28a = $("#g28a:checked").val();
var g36a = $("#g36a:checked").val();

//alert (g1a+""+g2a+""+g3a+""+g4a);

$.ajax({
type:"POST",
url:"proses_diagnosa.php",
data:"pengguna="+pengguna+"&g1a="+g1a+"&g2a="+g2a+"&g3a="+g3a+"&g4a="+g4a+"&g13a="+g13a+"&g19a="+g19a+"&g25a="+g25a+"&g26a="+g26a+"&g28a="+g28a+"&g36a="+g36a+"&sts=umur1",
success:function(balik){
	if(balik=="Autis Infantil"){
	
	$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda terjangkit autis Infantil</b><br /><b>diharapkan melakukan terapi seperti :<br /><ul><li>Ciluk-ba</li><li>Memberikan contoh suara untuk ditiru</li><li>Mengenal nama</li></ul></b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});
	
	}else{
	
	$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda tidak terjangkit autis Infantil</b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});
	
	}

}
});

}

function umur2(){
var pengguna = $("#pengguna").val();
var g4b = $("#g4b:checked").val();
var g5b = $("#g5b:checked").val();
var g6b = $("#g6b:checked").val();
var g7b = $("#g7b:checked").val();
var g8b = $("#g8b:checked").val();
var g9b = $("#g9b:checked").val();
var g10b = $("#g10b:checked").val();
var g11b = $("#g11b:checked").val();
var g12b = $("#g12b:checked").val();
var g14b = $("#g14b:checked").val();
var g15b = $("#g15b:checked").val();
var g16b = $("#g16b:checked").val();
var g17b = $("#g17b:checked").val();
var g18b = $("#g18b:checked").val();
var g20b = $("#g20b:checked").val();
var g21b = $("#g21b:checked").val();
var g22b = $("#g22b:checked").val();
var g23b = $("#g23b:checked").val();
var g24b = $("#g24b:checked").val();
var g25b = $("#g25b:checked").val();
var g26b = $("#g26b:checked").val();
var g27b = $("#g27b:checked").val();
var g28b = $("#g28b:checked").val();
var g30b = $("#g30b:checked").val();
var g32b = $("#g32b:checked").val();
var g35b = $("#g35b:checked").val();
var g36b = $("#g36b:checked").val();
var g38b = $("#g38b:checked").val();
var g39b = $("#g39b:checked").val();
var g41b = $("#g41b:checked").val();
var g42b = $("#g42b:checked").val();
var g43b = $("#g43b:checked").val();
var g44b = $("#g44b:checked").val();
var g45b = $("#g45b:checked").val();
var g46b = $("#g46b:checked").val();
var g47b = $("#g47b:checked").val();

$.ajax({
	type:"POST",
	url:"proses_diagnosa.php",
	data:"pengguna="+pengguna+"&g4b="+g4b+"&g5b="+g5b+"&g6b="+g6b+"&g7b="+g7b+"&g8b="+g8b+"&g9b="+g9b+"&g10b="+g10b+"&g11b="+g11b+"&g12b="+g12b+"&g14b="+g14b+
		"&g15b="+g15b+"&g16b="+g16b+"&g17b="+g17b+"&g18b="+g18b+"&g20b="+g20b+"&g21b="+g21b+"&g22b="+g22b+"&g23b="+g23b+"&g24b="+g24b+"&g25b="+g25b+"&g26b="+g26b+"&g27b="+g27b+
		"&g28b="+g28b+"&g30b="+g30b+"&g32b="+g32b+"&g35b="+g35b+"&g36b="+g36b+"&g38b="+g38b+"&g39b="+g39b+"&g41b="+g41b+"&g42b="+g42b+"&g43b="+g43b+"&g44b="+g44b+
		"&g45b="+g45b+"&g46b="+g46b+"&g47b="+g47b+"&sts=umur2",
	success:function(balik){
		if(balik=="Autis Infantil"){
		
		$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda terjangkit autis Infantil</b><br /><b>diharapkan melakukan terapi seperti :<br /><ul><li>Ciluk-ba</li><li>Memberikan contoh suara untuk ditiru</li><li>Mengenal nama</li></ul></b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});
		
		}else{
		
		$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda tidak terjangkit autis Infantil</b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});
		
		}
	}
});

}
function umur3(){
var pengguna = $("#pengguna").val();
var g5c = $("#g5c:checked").val();
var g7c = $("#g7c:checked").val();
var g8c = $("#g8c:checked").val();
var g9c = $("#g9c:checked").val();
var g10c = $("#g10c:checked").val();
var g11c = $("#g11c:checked").val();
var g12c = $("#g12c:checked").val();
var g14c = $("#g14c:checked").val();
var g15c = $("#g15c:checked").val();
var g16c = $("#g16c:checked").val();
var g17c = $("#g17c:checked").val();
var g18c = $("#g18c:checked").val();
var g19c = $("#g19c:checked").val();
var g20c = $("#g20c:checked").val();
var g21c = $("#g21c:checked").val();
var g22c = $("#g22c:checked").val();
var g23c = $("#g23c:checked").val();
var g24c = $("#g24c:checked").val();
var g26c = $("#g26c:checked").val();
var g27c = $("#g27c:checked").val();
var g29c = $("#g29c:checked").val();
var g30c = $("#g30c:checked").val();
var g31c = $("#g31c:checked").val();
var g32c = $("#g32c:checked").val();
var g33c = $("#g33c:checked").val();
var g34c = $("#g34c:checked").val();
var g35c = $("#g35c:checked").val();
var g36c = $("#g36c:checked").val();
var g37c = $("#g37c:checked").val();
var g38c = $("#g38c:checked").val();
var g39c = $("#g39c:checked").val();
var g40c = $("#g40c:checked").val();
var g41c = $("#g41c:checked").val();
var g42c = $("#g42c:checked").val();
var g43c = $("#g43c:checked").val();
var g44c = $("#g44c:checked").val();
var g45c = $("#g45c:checked").val();
var g46c = $("#g46c:checked").val();
var g47c = $("#g47c:checked").val();
var g48c = $("#g48c:checked").val();
var g49c = $("#g49c:checked").val();
var g50c = $("#g50c:checked").val();
var g51c = $("#g51c:checked").val();
var g52c = $("#g52c:checked").val();
var g53c = $("#g53c:checked").val();
var g54c = $("#g54c:checked").val();
var g55c = $("#g55c:checked").val();
var g56c = $("#g56c:checked").val();
var g57c = $("#g57c:checked").val();
var g58c = $("#g58c:checked").val();
var g59c = $("#g59c:checked").val();
var g60c = $("#g60c:checked").val();
var g61c = $("#g61c:checked").val();
var g62c = $("#g62c:checked").val();
var g63c = $("#g63c:checked").val();
var g64c = $("#g64c:checked").val();
var g65c = $("#g65c:checked").val();
var g66c = $("#g66c:checked").val();
var g67c = $("#g67c:checked").val();
var g68c = $("#g68c:checked").val();
var g69c = $("#g69c:checked").val();

$.ajax({
	type:"POST",
	url:"proses_diagnosa.php",
	data:"pengguna="+pengguna+"&g5c="+g5c+"&g7c="+g7c+"&g8c="+g8c+"&g9c="+g9c+"&g10c="+g10c+"&g11c="+g11c+"&g12c="+g12c+"&g14c="+g14c+"&g15c="+g15c+"&g16c="+g16c+
		"&g17c="+g17c+"&g18c="+g18c+"&g19c="+g19c+"&g20c="+g20c+"&g21c="+g21c+"&g22c="+g22c+"&g23c="+g23c+"&g24c="+g24c+"&g26c="+g26c+"&g27c="+g27c+"&g29c="+g29c+
		"&g30c="+g30c+"&g31c="+g31c+"&g32c="+g32c+"&g33c="+g33c+"&g34c="+g34c+"&g35c="+g35c+"&g36c="+g36c+"&g37c="+g37c+"&g38c="+g38c+"&g39c="+g39c+"&g40c="+g40c+
		"&g41c="+g41c+"&g42c="+g42c+"&g43c="+g43c+"&g44c="+g44c+"&g45c="+g45c+"&g46c="+g46c+"&g47c="+g47c+"&g48c="+g48c+"&g49c="+g49c+"&g50c="+g50c+"&g51c="+g51c+
		"&g52c="+g52c+"&g53c="+g53c+"&g54c="+g54c+"&g55c="+g55c+"&g56c="+g56c+"&g57c="+g57c+"&g58c="+g58c+"&g59c="+g59c+"&g60c="+g60c+"&g61c="+g61c+"&g62c="+g62c+
		"&g63c="+g63c+"&g64c="+g64c+"&g65c="+g65c+"&g66c="+g66c+"&g67c="+g67c+"&g68c="+g68c+"&g69c="+g69c+"&sts=umur3",
	success:function(balik){
		if(balik=="Autis Infantil")
		{
		
		$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda terjangkit autis Infantil</b><br /><b>diharapkan melakukan terapi seperti :<br /><ul><li>Ciluk-ba</li><li>Memberikan contoh suara untuk ditiru</li><li>Mengenal nama</li></ul></b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});
		
		}else if(balik=="Sindrom Asperger")
		{
		
		$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda terjangkit Sindrom Asperger</b><br /><b>diharapkan melakukan terapi seperti :<br /><ul><li>Kata-kata pertama</li><li>Menirukan menyentuh bagian tubuh</li><li>Menirukan menyisir dan menyikat gigi</li><li>minum dari cangkir</li><li>melempar dan menangkap</li></ul></b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});

		}else if(balik=="Hiperaktif")
		{
		
		$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda terjangkit Hiperaktif</b><br /><b>diharapkan melakukan terapi seperti :<br /><ul><li>Kontak mata saat diberi instruksi</li><li>Menirukan gerakan pada motorik kasar</li><li>Interaksi main truk-trukan</li><li>melepas kaos kaki</li><li>Hugging saat anak tatrum</li></ul></b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});
		
		}else{
		
		$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:600px; height:280px; }</style><div class='tt'><img src='admin/css/gambar/stethoscope.png'/><b>Berdasarkan Diagnosa Maka anda tidak terjangkit autis</b></div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="index.php";;}});
		
		}
		}
});
}


