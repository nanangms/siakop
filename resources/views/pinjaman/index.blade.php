@extends('layouts.app')

@section('title')
Data Pinjaman
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
    <x-breadchumb title="Data Pinjaman" menu1="Dashboard" link1="home" menu3="Data Pinjaman"/>

    <section class="content">
        <x-card judul="Data Data Pinjaman">
            <p>
                <button data-toggle="modal" data-target="#ShowTambah" class="btn btn-primary" title="Tambah"><i class="fa fa-plus"></i> Tambah Pinjaman</button>
            </p>
            <table id="datatable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Pinjaman</th>
                        <th>Jenis Pinjaman</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Angsuran Pokok</th>
                        <th>Bunga</th>
                        <th>Jumlah Angsuran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
        </x-card>
    </section>
</div>

<x-modalxl id="ShowTambah" title="Tambah Pinjaman">
    <h4 align="center">Jenis Pinjaman</h4>
          <hr>
    <div class="row">

    @foreach($jenis_pinjaman as $jp)

        <div class="col-12 col-sm-6 col-md-4">
            <a href="/pinjaman/tambah/{{$jp->id}}">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$jp->nama_jenis}}</span>
                <span class="info-box-number">
                  10
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a> 
          </div>
          <!-- /.col -->
       
    @endforeach
    </div>
</x-modalxl>
@endsection
@section('footer')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>


<script>
  $(document).ready( function () {
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: "{{ route('table.pinjaman') }}",
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
