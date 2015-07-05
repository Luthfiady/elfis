var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var current_page;

$(document).ready(function(){

    latihan_getID();

});


function latihan_getID() {

    var form_data = {
        id      : $('#id').val(),
        _token  : CSRF_TOKEN
    }

    $.ajax({
        url: '../../latihan_get_id',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $('#id_group_latihan').val(data.data.id_group_latihan);
            // $('.durasi-soal').html(data.data.durasi);
            // latihan_durasiSoal();
            latihan_getSoal();
            return false;
        }
    });

}


$(document).on("click", ".pga a", function(){
    latihan_AddParamJawaban();

    latihan_getSoal(this.id);
    current_page = this.id;
    return false;
});


$(document).on("click", ".pgn a", function(){
    
    latihan_AddParamJawabanFinal();
    return false;
});


function latihan_getSoal(page) {

    $(".dataSoal").html('<img style="margin-top:180px;" src="../../../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        id_group_latihan   : $('#id_group_latihan').val(),
        paging          : page,
        _token          : CSRF_TOKEN
    }

    $.ajax({
        url: '../../latihan_get_soal',
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


function latihan_AddParamJawaban() {

    $.ajax({
        url: '../../latihan_AddParamJawaban',
        type: 'POST',
        data: $("#form_soal").serialize(),
        dataType: "JSON",
        success: function(data) {
            alert(data.data);

            return false;
        }
    });

}


function latihan_AddParamJawabanFinal() {

    $.ajax({
        url: '../../latihan_AddParamJawaban',
        type: 'POST',
        data: $("#form_soal").serialize(),
        dataType: "JSON",
        success: function(data) {
            return false;
        }
    });

    latihan_getNilai();
}


function latihan_getNilai() {

    $(".dataSoal").html('<img style="margin-top:180px;" src="../../../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
    var form_data = {
        id_group_latihan   : $('#id_group_latihan').val(),
        _token          : CSRF_TOKEN
    }


    $.ajax({
        url: '../../latihan_get_nilai',
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