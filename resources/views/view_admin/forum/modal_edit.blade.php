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
              <input type="text" class="form-control inform-height" id="add_nama_forum" placeholder="Nama Forum" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Hak Akses</label>
            <div class="col-sm-10">
              <select class="form-control inform-height" id="" required>
                <option value=""> Hak Akses </option>
                <option value="modul_code"> Semua </option>
                <option value="modul_name"> Guru </option>
                <option value="modul_name"> Siswa </option>
              </select>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Subyek</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="add_Subyek" placeholder="Subyek">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="add_keterangan" placeholder="Keterangan">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2">Isi</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="10" required></textarea>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

      </div>

      <div class="modal-footer">
        <div class="form-group">
          <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
          <button type="submit" id="submit_add_form" class="btn btn-primary btn-sm" value="save">Ubah</button>
        </div>

        </form>
      </div>

    </div>
</div>
