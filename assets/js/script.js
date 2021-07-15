$(
	'form input[type=text], input[type=file], input[type=number], input[type=password], input[type=email], select[name=level]'
).on('change invalid input', function () {
	var textfield = $(this).get(0);
	var username = document.querySelector('input[name="username"]');
	var password = document.querySelector('input[name="password"]');
	var password2 = document.querySelector('input[name="password2"]');
	var email = document.querySelector('input[name="email"]');
	var tahun = document.querySelector('input[name="tahun"]');

	// hapus dulu pesan yang sudah ada
	textfield.setCustomValidity('');

	// PENGKONDISISAN VALIDASI
	if (this.value.trim() === '') {
		textfield.setCustomValidity('Wajib di Isi!');
	} else if (!username.validity.valid) {
		username.setCustomValidity('Username Minimal 3 Karakter!');
	} else if (!password.validity.valid) {
		password.setCustomValidity('Username Minimal 6 Karakter!');
	} else if (password2.value.trim() != password.value.trim()) {
		password2.setCustomValidity('Konfirmasi Password Tidak Sesuai!');
	} else if (!email.validity.valid) {
		email.setCustomValidity('Email Anda Tidak Valid!');
	} else if (!tahun.validity.valid) {
		tahun.setCustomValidity('Input Tahun dengan Format Maksimal 4 Angka!');
	} else {
		textfield.setCustomValidity('');
	}
});

