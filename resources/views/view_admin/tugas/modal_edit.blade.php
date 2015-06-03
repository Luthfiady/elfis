<!-- MODAL ADD --> 
	
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/kuis.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Ubah Tugas</p>
      </div>

      <div class="modal-body">
        <form id="edit_form" class="form form-horizontal" role="form">

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Tugas</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height" id="add_nama_tugas" placeholder="Nama Tugas" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Materi</label>
            <div class="col-sm-8">
              <select class="form-control" id="nama_materi" required>
                <option value=""> Nama Materi </option>
                <option value="A"> Materi A </option>
                <option value="B"> Materi B </option>
                <option value="C"> Materi C </option>
                <option value="D"> Materi D </option>
              </select>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Isi</label>
            <div class="col-sm-8">
              <textarea rows="3" class="form-control inform-height" id="add_isi" placeholder="Uraian Tugas" required></textarea>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Tugas Mulai</label>
            <div class="col-sm-8">
              <div class="input-group date" id="datepicker_start">
                <input type="text" id="tgl_mulai" class="form-control inform-height" placeholder="Tanggal Mulai" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
              </div>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Tugas Selesai</label>
            <div class="col-sm-8">
              <div class="input-group date" id="datepicker_end">
                <input type="text" id="tgl_selesai" class="form-control inform-height" placeholder="Tanggal Selesai" required>
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-calendar"></i>
                </span>
              </div>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Durasi Tugas</label>
            <div class="col-sm-8">
              <div class="input-group date" id="time_durasi">
                <input type="text" id="durasi" class="form-control inform-height" placeholder="Durasi Tugas" required>
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-time"></i>
                </span>
              </div>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">File Tugas</label>
            <div class="col-sm-8">
                <input type="file" name="input_tugas" accept="file_extension">
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>
      </div>

      <div class="modal-footer">
	      <div class="form-group">
          <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
	        <a type="submit" class="btn btn-primary btn-sm" value="save" data-toggle="modal">Simpan</a>
	      </div>

        </form>
      </div>

    </div>
</div>
