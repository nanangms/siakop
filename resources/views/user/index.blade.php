@extends('layouts.app')

@section('title')
User
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
    <x-breadchumb title="Data Pengguna" menu1="Dashboard" link1="home" menu3="Data Pengguna"/>

    <section class="content">
        <x-card judul="Data Pengguna">
            <p align="right">
                <button data-toggle="modal" data-target="#ShowTambah" class="btn btn-info" title="Tambah"><i class="fa fa-plus"></i> Tambah User</button>
            </p>
            <table id="datatable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Hak Akses</th>
                        <th>Status</th>   
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
        </x-card>
    </section>
</div>

@include('user.tambah')

<x-modallg id="ShowEDIT" title="Edit Data User">
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
    if($('#role_id').val()!='5'){
        $('#hidden_div').hide(); 
    }

    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: "{{ route('table.user') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'jml_submenu'},
            {data: 'nama_role', name: 'nama_role'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });

    $('#modal-btn-save').click(function (event) {
        event.preventDefault();

        var form = $('#modal-body form'),
            url = form.attr('action');

         form.find('.text-danger').remove();

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                form.trigger('reset');
                $('#ShowTambah').modal('hide.bs.modal');
                $('#datatable').DataTable().ajax.reload();

                swal("Berhasil", "Data Berhasil Disimpan", "success");
            },

            error: function (err) {
                if (err.status == 422){
                    console.log(err.responseJSON);

                    console.warn(err.responseJSON.errors);
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span class="text-danger">'+error[0]+'</span>'));
                    });
                }
            }
        })
    });

    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var user_name = $(this).attr('user-name'),
            title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            user_id = $(this).attr('user-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Menghapus Data : "+ title +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((result) => {
            if (result) {
                $.ajax({
                    url: "/user/"+user_id+"/delete",

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

    $("#ShowEDIT").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');

        $.ajax({
            url: "/user" +'/' + id +'/edit',
            dataType: 'html',
            success: function (response) {
                $('.isi').html(response);
            }
        });

    });
        
  });
</script>

<script type="text/javascript">
  function showKwaran(select){
    if(select.value=='5'){
      $('#hidden_div').show();
    } else{
      $('#hidden_div').hide();
    }
  } 
</script>
@stop
