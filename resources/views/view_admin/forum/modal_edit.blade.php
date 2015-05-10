
	<!-- MODAL EDIT -->

	<div class="modal fade" id="edit_div_form" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel" style="font-weight:bold">Edit Modul Management</h4>
	      </div>

	      <div class="modal-body">
	        <form id="edit_form" class="form form-horizontal" role="form">

	          <div class="form-group">
	            <label class="col-sm-4 control-label">Modul Code</label>
	            <div class="col-sm-6">
	              <input type="text" class="form-control" name="edit_modul_code" id="edit_modul_code" placeholder="Modul Code" style="height:30px;">
	              <label id="error_edit_modul_code" class="error"></label>
	            </div>
	            <div class="col-sm-2">
	            </div>
	          </div>

	          <div class="form-group">
	            <label class="col-sm-4 control-label">Modul Name</label>
	            <div class="col-sm-6">
	              <input type="text" class="form-control" name="edit_modul_name" id="edit_modul_name" placeholder="Modul Name" style="height:30px;">
	              <label id="error_edit_modul_name" class="error"></label>
	            </div>
	            <div class="col-sm-2">
	            </div>
	          </div>

	          <div class="form-group">
	            <label class="col-sm-4 control-label">Disabled</label>
	            <div class="col-sm-6">
	              <select class="form-control" name="edit_is_disabled" id="edit_is_disabled" style="width:75px;"></select>
	              <label id="error_edit_is_disabled" class="error"></label>
	            </div>
	            <div class="col-sm-2">
	            </div>
	          </div>

	      </div>

	      <div class="modal-footer">
		      <div class="form-group">
		      	<input type="hidden" name="id" id="id" />
		        <button type="submit" id="submit_edit_form" name="submit_edit_form" class="btn btn-danger btn-sm" value="save" data-dismiss="modal">Save</button>
		        <button type="reset" id="reset_edit_form" name="reset_edit_form" class="btn btn-danger btn-sm">Reset</button>
		      </div>

	        </form>
	      </div>

	    </div>
	  </div>
	</div>
