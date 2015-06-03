<!-- MODAL EDIT -->
  
<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Ubah Forum</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

          <div class="form-group">
            <label class="col-sm-2">Nama Forum</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="edit_nama_forum" placeholder="Nama Forum" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Hak Akses</label>
            <div class="col-sm-10">
              <select class="form-control inform-height" id="edit_role_access" required>
                <option value=""> Hak Akses </option>
                <option value="Semua"> Semua </option>
                <option value="Guru"> Guru </option>
                <option value="Siswa"> Siswa </option>
              </select>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Subyek</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="edit_subyek" placeholder="Subyek">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="edit_keterangan" placeholder="Keterangan">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Isi</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="10" id="edit_isi" required></textarea>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

      </div>

      <div class="modal-footer">
        <div class="form-group">
          <input type="hidden" id="id_forum">
          <button type="reset" id="reset_edit_form" class="btn btn-primary btn-sm">Reset</button>
          <button type="submit" id="submit_edit_form" class="btn btn-primary btn-sm" value="save">Ubah</button>
        </div>

        </form>
      </div>

    </div>
</div>
