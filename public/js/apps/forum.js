var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;


$(document).ready(function(){

	getList('');
    getJurusan();

    $('#search_button').click(function(){
        getList('');
        return false;
    });

    $('#submit_add_form').click(function(){

        nama_forum    = $('#add_nama_forum').val();
        role_access   = $('#add_role_access').val();
        subyek        = $('#add_subyek').val();
        keterangan    = $('#add_keterangan').val();
        isi           = $('#add_isi').val();

        if (nama_forum && role_access && subyek && keterangan && isi != null) {
            AddData();
            return false;
        }

    })

    $('#submit_edit_form').click(function(){

        nama_forum     = $('#edit_nama_forum').val();
        role_access    = $('#edit_role_access').val();
        subyek         = $('#edit_subyek').val();
        keterangan     = $('#edit_keterangan').val();
        isi            = $('#edit_isi').val();

        if (nama_forum && role_access && subyek && keterangan && isi != null) {
            EditData();
            return false;
        }
        
    })

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
            option_jurusan += '<option value="0"> Semua Jurusan </option><br/>';
            $.each(data.data, function(i, item) {
            option_jurusan += '<option value="' + data.data[i].id_jurusan + '">' + data.data[i].nama_jurusan + '</option><br/>';
            });

            $('#nama_jurusan').html(option_jurusan);
            return false;
        }
    });

}


$(document).on("click", ".pg a", function(){
    getList(this.id);
    current_page = this.id;
    return false;
});

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
        url: 'forum_list',
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
    $('#add_nama_forum').val('');
    $('#add_role_access').val('');
    $('#add_subyek').val('');
    $('#add_keterangan').val('');
    $('#add_isi').val('');
    
    return false;

}

function AddData() {

    var form_data = {
        add_nama_forum    : $('#add_nama_forum').val(),
        add_role_access   : $('#add_role_access').val(),
        add_subyek        : $('#add_subyek').val(),
        add_keterangan    : $('#add_keterangan').val(),
        add_isi           : $('#add_isi').val(),
        _token          : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'forum_add',
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

function deleteData(id_forum) {

    var konfirmasi = confirm($('#btn_delete'+id_forum).data('delete'));
    var form_data = {
            id_forum : id_forum,
            _token   : CSRF_TOKEN
        }

    if(konfirmasi == true) {

        $.ajax({
            //async: "false",
            type: 'POST',
            data: form_data,
            url: 'forum_delete',
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

function getEdit(id_forum) {

    var form_data = {
        id_forum : id_forum,
        _token   : CSRF_TOKEN
    }

    $.ajax({
        //async: "false",
        url: 'forum_get_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            $('#id_forum').val(data.data.id_forum);
            $('#edit_nama_forum').val(data.data.nama_forum);
            $('#edit_role_access').val(data.data.role_access);
            $('#edit_subyek').val(data.data.subyek);
            $('#edit_keterangan').val(data.data.keterangan);
            $('#edit_isi').val(data.data.isi);

            return false;
        }
    });

}

function EditData() {

    var form_data = {
        id_forum            : $('#id_forum').val(),
        edit_nama_forum     : $('#edit_nama_forum').val(),
        edit_role_access    : $('#edit_role_access').val(),
        edit_subyek         : $('#edit_subyek').val(),
        edit_keterangan     : $('#edit_keterangan').val(),
        edit_isi            : $('#edit_isi').val(),
        _token              : CSRF_TOKEN
    }
    
    $.ajax({
        // async: "false",
        url: 'forum_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.sukses);
            getList();
        }
    });

}