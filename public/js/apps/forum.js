
var token = $('#token').val();

$(document).ready(function(){
	getList('');
});

function getList() {

    $("#dataTable").html('<img src="{{ URL:to("public/img/setting/loadings.gif") }}" width=50px; height="50px">');
    var form_data = {
        search_by   : $('#search_by').val(),
        search      : $('#search_input').val()
    }

    $.ajax({
        async: "false",
        data: form_data,
        dataType: "json",
        url: "{{ URL::to('admin/forum_list') }}",
        type: 'POST',
        success: function(data) {
            $("#dataTable").html(data.result);

            return false;
        }
    });
}
