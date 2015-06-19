var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

	getId();
	getMateri();
	soal_list();

	$('#simpan_kuis').click(function() {

	    nama = $('#add_nama_kuis').val();
	    materi = $('#nama_materi').val();
	    mulai = $('#tgl_mulai').val();
	    selesai = $('#tgl_selesai').val();
	    durasi = $('#durasi').val();

		if (nama && materi && mulai && selesai && durasi != "") {
			AddIdKuis();
			AddKuis();
			return false;
		}

	});

	$('#simpan_soal').click(function() {

    	AddIdKuis();

		soal = $('#soal_kuis').val();
	    a = $('#jwb_a').val();
	    b = $('#jwb_b').val();
	    c = $('#jwb_c').val();
	    d = $('#jwb_d').val();
	    e = $('#jwb_e').val();
	    jawaban = $('#jawaban').val();

	    if (soal == "" && a == "" && b == "" && c == "" && d == "" && e == "" && jawaban == "") {
			return false;
	    } else {
            AddIdKuis();
            AddSoal();
            return false;
        }

	});

	$('#ubah_soal').click(function() {
		EditSoal();
		return false;
	});

	$('#hapus_kuis').click(function() {
		KuisBatal();
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


// ---------------------------------------------------------- Kuis Add ----------------------------------------------------------


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
        url: 'get_param',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $('#id_kuis').val('S00' + data.data);
            $('#id_after').val(data.data);
            $('#id_before').val(data.data-1);
        }
    });

}


function soal_list() {

    $(".dataTable").html('<img style="margin-top:50px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'soal_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);
            return false;
        }
    });

}


function AddIdKuis() {

	var form_data = {
    	id_kuis 	: $('#id_kuis').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'AddIdKuis',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            
        }
    });

}


function refreshSoal() {

	$('#soal_kuis').val('');
    $('#jwb_a').val('');
    $('#jwb_b').val('');
    $('#jwb_c').val('');
    $('#jwb_d').val('');
    $('#jwb_e').val('');
    $('#jawaban').val('');

}


function AddSoal() {

	var form_data = {
		id_soal 	: $('#id_kuis').val(),
    	soal_kuis 	: $('#soal_kuis').val(),
    	jwb_a 		: $('#jwb_a').val(),
    	jwb_b 		: $('#jwb_b').val(),
    	jwb_c 		: $('#jwb_c').val(),
    	jwb_d 		: $('#jwb_d').val(),
    	jwb_e 		: $('#jwb_e').val(),
    	jawaban 	: $('#jawaban').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'AddSoal',
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
	        url: 'DeleteSoal',
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
        url: 'soal_get_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

        	$('#edit_id_kuis').val(data.soal.id);
        	$('#edit_soal_kuis').val(data.soal.soal);
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
        id 		: $('#edit_id_kuis').val(),
        soal 	: $('#edit_soal_kuis').val(),
		jwb_a 	: $('#edit_jwb_a').val(),
		jwb_b   : $('#edit_jwb_b').val(),
		jwb_c   : $('#edit_jwb_c').val(),
		jwb_d   : $('#edit_jwb_d').val(),
		jwb_e   : $('#edit_jwb_e').val(),
		jawaban : $('#edit_jawaban').val(),
        _token  : CSRF_TOKEN
    }
    
    $.ajax({
        // async: "false",
        url: 'soal_edit',
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


function refreshKuis() {

    $('#add_nama_kuis').val('');
    $('#nama_materi').val('');
    $('#tgl_mulai').val('');
    $('#tgl_selesai').val('');
    $('#durasi').val('');

}


function AddKuis() {

	var form_data = {
		id_after			: $('#id_after').val(),
		id_param			: $('#id_before').val(),
        id_group_kuis 		: $('#id_kuis').val(),
        nama_group_kuis		: $('#add_nama_kuis').val(),
        id_materi			: $('#nama_materi').val(),
        kuis_mulai			: $('#tgl_mulai').val(),
        kuis_selesai		: $('#tgl_selesai').val(),
        durasi 				: $('#durasi').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'AddDetailKuis',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
        	getId();
        	alert(data.pesan);
        	refreshKuis();
        	soal_list();
        }
    });

}


function KuisBatal() {

	var form_data = {
		id_kuis		: $('#id_kuis').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: 'KuisBatal',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
        	alert(data.pesan);
        	refreshKuis();
        	soal_list();
        }
    });

}

