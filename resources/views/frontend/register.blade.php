@extends('frontend.layout.app')
@section('title')
Home
@endsection

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mt-50">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-body">
              <h2 align="center">Registrasi Akun Anggota Koperasi</h2>
              
              <hr>

                <div class="row">
                  <div class="col-md-12">
                    <x-forms.input_h id="nik" type="text" name="nik" label="NIK" isRequired="true" value="" isReadonly="" placeholder=""/>
                    <div class="form-group row">
                      <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                      <div class="col-lg-8">
                        <button class="btn btn-primary btn-block" id="cek_nik"><i class="fa fa-search"></i> Cek</button>
                      </div>
                    </div>
                    <a href="">Belum menjadi anggota? Daftar jadi anggota sekarang, klik disini!</a>
                    <hr>
                    <div id="notfound">
                      <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle"></i> Nomor NIK Anda Belum Terdaftar sebagai Anggota Koperasi
                      </div>
                    </div>

                    <div id="form-pendaftaran">
                      <div class="alert alert-info">
                        <i class="fa fa-info"></i> Data Ditemukan. Lanjutkan Registrasi!
                      </div>

                      <form action="/register-anggota/kirim" method="POST">
                        @csrf
                        <input type="hidden" name="anggota_id" value="{{old('anggota_id')}}" id="anggota_id">
                        <x-forms.input_h id="name" type="text" name="name" label="Nama" isRequired="true" value="" isReadonly="" placeholder=""/>
                        <x-forms.input_h id="no_hp" type="text" name="no_hp" label="No. Hp" isRequired="true" value="" isReadonly="" placeholder=""/>
                        <x-forms.input_h id="email" type="email" name="email" label="Email" isRequired="true" value="" isReadonly="" placeholder=""/>
                        <x-forms.input_h id="password" type="password" name="password" label="Password" isRequired="true" value="" isReadonly="" placeholder=""/>
                        <x-forms.input_h id="konfirmasi_password" type="password" name="konfirmasi_password" label="Konfirmasi Password" isRequired="true" value="" isReadonly="" placeholder=""/>
                        <div class="form-group row">
                          <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                          <div class="col-lg-8">
                            <button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Daftar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                </div>
                

            </div>
          </div>
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('footer')
<script src="{{asset('admin/mask_plugin/dist/jquery.mask.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#nik').mask('0000000000000000');


  if($("#name").val() == ''){
    $("#form-pendaftaran").hide();
  }else{
    $("#form-pendaftaran").show();
  }
  
  $("#notfound").hide();

  $("#cek_nik").click(function(e){
    var nik = $("#nik").val();
     if(nik.length==0 ){
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "Masukan NIK",
            timer: 3000,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
      }else{
        $.ajax({
          url:"/cek-anggota/"+nik,
          success:function(data){
            $("#form-pendaftaran").slideUp(500).slideDown(500);
            $("#notfound").slideUp(500);
            $("#name").val(data.nama_lengkap);
            $("#anggota_id").val(data.id); 
          },
          error:function(){
            $("#nik").text(nik);  
            $("#notfound").slideUp(500).slideDown(500);
            $("#form-pendaftaran").slideUp(500);
          }
        });
      }
      
  });


  $('#btn-save').click(function (event) {
      event.preventDefault();
      $('#btn-save').text('Menyimpan data...'); //change button text
      $('#modal-btn-save').attr('disabled',true); //set button disable
      var form = $('#form-pendaftaran form'),
          url = form.attr('action'),
          method = 'POST';
      form.find('.text-danger').remove();
      form.find('.form-group').removeClass('has-error');
      form.find('.form-control').removeClass('is-invalid');
      $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $("#form-pendaftaran").hide();
            swal({
                icon: "success",
                title: "BERHASIL!",
                text: "Register Berhasil ",
            });
            $('#btn-save').removeAttr('disabled').text('Simpan');
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                    .closest('.form-group')
                    .addClass('has-error')
                    .append('<small class="text-danger">' + value + '</small>');

                    $('#' + key)
                    .closest('.form-control')
                    .addClass('is-invalid');
                });
                $('#btn-save').removeAttr('disabled').text('Simpan');
            }
        }
      })
  });
}); 

</script>
@endsection