@extends('layouts.app')

@section('title')
Sub Menu : {{$menu->nama_menu}}
@endsection
@section('header')
<!-- DataTables -->
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="content-wrapper">
    <x-breadchumb title="Sub Menu dari Menu : {{$menu->nama_menu}}" menu1="Dashboard" link1="home" menu2="Menu" link2="setting/menu" menu3="Sub Menu"/>

  <!-- Main content -->
    <section class="content">
        <x-card judul="Data Sub Menu">
            <p align="right">
                <button data-toggle="modal" data-target="#ShowTambah" class="btn btn-info" title="Tambah"><i class="fa fa-plus"></i> Tambah Sub Menu</button>
            </p>
            <table id="datatable" class="table table-bordered table-hover table-striped" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sub Menu</th>
                        <th>Urutan</th>
                        <th>Url</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
        </x-card>
    </section>
</div>

<x-modalsm id="ShowTambah" title="Tambah Sub Menu">
    <form action="/setting/submenu/tambah" method="post">
        @csrf
        <input type="hidden" name="id_menu" value="{{$id_menu}}" class="form-control">
        <x-forms.input_v id="nama_menu" type="text" name="nama_menu" label="Nama Sub Menu" isRequired="true" value="" isReadonly=""/>
        <x-forms.input_v id="url" type="text" name="url" label="URL" isRequired="true" value="" isReadonly=""/>
        <x-forms.input_v id="icon" type="text" name="icon" label="Icon" isRequired="true" value="" isReadonly=""/>
        <x-forms.input_v id="urutan" type="number" name="urutan" label="Urutan" isRequired="true" value="" isReadonly=""/>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> SIMPAN</button>

        </div>
    </form>
</x-modalsm>      

<x-modalsm id="ShowEDIT" title="Edit Data Sub Menu">
    <div class="isi"></div>
</x-modalsm>


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
    var id ='{{$id_menu}}';
    $(document).ready( function () {

    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ url('setting/submenu/datatable') }}/"+id,
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama_menu', name: 'nama_menu'},
            {data: 'urutan', name: 'urutan'},
            {data: 'url', name: 'url'},
            {data: 'action', name: 'action'}
        ]
    });
    //Edit
    $("#ShowEDIT").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');
        $.ajax({
            url: "/setting" +'/submenu/edit/'+id,
            dataType: 'html',
            success: function (response) {
                $('.isi').html(response);
            }
        });

    });
    //Hapus
    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var submenu_name = $(this).attr('submenu-name'),
            title = submenu_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            submenu_id = $(this).attr('submenu-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Menghapus Data : "+ title +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "/setting/submenu/"+submenu_id+"/delete",

                    success: function (response) {
                        $('#datatable').DataTable().ajax.reload();
                        swal({
                            type: "success",
                            icon: "success",
                            title: "BERHASIL!",
                            text: "Data Submenu Berhasil Dihapus",
                            timer: 1500,
                            showConfirmButton: false,
                            showCancelButton: false,
                            buttons: false,
                        });
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
