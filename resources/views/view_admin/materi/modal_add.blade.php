<!-- MODAL ADD --> 

<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/jasny-bootstrap.min.css') }}">


<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <p class="modal-title">Tambah Materi</p>
      	</div>

      	<div class="modal-body">
	        <form id="formAddMateri" class="form form-horizontal" role="form" data-toggle="validator">
	        	
		        <div class="form-group">
		            <div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Pelajaran</label>
		            <div class="col-sm-8">
		              <select class="form-control" id="addPelajaran" required>
		               
		              </select>
		            </div>
		            <div class="col-md-1"></div>
		        </div>

		        <div class="form-group">
		            <div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Kelas</label>
		            <div class="col-sm-8">
		              <select class="form-control" id="addKelas" required>
		               
		              </select>
		            </div>
		            <div class="col-md-1"></div>
		        </div>

		        <div class="form-group">
		            <div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Nama Materi</label>
		            <div class="col-sm-8">
		              <input type="text" class="form-control inform-height" id="addNamaMateri" placeholder="Nama Materi" required>
		            </div>
		            <div class="col-md-1"></div>

		            <div class="col-sm-3"></div>
            		<div class="col-sm-9 help-block with-errors"></div>
		        </div>

		        <div class="form-group">
		        	<div class="col-md-1"></div>
		            <label class="col-sm-2 label-right">Isi Materi</label>
		            <div class="col-sm-8">
		            	<textarea class="form-control" rows="10" id="addIsiMateri" required></textarea>
		            </div>
		            <div class="col-md-1"></div>

		            <div class="col-sm-3"></div>
            		<div class="col-sm-9 help-block with-errors"></div>
		        </div>

		        <div class="form-group">
		        	<div class="col-md-1"></div>
		        	<label class="col-sm-2 label-right" id="addFileUpload" for="fileUpload">File Upload</label>
		        	<div class="col-sm-8">
		            <div class="fileinput fileinput-new input-group" data-provides="fileinput" type="file">
		                <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
		                <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
		                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
		              	</div>
		            </div>

		            <div class="col-sm-3"></div>
            		<div class="col-sm-9 help-block with-errors"></div>
		        </div>

		        <div class="modal-footer">
			      	<div class="form-group">
		          		<button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
			        	<a type="submit" class="btn btn-primary btn-sm" value="save" data-toggle="modal">Simpan</a>
			    	</div>
			    </div>
	        </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('public/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.fileinput').fileinput()
</script>