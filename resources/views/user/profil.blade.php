@extends('layouts.app')

@section('title')
Profil User
@endsection

@section('header')

@endsection

@section('content')
<div class="content-wrapper">
  <x-breadchumb title="Profil"/>
    
    <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-danger card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{$user->getAvatarProfil()}}" alt="User profile picture" style="object-fit: cover; position: relative; width: 100px; height: 100px; overflow: hidden;">
              </div>
              <h3 class="profile-username text-center">{{$user->name}}</h3>
              <p class="text-muted text-center">{{$user->email}}<br>
              {{$user->no_hp}}</p>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <x-card judul="Edit Profil">
            <form action="/profil/{{$user->uuid}}/update" class="form-horizontal" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <x-forms.input_h id="" type="text" name="name" label="Nama Lengkap" isRequired="true" value="{{$user->name}}"/>
              <x-forms.input_h id="" type="email" name="email" label="E-mail" isRequired="true" value="{{$user->email}}"/> 
              <x-forms.input_h id="" type="text" name="no_hp" label="No. Hp" isRequired="false" value="{{$user->no_hp}}"/>

              <div class="form-group row {{$errors->has('photo') ? ' has-error':''}}">
                <label class="label-text col-lg-3 col-form-label text-md-right">Foto Profil</label>
                <div class="col-lg-9">
                    <input type="file" class="form-control" name="photo"/>
                    <span class="text-info">Max Size : 5mb</span>
                    @if($errors->has('photo'))
                        <span class="text-danger">{{$errors->first('photo')}}</span>
                    @endif
                </div>
              </div>
              
              <div class="form-group row">
                  <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                  <div class="col-lg-9">                                            
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                  </div>
              </div>
              
            </form>
          </x-card>
          
          <x-card judul="Ganti Password">
            <form action="/profil/ganti_password" method="post">
              @csrf
              <x-forms.input_h id="" type="password" name="password_lama" label="Password Lama" isRequired="false" value=""/>
              <x-forms.input_h id="" type="password" name="password" label="Password Baru" isRequired="false" value=""/>
              <x-forms.input_h id="" type="password" name="password_baru" label="Konfirmasi Password Baru" isRequired="false" value=""/>

              <div class="form-group row">
                <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                <div class="col-lg-9">                                            
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah</button>
                </div>
              </div>

            </form>
          </x-card>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
@section('footer')

    
@stop

