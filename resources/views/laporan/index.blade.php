@extends('layouts.app')

@section('title')
Laporan
@endsection
@section('header')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Laporan</li>
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
        <h3 class="card-title">Laporan</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>

        </div>
      </div>
      <div class="card-body">
        <form class="form-horizontal" method="post" action="/laporan/hasil">
          @csrf
          <div class="form-group row">
            <span class="label-text col-lg-3 col-form-label text-md-right">Sektor</span>
            <div class="col-lg-3">
              <select name="sektor_id" class="form-control" id="sektor">
                <option value="">[Pilihan]</option>
                @foreach($sektor as $s)
                <option value="{{$s->id}}">{{$s->nama_sektor}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <span class="label-text col-lg-3 col-form-label text-md-right">Wilayah (Kabupaten/Kota) Tempat Usaha </span>
            <div class="col-lg-3">
              <select name="kab_kota_id" class="form-control" id="kab_kota">
                <option value="">[Pilihan]</option>
                @foreach($kab as $k)
                <option value="{{$k->id}}">{{$k->nama_kab_kota}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <span class="label-text col-lg-3 col-form-label text-md-right"></span>
            <div class="col-lg-3">
              <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-glass"></i> Tampilkan</button>
            </div>
          </div>
        </form>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script>
  $(document).ready(function(){
    //Tabel
    $('#table_id').DataTable();
  });
</script>
@stop