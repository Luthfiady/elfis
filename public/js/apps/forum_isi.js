var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var base_url = $('#base_url').val();
var current_page;

$(document).ready(function(){

	getData('');

	$('#submit_add_komentar').click(function(){
        isi_komentar = $('#add_isi_komentar').val();

		if (isi_komentar != "") {
			AddKomentar();
			return false;
		}
	})

    $('#submit_edit_komentar').click(function(){
        isi_komentar = $('#edit_isi_komentar').val();

        if (isi_komentar != "") {
            EditKomentar();
            return false;
        }
    })

});

$(document).on("click", ".pg a", function(){
    getData(this.id);
    current_page = this.id;
    return false;
});


function getData(page) {

	$(".dataChild").html('<img style="margin-top:50px; margin-bottom:60px;" src="../../../public/img/loading/loading4.gif") }}" width="50px" height="50px">');
	var form_data = {
		id_forum	: $('#id_forum').val(),
		paging      : page,
		_token      : CSRF_TOKEN
	}

	$.ajax({
        url: '../../forum_isi_set_data',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
        	$(".jml_komentar").html(data.jml+' Komentar &nbsp');
			$(".dataHead").html(data.result_head);
			$(".dataChild").html(data.result);
            $(".pg ul").html(data.paging);

            return false;
        }
    });

}


function getHeadForum() {

    var form_data = {
        id_forum    : $('#id_forum').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: '../../refresh_forum',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataHead").html(data.result_head);

            return false;
        }
    });

}


function getKomentar(data) {

    var form_data = {
        id_forum    : $('#id_forum').val(),
        id_komentar : data,
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: '../../refresh_komentar',
        type: 'GET',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            $(".dataChild").html(data.result);
            $(".pg ul").html(data.paging);

            return false;
        }
    });

}


function AddStarForum(id_forum) {

	var form_data = {
        id_forum	: id_forum,
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: '../../forum_add_star',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            // alert(data.sukses);
            getHeadForum();
            return false;
        }
    });

}


function AddStarKomentar(id_komentar) {

	var form_data = {
        id_komentar	: id_komentar,
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: '../../komentar_add_star',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            getKomentar(data.data);
            return false;
        }
    });

}


function AddKomentar() {

	var form_data = {
        id_forum	: $('#id_forum').val(),
        add_isi		: $('#add_isi_komentar').val(),
        _token      : CSRF_TOKEN
    }

    $.ajax({
        url: '../../komentar_add',
        type: 'POST',
        data: form_data,
        dataType: "JSON",
        success: function(data) {
            alert(data.sukses);
            getData();
            $('#add_isi_komentar').val('');
        }
    });

}


function deleteKomentar(id_komentar) {

    var konfirmasi = confirm($('#btn_delete'+id_komentar).data('delete'));
    var form_data = {
            id_komentar : id_komentar,
            _token      : CSRF_TOKEN
        }

    if(konfirmasi == true) {

        $.ajax({
            type: 'POST',
            data: form_data,
            url: '../../komentar_delete',
            dataType: "JSON",
            success: function(data) {
                getData();
                return false;
            }
        });

    } else {
        return false;
    }

}


function getEditKomentar(id_komentar) {

    var form_data = {
        id_komentar : id_komentar,
        _token      : CSRF_TOKEN
    }

    $.ajax({
        type: 'POST',
        data: form_data,
        url: '../../komentar_get_edit',
        dataType: "JSON",
        success: function(data) {
            
            $('#id_komentar').val(data.data.id_komentar);
            $('#edit_isi_komentar').val(data.data.isi_komentar);

            return false;
        }
    });
}


function EditKomentar() {

    var form_data = {
        id_komentar     : $('#id_komentar').val(),
        isi_komentar    : $('#edit_isi_komentar').val(),
        _token          : CSRF_TOKEN
    }

    $.ajax({
        type: 'POST',
        data: form_data,
        url: '../../komentar_edit',
        dataType: "JSON",
        success: function(data) {
            alert(data.sukses);
            getData();
        }
    });

}