//Master Dokter
function simpan_dokter(){
	var nid	= $("#nid").val();
	var nama = $("#nama").val();
	var telp = $("#telp").val();
	var alamat = $("#alamat").val();
	var kota = $("#kota").val();
	var spesial = $("#spesial").val();
	var user = $("#user").val();
	var pass = $("#pass").val();
		//alert("nid= "+nid+" nama= "+nama+" telp= "+telp+" alamat= "+alamat+" kota= "+kota+" spesial= "+spesial+" user= "+user+" pass= "+pass);
	
	if(nama=="" || telp=="" || alamat=="" || user=="" || pass=="")	{
		$("#peringatan").show();
	
		
	}else{
	$.ajax({
		type:"POST",
		url:"proses_dokter.php",
		data:"nid="+nid+"&nama="+nama+"&telp="+telp+"&alamat="+alamat+"&kota="+kota+"&spesial="+spesial+"&user="+user+"&pass="+pass+"&sts=simpan_dokter",
		success: function(balik){
			$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Disimpan</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="lihat_dokter.php";}});
					
		}
	
	
	});

}
}
function hapus_dokter(nid,user){
	if(confirm("hapus Dokter yang ber-id "+nid+" ?")){
	
	$.ajax({
		type:"POST",
		url:"proses_dokter.php",
		data:"nid="+nid+"&user="+user+"&sts=hapus_dokter",
		success : function(balik){
			$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Dihapus</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();location.reload();}});
		
		}
	});
	}

}
function perbarui_dokter(){
	var nid	= $("#nid").val();
	var nama = $("#nama").val();
	var telp = $("#telp").val();
	var alamat = $("#alamat").val();
	var kota = $("#kota").val();
	var spesial = $("#spesial").val();
	var user = $("#user").val();
	var pass = $("#pass").val();
	
	//alert("nid= "+nid+" nama= "+nama+" telp= "+telp+" alamat= "+alamat+" kota= "+kota+" spesial= "+spesial+" user= "+user+" pass= "+pass+" status= "+status);
	if(nid=="" || nama=="" || telp=="" || alamat=="" || user=="" || pass=="")	{

		$("#peringatan").show();
	}else{
	
	$.ajax({
		type:"POST",
		url:"proses_dokter.php",
		data:"nid="+nid+"&nama="+nama+"&telp="+telp+"&alamat="+alamat+"&kota="+kota+"&spesial="+spesial+"&user="+user+"&pass="+pass+"&sts=perbarui_dokter",
		success: function(balik){
			$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Diperbarui</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="lihat_dokter.php";}});
		}
	
	
	});
}

}

//Master ADmin

function simpan_admin(){
		var id =$("#id").val();
		var nama = $("#nama_admin").val();
		var alamat = $("#alamat_admin").val();
		var kota = $("#kota").val();
		var user = $("#user").val();
		var pass = $("#pass").val();

		//alert("id= "+id+" nama= "+nama+" kota= "+kota+" user= "+user+" pass= "+pass);
		
		if(nama=="" || alamat=="" || user=="" || pass==""){
			$("#peringatan").show();
		
		}else{
		$.ajax({
			type:"POST",
			url:"proses_admin.php",
			data:"id="+id+"&nama="+nama+"&alamat="+alamat+"&kota="+kota+"&user="+user+"&pass="+pass+"&sts=simpan_admin",
			success: function(balik){
				if(balik=="sukses"){
				$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Disimpan</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="lihat_admin.php";}});
				
				
				}else{
				$.colorbox({html:"<style type='text/css'>.tr{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tr'><img src='css/gambar/sad.png'/><b>Data Gagal Disimpan</b> </div>", overlayClose: false});
				
				}
			}
		
		
		});
		
		}

}

function hapus_admin(id_admin,user){
	if(confirm("hapus Admin yang ber-id "+id_admin+" ?")){
	$.ajax({
		type:"POST",
		url:"proses_admin.php",
		data:"id_admin="+id_admin+"&user="+user+"&sts=hapus_admin",
		success : function(balik){
			$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Dihapus</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();location.reload();}});
		
		}
	});
	}

}
function perbarui_admin(){
		var id =$("#id").val();
		var nama = $("#nama_admin").val();
		var alamat = $("#alamat_admin").val();
		var kota = $("#kota").val();
		var user = $("#user").val();
		var pass = $("#pass").val();

		if(id=="" || nama=="" || alamat=="" || user=="" || pass==""){
			$("#peringatan").show();
		
		}else{

		$.ajax({
			type:"POST",
			url:"proses_admin.php",
			data:"id="+id+"&nama="+nama+"&alamat="+alamat+"&kota="+kota+"&user="+user+"&pass="+pass+"&sts=perbarui_admin",
			success: function(balik){
				$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Diperbarui</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();window.location="lihat_admin.php";}});
			}
		
		
		});

		}
}


function hapus_diagnosa(id_diagnosa){
	if(confirm("hapus diagnosa yang ber-id "+id_diagnosa+" ?")){
	
	$.ajax({
		type:"POST",
		url:"proses_diagnosa.php",
		data:"id_diagnosa="+id_diagnosa+"&sts=hapus_diagnosa",
		success : function(balik){
			$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Dihapus</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();location.reload();}});
		
		
		}
	});
	}

}

function hapus_pasien(id,user){
	if(confirm("hapus pasien yang ber-id "+id+" ?")){
	
	$.ajax({
		type:"POST",
		url:"proses_pasien.php",
		data:"id="+id+"&user="+user+"&sts=hapus_pasien",
		success : function(balik){
			$.colorbox({html:"<style type='text/css'>.tt{ color:blue; background: rgba(232,232,232, 0.7); width:330px; height:150px; }</style><div class='tt'><img src='css/gambar/ok.png'/><b>Data Berhasil Dihapus</b> </div>", overlayClose: false, onClosed: function(){$('#cboxClose').show();location.reload();}});
		
		
		}
	});
	}

}
