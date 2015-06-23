var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

    $('#submit_add_form').click(function(){

        id_user   = $('#reset_id_user').val();

        if (id_user != "") {
            ResetPassword();
            return false;
        }

    })

});


function ResetPassword() {

    var konfirmasi = confirm('Apakah anda yakin ingin mereset password dengan ID User '+ $('#reset_id_user').val() + '?');

    var form_data = {
        id_user    : $('#reset_id_user').val(),
        _token     : CSRF_TOKEN
    }

    if(konfirmasi == true) {

        $.ajax({
            url: 'get_reset_password',
            type: 'POST',
            data: form_data,
            dataType: "JSON",
            success: function(data) {

                if (data.gagal != null) {
                    alert(data.gagal);
                    $('#reset_id_user').val('');
                } else {
                    alert(data.sukses);
                    $('#reset_id_user').val('');
                }

            }
        });

    } else {
        return false;
    }

}
