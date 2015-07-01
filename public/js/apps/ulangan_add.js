var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var current_page;

$(document).ready(function(){

	getId();
	getMateri();

	$('#simpan_ulangan').click(function() {

	    nama       = $('#add_nama_ulangan').val();
	    materi     = $('#nama_materi').val();
	    mulai      = $('#tgl_mulai').val();
	    selesai    = $('#tgl_selesai').val();
	    durasi     = $('#durasi').val();

		if (nama && materi && mulai && selesai && durasi != "") {
			AddIdUlangan();
			AddUlangan();
			return false;
		}

	});

	$('#simpan_soal').click(function() {

        AddIdUlangan();

		soal = $('#soal_ulangan').val();
	    a = $('#jwb_a').val();
	    b = $('#jwb_b').val();
	    c = $('#jwb_c').val();
	    d = $('#jwb_d').val();
	    e = $('#jwb_e').val();
	    jawaban = $('#jawaban').val();

	    if (soal == "" && a == "" && b == "" && c == "" && d == "" && e == "" && jawaban == "") {
            return false;
	    } else {
            AddSoal();
            return false;
        }

	});

	$('#ubah_soal').click(function() {
		EditSoal();
		return false;
	});

	$('#hapus_ulangan').click(function() {
		UlanganBatal();
        return false;
	});

	// --------------------------------- DateTimePicker ---------------------------------

    $('#time_durasi').datetimepicker({
        format: 'HH:mm:ss'
    });

    $('#datepicker_start').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    $('#datepicker_end').datetimepicker({
        format: 'DD-MM-YYYY'
    });

    $("#datepicker_start").on("dp.change",function (e) {
        $('#datepicker_end').data("DateTimePicker").minDate(e.date);
    });

    $("#datepicker_end").on("dp.change",function (e) {
        $('#datepicker_start').data("DateTimePicker").maxDate(e.date);
    });


});


// ---------------------------------------------------------- Ulangan Add ----------------------------------------------------------

$(document).on("click", ".pg a", function(){
    soal_list(this.id);
    current_page = this.id;
    return false;
});

function getMateri() {

	var form_data = {
		_token		: CSRF_TOKEN
	}

	$.ajax({
        url: 'get_materi',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

        	option_materi = '';
            option_materi += '<option value=""> Nama Materi </option><br/>';
            $.each(data.data, function(i, item) {
            option_materi += '<option value="' + data.data[i].id_materi + '">' + data.data[i].nama_materi + '</option><br/>';
            });

            $('#nama_materi').html(option_materi);
            return false;
        }
    });

}


function getId() {

	var form_data = {
		_token		: CSRF_TOKEN
	}

	$.ajax({
        url: 'ulangan_get_id',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $('#id_ulangan').val('U00' + data.data);
            $('#id_after').val(data.data);
            $('#id_before').val(data.data-1);

            soal_list();
            return false;
        }
    });

}


function soal_list(page) {

    $(".dataTable").html('<img style="margin-top:50px; margin-bottom:50px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        id_ulangan  : $('#id_ulangan').val(),
        paging      : page,
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'ulangan_soal_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);
            $(".pg ul").html(data.paging);
            return false;
        }
    });

}


function AddIdUlangan() {

	var form_data = {
    	id_ulangan 	: $('#id_ulangan').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'AddIdUlangan',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            return false;
        }
    });

}


function refreshSoal() {

	$('#soal_ulangan').val('');
    $('#jwb_a').val('');
    $('#jwb_b').val('');
    $('#jwb_c').val('');
    $('#jwb_d').val('');
    $('#jwb_e').val('');
    $('#jawaban').val('');

}


function AddSoal() {

	var form_data = {
        submit           : $('#simpan_soal').val(),
		id_soal 	     : $('#id_ulangan').val(),
    	soal_ulangan 	 : $('#soal_ulangan').val(),
    	jwb_a 		     : $('#jwb_a').val(),
    	jwb_b 		     : $('#jwb_b').val(),
    	jwb_c 		     : $('#jwb_c').val(),
    	jwb_d 		     : $('#jwb_d').val(),
    	jwb_e 		     : $('#jwb_e').val(),
    	jawaban 	     : $('#jawaban').val(),
        _token           : CSRF_TOKEN
    }

    $.ajax({
        url: 'ulangan_AddSoal',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            soal_list();
            refreshSoal();
        }
    });

}


function deleteSoal(id) {

	var konfirmasi = confirm($('#delete'+id).data('delete'));

	var form_data = {
		id 		: id,
        _token  : CSRF_TOKEN
    }

    if (konfirmasi == true) {

	    $.ajax({
	        url: 'ulangan_DeleteSoal',
	        type: 'POST',
	        data: form_data,
	        dataType: "JSON",
	        success: function(data) {
	            soal_list();

	            return false;
	        }
	    });

    } else {
    	return false;
	}
}


function getEdit(id) {

	var form_data = {
		id 		: id,
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: 'ulangan_soal_get_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

        	$('#edit_id_ulangan').val(data.soal.id);
        	$('#edit_soal_ulangan').val(data.soal.soal);
		    $('#edit_jwb_a').val(data.soal.pil_a);
		    $('#edit_jwb_b').val(data.soal.pil_b);
		    $('#edit_jwb_c').val(data.soal.pil_c);
		    $('#edit_jwb_d').val(data.soal.pil_d);
		    $('#edit_jwb_e').val(data.soal.pil_e);
		    $('#edit_jawaban').val(data.soal.jawaban);

            return false;
        }
    });

}


function EditSoal() {

    var form_data = {
        id 		: $('#edit_id_ulangan').val(),
        soal 	: $('#edit_soal_ulangan').val(),
		jwb_a 	: $('#edit_jwb_a').val(),
		jwb_b   : $('#edit_jwb_b').val(),
		jwb_c   : $('#edit_jwb_c').val(),
		jwb_d   : $('#edit_jwb_d').val(),
		jwb_e   : $('#edit_jwb_e').val(),
		jawaban : $('#edit_jawaban').val(),
        _token  : CSRF_TOKEN
    }
    
    $.ajax({
        url: 'ulangan_soal_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
        	alert(data.pesan);
            soal_list();
            document.getElementById('close_modal').click();
        }
    });

}


function refreshUlangan() {

    $('#add_nama_ulangan').val('');
    $('#nama_materi').val('');
    $('#tgl_mulai').val('');
    $('#tgl_selesai').val('');
    $('#durasi').val('');

}


function AddUlangan() {

	var form_data = {
		id_after			: $('#id_after').val(),
		id_before			: $('#id_before').val(),
        id_group_ulangan 	: $('#id_ulangan').val(),
        nama_group_ulangan	: $('#add_nama_ulangan').val(),
        id_materi			: $('#nama_materi').val(),
        ulangan_mulai		: $('#tgl_mulai').val(),
        ulangan_selesai		: $('#tgl_selesai').val(),
        durasi 				: $('#durasi').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: 'AddDetailUlangan',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
        	alert(data.pesan);
        	refreshUlangan();
            getId();
        }
    });

}


function UlanganBatal() {

	var form_data = {
		id_ulangan		: $('#id_ulangan').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: 'UlanganBatal',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
        	alert(data.pesan);
        	refreshUlangan();
        	soal_list();
        }
    });

}

