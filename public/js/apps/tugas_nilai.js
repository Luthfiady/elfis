var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

    getTugas();

});

 $('#submit_add_nilai').click(function(){

        nama_tugas    = $('#add_nama_tugas').val();
        nis           = $('#add_nis').val();
        nilai         = $('#add_nilaiTugas').val();

        if (nama_tugas && nis && nilai != null) {
            AddData();
            return false;
        }

    })

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
            option_tugas += '<option value=""> Nama Tugas </option><br/>';
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

function AddData() {

    var form_data = {
        add_nama_tugas    : $('#add_nama_tugas').val(),
        add_nis           : $('#add_nis').val(),
        add_nilaiTugas    : $('#add_nilaiTugas').val(),
        _token          : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'nilai_tugas',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.sukses);
            getAdd();
        }
    });

}
