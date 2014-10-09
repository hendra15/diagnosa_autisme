function spesial_masuk(){
	var id= $("#id_spesial").val();
	var spesial= $("#nama_spesial").val();
	
	$.ajax({
		type:"POST",
		url:"proses_spesial.php",
		data:"id="+id+"&spesial="+spesial+"&sts=input_spesial",
		success:function(balik){
			if(balik==1){
			alert("data berhasil disimpan");
			$("#tampilkan").load("input_spesial.php");
			
			
			}else{
			alert("data gagal disimpan");
			
			}
	
	
	}
	});
}
function set_data(id,spesial){
	$("#id_spesial").val(id);
	$("#nama_spesial").val(spesial);
	
	$("#tambahkan_spesial").hide();
	$("#perbarui_spesial").show();


}
function spesial_perbarui(){
	var id= $("#id_spesial").val();
	var spesial= $("#nama_spesial").val();
	
	$.ajax({
	type:"POST",
	url:"proses_spesial.php",
	data:"id="+id+"&spesial="+spesial+"&sts=baru_spesial",
	success:function(balik){
			alert("data berhasil diperbarui");
			$("#tampilkan").load("input_spesial.php");
	
	
	}
	
	});
}
function hapus_spesial(id,spesial){
if(confirm("hapus kota yang ber-id "+spesial+" ?")){
	
	$.ajax({
	type:"POST",
	url:"proses_spesial.php",
	data:"id="+id+"&spesial="+spesial+"&sts=hapus_spesial",
	success:function(){
			alert("data berhasil dihapus");
	
		location.reload();
		
		
		
	}
	});
}

}
function __colorbox_onClose(e){
	$.fn.colorbox.close();
	return false;
}
function bersihkan_spesial(){

		$.colorbox.close("");


}