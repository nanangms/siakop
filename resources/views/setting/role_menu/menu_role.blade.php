@extends('layouts.app')

@section('title')
Menu untuk Role : {{$role->nama_role}}
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
  <x-breadchumb title="Menu untuk Role : {{$role->nama_role}}" menu1="Dashboard" link1="home" menu3="Data Role Menu"/>

  <!-- Main content -->
  <section class="content">
    <x-card judul="Data Role Menu">
      <p align="right">
        <a href="{{ route('role_menu.create') }}" class="btn btn-info modal-show" title="Tambah Role"><i class="fa fa-plus"></i> Tambah</a>
      </p>
      <table id="datatable" class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Role</th>
            <th>Menu</th>
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
  var id ='{{$id_role}}';
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ url('setting/role/menu/datatable') }}/"+id,
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama_role', name: 'nama_role'},
            {data: 'nama_menu', name: 'nama_menu'},
            {data: 'action', name: 'action'}
        ]
    });
</script>
@stop