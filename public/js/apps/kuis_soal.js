var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var id_kata = 'S00';

$(document).ready(function(){

	getMateri();
	getKelas();
	getPelajaran();

	getId();
	getList_soal();

	$('#simpan_soal').click(function() {
		addDataId();
		addDataSoal();
		return false;
	});

	$('#ubah_soal').click(function() {
		EditData();
		return false;
	});

	// ------------------- DateTimePicker -------------------
    $('#time_durasi').datetimepicker({
        format: 'hh:mm:ss'
    });

    $('#datepicker_start').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#datepicker_end').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $("#datepicker_start").on("dp.change",function (e) {
        $('#datepicker_end').data("DateTimePicker").minDate(e.date);
    });

    $("#datepicker_end").on("dp.change",function (e) {
        $('#datepicker_start').data("DateTimePicker").maxDate(e.date);
    });


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
            option_materi += '<option selected="selected" value="0"> Nama Materi </option><br/>';
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
        url: 'kuis_get_id',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $('#id_before').val(id_kata + data.data);
            $('#id_after').val(data.data);
            return false;
        }
    });

}


function getList_soal() {

    $(".dataTable").html('<img style="margin-top:50px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
    	id_param 	: $('#id_before').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        async: "false",
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


function addDataId() {

	var form_data = {
    	id_kuis 	: $('#id_before').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'soal_add_id',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            
            return false;
        }
    });

}


function getAdd() {
	$('#soal_kuis').val('');
    $('#jwb_a').val('');
    $('#jwb_b').val('');
    $('#jwb_c').val('');
    $('#jwb_d').val('');
    $('#jwb_e').val('');
    $('#jawaban').val('');

    return false;
}


function addDataSoal() {

	var form_data = {
		id_soal 	: $('#id_before').val(),
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
        url: 'soal_add',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            getList_soal();
            getAdd();
        }
    });

}


function deleteSoal(id) {

	var form_data = {
		id 		: id,
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: 'soal_delete',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            getList_soal();

            return false;
        }
    });

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

        	$('#id_kuis').val(data.soal.id);
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


function EditData() {

    var form_data = {
        id 		: $('#id_kuis').val(),
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
            getList_soal();
        }
    });

}






function getKelas() {

	var form_data = {
		_token		: CSRF_TOKEN
	}

	$.ajax({
        url: 'get_kelas',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

        	option_kelas = '';
            option_kelas += '<option selected="selected" value="0"> Nama Kelas </option><br/>';
            $.each(data.data, function(i, item) {
            option_kelas += '<option value="' + data.data[i].id_kelas + '">' + data.data[i].nama_kelas + '</option><br/>';
            });

            $('#nama_kelas').html(option_kelas);
            return false;
        }
    });

}


function getPelajaran() {

	var form_data = {
		_token		: CSRF_TOKEN
	}

	$.ajax({
        url: 'get_pelajaran',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

        	option_pelajaran = '';
            option_pelajaran += '<option selected="selected" value="0"> Nama Pelajaran </option><br/>';
            $.each(data.data, function(i, item) {
            option_pelajaran += '<option value="' + data.data[i].id_pelajaran + '">' + data.data[i].nama_pelajaran + '</option><br/>';
            });

            $('#nama_pelajaran').html(option_pelajaran);
            return false;
        }
    });

}