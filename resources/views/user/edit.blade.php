<div class="row">
  <div class="col-md-12 col-sm-6">
    <div class="card card-danger card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="profil-tab" data-toggle="pill" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Profil</a>
          </li>
          @if(auth()->user()->role->nama_role == "Super Admin")
          <li class="nav-item">
            <a class="nav-link" id="ganti-password-tab" data-toggle="pill" href="#ganti-password" role="tab" aria-controls="ganti-password" aria-selected="false">Ganti Password</a>
          </li>
            @endif
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
            <form action="/user/{{$user->uuid}}/update" class="form-horizontal" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <x-forms.input_h id="name" type="text" name="name" label="Nama Lengkap" isRequired="true" value="{{$user->name}}"/>
            <x-forms.input_h id="email" type="email" name="email" label="E-mail" isRequired="true" value="{{$user->email}}"/>
            <x-forms.input_h id="no_hp" type="text" name="no_hp" label="No. Hp" isRequired="false" value="{{$user->no_hp}}"/>

            <div class="form-group row {{$errors->has('role_id') ? ' has-error':''}}">
                <label class="label-text col-lg-3 col-form-label text-md-right">Hak Akses <span class="text-danger">*</span></label>
                <div class="col-lg-9">  
                    <select name="role_id" class="form-control form-control-sm">
                    <option value="">--Pilih--</option>
                    @foreach($role as $list)
                    <option value="{{$list->id}}" @if($user->role_id == $list->id) selected @endif>{{$list->nama_role}}</option>
                    @endforeach
                    </select>
                    @if($errors->has('role_id'))
                        <span class="help-block">{{$errors->first('role_id')}}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row {{$errors->has('is_active') ? ' has-error':''}}">
                <label class="label-text col-lg-3 col-form-label text-md-right">Status <span class="text-danger">*</span></label>
                    <div class="col-lg-9">                                         
                    <select name="is_active" class="form-control form-control-sm">
                    <option value="">--Pilih--</option>
                        <option value="Y" @if($user->is_active == 'Y') selected @endif>Aktif</option>
                        <option value="N" @if($user->is_active == 'N') selected @endif>Non Aktif</option>
                    </select>
                    @if($errors->has('is_active'))
                        <span class="help-block">{{$errors->first('is_active')}}</span>
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
          </div>
          <div class="tab-pane fade" id="ganti-password" role="tabpanel" aria-labelledby="ganti-password-tab">
            @if(auth()->user()->role->nama_role == "Super Admin")
            <form action="/user/{{$user->uuid}}/ganti_password" method="post">
                    {{csrf_field()}}
                    <x-forms.input_h id="password" type="text" name="password" label="Password Baru" isRequired="false" value=""/>
                    <x-forms.input_h id="password" type="text" name="password_baru" label="Konfirmasi Password Baru" isRequired="false" value=""/>

                    <div class="form-group row">
                        <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                        <div class="col-lg-9"> 
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ubah</button>
                        </div>
                    </div>
            </form>
            @endif
          </div>
          
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>