<!-- MODAL ADD -->
	
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/kuis.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Tambah Kuis</h3>
      </div>

      <div class="modal-body">
        <form id="add_form" class="form form-horizontal" role="form">

          <div class="form-group">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <p class="nomor-soal">Soal Nomor 1</p>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Soal Kuis</label>
            <div class="col-sm-8">
              <textarea rows="3" class="form-control" placeholder="Soal"> </textarea>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban A</label>
            <div class="col-sm-8">
              <textarea rows="1" class="form-control" placeholder="Jawaban A"> </textarea>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban B</label>
            <div class="col-sm-8">
              <textarea rows="1" class="form-control" placeholder="Jawaban B"> </textarea>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban C</label>
            <div class="col-sm-8">
              <textarea rows="1" class="form-control" placeholder="Jawaban C"> </textarea>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban D</label>
            <div class="col-sm-8">
              <textarea rows="1" class="form-control" placeholder="Jawaban D"> </textarea>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban E</label>
            <div class="col-sm-8">
              <textarea rows="1" class="form-control" placeholder="Jawaban E"> </textarea>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="form-group">
            <div class="col-md-1"></div>
            <label class="col-sm-2 label-modal-soal">Jawaban</label>
            <div class="col-sm-2">
              <select class="form-control" id="jawaban_benar">
                <option value=""> Jawaban </option>
                <option value="A"> A </option>
                <option value="B"> B </option>
                <option value="C"> C </option>
                <option value="D"> D </option>
                <option value="E"> E </option>
              </select>
            </div>
            <div class="col-md-7"></div>
          </div>

      </div>

      <div class="modal-footer">
	      <div class="form-group">
          <button type="reset" id="reset_add_form" class="btn btn-primary btn-sm" style="float:left;">Reset</button>
          <a type="submit" class="btn btn-primary btn-sm" value="save" data-toggle="modal" data-target="#modal-soal">Previous</a>
	        <a type="submit" class="btn btn-primary btn-sm" value="save" data-toggle="modal" data-target="#modal-soal">Next</a>
	      </div>

        </form>
      </div>

    </div>
</div>