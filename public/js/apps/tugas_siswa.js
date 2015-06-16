var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

    getTugas();
    getList();


    $("#search_button").click(function() {
        getList('');

        return false;
    });
});


function getTugas() {

    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_tugas',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_tugas = '';
            option_tugas += '<option value="0"> Nama Tugas </option><br/>';
            $.each(data.data, function(i, item) {
            option_tugas += '<option value="' + data.data[i].id_tugas + '">' + data.data[i].nama_tugas + '</option><br/>';
            });

            $('#add_nama_tugas').html(option_tugas);
            return false;
        }
    });

}

function getList() {
    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        search_by       : $('#search_by').val(),
        search_input    : $('#search_input').val(),
        _token          : CSRF_TOKEN
    }

    $.ajax({
        async: "false",
        url: 'tugas_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);

            return false;
        }
    });
}

function getAdd() {
    $('#add_nama_tugas').val('');
    $('#add_nis').val('');
    $('#add_file_jawaban').val('');
    
    return false;

}

function clear_iframe() {
    $('#target_submit').val(null);
}

function clear_form() {
    $('input-jawaban').val(null);
}

function AddDataJawaban() {

    setTimeout(function() {
        result = $('#target_submit').contents().find('body').html(); // Nama Iframe
        if(result == '') {
            AddDataJawaban();
        }
        else if(result === undefined) {
            AddDataJawaban();
        }
        else {
            alert(result);
            clear_iframe();
            clear_form();
            getList();
        }
    }, 1);


}