function kota_masuk(){
	var id= $("#id_kota").val();
	var kota= $("#nama_kota").val();
	
	$.ajax({
		type:"POST",
		url:"proses_kota.php",
		data:"id="+id+"&kota="+kota+"&sts=input_kota",
		success:function(balik){
			if(balik==1){
			//alert("data berhasil disimpan");
			$("#tampilkan").load("input_kota.php");
			
			//$("#nama_kota").val("");
			
			}else{
			alert("data gagal disimpan");
			
			}
	
	
	}
	});
}
function set_data(id,kota){
	$("#id_kota").val(id);
	$("#nama_kota").val(kota);
	
	$("#tambahkan_kota").hide();
	$("#perbarui_kota").show();


}
function kota_perbarui(){
	var id= $("#id_kota").val();
	var kota= $("#nama_kota").val();
	
	$.ajax({
	type:"POST",
	url:"proses_kota.php",
	data:"id="+id+"&kota="+kota+"&sts=baru_kota",
	success:function(balik){
			alert("data berhasil diperbarui");
			$("#tampilkan").load("input_kota.php");
	
	
	}
	
	});
}
function hapus_kota(id,kota){
if(confirm("hapus kota yang bernama "+kota+" ?")){
	
	$.ajax({
	type:"POST",
	url:"proses_kota.php",
	data:"id="+id+"&kota="+kota+"&sts=hapus_kota",
	success:function(){
			alert("data berhasil dihapus");
		//	$("#tampilkan").load("input_kota.php");
		location.reload();
		
		
		
	}
	});
}

}

function keluar_kota(){

		//jQuery("#keluar_kota").click(function(){
		//colorbox.close("makasih")
		//});
		$('#keluar_kota').click('cbox_closed',function(e){
		$(this).remove();
		});	


}