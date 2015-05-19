<!-- MODAL ADD -->
	
<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah Forum</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

          <div class="form-group">
            <label class="col-sm-2 label-right">Nama Forum</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="add_nama_forum" placeholder="Nama Forum" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 label-right">Jurusan</label>
            <div class="col-sm-10">
              <select class="form-control inform-height" id="" required>
                <option value=""> Jurusan </option>
                <option value="modul_code"> Multimedia </option>
                <option value="modul_name"> Jaringan </option>
                <option value="modul_name"> Teknologi </option>
                <option value="modul_name"> Informatika </option>
              </select>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 label-right">Mata Pelajaran</label>
            <div class="col-sm-10">
              <select class="form-control col-sm-10 inform-height" id="" required>
                <option value=""> Mata Pelajaran </option>
                <option value="modul_code"> Bahasa Indonesia </option>
                <option value="modul_name"> Matematika </option>
                <option value="modul_name"> Fisika </option>
                <option value="modul_name"> Kimia </option>
              </select>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 label-right">Subjek</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="add_Subjek" placeholder="Subjek">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 label-right">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="add_keterangan" placeholder="Keterangan">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 label-right">Isi</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="10" required></textarea>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

      </div>

      <div class="modal-footer">
	      <div class="form-group">
	        <button type="submit" id="submit_add_form" class="btn btn-primary btn-sm" value="save">Save</button>
	        <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
	      </div>

        </form>
      </div>

    </div>
</div>
