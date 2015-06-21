var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

	getList(''); 
    getPelajaran('');
    getKelas('');
    getGuru('');

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
        url: 'latihanSoal_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);

            return false;
        }
    });

}

// GET DROPDWON

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

function getGuru() {

    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_guru',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_guru = '';
            option_guru += '<option value="0"> Pilih Guru </option><br/>';
            $.each(data.data, function(i, item) {
            option_guru += '<option value="' + data.data[i].nik + '">' + data.data[i].nama + '</option><br/>';
            });

            $('#addGuru').html(option_guru);
            return false;
        }
    });

}

//ENDING

//AddDataMateri
function getAdd() {
    $('#addPelajaran').val('');
    $('#addKelas').val('');
    $('#addGuru').val('');
    $('#addNamaMateri').val('');
    $('#addIsiMateri').val('');
    $('#addFileUpload').val('');
    
    return false;

}

function clear_iframe() {
    $('#target_submit').val(null);
}

function clear_form() {
    $('input-materi').val(null);
}

function addDataMateri() {

 setTimeout(function() {
        result = $('#target_submit').contents().find('body').html(); // Nama Iframe
        if(result == '') {
            addDataMateri();
        }
        else if(result === undefined) {
            addDataMateri();
        }
        else {
            alert(result);
            clear_iframe();
            clear_form();
        }
    }, 1);


}
//