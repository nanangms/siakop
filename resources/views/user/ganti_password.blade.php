@extends('layouts.app')

@section('title')
Ganti Password
@endsection

@section('header')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-orange card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{$user->getAvatarProfil()}}" alt="User profile picture" style="object-fit: cover; position: relative; width: 100px; height: 100px; overflow: hidden;">
                </div>
                <h3 class="profile-username text-center">{{$user->name}}</h3>
                <p class="text-muted text-center">{{$user->email}}<br>
                {{$user->no_hp}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-orange card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="/profil/{{$user->uuid}}">Edit Profil</a></li>
                  <li class="nav-item"><a class="nav-link active" href="/profil/ganti-password/{{$user->uuid}}">Ganti Password</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="/profil/ganti_password" method="post">
                  @csrf
                  <div class="form-group {{$errors->has('password_lama') ? ' has-error':''}}">
                    <label class="label-text">Password Lama</label>                              
                    <input type="password" class="form-control" name="password_lama" required/>
                    @if($errors->has('password_lama'))
                        <span class="text-danger">{{$errors->first('password_lama')}}</span>
                    @endif
                  </div>

                  <div class="form-group {{$errors->has('password') ? ' has-error':''}}">
                    <label class="label-text">Password Baru</label>                              
                    <input type="password" class="form-control" name="password" required/>
                    @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                  </div>
                  
                  <div class="form-group {{$errors->has('password_baru') ? ' has-error':''}}">
                    <label class="label-text">Konfirmasi Password Baru</label>
                      <input type="password" class="form-control" name="password_baru" required/>
                      @if($errors->has('password_baru'))
                          <span class="text-danger">{{$errors->first('password_baru')}}</span>
                      @endif
                  </div>
                  <div class="form-group">                                       
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah</button>
                  </div>
                </form>

              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
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

