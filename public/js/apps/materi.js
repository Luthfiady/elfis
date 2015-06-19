var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

	
	getList(''); 
	getPelajaran('');
	getKelas('');

    $('#search_button').click(function(){
        getList('');
        return false;
    });
 });

 
function getList() {

    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        search_by       : $('#search_by').val(),
        search_input    : $('#search_input').val(),
        _token          : CSRF_TOKEN
    }

    //url = base_url + 'AdminController@forum_list';

    $.ajax({
        async: "false",
        url: 'materi_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);

            return false;
        }
    });

}

function getPelajaran() {

    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_pelajaran',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_pelajaran = '';
            option_pelajaran += '<option value="0"> Pilih Pelajaran </option><br/>';
            $.each(data.data, function(i, item) {
            option_pelajaran += '<option value="' + data.data[i].id_pelajaran + '">' + data.data[i].nama_pelajaran + '</option><br/>';
            });

            $('#addPelajaran').html(option_pelajaran);
            return false;
        }
    });

}

function getKelas() {

    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_kelas',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_kelas = '';
            option_kelas += '<option value="0"> Pilih Kelas </option><br/>';
            $.each(data.data, function(i, item) {
            option_kelas += '<option value="' + data.data[i].id_kelas + '">' + data.data[i].nama_kelas + '</option><br/>';
            });

            $('#addKelas').html(option_kelas);
            return false;
        }
    });

}

//ENDING

//AddDataMateri
function getAdd() {
    $('#addPelajaran').val('');
    $('#addKelas').val('');
    $('#addNamaMateri').val('');
    $('#addIsiMateri').val('');
    $('#addFileUpload').val('');
    
    return false;

}

function addDataMateri() {

    var form_data = {
        addPelajaran      : $('#addPelajaran').val(),
        addKelas   		  : $('#addKelas').val(),
        addNamaMateri     : $('#addNamaMateri').val(),
        addIsiMateri      : $('#addIsiMateri').val(),
        addFileUpload     : $('#addFileUpload').val(),
        _token            : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'materi_add',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            getList();
            getAdd();
        }
    });

}
//