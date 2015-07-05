var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){   
     
    getPelajaran('');
    getKelas('');
    getGuru('');
    getList('');

    $('#simpan_tugas').click(function(){
        addDataMateri();
        return false;
    });

    $('#search_button').click(function(){
        getList('');
        return false;
    });

    $('#search_buttonSoal').click(function(){
        getList('');
        return false;
    });

 });

$(document).on("click", ".pg a", function(){
    getList(this.id);
    current_page = this.id;
    return false;
});

// --------------------------------- DROPDOWN --------------------------------

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
            option_pelajaran += '<option value=""> Pilih Pelajaran </option><br/>';
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
            option_kelas += '<option value=""> Pilih Kelas </option><br/>';
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
            option_guru += '<option value=""> Pilih Guru </option><br/>';
            $.each(data.data, function(i, item) {
            option_guru += '<option value="' + data.data[i].nik + '">' + data.data[i].nama + '</option><br/>';
            });

            $('#addGuru').html(option_guru);
            return false;
        }
    });

}

// --------------------------------- END-DROPDOWN --------------------------------

// --------------------------------- GET TABLE MATERI --------------------------------
function getList(page) {

    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        search_by       : $('#search_by').val(),
        search_input    : $('#search_input').val(),
        paging          : page,
        _token          : CSRF_TOKEN
    }

    //url = base_url + 'AdminController@forum_list';

    $.ajax({
        // async: "false",
        url: 'materi_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);
            $(".pg ul").html(data.paging);
            return false;
        }
    });

}


// --------------------------------- END-GET TABLE MATERI --------------------------------

// --------------------------------- ADD TABLE MATERI --------------------------------
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
    $('.input-materi').val("");
}

function addDataMateri(){

    setTimeout(function(){
        result = $('#target_submit').contents().find('body').html();
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
            getList();
            // refreshMateri();
        }
    }, 1);
}
// --------------------------------- END-ADD TABLE MATERI --------------------------------

function open_materi_edit(id_materi, id_pelajaran, nik, id_kelas, nama_materi, isi, file) {
    $('#editIdMateri').val(id_materi);
    $('#editPelajaran').val(id_pelajaran);
    $('#editGuru').val(nik);
    $('#editKelas').val(id_kelas);
    $('#editNamaMateri').val(nama_materi);
    $('#editIsi').val(isi);
    $('#edit_file_materi').val(file);
}

function deleteData(id_materi){

    var konfirmasi = confirm($('#btn_delete'+id_materi).data('delete'));
    var form_data = {
        id_materi : id_materi,
        _token : CSRF_TOKEN
    }

    if(konfirmasi == true){

        $.ajax({
            type: 'POST',
            data: form_data,
            url: 'materi_delete',
            dataType: "JSON",
            success: function(data){
                getList();
                return false;
            }
        });
    }else {
        return false;
    }
}
