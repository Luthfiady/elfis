var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

    getList();
// ------------------- DateTimePicker -------------------
    $('#time_durasi').datetimepicker({
        format: 'LT'
    });

    $('#datepicker_start').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#datepicker_end').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $("#datepicker_start").on("dp.change",function (e) {
        $('#datepicker_end').data("DateTimePicker").minDate(e.date);
    });

    $("#datepicker_end").on("dp.change",function (e) {
        $('#datepicker_start').data("DateTimePicker").maxDate(e.date);
    });

    $("#search_button").click(function() {
        getList('');

        return false;
    });

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

function AddData() {

    var form_data = {
        add_nama_tugas      : $('#add_nama_tugas').val(),
        add_nama_materi     : $('#add_nama_materi').val(),
        add_isi             : $('#add_isi').val(),
        add_tugas_mulai     : $('#add_tugas_mulai').val(),
        add_tugas_selesai   : $('#add_tugas_selesai').val(),
        add_tugas_durasi    : $('#add_tugas_durasi').val(),
        add_file_tugas      : $('#add_file_tugas').val(),
        _token              : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'tugas_add',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.pesan);
            getList('');
            getAdd();
        }
    });

}
