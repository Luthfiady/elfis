var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var current_page;


$(document).ready(function(){

    getJurusan();

    $("#search_button").click(function() {
        getList('');
        return false;
    });

});


// ------------------------------------------------------- Get Dropdown -------------------------------------------------------

$(document).on("change", "#nama_jurusan", function(){
    getKelas();
    return false;
});

$(document).on("change", "#nama_kelas", function(){
    getMateri();
    return false;
});

function getKelas() {

    var form_data = {
        id_jurusan  : $('#nama_jurusan').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_kelas_jurusan',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_kelas = '';
            option_kelas += '<option value=""> Pilih Kelas </option><br/>';
            $.each(data.data, function(i, item) {
            option_kelas += '<option value="' + data.data[i].id_kelas + '">' + data.data[i].nama_kelas + '</option><br/>';
            });

            $('#nama_kelas').html(option_kelas);
            return false;
        }
    });

}


function getJurusan() {

    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_jurusan',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_jurusan = '';
            option_jurusan += '<option value=""> Pilih Jurusan </option><br/>';
            $.each(data.data, function(i, item) {
            option_jurusan += '<option value="' + data.data[i].id_jurusan + '">' + data.data[i].nama_jurusan + '</option><br/>';
            });

            $('#nama_jurusan').html(option_jurusan);
            $(".dataTable").html('');
            return false;
        }
    });

}


function getMateri() {

    var form_data = {
        id_kelas    : $('#nama_kelas').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_materi_kelas',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_materi = '';
            option_materi += '<option value=""> Pilih Materi </option><br/>';
            $.each(data.data, function(i, item) {
            option_materi += '<option value="' + data.data[i].id_materi + '">' + data.data[i].nama_materi + '</option><br/>';
            });

            $('#nama_materi').html(option_materi);
            return false;
        }
    });

}


// ------------------------------------------------------- List Data -------------------------------------------------------


$(document).on("click", ".pg a", function(){
    getList(this.id);
    current_page = this.id;
    return false;
});


function getList(page) {

    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        nama_materi     : $('#nama_materi').val(),
        nama_jurusan    : $('#nama_jurusan').val(),
        nama_kelas      : $('#nama_kelas').val(),
        kategori        : $('#search_by').val(),
        paging          : page,
        _token          : CSRF_TOKEN
    }

    $.ajax({
        url: 'nilai_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            if(data.data_null != null){
                alert(data.data_null);
                $(".dataTable").html('');
            } else {
                $(".dataTable").html(data.result);
                $(".pg ul").html(data.paging);
                return false;
            }

        }
    });

}

