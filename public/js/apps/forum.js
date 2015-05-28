var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){
	getList('');
});

function getList() {

    $("#dataTable").html('<img src="{{ URL:to("public/img/setting/loadings.gif") }}" width=50px; height="50px">');
    var form_data = {
        search_by   : $('#search_by').val(),
        search      : $('#search_input').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        async: "false",
        url: "URL::to('admin/forum_list')",
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $("#dataTable").html(data.result);

            return false;
        }
    });
}
