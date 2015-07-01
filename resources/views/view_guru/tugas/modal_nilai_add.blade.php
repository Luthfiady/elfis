<!-- MODAL ADD --> 
	
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/tugas.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah Nilai</p>
      </div>

      <form method="post" target="target_submit" class="form form-horizontal" enctype="multipart/form-data" action="{{ URL::to('guru/nilai_tugas') }}" data-toggle="validator">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <div class="modal-body">

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Tugas</label>
            <div class="col-sm-8">
              <select class="form-control input-nilai-tugas" id="add_nama_tugas" name="add_nama_tugas" required>
              </select>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">NIS</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height input-nilai-tugas" id="add_nis" name="add_nis" placeholder="Nomer Induk Siswa" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nilai Tugas</label>
            <div class="col-sm-8">
              <input type="text" class="form-control inform-height input-nilai-tugas" id="add_nilaiTugas" name="add_nilaiTugas" placeholder="Nilai Tugas" required>
            </div>
            <div class="col-sm-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

      <div class="modal-footer">
            <a type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</a>
            <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
            <button type="submit" class="btn btn-primary btn-sm" onclick="AddDataNilaiTugas()" value="save">Simpan</button>
            <iframe id="target_submit" name="target_submit" style="width:100px; display:none; height:100px; position:relative;"></iframe>
               
        </div>

        </form>
      </div>

    </div>
</div>

<script type="text/javascript" src="{{ asset('public/js/apps/tugas_nilai.js') }}"></script>