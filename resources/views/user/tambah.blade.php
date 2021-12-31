<x-modalsm id="ShowTambah" title="Tambah User">
    <span class="text-danger">* Wajib diisi</span>
    <hr>
    <form action="/user/tambah" class="form-horizontal" method="POST">
        @csrf
        <x-forms.input_h id="name" type="text" name="name" label="Nama Lengkap" isRequired="true" value="" isReadonly="" placeholder="Nama Lengkap"/>
        <x-forms.input_h id="email" type="email" name="email" label="E-mail" isRequired="true" value="" isReadonly="" placeholder=""/>
        <x-forms.input_h id="no_hp" type="text" name="no_hp" label="No. Hp" isRequired="false" value="" isReadonly="" placeholder=""/>
        <x-forms.input_h id="password" type="password" name="password" label="Password" isRequired="true" value="" isReadonly="" placeholder=""/>

        <div class="form-group row">
            <label class="label-text col-lg-3 col-form-label text-md-right">Hak Akses <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select name="role_id" class="form-control form-control-sm" id="role_id">
                <option value="">--Pilih--</option>
                @foreach($role as $list)
                    <option value="{{$list->id}}" {{(old('role_id') == $list->id ) ? ' selected' : ''}}>{{$list->nama_role}}</option>
                @endforeach
                   
                </select>
                @if($errors->has('role_id'))
                    <span class="text-danger">{{$errors->first('role_id')}}</span>
                @endif
            </div>
        </div>

        
        <div class="form-group row">
            <label class="label-text col-lg-3 col-form-label text-md-right">Status <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select name="is_active" class="form-control form-control-sm" id="is_active">
                    <option value="">--Pilih--</option>
                    <option value="Y" {{(old('is_active') =='Y' ) ? ' selected' : ''}}>Aktif</option>
                    <option value="N" {{(old('is_active') == 'N' ) ? ' selected' : ''}}>Non Aktif</option>
                </select>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{$errors->first('is_active')}}</span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label class="label-text col-lg-3 col-form-label text-md-right"></label>
            <div class="col-lg-8">
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </form>
</x-modalsm>