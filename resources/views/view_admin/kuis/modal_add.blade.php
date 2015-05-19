<!-- MODAL ADD -->
	
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/kuis.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Tambah Kuis</h3>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form">

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Nama Kuis</label>
            <div class="col-sm-7">
              <input type="text" class="form-control inform-height" id="add_nama_kuis" placeholder="Nama Kuis" required>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Nama Materi</label>
            <div class="col-sm-7">
              <select class="form-control" id="nama_materi" required>
                <option value=""> Nama Materi </option>
                <option value="A"> Materi A </option>
                <option value="B"> Materi B </option>
                <option value="C"> Materi C </option>
                <option value="D"> Materi D </option>
              </select>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Tanggal Mulai</label>
            <div class="col-sm-7">
              <div class="input-group date" id="datepicker_start">
                <input type="text" class="form-control inform-height" placeholder="Tanggal Mulai" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Tanggal Selesai</label>
            <div class="col-sm-7">
              <div class="input-group date" id="datepicker_end">
                <input type="text" class="form-control inform-height" placeholder="Tanggal Selesai" required>
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-calendar"></i>
                </span>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Durasi Kuis</label>
            <div class="col-sm-7">
              <input type="text" class="form-control inform-height" id="add_durasi_kuis" placeholder="Durasi Kuis" required>
            </div>
            <div class="col-md-1"></div>
          </div>

      </div>

      <div class="modal-footer">
	      <div class="form-group">
          <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
	        <a type="submit" class="btn btn-primary btn-sm" value="save" data-toggle="modal" data-target="#modal-soal">Next</a>
	      </div>

        </form>
      </div>

    </div>
</div>

<!-- ///////////////////////////////////////////////////////////// Modal Soal ///////////////////////////////////////////////////////////// -->

  <div class="modal fade" id="modal-soal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    @include('view_admin.kuis.modal_soal_add')
  </div>