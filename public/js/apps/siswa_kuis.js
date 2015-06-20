var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

    getList('');

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
