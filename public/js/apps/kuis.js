
$(document).ready(function(){

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
        alert('bisa di click');
    });

    $("#simpan_kuis").click(function(){

        nama_kuis = $("#add_nama_kuis").val();
        nama_materi = $("#nama_materi").val();
        mulai = $("#tgl_mulai").val();
        selesai = $("#tgl_selesai").val();
        durasi = $("#durasi").val();

        if(nama_kuis != '' && nama_materi != 'Nama Materi' && mulai != '' && selesai != '' && durasi != ''){
            $('#modal-soal').modal('show');
        } else {
            document.getElementById('btn_hide').click();
        }
        
    });

});
