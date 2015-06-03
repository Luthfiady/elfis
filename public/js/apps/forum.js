var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

	getList(''); 

    $('#search_button').click(function(){
        getList('');
        return false;
    });

    $('#submit_add_form').click(function(){
        AddData();

        // return false;
    })

    $('#submit_edit_form').click(function(){
        EditData();

        return false;
    })

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
        url: 'forum_list',
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
        add_role_acces    : $('#add_role_access').val(),
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
            getList('');
        }
    });

}

function deleteData(id_forum) {

    var form_data = {
        id_forum : id_forum,
        _token   : CSRF_TOKEN
    }

    $.ajax({
        //async: "false",
        url: 'forum_delete',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            getList(current_page);
        }
    });
   
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
        id_forum      : $('#id_forum').val(),
        edit_nama_forum    : $('#edit_nama_forum').val(),
        edit_role_access    : $('#edit_role_access').val(),
        edit_subyek        : $('#edit_subyek').val(),
        edit_keterangan    : $('#edit_keterangan').val(),
        edit_isi           : $('#edit_isi').val(),
        _token        : CSRF_TOKEN
    }
    
    $.ajax({
        // async: "false",
        url: 'forum_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            getList('');
        }
    });

}
