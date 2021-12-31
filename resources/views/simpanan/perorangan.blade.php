@extends('layouts.app')

@section('title')
Simpanan Perorangan 
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
    <x-breadchumb title="Simpanan Perorangan" menu1="Dashboard" link1="home" menu3="Simpanan Perorangan"/>

    <section class="content">
        <x-card judul="Data Simpanan Perorangan">
            <table id="datatable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor / Nama Anggota</th>
                        <th>Saldo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
        </x-card>
    </section>
</div>

<x-modalxl id="ShowDETAIL" title="Detail Simpanan">
    <div class="isi"></div>
</x-modalxl>
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
        ajax: "{{ route('table.simpanan-perorangan') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama_anggota', name: 'nama_anggota'},
            {data: 'saldo', name: 'saldo'},
            {data: 'action', name: 'action'}
        ]
    });

    $("#ShowDETAIL").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');
        $.ajax({
            url: "/simpanan" +'/' + id +'/detail',
            dataType: 'html',
            success: function (response) {
                $('.isi').html(response);
            }
        });

    });
  });
</script>

@stop