// //jqery capitalize judul
jQuery(document).ready(function () {
	jQuery('#judul').on('keyup', function () {
		var str = jQuery('#judul').val();

		var spart = str.split(' ');
		for (var i = 0; i < spart.length; i++) {
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#judul').val(spart.join(' '));
	});
});

// //jqery capitalize nama
jQuery(document).ready(function () {
	jQuery('#nama').on('keyup', function () {
		var str = jQuery('#nama').val();

		var spart = str.split(' ');
		for (var i = 0; i < spart.length; i++) {
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#nama').val(spart.join(' '));
	});
});

// //jqery capitalize instansi
jQuery(document).ready(function () {
	jQuery('#instansi').on('keyup', function () {
		var str = jQuery('#instansi').val();

		var spart = str.split(' ');
		for (var i = 0; i < spart.length; i++) {
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#instansi').val(spart.join(' '));
	});
});

// //jqery capitalize pekerjaan
jQuery(document).ready(function () {
	jQuery('#pekerjaan').on('keyup', function () {
		var str = jQuery('#pekerjaan').val();

		var spart = str.split(' ');
		for (var i = 0; i < spart.length; i++) {
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#pekerjaan').val(spart.join(' '));
	});
});

// //jqery capitalize pekerjaan
jQuery(document).ready(function () {
	jQuery('#alamat').on('keyup', function () {
		var str = jQuery('#alamat').val();

		var spart = str.split(' ');
		for (var i = 0; i < spart.length; i++) {
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#alamat').val(spart.join(' '));
	});
});
// //jqery capitalize nama kategori
jQuery(document).ready(function () {
	jQuery('#namkat').on('keyup', function () {
		var str = jQuery('#namkat').val();

		var spart = str.split(' ');
		for (var i = 0; i < spart.length; i++) {
			var j = spart[i].charAt(0).toUpperCase();
			spart[i] = j + spart[i].substr(1);
		}
		jQuery('#namkat').val(spart.join(' '));
	});
});

// $(document).ready(function ()) {
//     $("#angkatan1").keypress(function (e) {
//             //if the letter is not digit then display error and don't type anything
//             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

//                 return false;
//             }
//         });
// });

// tabelanggota
$(document).ready(function () {


	// var printCounter = 0;
 
 //    // Append a caption to the table before the DataTables initialisation
 //    $('#tabelcoba').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');


 
 //    $('#tabelcoba').DataTable( {
 //        dom: 'Bfrtip',
 //        buttons: [
 //            'copy',
 //            {
 //                extend: 'excelHtml5',
 //                text : 'Export report to excel',
 //                messageTop: 'MAHASISWA KELAS REG. PAGI, REG SORE DAN EKSEKUTIF',
 //                messageTop: 'STIE satya Dharma',
 //                title : 'KWITANSI PEMBAYARAN SPP YANG DI SETOR 22 MARET 2019 S/D ',
 //                download : 'open',
 //                customize: function ( xlsx ){
 //                var sheet = xlsx.xl.worksheets['sheet1.xml'];
 // 				$.each(sheet, function(index, value)){		
 //                // jQuery selector to add a border
 //                $('row c[r*="4"]', value).attr( 's', '25' );
 //            }
 //            }
 //            },



 //            {
 //                extend: 'pdf',
 //                download : 'open',
 //                messageBottom: null
 //            },
 //            {
 //                extend: 'print',
 //                messageTop: function () {
 //                    printCounter++;
 
 //                    if ( printCounter === 1 ) {
 //                        return 'This is the first time you have printed this document.';
 //                    }
 //                    else {
 //                        return 'You have printed this document '+printCounter+' times';
 //                    }
 //                },
 //                messageBottom: null
 //            }
 //        ]
 //    } );




	$('#tabelanggota').dataTable({
		ordering: false,
		info: true,
		language: {
			url: 'assets/js/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});

	$('#tabelspp').dataTable({
		ordering: true,
		info: true,
		language: {
			url: 'assets/js/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});

	$('#tabelKegiatan').dataTable({
		ordering: true,
		info: true,
		language: {
			url: 'assets/js/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});

	$( ".kosong" ).css( "visibility", "hidden" );


	$('#tabelmhs').dataTable({
		ordering: true,
		info: true,
		language: {
			url: 'assets/js/Indonesian.json',
			sEmptyTable: 'Tidads'
		},

		initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
	});


});
// end tabel anggota

// tabelref_rincian
$(document).ready(function () {
	// tabel rincian
	$('#tabelref_rincian').dataTable({
		paging: false,
		info: false,
		language: {
			url: 'assets/js/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});

	$('#tabelSetHarga').dataTable({
		ordering: true,
		language: {
			url: 'assets/js/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});

	// var table = $('#tabelref_rincian').DataTable({
	//     ajax: 'https://api.myjson.com/bins/qgcu',
	//     createdRow: function (row, data, dataIndex) {
	//         // If name is "Ashton Cox"
	//         if (data[0] === 'Ashton Cox') {
	//             // Add COLSPAN attribute
	//             $('td:eq(1)', row).attr('colspan', 3);

	//             // Center horizontally
	//             $('td:eq(1)', row).attr('align', 'center');

	//             // Hide required number of columns
	//             // next to the cell with COLSPAN attribute
	//             $('td:eq(2)', row).css('display', 'none');
	//             $('td:eq(3)', row).css('display', 'none');

	//             // Update cell data
	//             this.api().cell($('td:eq(1)', row)).data('N/A');
	//         }
	//     }
	// });
});

// end // tabelref_rincian

// tabel kategori
$(document).ready(function () {
	$('#tabelkategori').dataTable({
		ordering: false,
		paging: false,
		language: {
			url: 'http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});
});

// tabel transaki
$(document).ready(function () {
	$('#tabeltransaksi').dataTable({
		ordering: false,
		paging: false,
		info: false,
		// "scrollX": 200,
		language: {
			url: 'http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});
});

// tabel user
$(document).ready(function () {
	$('#tabeluser').DataTable({
		scrollY: '40vh',
		sScrollX: '100%',
		scrollXInner: '100%',
		scrollCollapse: true,
		ordering: false,
		paging: false,
		language: {
			url: 'assets/js/Indonesian.json',
			sEmptyTable: 'Tidads'
		}
	});
});
// // hover panel collapse Tambah data kategori
// $(".panel-heading").parent('.panel').hover(

//     function () {
//         $(this).children('.collapse').collapse('show');
//     },
//     function () {
//         if ($("#kode").val() != '') {
//             $(this).children('.collapse').collapse('show');
//         } else {
//             $(this).children('.collapse').collapse('hide');
//         }

//     }
//     );

// number only
function numberOnly(id) {
	// Get element by id which passed as parameter within HTML element event
	var element = document.getElementById(id);
	// User numbers only pattern, from 0 to 9
	var regex = /[^0-9]/gi;
	// This removes any other character but numbers as entered by user
	element.value = element.value.replace(regex, '');
}

// fungsi cek transaksi
$('#cektransaksi').change(function () {
	if (this.checked) {
		$('#noanggota').prop('readonly', true);
		$('#kodekoleks').focus();
		$('#kodekoleks').prop('disabled', false);
	} else {
		$('#noanggota').prop('readonly', false);
		$('#noanggota').focus();
		$('#kodekoleks').prop('disabled', true);
	}
});

// funsi kode valid
$('input[type="checkbox"][name="cekkode"]').change(function () {
	if (this.checked) {
		$('#kode').prop('readonly', false);
		$('#kode').css('cursor', 'auto');
		$('#kode').prop('min', '0');
		$('.keym').prop('id', '#');
		$('#kode').val('');
		$('#kode').focus();
		$('#labkode').css('cursor', 'auto');
		$('#kode').prop('maxlength', '11');
		// fungsi number only
		$('#kode').keypress(function (e) {
			//if the letter is not digit then display error and don't type anything
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false;
			}
		});
		// fungsi spli kode 111.111.111
		$('#kode').keyup(function (event) {
			// When user select text in the document, also abort.
			var selection = window.getSelection().toString();
			if (selection !== '') {
				return;
			}

			// When the arrow keys are pressed, abort.
			if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
				return;
			}

			var $this = $(this);
			var input = $this.val();
			input = input.replace(/[\W\s\._\-]+/g, '');

			var split = 3;
			var chunk = [];

			for (var i = 0, len = input.length; i < len; i += split) {
				split = i >= 3 && i < 9 ? 100 : 3;
				chunk.push(input.substr(i, split));
			}

			$this.val(function () {
				return chunk.join('.').toUpperCase();
			});
		})(jQuery);
	} else {
		$('#kode').prop('readonly', true);
		$('#kode').css('cursor', 'pointer');
		$('#kode').prop('type', 'text');
		$('#kode').prop('min', '');
		$('#labkode').css('cursor', 'pointer');
		$('#kode').prop('data-target', '#kodeModal');
		$('.keym').prop('id', 'kodeModal');
		$('#kode').focus();
		$('#kode').val('');
	}
});

// text only modals koleksi

$('#buatkode').keypress(function (e) {
	// var regex = new RegExp("^[a-zA-Z]+$");
	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	if (regex.test(str)) {
		return true;
	} else {
		e.preventDefault();

		return false;
	}
});

// javascript focus
focusMethod = function getFocus() {
	document.getElementById('kode').focus();
};

// ajax

// fungsi spli kode 111.111.111
$('#angkatan').keyup(function (event) {
	// When user select text in the document, also abort.
	var selection = window.getSelection().toString();
	if (selection !== '') {
		return;
	}

	// When the arrow keys are pressed, abort.
	if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
		return;
	}

	var $this = $(this);
	var input = $this.val();
	input = input.replace(/[\W\s\._\-]+/g, '');

	var split = 4;
	var chunk = [];

	for (var i = 0, len = input.length; i < len; i += split) {
		split = i >= 4 && i < 4 ? 6 : 4;
		chunk.push(input.substr(i, split));
	}

	$this.val(function () {
		return chunk.join(',').toUpperCase();
	});
});

// funsi mata uang
(function ($, undefined) {
	'use strict';

	// When ready.
	$(function () {
		var $input = $('.harga');

		$input.on('keyup', function (event) {
			// When user select text in the document, also abort.
			var selection = window.getSelection().toString();
			if (selection !== '') {
				return;
			}

			// When the arrow keys are pressed, abort.
			if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
				return;
			}

			var $this = $(this);

			// Get the value.
			var input = $this.val();

			var input = input.replace(/[\D\s\._\-]+/g, '');
			input = input ? parseInt(input, 10) : 0;

			$this.val(function () {
				return input === 0 ? '' : input.toLocaleString('en-US');
			});
		});

		/**
		 * ==================================
		 * When Form Submitted
		 * ==================================
		 */
		$form.on('submit', function (event) {
			var $this = $(this);
			var arr = $this.serializeArray();

			for (var i = 0; i < arr.length; i++) {
				arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
			}

			console.log(arr);

			event.preventDefault();
		});
	});
})(jQuery);

