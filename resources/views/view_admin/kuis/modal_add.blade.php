<!-- MODAL ADD -->
	
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/kuis.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah Kuis</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form">

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Nama Ujian</label>
            <div class="col-sm-7">
              <input type="text" class="form-control inform-height" id="add_nama_ujian" placeholder="Nama Ujian">
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Materi</label>
            <div class="col-sm-7">
              <div class="input-group">
                <input type="text" class="form-control inform-height" style="height:30px;" id="add_materi" placeholder="Materi">
                <span class="input-group-addon">
                  <a href="" data-toggle="modal" data-target="#submodal_materi"><i class="glyphicon glyphicon-list"></i></a> 
                </span>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-3 label-right">Tanggal Mulai</label>
            <div class="col-sm-7">
              <div class="input-group date" id="datepicker_start">
                <input type="text" class="form-control inform-height" placeholder="Tanggal Mulai">
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
                <input type="text" class="form-control inform-height" placeholder="Tanggal Selesai">
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
              <input type="text" class="form-control inform-height" id="add_durasi_kuis" placeholder="Durasi Kuis">
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

<!-- ///////////////////////////////////////////////////////////// Sub Modal Materi ///////////////////////////////////////////////////////////// -->

  <div class="modal fade" id="submodal_materi" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    @include('view_admin.kuis.submodal_materi')
  </div>

<!-- ///////////////////////////////////////////////////////////// Sub Modal Materi ///////////////////////////////////////////////////////////// -->

  <div class="modal fade" id="modal-soal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    @include('view_admin.kuis.modal_soal')
  </div>

  