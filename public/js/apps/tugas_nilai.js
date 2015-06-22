var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

    getTugas();


});

$(document).on("click", ".pg a", function(){
    getList(this.id);
    current_page = this.id;
    return false;
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


function getAdd() {
    $('#add_nama_tugas').val('');
    $('#add_nis').val('');
    $('#add_nilaiTugas').val('');
    
    return false;

}

function clear_iframe() {
    $('#target_submit').val(null);
}

function clear_form() {
    $('input-nilai-tugas').val(null);
}

function AddDataNilaiTugas() {

    setTimeout(function() {
        result = $('#target_submit').contents().find('body').html(); // Nama Iframe
        if(result == '') {
            AddDataNilaiTugas();
        }
        else if(result === undefined) {
            AddDataNilaiTugas();
        }
        else {
            alert(result);
            clear_iframe();
            clear_form();
            getList();
        }
    }, 1);


}