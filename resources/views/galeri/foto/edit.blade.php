@extends('layouts.app')
@section('title')
Edit Foto
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="/home">Home</a></li>
                      <li class="breadcrumb-item active">@yield('title')</li>
                  </ol>
              </div>
          </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="/galeri/foto/update/{{$foto->uuid}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <input type="hidden" name="nama_album" value="{{$album->nama_album}}">
                          <div class="row">
                            <div class="col-md-12">
                              <div class=" form-group row">
                                <div class="col-md-12">
                                  <label>Foto</label>
                                      <input type="file" class="form-control" name="gambar" onchange="readURL(this);" />
                                      @if($foto->gambar)
                                        <div style="overflow: hidden">
                                            <img id="preview_gambar" src="/images/foto/{{$foto->gambar}}" style="width: 200px;" />
                                        </div>
                                        @else
                                        <small style="color: red">Belum ada gambar yang diupload</small>
                                        @endif
                                  @if($errors->has('gambar'))
                                  <span class="text-danger">{{$errors->first('gambar')}}</span>
                                  @endif
                                </div>
                              </div>
                              <div class=" form-group row">
                                <div class="col-md-12">
                                  <label>Keterangan foto (opsional)</label>
                                  <input type="text" class="form-control" name="keterangan" value="{{$foto->keterangan}}" />
                                </div>
                              </div>
                              <div class=" form-group row">
                                <div class="col-md-12">
                                  <label>Publish</label><br>
                                  @if($foto->published == 'Y')
                                        <input type='radio' name='published' value='Y' required checked> Ya &nbsp; <input type='radio' name='published' value='N'> Tidak</td>
                                        @else
                                        <input type='radio' name='published' value='Y' required> Ya &nbsp; <input type='radio' name='published' value='N' checked> Tidak</td>
                                        @endif
                                </div>
                              </div>


                              <div class=" form-group row">
                                <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    </section>
</div>

@endsection
@section('footer')

<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('isi');
</script>

<script>
  function readURL(input) { // Mulai membaca inputan gambar
    if (input.files && input.files[0]) {
      var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
      reader.onload = function (e) { // Mulai pembacaan file
        $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
        .attr('src', e.target.result)
  //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
};
reader.readAsDataURL(input.files[0]);
}
}
</script>
@stop