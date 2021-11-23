<div class="modal fade" id="Tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <i class="text-danger">* Wajib diisi</i>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
          <form action="/faq/tambah" class="form-horizontal" method="POST">
            {{csrf_field()}}

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Pertanyaan<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <textarea name="pertanyaan" id="pertanyaan" class="form-control" required>{{old('pertanyaan')}}</textarea>
                    
                </div>
            </div>

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Jawaban<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <textarea name="jawaban" id="jawaban" class="form-control" required>{{old('jawaban')}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Kategori <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <select name="kategori" class="form-control" required>
                        <option value="">--Pilih Kategori--</option>
                        <option value="Umum">Umum</option>
                        <!-- <option value="Briva">Briva</option> -->
                    </select>
                    
                </div>
            </div>

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Urutan <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input type="text" name="urutan" id="urutan" value="{{old('urutan')}}" class="form-control" required>
                </div>
            </div>

            
            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                <div class="col-lg-9">
                   <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->