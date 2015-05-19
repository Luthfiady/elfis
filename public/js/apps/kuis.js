
$(document).ready(function(){

// ------------------- DateTimePicker -------------------
    $('#datepicker_start').timepicker({
        format: 'YYYY-MM-DD'
    });

    $('#datepicker_end').timepicker({
        format: 'YYYY-MM-DD'
    });

    $("#datepicker_start").on("dp.change",function (e) {
        $('#datepicker_end').data("DateTimePicker").minDate(e.date);
    });

    $("#datepicker_end").on("dp.change",function (e) {
        $('#datepicker_start').data("DateTimePicker").maxDate(e.date);
    });

    $("#search_button").click(function() {
        alert('bisa di click');
    });

});