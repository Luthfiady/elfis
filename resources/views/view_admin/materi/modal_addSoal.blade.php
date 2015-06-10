<!-- MODAL ADD --> 
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/apps/materi_admin.css') }}">

<div class="modal-dialog modal-width-index modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p class="modal-title">Tambah Soal</p>
        </div>

        <div class="modal-body">
          <form id="addSoal" class="form form-horizontal" role="form" data-toggle="validator">
            <div class="form-group">
              <div class="col-md-1"></div>
                <label class="col-sm-2 label-right">Soal</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="8" required></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-group">
              <div class="col-md-1"></div>
                <label class="col-sm-2 label-right">Jawaban A</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="5" required></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-group">
              <div class="col-md-1"></div>
                <label class="col-sm-2 label-right">Jawaban B</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="5" required></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-group">
              <div class="col-md-1"></div>
                <label class="col-sm-2 label-right">Jawaban C</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="5" required></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-group">
              <div class="col-md-1"></div>
                <label class="col-sm-2 label-right">Jawaban D</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="5" required></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="form-group">
              <div class="col-md-1"></div>
                <label class="col-sm-2 label-right">Jawaban E</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="5" required></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
             <div class="form-group">
              <div class="col-md-1"></div>
                <label class="col-sm-2 label-right">Jawaban Benar</label>
                <div class="col-sm-8">                  
                </div>
            </div>
            <div class="form-group">
              <div class="col-md-1"></div>
              <div class="col-md-2"></div>
              <div class="col-md-3">
                <table class="table table-soal">
                  <tr>
                    <td class="kolom-tengah">Jawaban A</td>
                    <td>
                    <label>
                <input type="radio" name="" id="" value="A">
                1
                </label>
                </td>
              </tr>
              <tr>
                    <td class="kolom-tengah">Jawaban B</td>
                    <td>
                    <label>
                <input type="radio" name="" id="" value="B">
                1
                </label>
                </td>
              </tr>
              <tr>
                    <td class="kolom-tengah">Jawaban C</td>
                    <td>
                    <label>
                <input type="radio" name="" id="" value="C">
                1
                </label>
                </td>
              </tr>
              <tr>
                    <td class="kolom-tengah">Jawaban D</td>
                    <td>
                    <label>
                <input type="radio" name="" id="" value="D">
                1
                </label>
                </td>
              </tr>
              <tr>
                    <td class="kolom-tengah">Jawaban E</td>
                    <td>
                    <label>
                <input type="radio" name="" id="" value="E">
                1
                </label>
                </td>
              </tr>
                </table>              
          </div>
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