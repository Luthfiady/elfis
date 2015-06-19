<!-- MODAL ADD --> 

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah User</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">ID User</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height" id="add_id_user" placeholder="ID User" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama User</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height" id="add_nama_user" placeholder="Nama User" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Password</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height" id="add_password" placeholder="Password" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Group</label>
            <div class="col-sm-8">
              <select class="form-control" id="add_nama_group" required>
                <option value=""> Nama Group </option>
                <option value="1"> Siswa </option>
                <option value="2"> Guru </option>
                <option value="3"> Admin </option>\
              </select>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Disabled</label>
            <div class="col-sm-8">
              <select class="form-control" id="add_disabled" required>
                <option value=""> Disabled </option>
                <option value="N"> N </option>
                <option value="Y"> Y </option>\
              </select>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

      </div>

      <div class="modal-footer">

        <div class="form-group">
          <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
          <button type="submit" id="submit_add_form" class="btn btn-primary btn-sm" value="save">Simpan</button>
        </div>

        </form>
      </div>

    </div>
</div>