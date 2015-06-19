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

        id_user       = $('#add_id_user').val();
        username      = $('#add_nama_user').val();
        password      = $('#add_password').val();
        nama_group    = $('#add_nama_group').val();
        disabled      = $('#add_disabled').val();

        if (id_user && username && password && nama_group && disabled != null) {
            AddUser();
            return false;
        }

    })

    $('#submit_edit_form').click(function(){

        id_user       = $('#edit_id_user').val();
        username      = $('#edit_nama_user').val();
        password      = $('#edit_password').val();
        nama_group    = $('#edit_nama_group').val();
        disabled      = $('#edit_disabled').val();

        if (id_user && username && password && nama_group && disabled != null) {
            EditUser();
            return false;
        }
        
    })

});

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

    $.ajax({
        // async: "false",
        url: 'user_list',
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
    $('#add_id_user').val('');
    $('#add_nama_user').val('');
    $('#add_password').val('');
    $('#add_nama_group').val('');
    $('#add_disabled').val('');    
    return false;

}

function AddUser() {

    var form_data = {
        id_user       : $('#add_id_user').val(),
        username      : $('#add_nama_user').val(),
        password      : $('#add_password').val(),
        nama_group    : $('#add_nama_group').val(),
        disabled      : $('#add_disabled').val(),
        _token        : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'user_add',
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

function deleteUser(id_user) {

    var konfirmasi = confirm($('#btn_delete'+id_user).data('delete'));
    var form_data = {
            id_user : id_user,
            _token   : CSRF_TOKEN
        }

    if(konfirmasi == true) {

        $.ajax({
            //async: "false",
            type: 'POST',
            data: form_data,
            url: 'user_delete',
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

function getEdit(id_user) {

    var form_data = {
        id_user  : id_user,
        _token   : CSRF_TOKEN
    }

    $.ajax({
        //async: "false",
        url: 'user_get_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            $('#edit_id_user').val(data.data.id_user);
            $('#edit_nama_user').val(data.data.username);
            $('#edit_password').val(data.data.password);
            $('#edit_nama_group').val(data.data.nama_group);
            $('#edit_disabled').val(data.data.disabled);

            return false;
        }
    });

}

function EditUser() {

    var form_data = {
        id_user       : $('#edit_id_user').val(),
        username      : $('#edit_nama_user').val(),
        password      : $('#edit_password').val(),
        nama_group    : $('#edit_nama_group').val(),
        disabled      : $('#edit_disabled').val(),
        _token        : CSRF_TOKEN
    }
    
    $.ajax({
        // async: "false",
        url: 'user_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.sukses);
            getList();
        }
    });

}
