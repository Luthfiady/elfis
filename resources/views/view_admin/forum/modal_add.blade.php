<!-- MODAL ADD -->

	<div class="modal fade" id="add_div_form" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel" style="font-weight:bold">Add Modul Management</h4>
	      </div>

	      <div class="modal-body">
	        <form id="add_form" class="form form-horizontal" role="form">

	          <div class="form-group">
	            <label class="col-sm-4 control-label">Modul Code</label>
	            <div class="col-sm-6">
	              <input type="text" class="form-control" name="add_modul_code" id="add_modul_code" placeholder="Modul Code" style="height:30px;">
	              <label id="error_add_modul_code" class="error"></label>
	            </div>
	            <div class="col-sm-2">
	            	
	            </div>
	          </div>

	          <div class="form-group">
	            <label class="col-sm-4 control-label">Modul Name</label>
	            <div class="col-sm-6">
	              <input type="text" class="form-control" name="add_modul_name" id="add_modul_name" placeholder="Modul Name" style="height:30px;">
	              <label id="error_add_modul_name" class="error"></label>
	            </div>
	            <div class="col-sm-2">
	            	
	            </div>
	          </div>

	      </div>

	      <div class="modal-footer">
		      <div class="form-group">
		        <button type="submit" id="submit_add_form" name="submit_add_form" class="btn btn-danger btn-sm" value="save" data-dismiss="modal">Save</button>
		        <button type="reset" id="reset_add_form" name="reset_add_form" class="btn btn-danger btn-sm">Reset</button>
		      </div>

	        </form>
	      </div>

	    </div>
	  </div>
	</div>
