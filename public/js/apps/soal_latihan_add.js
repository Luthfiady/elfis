var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

    getIdLatihan();
    getMateri();

    $('#simpan_latihan').click(function() {

        nama = $('#add_nama_latihan').val();
        materi = $('#nama_materi').val();

        if (nama && materi != "") {
            AddIdLatihan();
            AddLatihan();
            return false;
        }

    });


    $('#simpan_soal').click(function() {

        soal = $('#soal_latihan').val();
        a = $('#jwb_a').val();
        b = $('#jwb_b').val();
        c = $('#jwb_c').val();
        d = $('#jwb_d').val();
        e = $('#jwb_e').val();
        jawaban = $('#jawaban').val();

        if (soal && a && b && c && d && e && jawaban != "" ) {
            AddIdLatihan_Final();
            return false;
        }

    });

    $('#ubah_soal').click(function() {

        soal = $('#edit_soal_latihan').val();
        a = $('#edit_jwb_a').val();
        b = $('#edit_jwb_b').val();
        c = $('#edit_jwb_c').val();
        d = $('#edit_jwb_d').val();
        e = $('#edit_jwb_e').val();
        jawaban = $('#edit_jawaban').val();

        if (soal && a && b && c && d && e && jawaban != "" ) {
            latihan_EditSoal();
            return false;
        } 

    });

    $('#hapus_latihan').click(function() {
        LatihanBatal();
        return false;
    });

});
    // ---------------------------------------------------------- Latihan Add ----------------------------------------------------------


function getMateri() {

    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'get_materi',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            option_materi = '';
            option_materi += '<option value=""> Nama Materi </option><br/>';
            $.each(data.data, function(i, item) {
            option_materi += '<option value="' + data.data[i].id_materi + '">' + data.data[i].nama_materi + '</option><br/>';
            });

            $('#nama_materi').html(option_materi);
            return false;
        }
    });

}


function getIdLatihan() {

    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'latihan_get_param',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $('#id_latihan').val('L00' + data.data);
            $('#id_after').val(data.data);
            $('#id_before').val(data.data-1);

            latihan_soal_list();
        }
    });

}


function latihan_soal_list() {

    $(".dataTable").html('<img style="margin-top:50px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'latihan_soal_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);
            return false;
        }
    });

}


function AddIdLatihan() {

    var form_data = {
        id_latihan     : $('#id_latihan').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'AddIdLatihan',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            return false;
        }
    });

}


function AddIdLatihan_Final() {

    var form_data = {
        id_latihan     : $('#id_latihan').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'AddIdLatihan',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            return false;
        }
    });

    latihan_AddSoal();

}


function refreshSoal() {

    $('#soal_latihan').val('');
    $('#jwb_a').val('');
    $('#jwb_b').val('');
    $('#jwb_c').val('');
    $('#jwb_d').val('');
    $('#jwb_e').val('');
    $('#jawaban').val('');

}


function latihan_AddSoal() {

    var form_data = {
        id_soal     : $('#id_latihan').val(),
        soal_latihan   : $('#soal_latihan').val(),
        jwb_a       : $('#jwb_a').val(),
        jwb_b       : $('#jwb_b').val(),
        jwb_c       : $('#jwb_c').val(),
        jwb_d       : $('#jwb_d').val(),
        jwb_e       : $('#jwb_e').val(),
        jawaban     : $('#jawaban').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: 'latihan_AddSoal',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            latihan_soal_list();
            refreshSoal();
        }
    });

}


function latihan_deleteSoal(id) {

    var konfirmasi = confirm($('#delete'+id).data('delete'));

    var form_data = {
        id      : id,
        _token  : CSRF_TOKEN
    }

    if (konfirmasi == true) {

        $.ajax({
            url: 'latihan_DeleteSoal',
            type: 'POST',
            data: form_data,
            dataType: "JSON",
            success: function(data) {
                latihan_soal_list();

                return false;
            }
        });

    } else {
        return false;
    }
}


function latihan_getEdit(id) {

    var form_data = {
        id      : id,
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: 'latihan_soal_get_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            $('#edit_id_latihan').val(data.soal.id);
            $('#edit_soal_latihan').val(data.soal.soal);
            $('#edit_jwb_a').val(data.soal.pil_a);
            $('#edit_jwb_b').val(data.soal.pil_b);
            $('#edit_jwb_c').val(data.soal.pil_c);
            $('#edit_jwb_d').val(data.soal.pil_d);
            $('#edit_jwb_e').val(data.soal.pil_e);
            $('#edit_jawaban').val(data.soal.jawaban);

            return false;
        }
    });

}


function latihan_EditSoal() {

    var form_data = {
        id      : $('#edit_id_latihan').val(),
        soal    : $('#edit_soal_latihan').val(),
        jwb_a   : $('#edit_jwb_a').val(),
        jwb_b   : $('#edit_jwb_b').val(),
        jwb_c   : $('#edit_jwb_c').val(),
        jwb_d   : $('#edit_jwb_d').val(),
        jwb_e   : $('#edit_jwb_e').val(),
        jawaban : $('#edit_jawaban').val(),
        _token  : CSRF_TOKEN
    }
    
    $.ajax({
        // async: "false",
        url: 'latihan_soal_edit',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            latihan_soal_list();
            document.getElementById('close_modal').click();
        }
    });

}


function refreshLatihan() {

    $('#add_nama_latihan').val('');
    $('#nama_materi').val('');

}


function AddLatihan() {

    var form_data = {
        id_after            : $('#id_after').val(),
        id_param            : $('#id_before').val(),
        id_group_latihan       : $('#id_latihan').val(),
        nama_group_latihan     : $('#add_nama_latihan').val(),
        id_materi           : $('#nama_materi').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'AddDetailLatihan',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            getIdLatihan();
            alert(data.pesan);
            refreshLatihan();
            latihan_soal_list();
        }
    });

}


function LatihanBatal() {

    var form_data = {
        id_latihan     : $('#id_latihan').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: 'LatihanBatal',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            refreshLatihan();
            latihan_soal_list();
        }
    });

}






	