var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

    $('#submit_add_form').click(function(){

        old_pass   = $('#old_password').val();
        new_pass   = $('#new_password').val();
        rep_pass   = $('#repeat_password').val();

        if (old_pass && new_pass && rep_pass != "") {
            ChangePassword();
            return false;
        }

    })

});


function getChange() {
    $('#old_password').val('');
    $('#new_password').val('');
    $('#repeat_password').val('');
    
    return false;

}


function ChangePassword() {

    var form_data = {
        old_pass   : $('#old_password').val(),
        new_pass   : $('#new_password').val(),
        rep_pass   : $('#repeat_password').val(),
        _token     : CSRF_TOKEN
    }

    $.ajax({
        url: 'set_change_password',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {

            if (data.gagal != null) {
                alert(data.gagal);
                $('#old_password').val('');
            } else {
                alert(data.sukses);
                getChange();
            }

        }
    });

}
