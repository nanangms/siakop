@extends('layouts.app')

@section('title')
Data User Anggota Koperasi
@endsection

@section('header')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <x-breadchumb title="Data User Anggota Koperasi" menu1="Dashboard" link1="home" menu3="Data User Anggota Koperasi"/>

  <section class="content">
    <x-card judul="Data User Anggota Koperasi">
      <table id="datatable" class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Status Aktif</th>
            <th>Verifikasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
      
        </tbody>
      </table>
    </x-card>
  </section>
</div>
<x-modalsm id="ShowVerivikasi" title="Status User Anggota">
    <div class="isi"></div>
</x-modalsm>

<x-modalsm id="ShowDetail" title="Detail User Anggota">
    <div class="isi_detail"></div>
</x-modalsm>
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
        ajax: "{{ route('table.user_anggota') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'no_hp', name: 'no_hp'},
            {data: 'status', name: 'status'},
            {data: 'verifikasi', name: 'verifikasi'},
            {data: 'action', name: 'action'}
        ]
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

  $("#ShowVerivikasi").on("show.bs.modal", function(e) {
    var id = $(e.relatedTarget).data('target-id');

    $.ajax({
        url: "/user/anggota" +'/' + id +'/verifikasi',
        dataType: 'html',
        success: function (response) {
            $('.isi').html(response);
        }
    });
  });

  $("#ShowDetail").on("show.bs.modal", function(e) {
    var id = $(e.relatedTarget).data('target-id');
    $.ajax({
        url: "/user/anggota" +'/' + id +'/detail',
        dataType: 'html',
        success: function (response) {
            $('.isi_detail').html(response);
        }
    });
  });
        
  });
</script>
@stop