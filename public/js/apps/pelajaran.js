var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;


$(document).ready(function(){

	getList(''); 
    getJurusan('');

    $('#search_button').click(function(){
        getList('');
        return false;
    });

    $('#submit_add_form').click(function(){

        nama_pelajaran    = $('#add_nama_pelajaran').val();
        nama_jurusan      = $('#add_nama_jurusan').val();

        if (nama_pelajaran && nama_jurusan != "") {
            AddPelajaran();
            return false;
        }

    });

    $('#submit_edit_form').click(function(){

        nama_pelajaran    = $('#edit_nama_pelajaran').val();
        nama_jurusan      = $('#edit_nama_jurusan').val();

        if (nama_pelajaran && nama_jurusan != "") {
            EditPelajaran();
            return false;
        }
        
    });

});


$(document).on("click", ".pg a", function(){
    getList(this.id);
    current_page = this.id;
    return false;
});


function getJurusan() {

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
            option_jurusan += '<option value=""> Nama Jurusan </option><br/>';
            $.each(data.data, function(i, item) {
            option_jurusan += '<option value="' + data.data[i].id_jurusan + '">' + data.data[i].nama_jurusan + '</option><br/>';
            });

            $('#add_nama_jurusan').html(option_jurusan);
            $('#edit_nama_jurusan').html(option_jurusan);
            return false;
        }
    });

}

function getList(page) {

    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        search_by       : $('#search_by').val(),
        search_input    : $('#search_input').val(),
        paging          : page,
        _token          : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'pelajaran_list',
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

function getAdd() {
    $('#add_nama_pelajaran').val('');
    $('#add_nama_jurusan').val('');   
    return false;

}

function AddPelajaran() {

    var form_data = {        
        nama_pelajaran    : $('#add_nama_pelajaran').val(),
        nama_jurusan      : $('#add_nama_jurusan').val(),
        _token        : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'pelajaran_add',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.sukses);
            getList();
            getAdd();
        }
    });

}

function deletePelajaran(id_pelajaran) {

    var konfirmasi = confirm($('#btn_delete'+id_pelajaran).data('delete'));
    var form_data = {
            id_pelajaran : id_pelajaran,
            _token       : CSRF_TOKEN
        }

    if(konfirmasi == true) {

        $.ajax({
            //async: "false",
            type: 'POST',
            data: form_data,
            url: 'pelajaran_delete',
            dataType: "JSON",
            success: function(data) {
                getList();
                return false;
            }
        });

    } else {
        return false;
    }

}

function getEdit(id_pelajaran) {

    var form_data = {
        id_pelajaran  : id_pelajaran,
        _token        : CSRF_TOKEN
    }

    $.ajax({
        url: 'pelajaran_get_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            $('#edit_id_pelajaran').val(data.data.id_pelajaran);
            $('#edit_nama_pelajaran').val(data.data.nama_pelajaran);
            $('#edit_nama_jurusan').val(data.data.id_jurusan);

            return false;
        }
    });

}

function EditPelajaran() {

    var form_data = {
        id_pelajaran      : $('#edit_id_pelajaran').val(),
        nama_pelajaran    : $('#edit_nama_pelajaran').val(),
        nama_jurusan      : $('#edit_nama_jurusan').val(),
        _token            : CSRF_TOKEN
    }
    
    $.ajax({
        url: 'pelajaran_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.sukses);
            getList();
            document.getElementById('close_modal').click();
        }
    });

}
