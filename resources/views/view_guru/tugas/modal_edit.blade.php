<!-- MODAL ADD --> 
	
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/tugas.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/jasny-bootstrap.min.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Ubah Tugas</p>
      </div>

      <form method="post" target="target_submit" class="form form-horizontal" enctype="multipart/form-data" action="{{ URL::to('guru/tugas_edit') }}" data-toggle="validator">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <input type="text" id="edit_id_tugas" name="id_tugas" style="display:none;" />
      <div class="modal-body">
        
          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Tugas</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height" name="edit_nama_tugas" id="edit_nama_tugas" placeholder="Nama Tugas" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Materi</label>
            <div class="col-sm-8">
              <select class="form-control" name="edit_id_materi" id="edit_id_materi" required>

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
              <textarea rows="3" class="form-control inform-height" name="edit_isi" id="edit_isi" placeholder="Uraian Tugas" required></textarea>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Tugas Mulai</label>
            <div class="col-sm-8">
              <div class="input-group date" id="datepicker_start_edit">
                <input type="text" name="edit_tanggal_mulai" id="edit_tanggal_mulai" class="form-control inform-height" placeholder="Tanggal Mulai" required>
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
              <div class="input-group date" id="datepicker_end_edit">
                <input type="text" name="edit_tanggal_selesai" id="edit_tanggal_selesai" class="form-control inform-height" placeholder="Tanggal Selesai" required>
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
              <div class="input-group date" id="time_durasi_edit">
                <input type="text" name="edit_durasi" id="edit_durasi" class="form-control inform-height" placeholder="Durasi Tugas" required>
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
            <label class="col-sm-2 ">File Lama</label>
            <div class="col-sm-8">
              <input type="text" protected id="edit_file_tugas" name="edit_file_tugas_lama" class="form-control inform-height" style="border: 0; "/>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">File Baru</label>
            <div class="col-sm-8">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="edit_file_tugas"></span>
                <span class="fileinput-filename"></span>
                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
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
	        <button type="submit" class="btn btn-primary btn-sm" onclick="AddDataTugas()" >Simpan Ubah</button>
          <iframe id="target_submit" name="target_submit" style="width:100px; display:none; height:100px;"></iframe>
	      </div>

        </form>
      </div>

    </div>
</div>

<script type="text/javascript" src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.fileinput').fileinput()
</script>