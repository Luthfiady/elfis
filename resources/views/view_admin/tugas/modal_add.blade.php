<!-- MODAL ADD --> 
	
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/tugas.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/jasny-bootstrap.min.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah Tugas</p>
      </div>

      <form method="post" target="target_submit" class="form form-horizontal" enctype="multipart/form-data" action="{{ URL::to('admin/tugas_add') }}" data-toggle="validator">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="modal-body">
          
            <div class="form-group">
              <div class="col-sm-1"></div>
              <label class="col-sm-2 ">Nama Tugas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control inform-height input-tugas" name="add_nama_tugas" id="add_nama_tugas" placeholder="Nama Tugas" required>
              </div>
              <div class="col-sm-1"></div>

              <div class="col-sm-3"></div>
              <div class="col-sm-9 help-block with-errors"></div>
            </div>

            <div class="form-group">
              <div class="col-sm-1"></div>
              <label class="col-sm-2 ">Nama Materi</label>
              <div class="col-sm-8">
                <select class="form-control input-tugas" name="add_nama_materi" id="add_nama_materi" required>

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
                <textarea rows="3" class="form-control inform-height input-tugas" name="add_isi" id="add_isi" placeholder="Uraian Tugas" required></textarea>
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
                  <input type="text" name="add_tugas_mulai" id="add_tugas_mulai" class="form-control inform-height input-tugas" placeholder="Tanggal Mulai" required>
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
                  <input type="text" name="add_tugas_selesai" id="add_tugas_selesai" class="form-control inform-height input-tugas" placeholder="Tanggal Selesai" required>
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
                  <input type="text" name="add_tugas_durasi" id="add_tugas_durasi" class="form-control inform-height input-tugas" placeholder="Durasi Tugas" required>
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
                <div class="fileinput fileinput-new input-group" data-provides="fileinput" type="file">
                  <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                    <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="add_file_tugas"></span>
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
              </div>
              <div class="col-sm-1"></div>

              <div class="col-sm-3"></div>
              <div class="col-sm-9 help-block with-errors"></div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
            <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
  	        <button type="submit" class="btn btn-primary btn-sm" onclick="AddDataTugas()" value="save">Simpan</button>
            <iframe id="target_submit" name="target_submit" style="width:100px; display:none; height:100px; position:relative;"></iframe>
  	           
        </div>

      </form>

    </div>
</div>

<script type="text/javascript" src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.fileinput').fileinput()

  $('#modalElement').data('modal',null);
</script>