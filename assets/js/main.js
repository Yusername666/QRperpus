//START DASHBOARD
document.addEventListener('DOMContentLoaded', function() {
	var validator = $(".form-validate-jquery").validate({
		errorClass: 'validation-error-label',
		successClass: 'validation-valid-label',
		highlight: function(element, errorClass) {
			$(element).removeClass(errorClass);
		},
		unhighlight: function(element, errorClass) {
			$(element).removeClass(errorClass);
		},

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Input group, styled file input
            if (element.parents().hasClass('input-group')) {
            	error.appendTo( element.parent().parent() );
            } else {
            	error.insertAfter(element);
            }
        },

        validClass: "validation-valid-label",
        success: function(label) {
        	label.addClass("validation-valid-label").text("Success.")
        },
        rules: {
        	password: {
        		minlength: 6
        	},
        	repeat_password: {
        		equalTo: "#password"
        	},
        },
    });
})
function validateReset() {
	var x = document.forms["form"]["password"].value
	var y = document.forms["form"]["repeat_password"].value
	if (x == "" && y == "") {
		Swal.fire({
			title: 'Data Password Tidak Boleh Kosong!',
			allowOutsideClick: false,
			icon: 'error'
		})
		return false
	}else {
		return true
	}
}
function ubahPassword(nis) {
	if (validateReset() === true) {
		$.ajax({
			url:"Dashboard/resetPassword/" + nis,
			type:"POST",
			data:$('#form').serialize(),
			dataType:"JSON",
			success:function(data){
				Swal.fire({
					title: 'Berhasil',
					text: 'Password Berhasil Diubah!',
					icon: 'success',
					allowOutsideClick: false,
				}).then(function(){
					location.reload()
				})
			},
			error: function(jqXHR, textStatus, errorThrown) {
				Swal.fire({
					title: 'Whoops!',
					text: 'Password Gagal Diubah!',
					icon: 'error'
				})
			}
		})
	} else if(validateReset() === false) {
		console.log('Something Wrong!')
	}
}
//END DASHBOARD

//START PENGEMBALIAN BUKU
function perpanjangan(kd_peminjaman) {
	alert(kd_peminjaman)
}

function pengembalianBuku(kd_peminjaman) {
	Swal.fire({
		title: 'Konfirmasi Pengembalian Buku?',
		text: 'Mohon Cek Kembali Data Buku Yang Dipinjam!',
		icon: 'warning',
		showCancelButton: true,
		cancelButtonColor: '#d33',
		confirmButtonText: 'Oke',
		cancelButtonText: 'Batal'
	}).then(function(result) {
		if (result.value) {
			$.ajax({
				url:"../pengembalianBuku/" + kd_peminjaman,
				type:"POST",
				dataType:"JSON",
				success:function(data){
					Swal.fire({
						title: 'Berhasil',
						text: 'Data Peminjaman Berhasil Dikembalikan!',
						icon: 'success',
						allowOutsideClick: false,
					}).then(function(){
						location.reload()
					})
				},
				error: function(jqXHR, textStatus, errorThrown) {
					Swal.fire({
						title: 'Whoops!',
						text: 'Data Peminjaman Gagal Dikembalikan!',
						icon: 'error'
					})
				}
			})
		}
	})
}

//END PENGEMBALIAN BUKU

//START PEMINJAMAN BUKU
function validateForm() {
	var x = document.forms["dataBuku"]["kd_inventaris"].value
	var y = document.forms["dataBuku"]["judul_buku"].value
	var z = document.forms["dataBuku"]["isbn"].value
	if (x == "" && y == "" && z == "") {
		Swal.fire({
			title: 'Data Buku Tidak Boleh Kosong!',
			allowOutsideClick: false,
			icon: 'error'
		})
		return false
	}else {
		return true
	}
}

function validateData() {
	var nama = document.forms["dataPeminjam"]["nama_lengkap"].value
	var nis = document.forms["dataPeminjam"]["nis"].value
	var pinjam = document.forms["dataPeminjam"]["tgl_pinjam"].value
	var kembali = document.forms["dataPeminjam"]["tgl_kembali"].value
	if (nama == "" && nis == "" && pinjam == "" && kembali == "") {
		Swal.fire({
			title: 'Data Peminjaman Tidak Boleh Kosong!',
			allowOutsideClick: false,
			icon: 'error'
		})
		return false
	} else {
		return true
	}
}

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

