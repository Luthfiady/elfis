<!-- MODAL EDIT --> 

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" id="close_modal" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Edit Pelajaran</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Pelajaran</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height" id="edit_nama_pelajaran" placeholder="Nama Pelajaran" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Jurusan</label>
            <div class="col-sm-8">
              <select class="form-control" id="edit_nama_jurusan" required>
              
              </select>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

      </div>

      <input type="hidden" id="edit_id_pelajaran">

      <div class="modal-footer">

        <div class="form-group">
          <button type="reset" id="reset_edit_form" class="btn btn-primary btn-sm">Reset</button>
          <button type="submit" id="submit_edit_form" class="btn btn-primary btn-sm" value="save">Ubah</button>
        </div>

        </form>
      </div>

    </div>
</div>