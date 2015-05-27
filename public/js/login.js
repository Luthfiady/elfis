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
});