//cart buku
$(document).ready(function(){
	$('.add_cart').click(function(){
		if (validateForm() === true) {
			var kd_inventaris    = $("#kd_inventaris").val()
			var judul_buku  = $("#judul_buku").val()
			var isbn = $("#isbn").val()
			$.ajax({
				url : "Peminjaman/add_to_cart",
				method : "POST",
				data : {kd_inventaris: kd_inventaris, judul_buku: judul_buku, isbn: isbn},
				success: function(data){
					$('#detail_cart').html(data);
					$('#dataBuku')[0].reset();
				}
			});
		}
	});
        // Load shopping cart
        $('#detail_cart').load("Peminjaman/load_cart");

        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id") //mengambil row_id dari artibut id
            Swal.fire({
            	title: 'Apa Anda Yakin?',
            	text: "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan Lagi!",
            	icon: 'warning',
            	showCancelButton: true,
            	confirmButtonColor: '#3085d6',
            	cancelButtonColor: '#d33',
            	confirmButtonText: 'Hapus',
            	cancelButtonText: 'Batal'
            }).then(function(result) {
            	if (result.value) {
            		$.ajax({
            			url : "Peminjaman/hapus_cart",
            			method : "POST",
            			data : {row_id : row_id},
            			success :function(data){
            				Swal.fire({
            					title: 'Berhasil!',
            					text: 'Data Berhasil Dihapus!',
            					icon: 'success',
            					allowOutsideClick: false,
            				}).then(function() {
            					$('#detail_cart').html(data)
            				})
            			}
            		})
            	}
            })
        })
        $('.save').click(function(){
        	if (validateData() === true ) {
        		$.ajax({
        			url:"Peminjaman/simpanPinjaman",
        			type:"POST",
        			data:$('#dataPeminjam').serialize(),
        			dataType:"JSON",
        			success:function(data){
        				Swal.fire({
        					title: 'Berhasil',
        					text: 'Data Peminjaman Berhasil Disimpan!',
        					icon: 'success',
        					allowOutsideClick: false,
        				}).then(function(){
        					location.reload()
        				})
        			}
        		})
        	}
        })
    })

//END PEMINJAMAN BUKU

//START KELOLA BUKU
function hapusBuku(kd_inventaris) {
	Swal.fire({
		title: 'Apa Anda Yakin?',
		text: "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan Lagi!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then(function(result) {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: "Kelola_buku/hapus/" + kd_inventaris,
				datatype: "JSON",
				success: function(kd_inventaris) {
					Swal.fire({
						title: 'Berhasil!',
						text: 'Data Berhasil Dihapus!',
						icon: 'success',
						allowOutsideClick: false,
					}).then(function() {
						location.reload()
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					Swal.fire({
						title: 'Whoops!',
						text: 'Data Gagal Dihapus!',
						icon: 'error'
					})
				}
			});
		}
	})
}

$('#thn_terbit').maxlength({
	alwaysShow: true,
	validate: true,
	allowOverMax: true,
	customMaxAttribute: "4"
})

$('#isbn').on('keyup', function() {
	let isbn = $(this).val();
	$.ajax({
		url: "cekdata_isbn/" + isbn,
		type: "GET",
		dataType: "JSON",
		success: function(data) {
			if (data.status == true) {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'No. ISBN : ' + isbn +' Sudah Ada!'
				})
				$('#isbn').val('');
			}
		}
	})
})
//END KELOLA BUKU

//START KELOLA KLASIFIKASI BUKU
var save_metode
var id

function tambah() {
	save_metode = "create"
	$('#form')[0].reset();
}

function editKlasifikasi(id_klasifikasi) {
	save_metode = "edit"
	$('#form')[0].reset();
	$.ajax({
		url 	 : 'Klasifikasi_buku/ubah/' + id_klasifikasi,
		type 	 : "post",
		data 	 : $('#form').serialize(),
		dataType : "JSON",
		success  : function (data) {
			$("#id_klasifikasi").val(data.id_klasifikasi);
			$("#klasifikasi").val(data.klasifikasi);
			id = data.id_klasifikasi;
		},
		error 	: function (ae, be, ce) {
			Swal.fire({
				icon: 'error',
				title: 'Gagal',
				text: 'Data Gagal Ditambahkan!',
			})
		}
	})
}

$('#simpan').on('click', function () {
	if (save_metode == "create") {
		url = 'Klasifikasi_buku/tambah/create'
	} else if (save_metode == "edit"){
		url = 'Klasifikasi_buku/tambah/edit/' +id
	}
	if ($('#id_klasifikasi').val() != '' && $('#klasifikasi').val() != '') {
		$.ajax({
			url 	 : url,
			type 	 : "post",
			data 	 : $('#form').serialize(),
			dataType : "JSON",
			success  : function (data) {
				console.log(data)
				location.reload()
			},
			error 	: function (a, b, c) {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'Data Gagal Ditambahkan!',
				})
			}
		})
	} else {
		Swal.fire({
			icon: 'warning',
			title: 'Gagal',
			text: 'Data Tidak Boleh Kosong!',
		})
	}
})

