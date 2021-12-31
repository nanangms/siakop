@extends('layouts.app')

@section('title')
Simpanan
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
    <x-breadchumb title="Simpanan" menu1="Dashboard" link1="home" menu3="Simpanan"/>

    <section class="content">
        <x-card judul="Data Simpanan">
            <p>
                <a href="/simpanan/tambah" class="btn btn-primary" title="Tambah Simpanan"><i class="fa fa-plus"></i> Tambah</a>
            </p>
            <table id="datatable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Anggota / Nama</th>
                        <th>No. Transaksi</th>
                        <th>Tanggal</th>
                        <th>Jenis Transaksi</th> 
                        <th>Posisi Transaksi</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
        </x-card>
    </section>
</div>

@include('layouts._modallg')
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
        ajax: "{{ route('table.simpanan') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'no_anggota', name: 'no_anggota'},
            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'ttl', name: 'ttl'},
            {data: 'kota', name: 'kota'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });

  });
</script>

@stop
