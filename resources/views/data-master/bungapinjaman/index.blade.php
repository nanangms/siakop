@extends('layouts.app')

@section('title')
Bunga Pinjaman
@endsection
@section('header')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="content-wrapper">
  <x-breadchumb title="Data Bunga Pinjaman" menu1="Dashboard" link1="home" menu3="Data Bunga Pinjaman"/>

  <section class="content">
    <x-card judul="Data Bunga Pinjaman">
      <p align="right">
        <a href="{{ route('bungapinjaman.create') }}" class="btn btn-info modal-show" title="Tambah Bunga Pinjaman"><i class="fa fa-plus"></i> Tambah</a>
      </p>
      <table id="datatable" class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Jangka Waktu (bulan)</th>
            <th>Nilai Bunga (%)</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
       
        </tbody>
      </table>
    </x-card>
  </section>
</div>

@include('layouts._modal')
@endsection
@section('footer')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{ asset('crud/app.js') }}"></script>

<script>
	$(document).ready( function () {
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: "{{ route('table.bungapinjaman') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'id'},
          {data: 'jangka_waktu'},
          {data: 'nilai_bunga'},
          {data: 'action', name: 'action'}
        ]
    });
  });
</script>
    
@stop

