<!-- MODAL ADD --> 
	
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/tugas.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/jasny-bootstrap.min.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Unggah Jawaban Tugas</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form">

          <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 ">Nama Tugas</label>
            <div class="col-sm-8">
              <select class="form-control" id="nama_tugas" required>
                <option value=""> Nama Tugas </option>
                <option value="A"> Tugas A </option>
                <option value="B"> Tugas B </option>
                <option value="C"> Tugas C </option>
                <option value="D"> Tugas D </option>
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
              <input type="text" class="form-control inform-height" id="add_nis" placeholder="Nomer Induk Siswa" required>
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
                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
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

<script type="text/javascript" src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.fileinput').fileinput()
</script>