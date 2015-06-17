<!-- Modal Delete-->
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Hapus Tugas</h4>
    </div>
    <div class="modal-body">      
    <form id="deleteTugas" class="form form-horizontal" role="form" data-toggle="validator">
      <div class="modal-body">
        <input type="text" id="hapus_id_tugas" name="hapus_id_tugas" style="display:none;" />
        <p id="hapus_nama_tugas"></p>
        <label class="control-label" for="idproses">Apakah Anda yakin akan menghapus Tugas ini?</label>

      </div>
    </form>
    <div class="modal-footer">
      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tidak</button>
      <button class="btn btn-success" data-dismiss="modal" onclick="deleteData()" type="submit">Ya</button>
    </div>
    </div>
  </div>
</div>