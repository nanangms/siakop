@extends('layouts.app')

@section('title')
Jenis Simpanan
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
  <x-breadchumb title="Data Jenis Simpanan" menu1="Dashboard" link1="home" menu3="Data Jenis Simpanan"/>

  <section class="content">
    <x-card judul="Data Jenis Simpanan">
      <p align="right">
        <a href="{{ route('jenissimpanan.create') }}" class="btn btn-info modal-show" title="Tambah Jenis Simpanan"><i class="fa fa-plus"></i> Tambah</a>
      </p>
      <table id="datatable" class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Jenis</th>
            <th>Nama Jenis Simpanan</th>
            <th>Posisi</th>
            <th>Rekening</th>
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
        ajax: "{{ route('table.jenissimpanan') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'kode_jenis'},
            {data: 'nama_jenis'},
            {data: 'posisi'},
            {data: 'rekening_id'},
            {data: 'action', name: 'action'}
        ]
    });
    });
</script>
    
@stop

