var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

    getMateri();
    getList();

    $('#simpan_tugas').click(function() {
        AddDataTugas();
        return false;
    });

// ------------------- DateTimePicker -------------------
    $('#time_durasi').datetimepicker({
        format: 'LT'
    });

    $('#time_durasi_edit').datetimepicker({
        format: 'LT'
    });

    $('#datepicker_start').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#datepicker_start_edit').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#datepicker_end').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#datepicker_end_edit').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $("#datepicker_start").on("dp.change",function (e) {
        $('#datepicker_end').data("DateTimePicker").minDate(e.date);
    });

    $("#datepicker_start_edit").on("dp.change",function (e) {
        $('#datepicker_end').data("DateTimePicker").minDate(e.date);
    });

    $("#datepicker_end").on("dp.change",function (e) {
        $('#datepicker_start').data("DateTimePicker").maxDate(e.date);
    });

    $("#datepicker_end_edit").on("dp.change",function (e) {
        $('#datepicker_start').data("DateTimePicker").maxDate(e.date);
    });
// ------------------- DateTimePicker ENDING -------------------

    $("#search_button").click(function() {
        getList('');

        return false;
    });

});

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
            option_materi += '<option value="0"> Nama Materi </option><br/>';
            $.each(data.data, function(i, item) {
            option_materi += '<option value="' + data.data[i].id_materi + '">' + data.data[i].nama_materi + '</option><br/>';
            });

            $('#add_nama_materi').html(option_materi);
            $('#edit_id_materi').html(option_materi);
            return false;
        }
    });

}

function getList() {
    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        search_by       : $('#search_by').val(),
        search_input    : $('#search_input').val(),
        _token          : CSRF_TOKEN
    }

    $.ajax({
        async: "false",
        url: 'tugas_list',
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
    $('#add_nama_tugas').val('');
    $('#add_nama_materi').val('');
    $('#add_isi').val('');
    $('#add_tugas_mulai').val('');
    $('#add_tugas_selesai').val('');
    $('#add_tugas_durasi').val('');
    $('#add_file_tugas').val('');
    
    return false;

}

function clear_iframe() {
    $('#target_submit').val(null);
}

function clear_form() {
    $('input-tugas').val(null);
}

function AddDataTugas() {

    setTimeout(function() {
        result = $('#target_submit').contents().find('body').html(); // Nama Iframe
        if(result == '') {
            AddDataTugas();
        }
        else if(result === undefined) {
            AddDataTugas();
        }
        else {
            alert(result);
            clear_iframe();
            clear_form();
            getList();
        }
    }, 1);


}

function open_tugas_edit(id_tugas, nama_tugas, id_materi, isi, tugas_mulai, tugas_selesai, durasi, file) {
    $('#edit_id_tugas').val(id_tugas);
    $('#edit_nama_tugas').val(nama_tugas);
    $('#edit_id_materi').val(id_materi);
    $('#edit_isi').val(isi);
    $('#edit_tanggal_mulai').val(tugas_mulai);
    $('#edit_tanggal_selesai').val(tugas_selesai);
    $('#edit_durasi').val(durasi);
    $('#edit_file_tugas').val(file);
}

function open_tugas_hapus(id_tugas, nama_tugas){
    $('#hapus_id_tugas').val(id_tugas);
    $('#hapus_nama_tugas').html(nama_tugas);
}

function deleteData(id_tugas) {

    var konfirmasi = confirm($('#btn_delete'+id_tugas).data('delete'));
    var form_data = {
            id_tugas : id_tugas,
            _token   : CSRF_TOKEN
        }

    if(konfirmasi == true) {

        $.ajax({
            //async: "false",
            type: 'POST',
            data: form_data,
            url: 'tugas_delete',
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
