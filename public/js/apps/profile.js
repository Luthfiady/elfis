var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');;


$(document).ready(function(){



});

function EditProfile() {

    setTimeout(function() {
        result = $('#target_submit').contents().find('body').html(); // Nama Iframe
        if(result == '') {
            EditProfile();
        }
        else if(result === undefined) {
            EditProfile();
        }
        else {
            alert(result);
        }
    }, 1);


}

function open_tugas_edit(nik, nama, tempat_lahir, tanggal_lahir, agama, email, telp, foto) {
    $('#add_nik').val(nik);
    $('#add_nama').val(nama);
    $('#add_tempat_lahir').val(tempat_lahir);
    $('#add_tgl_lahir').val(tanggal_lahir);
    $('#add_agama').val(agama);
    $('#add_email').val(email);
    $('#add_telp').val(telp);
    $('#add_foto').val(foto);
}