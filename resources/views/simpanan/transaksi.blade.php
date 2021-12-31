@extends('layouts.app')

@section('title')
Transaksi Simpanan
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
    <x-breadchumb title="Transaksi Simpanan" menu1="Dashboard" link1="home" menu3="Transaksi Simpanan"/>

    <section class="content">
        <x-card judul="Data Transaksi Simpanan">
            <!-- <p>
                <a href="/simpanan/tambah" class="btn btn-primary" title="Tambah Transaksi Simpanan"><i class="fa fa-plus"></i> Tambah</a>
            </p> -->
            <table id="datatable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Anggota / Nama</th>
                        <th>No. Transaksi</th>
                        <th>Tanggal</th>
                        <th>Jenis Transaksi</th> 
                        <th>Jenis Simpanan</th>
                        <th>Jumlah</th>
                        <th>User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
        </x-card>
    </section>
</div>

<x-modallg id="ShowEDIT" title="Edit Data Transaksi Simpanan">
    <div class="isi"></div>
</x-modallg>
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
            {data: 'nama_anggota', name: 'nama_anggota'},
            {data: 'no_transaksi', name: 'no_transaksi'},
            {data: 'tgl_transaksi', name: 'tgl_transaksi'},
            {data: 'jenis_transaksi', name: 'jenis_transaksi'},
            {data: 'jenissimpanan', name: 'jenissimpanan'},
            {data: 'jumlah', name: 'jumlah',className: "text-right"},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action'}
        ]
    });

    $("#ShowEDIT").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');

        $.ajax({
            url: "/simpanan" +'/' + id +'/edit',
            dataType: 'html',
            success: function (response) {
                $('.isi').html(response);
            }
        });

    });

    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var data_name = $(this).attr('data-name'),
            title = data_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            data_id = $(this).attr('data-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Membatalkan Transaksi : "+ title +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((result) => {
            if (result) {
                $.ajax({
                    url: "/simpanan/"+data_id+"/delete",

                    success: function (response) {
                        $('#datatable').DataTable().ajax.reload();
                        swal("Berhasil", "Data Berhasil Dihapus", "success");
                    },
                    error: function (xhr) {
                        swal("Oops...", "Terjadi Kesalahan", "error");
                        
                    }
                });
            }
        });
    });

  });
</script>

@stop
