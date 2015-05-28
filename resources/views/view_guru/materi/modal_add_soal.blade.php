<!-- Modal Add-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Menambahkan Soal</h4>
      </div>
      <div class="modal-body">
      
      <form id="addSoalMateri" class="form form-horizontal" role="form" data-toggle="validator">
        <fieldset class="scheduler-border">
        <legend class="scheduler-border">Soal</legend>
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
        </fieldset>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" id="closeAddSoalMateri" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="saveAddSoalMateri" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>

<!-- ///////////////////////////////////////////////////////////// Modal Add Soal ///////////////////////////////////////////////////////////// -->

  <div class="modal fade" id="addSoalMateri" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    @include('view_guru.materi.modal_add_soal')
  </div>