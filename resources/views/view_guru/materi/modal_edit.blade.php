<!-- Modal Edit-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mengubah Materi</h4>
      </div>
      <div class="modal-body">
      
      <form id="editMateri" class="form form-horizontal" role="form" data-toggle="validator">
        <div class="form-group">
          <label class="col-sm-2 label-right">Pelajaran</label>
          <div class="col-sm-10">
              <select class="form-control inform-height" id="" required>
                <option value="">-Pilih Pelajaran-</option>
                <option value="modul_code">Matematika2</option>
                <option value="modul_name">Matematika3</option>
                <option value="modul_name">Matematika4</option>
              </select>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 label-right">Kelas</label>
          <div class="col-sm-10">
              <select class="form-control inform-height" id="" required>
                <option value="">-Pilih Kelas-</option>
                <option value="modul_code">2MM2</option>
                <option value="modul_name">2TKR1</option>
                <option value="modul_name">2TKR2</option>
              </select>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 label-right">Nama Materi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="" placeholder="Nama Materi" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 label-right">Isi Materi</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="10" required></textarea>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 label-right" for="fileUpload">File Upload</label>
          <input type="file" id="fileUpload">
        </div>

        <h4>Edit Soal</h4>
          <div class="form-group">
            <label class="col-sm-2 label-right">Soal</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="10" required></textarea>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 label-right">Pilihan A</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="" placeholder="" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 label-right">Pilihan B</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="" placeholder="" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 label-right">Pilihan C</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="" placeholder="" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 label-right">Pilihan D</label>
            <div class="col-sm-10">
              <input type="text" class="form-control inform-height" id="" placeholder="" required>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 label-right">Jawaban</label>
          <div class="col-sm-10">
            <div class="radio">
                <label class="col-sm-10">
                  <input type="radio" name="" id="" value="A">
                  Huruf A
                </label>
            </div>
            <div class="radio">
                <label class="col-sm-10">
                  <input type="radio" name="" id="" value="B">
                  Huruf B
                </label>
            </div>
            <div class="radio">
                <label class="col-sm-10">
                  <input type="radio" name="" id="" value="C">
                  Huruf C
                </label>
            </div>
            <div class="radio">
                <label class="col-sm-10">
                  <input type="radio" name="" id="" value="D">
                  Huruf D
                </label>
            </div>
            <div class="radio">
                <label class="col-sm-10">
                  <input type="radio" name="" id="" value="D">
                  Huruf D
                </label>
            </div>
          </div>
        </div>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" id="closeAddMateri" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="submitAddMateri" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
