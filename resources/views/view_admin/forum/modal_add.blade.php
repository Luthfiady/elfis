<!-- MODAL ADD -->
	
<div class="modal-dialog">
    <div class="modal-content modal-width-index">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" class="header-modal">Tambah Forum</h3>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form">

          <div class="form-group">
            <label class="col-sm-3 label-right">Nama Forum</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-height" id="add_nama_forum" placeholder="Nama Forum">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 label-right">Subjek</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-height" id="add_Subjek" placeholder="Subjek">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 label-right">Keterangan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-height" id="add_keterangan" placeholder="Keterangan">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 label-right">Isi</label>
            <div class="col-sm-9">
              <textarea class="ckeditor form-control" cols="10" rows="10" name="editor1" required></textarea>
            </div>
          </div>

      </div>

      <div class="modal-footer">
	      <div class="form-group">
	        <button type="submit" id="submit_add_form" class="btn btn-primary btn-sm" value="save" data-dismiss="modal">Save</button>
	        <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
	      </div>

        </form>
      </div>

    </div>
</div>
