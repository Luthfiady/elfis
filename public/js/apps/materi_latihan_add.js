var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){	
	 
    getMateri('');
	getList('');


    $('#search_button').click(function(){
        getList('');
        return false;
    });

 });

// --------------------------------- DROPDOWN --------------------------------

function getMateri() {

    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_materi',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_materi = '';
            option_materi += '<option value="0"> Pilih Materi </option><br/>';
            $.each(data.data, function(i, item) {
            option_materi += '<option value="' + data.data[i].id_materi + '">' + data.data[i].nama_materi + '</option><br/>';
            });

            $('#addNamaMateri').html(option_materi);
            return false;
        }
    });

}

// --------------------------------- END-DROPDOWN --------------------------------

// --------------------------------- GET TABLE LATIHAN_SOAL ----------------------------
function getList() {

    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        search_by       : $('#search_by').val(),
        search_input    : $('#search_input').val(),
        _token          : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'latihan_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);

            return false;
        }
    });

}

// --------------------------------- END-GET TABLE MATERI --------------------------------
