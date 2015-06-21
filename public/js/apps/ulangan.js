var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var current_page;

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
        url: 'ulangan_list',
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


function deleteUlangan(id) {

    var konfirmasi = confirm($('#deleteData'+id).data('delete'));

    var form_data = {
        id_ulangan   : id,
        _token    : CSRF_TOKEN
    }

    if (konfirmasi == true) {

        $.ajax({
                url: 'ulangan_delete',
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
