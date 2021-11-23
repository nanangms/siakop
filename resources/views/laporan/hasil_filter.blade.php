@extends('layouts.app')

@section('title')
Laporan
@endsection
@section('header')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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
                <option value="{{$s->id}}" @if($s->id == $sektor_id ) selected @endif>{{$s->nama_sektor}}</option>
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
                <option value="{{$k->id}}" @if($k->id == $kab_kota_id ) selected @endif>{{$k->nama_kab_kota}}</option>
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
        <hr>
        <form class="form-horizontal" method="GET" action="{{ url('/laporan/export-to-excel') }}">
          <input type="hidden" name="sektor_id" value="{{$sektor_id}}">
          <input type="hidden" name="kab_kota_id" value="{{$kab_kota_id}}">
          <button type="submit" class="btn btn-success waves-effect waves-light"><i class="fa fa-glass"></i> Export to Excel</button>
          <!-- <a href="/laporan/export-to-excel/{{$sektor_id}}/{{$kab_kota_id}}" target="_blank" class="btn btn-success"><i class="fa fa-file-excel"></i> Export to Excel</a> -->
        </form>
        <hr>
        <table id="table_id" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Usaha</th>
              <th>Sektor</th>
              <th>Badan Hukum</th>
              <th>Kota/Kab.</th>
              <th>Pemilik Usaha</th>
              <th>Status Member</th>

            </tr>
          </thead>
          <tbody>
            <?php $no = 0; ?>
            @foreach ($hasil as $list)
            <?php $no++ ; ?>
            <tr>
              <td>{{$no}}</td>
              <td>{{$list->nama_usaha}}</td>
              <td>{{$list->nama_sektor}}</td>
              <td>{{$list->nama_badan_hukum}}</td>
              <td>{{$list->nama_kab_kota}}</td>
              <td>{{$list->nama_pemilik}}</td>
              <td>{{$list->member}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
  $(document).ready(function(){
    //Tabel
    $('#table_id').DataTable();
  });
</script>

@stop