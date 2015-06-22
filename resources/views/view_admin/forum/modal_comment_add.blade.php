<!-- MODAL ADD -->
	
<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah Komentar</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

          <div class="form-group">
            <label class="col-sm-2">Isi Komentar</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="add_isi_komentar" rows="7" required></textarea>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-10 help-block with-errors"></div>
          </div>

      </div>

      <div class="modal-footer">
	      <div class="form-group">
          <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
          <button type="submit" id="submit_add_komentar" class="btn btn-primary btn-sm" value="save">Simpan</button>
	      </div>

        </form>
      </div>

    </div>
</div>
