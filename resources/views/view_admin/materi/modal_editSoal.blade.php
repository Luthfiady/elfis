<!-- MODAL ADD --> 
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi_admin.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p class="modal-title">dodo Soal</p>
        </div>

        <div class="modal-body">
          <form id="editSoal" class="form form-horizontal" role="form" data-toggle="validator">
            <div class="form-group">
                <label class="col-sm-2 label-right">Soal</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="10" id="edit_nama_latihan" name="edit_nama_latihan" required></textarea>
                </div>

                <div class="col-sm-5 help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 label-modal-soal">Materi</label>
                <div class="col-sm-8">
                  <select class="form-control" rows="10" id="edit_nama_materi" name="edit_nama_materi" required>
                   
                  </select>
                </div>
                
                <div class="col-sm-5 help-block with-errors"></div>
            </div>

            <div class="modal-footer">
              <div class="form-group">
                  <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
                <a type="submit" class="btn btn-primary btn-sm" value="save" data-toggle="modal">Simpan</a>
            </div>
          </div>
          </form>
        </div>
    </div>
</div>