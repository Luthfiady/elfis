<!-- MODAL ADD -->

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title">Tambah Latihan</p>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form" data-toggle="validator">

          <div class="form-group">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <p class="nomor-soal">Soal</p>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Soal Latihan</label>
            <div class="col-sm-8">
              <textarea id="soal_latihan" rows="3" class="form-control" placeholder="Soal" required></textarea>
            </div>
            <div class="col-md-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban A</label>
            <div class="col-sm-8">
              <textarea id="jwb_a" rows="1" class="form-control" placeholder="Jawaban A" required></textarea>
            </div>
            <div class="col-md-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban B</label>
            <div class="col-sm-8">
              <textarea id="jwb_b" rows="1" class="form-control" placeholder="Jawaban B" required></textarea>
            </div>
            <div class="col-md-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban C</label>
            <div class="col-sm-8">
              <textarea id="jwb_c" rows="1" class="form-control" placeholder="Jawaban C" required></textarea>
            </div>
            <div class="col-md-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban D</label>
            <div class="col-sm-8">
              <textarea id="jwb_d" rows="1" class="form-control" placeholder="Jawaban D" required></textarea>
            </div>
            <div class="col-md-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban E</label>
            <div class="col-sm-8">
              <textarea id="jwb_e" rows="1" class="form-control" placeholder="Jawaban E" required></textarea>
            </div>
            <div class="col-md-1"></div>

            <div class="col-sm-3"></div>
            <div class="col-sm-9 help-block with-errors"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban</label>
            <div class="col-sm-2">
              <select class="form-control" id="jawaban" required>
                <option value=""> Jawaban </option>
                <option value="A"> A </option>
                <option value="B"> B </option>
                <option value="C"> C </option>
                <option value="D"> D </option>
                <option value="E"> E </option>
              </select>
            </div>
            <div class="col-md-7 help-block with-errors"></div>
          </div>

      </div>

      <div class="modal-footer">
        <div class="form-group">
          <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm">Reset</button>
          <button type="submit" id="simpan_soal" class="btn btn-primary btn-sm" value="save">Simpan</button>
<!--           <button type="submit" id="btn_hide_soal" class="btn btn-primary btn-sm" style="display:none;">hide</button> -->
        </div>

        </form>
      </div>

    </div>
</div>

