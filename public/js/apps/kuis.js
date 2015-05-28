
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

    $("#simpan_soal").click(function(){

        soal = $("#soal_kuis").val('');
        jwb_a = $("#jwb_a").val('');
        jwb_b = $("#jwb_b").val('');
        jwb_c = $("#jwb_c").val('');
        jwb_d = $("#jwb_d").val('');
        jwb_e = $("#jwb_e").val('');
        jwb_benar = $("#jwb_benar").val();

        if(soal != '' && jwb_a != '' && jwb_b != '' && jwb_c != '' && jwb_d != '' && jwb_e != '' && jwb_benar != ''){
            // $('#modal-soal').modal('show');
            alert('untuk selanjutnya');
        } else {
            document.getElementById('btn_hide_soal').click();
        }
        
    });

});
