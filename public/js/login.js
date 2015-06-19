var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {

	$("#show_password").click(function () {
		if ($("#login_password").attr("type")=="password") {
			$("#login_password").attr("type", "text");
		}
		else{
			$("#login_password").attr("type", "password");
		}

	});

	$(window).load(function() {
        $('#slider').nivoSlider();
    });

	$("#login_submit").click(function(){

		username = $('#login_username').val();
      	password = $('#login_password').val();

      	if (username && password != null) {
      		DoLogin();
      		return false;
      	}

	});

});


function DoLogin() {

	$('#login_submit').hide();
	    
    var form_data = {
      login_username	: $('#login_username').val(),
      login_password	: $('#login_password').val(),
      login_submit		: $('#login_submit').val(),
      _token          	: CSRF_TOKEN
    };

    $("#login_message").html('<img src="../elfis/public/img/setting/load.gif" style="margin-top:-5px;">&nbsp Mengecek Autentikasi');

    $.ajax({
        url: 'do_login',
        type: "post",
        data: form_data,
        dataType: "json",
        success: function(msg){
            if(msg.login_success == null){
              $('#login_message').html('<img src="../elfis/public/img/setting/exclamation.png" style="margin-top:-5px;">&nbsp'+ msg.login_error);
              $('#login_password').val('');
              $('#login_submit').show();
            }
            else{
              $("#login_message").html('<img src="../elfis/public/img/setting/load.gif" style="margin-top:-5px;">&nbsp' + msg.login_success);
              setTimeout("window.location = '"+msg.group_name+"'", 2000);
            }
        }
    });

}