function hapusKlasifikasi(id_klasifikasi) {
	Swal.fire({
		title: 'Apa Anda Yakin?',
		text: "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan Lagi!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then(function(result) {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: "Klasifikasi_buku/hapus/" + id_klasifikasi,
				datatype: "JSON",
				success: function(id_klasifikasi) {
					Swal.fire({
						title: 'Berhasil!',
						text: 'Data Berhasil Dihapus!',
						icon: 'success',
						allowOutsideClick: false,
					}).then(function() {
						location.reload()
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					Swal.fire({
						title: 'Whoops!',
						text: 'Data Gagal Dihapus!',
						icon: 'error'
					})
				}
			});
		}
	})
}

$('#klasifikasi').on('keyup', function() {
	let klasifikasi = $(this).val();
	$.ajax({
		url: "Klasifikasi_buku/cekdata_klasifikasi/" + klasifikasi,
		type: "GET",
		dataType: "JSON",
		success: function(data) {
			if (data.status == true) {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'Klasifikasi ' + klasifikasi +' Sudah Ada!'
				})
				$('#klasifikasi').val('');
			}
		}
	})
})

$('#id_klasifikasi').on('keyup', function() {
	let id_klasifikasi = $(this).val();
	$.ajax({
		url: "Klasifikasi_buku/cekdata_id/" + id_klasifikasi,
		type: "GET",
		dataType: "JSON",
		success: function(data) {
			if (data.status == true) {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'ID Klasifikasi ' + id_klasifikasi +' Sudah Ada!'
				})
				$('#id_klasifikasi').val('');
			}
		}
	})
})

$('#id_klasifikasi').maxlength({
	alwaysShow: true,
	validate: true,
	allowOverMax: true,
	customMaxAttribute: "3"
})
//END KELOLA KLASIFIKASI BUKU

//START KELOLA USER
$("#kelas").on('change', function (event) {
	const $select = $(event.target)
	const val     = $select.val()
	const sel     = $('#kelas').data('selected')
	$select.data('selected', val)
	if (val == 'PETUGAS') {
		$('#nomor').empty()
	} else if (val == 'IX-IPS' || val == 'XI-IPS' || val == 'XII-IPS' || val == 'IX-IPA' || val == 'XI-IPA' || val == 'XII-IPA') {
		$("#nomor").append("<input type='number' min='0' class='form-control' title='Masukan Nomor Kelas....' required='required' name='no_kelas'> ")
	}
})

function hapusUser(d) {
	Swal.fire({
		title: 'Apa Anda Yakin?',
		text: "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan Lagi!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Batal'
	}).then(function(result) {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: "Kelola_user/hapus/" + d,
				datatype: "JSON",
				success: function(d) {
					Swal.fire({
						title: 'Berhasil!',
						text: 'Data Berhasil Dihapus!',
						icon: 'success',
						allowOutsideClick: false,
					}).then(function() {
						location.reload()
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(url);
					Swal.fire({
						title: 'Whoops!',
						text: 'Data Gagal Dihapus!',
						icon: 'error'
					})
				}
			});
		}
	})
}

$('#username').on('keyup', function() {
	let d = $(this).val();
	$.ajax({
		url: "Kelola_user/cekdata_username/" + d,
		type: "GET",
		dataType: "JSON",
		success: function(data) {
			if (data.status == true) {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'Username Sudah Ada!'
				})
				$('#username').val('');
			}
		}
	})
})
$('.validate-nis').on('keyup', function() {
	let nis = $(this).val();
	$.ajax({
		url: "Kelola_user/cekdata_nis/" + nis,
		type: "GET",
		dataType: "JSON",
		success: function(data) {
			if (data.status == true) {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'NIS Sudah Ada!'
				})
				$('#nis').val('');
			}
		}
	})
})

$('#nis').maxlength({
	alwaysShow: true,
	validate: true,
	allowOverMax: true,
	customMaxAttribute: "6"
})

//END KELOLA USER

//logout

function logout() {
	Swal.fire({
		icon: 'warning',
		title: 'Keluar Dari Sistem?',
		showCancelButton: true,
		cancelButtonText: 'Batal',
		confirmButtonText: 'Keluar',
		confirmButtonColor: '#d33',
		preConfirm: (Login) => {
			fetch("Auth/logout/", {
				method: 'POST',
			})
			.then(response => {
				//static URL
				window.location.replace("http://localhost/QRperpus/Auth/logout");
			})
		},
	})
}


//jam dinding
$(document).ready(function(){
	function showTime() {
		var a_p = "";
		var today = new Date();
		var curr_hour = today.getHours();
		var curr_minute = today.getMinutes();
		var curr_second = today.getSeconds();
		if (curr_hour < 12) {
			a_p = "AM";
		} else {
			a_p = "PM";
		}
		if (curr_hour == 0) {
			curr_hour = 12;
		}
		if (curr_hour > 12) {
			curr_hour = curr_hour - 12;
		}
		curr_hour = checkTime(curr_hour);
		curr_minute = checkTime(curr_minute);
		curr_second = checkTime(curr_second);
		document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
	}

	function checkTime(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}
	setInterval(showTime, 500);
})



