

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){   
     
    getList('');


    $('#search_button').click(function(){
        getList('');
        return false;
    });

 });

// --------------------------------- GET TABLE LATIHAN_SOAL ----------------------------
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

// --------------------------------- END-GET TABLE MATERI --------------------------------
function deleteLatihan(id) {

    var konfirmasi = confirm($('#deleteData'+id).data('delete'));

    var form_data = {
        id_latihan   : id,
        _token    : CSRF_TOKEN
    }

    if (konfirmasi == true) {

        $.ajax({
                url: 'latihan_delete',
                type: 'POST',
                data: form_data,
                dataType: "JSON",
                success: function(data) {
                    // alert(data.pesan);
                    getList();

                    return false;
                }
            });

    } else {
        return false;
    }

}


function open_modal_add_latihan_materi() {
    data = $('#nama_materi').val();
    $('#id_nama_materi').val(data);
 
}