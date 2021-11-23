@extends('layouts.app')

@section('title')
Tanya Jawab
@endsection
@section('header')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Tanya Jawab</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Tanya Jawab</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Tanya Jawab</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <p align="right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah"><i class="fa fa-plus"></i> Tambah Data</button>
        </p>
        <hr>
        <table id="table_id" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Kategori</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
           
            </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
@include('faq.tambah')

<!-- MODAL EDIT  -->      
<div class="modal fade" id="ShowEDIT">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Tanya Jawab</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <div class="isi"></div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL Detail  -->      
<div class="modal fade" id="ShowDetail">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Data Konfirmasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <div class="isi"></div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('#jawaban').summernote()
    //Tabel
    $('#table_id').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        paging: true,
        autoWidth: false,
        ajax: "{{ route('table.faq') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'pertanyaan'},
            {data: 'jawaban'},
            {data: 'kategori'},
            {data: 'urutan'},
            {data: 'action'}
        ]
    });

    //Hapus
    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var faq_name = $(this).attr('faq-name'),
            title = faq_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            faq_id = $(this).attr('faq-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Menghapus Data : "+ title +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "/faq/"+faq_id+"/delete",

                    success: function (response) {
                        $('#table_id').DataTable().ajax.reload();
                        swal({
                            type: "success",
                            icon: "success",
                            title: "BERHASIL!",
                            text: "Data Berhasil Dihapus",
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

    //Edit
    $("#ShowEDIT").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');
        $.ajax({
            url: "/faq" +'/' + id +'/edit',
            dataType: 'html',
            success: function (response) {
                $('.isi').html(response);
            }
        });

    });

    //Detail
    $("#ShowDetail").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');
        $.ajax({
            url: "/data-sosial" +'/' + id +'/detail',
            dataType: 'html',
            success: function (response) {
                $('.isi').html(response);
            }
        });

    });
    //Foto Lainnya
    $("#tambah-foto").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');
        $.ajax({
            url: "/data-sosial" +'/' + id +'/foto-lainnya',
            dataType: 'html',
            success: function (response) {
                $('.isi2').html(response);
            }
        });

    });
});   
</script>

    
@stop