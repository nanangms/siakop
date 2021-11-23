@extends('layouts.app')

@section('title')
Edit FAQ
@endsection
@section('header')
<!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">

@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>@yield('title')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <form action="/faq/{{$faq->uuid}}/update" class="form-horizontal" method="POST">
            {{csrf_field()}}

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Pertanyaan<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <textarea name="pertanyaan" id="pertanyaan" class="form-control" required>{{$faq->pertanyaan}}</textarea>
                    
                </div>
            </div>

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Jawaban<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <textarea name="jawaban" id="jawaban" class="form-control" required>{{$faq->jawaban}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Kategori <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <select name="kategori" class="form-control" required>
                        <option value="">--Pilih Kategori--</option>
                        <option value="Umum" @if($faq->kategori == 'Umum') selected @endif>Umum</option>
                        <!-- <option value="Briva">Briva</option> -->
                    </select>
                    
                </div>
            </div>

            <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right">Urutan <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input type="text" name="urutan" id="urutan" value="{{$faq->urutan}}" class="form-control" required>
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
    </div>
  </section>
</div>


@endsection
@section('footer')

<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(document).ready(function(){
    $('#jawaban').summernote()
});
</script>

    
@stop