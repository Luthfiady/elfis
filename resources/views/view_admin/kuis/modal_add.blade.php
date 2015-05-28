<!-- MODAL ADD --> 
  
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/kuis.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah Kuis</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Kuis</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height" id="add_nama_kuis" placeholder="Nama Kuis" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3" style="background-color"></div>
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
            <label class="col-sm-2 ">Mulai</label>
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
            <label class="col-sm-2 ">Selesai</label>
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
            <label class="col-sm-2 ">Durasi Kuis</label>
            <div class="col-sm-8">
              <div class="input-group date" id="time_durasi">
                <input type="text" id="durasi" class="form-control inform-height" placeholder="Durasi Kuis" required>
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-time"></i>
                </span>
              </div>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

      </div>

      <div class="modal-footer">

        <div class="form-group">
            <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
            <a type="submit" id="simpan_kuis" class="btn btn-primary btn-sm" value="save">Selanjutnya</a>
            <button type="submit" id="btn_hide" class="btn btn-primary btn-sm" style="display:none;">hide</button>
        </div>

        </form>
      </div>

    </div>
</div>

<!-- ///////////////////////////////////////////////////////////// Modal Soal ///////////////////////////////////////////////////////////// -->

  <div class="modal fade" id="modal-soal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    @include('view_admin.kuis.modal_soal_add')
  </div>

