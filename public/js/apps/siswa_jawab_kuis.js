var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var current_page;

$(document).ready(function(){

    getID();

});


function getID() {

    var form_data = {
        id      : $('#id').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: '../../kuis_get_id',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $('#id_group_kuis').val(data.data.id_group_kuis);
            $('.durasi-soal').html(data.data.durasi);
            durasiSoal();
            getSoal();
            return false;
        }
    });

}


function waktuHabis(){
    alert("Waktu sudah habis");
    getNilai();
}

function hampirHabis(periods){
    if($.countdown.periodsToSeconds(periods) == 300){
        alert('Waktu hampir habis, tinggal 5 menit lagi');
        $(this).css({color:"red"});
    }
}

function durasiSoal() {
    var hms = $(".durasi-soal").html();
    var a = hms.split(':');
    var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

    var waktu = seconds;
    var sisa_waktu = waktu - $('#session_durasi').val();
    var longWayOff = sisa_waktu;
    $(".countdown-durasi").countdown({
        until: longWayOff,
        compact: true,
        format: 'HMS',
        onTick: hampirHabis,
        onExpiry: waktuHabis
    });
}


$(document).on("click", ".pga a", function(){
    AddParamJawaban();

    getSoal(this.id);
    current_page = this.id;
    return false;
});


$(document).on("click", ".pgn a", function(){
    
    AddParamJawabanFinal();
    return false;
});


function getSoal(page) {

    $(".dataSoal").html('<img style="margin-top:180px;" src="../../../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        id_group_kuis   : $('#id_group_kuis').val(),
        paging          : page,
        _token          : CSRF_TOKEN
    }

    $.ajax({
        url: '../../kuis_get_soal',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataSoal").html(data.result);
            $(".pg ul").html(data.paging);
            return false;
        }
    });

}


function AddParamJawaban() {

    $.ajax({
        url: '../../AddParamJawaban',
        type: 'POST',
        data: $("#form_soal").serialize(),
        dataType: "JSON",
        success: function(data) {
            alert(data.data);

            return false;
        }
    });

}


function AddParamJawabanFinal() {

    $.ajax({
        url: '../../AddParamJawaban',
        type: 'POST',
        data: $("#form_soal").serialize(),
        dataType: "JSON",
        success: function(data) {
            return false;
        }
    });

    getNilai();
}


function getNilai() {

    $(".dataSoal").html('<img style="margin-top:180px;" src="../../../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        id_group_kuis   : $('#id_group_kuis').val(),
        _token          : CSRF_TOKEN
    }


    $.ajax({
        url: '../../kuis_get_nilai',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".pg ul").html('');
            $(".dataSoal").html('');
            $(".dataNilai").html(data.result);
            $(".durasi-a").addClass('hidden');
            $(".countdown-durasi").addClass('hidden');
            $(".durasi-soal").addClass('hidden');
            
            return false;
        }
    });

}