var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

    getList('');

// ------------------- DateTimePicker -------------------
    $('#time_durasi').datetimepicker({
        format: 'hh:mm:ss'
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

    // $("#simpan_soal").click(function(){

    //     soal = $("#soal_kuis").val('');
    //     jwb_a = $("#jwb_a").val('');
    //     jwb_b = $("#jwb_b").val('');
    //     jwb_c = $("#jwb_c").val('');
    //     jwb_d = $("#jwb_d").val('');
    //     jwb_e = $("#jwb_e").val('');
    //     jwb_benar = $("#jwb_benar").val();

    //     if(soal != '' && jwb_a != '' && jwb_b != '' && jwb_c != '' && jwb_d != '' && jwb_e != '' && jwb_benar != ''){
    //         // $('#modal-soal').modal('show');
    //         alert('untuk selanjutnya');
    //     } else {
    //         document.getElementById('btn_hide_soal').click();
    //     }
        
    // });

});

function getList() {

    $(".dataTable").html('<img style="margin-top:180px;" src="../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        search_by       : $('#search_by').val(),
        search_input    : $('#search_input').val(),
        _token          : CSRF_TOKEN
    }

    $.ajax({
        // async: "false",
        url: 'kuis_list',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataTable").html(data.result);
            return false;
        }
    });

}


function deleteKuis(id) {

    var konfirmasi = confirm($('#deleteData'+id).data('delete'));

    var form_data = {
        id_kuis   : id,
        _token    : CSRF_TOKEN
    }

    if (konfirmasi == true) {

        $.ajax({
                url: 'kuis_delete',
                type: 'POST',
                data: form_data,
                dataType: "JSON",
                success: function(data) {
                    // alert(data.pesan);
                    getList();

                    return false;
                }
            });

    } else {
        return false;
    }

}
