$(document).ready(function(){
	$("#btn-search").click(function(){ // Ketika tombol simpan di klik
		// Panggil function
		searchWithPagination(1, true); // Set page_number nya dengan 1 dan set search nya dengan true
	});
});

// Buat sebuah function dengan nama searchWithPagination
// Function ini untuk mengirim data keyword dan pagination dengan AJAX
function searchWithPagination(page_number, search){
	// Ubah text tombol search menjadi SEARCHING... 
	// Dan tambahkan atribut disable pada tombol nya agar tidak bisa diklik lagi
	$(this).html("SEARCHING...").attr("disabled", "disabled");
	
	$.ajax({
		url: 'search.php', // File tujuan
		type: 'POST', // Tentukan type nya POST atau GET
		data: {keyword: $("#keyword").val(), page: page_number, search: search}, // Set data yang akan dikirim
		dataType: "json",
		beforeSend: function(e) {
			if(e && e.overrideMimeType) {
				e.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		success: function(response){ // Ketika proses pengiriman berhasil
			// Ubah kembali text button search menjadi SEARCH
			// Dan hapus atribut disabled untuk meng-enable kembali button search nya
			$("#btn-search").html("SEARCH").removeAttr("disabled");
			
			// Ganti isi dari div view dengan view yang diambil dari search.php
			$("#view").html(response.hasil);
		},
		error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
			alert(xhr.responseText); // munculkan alert
		}
	});
}
