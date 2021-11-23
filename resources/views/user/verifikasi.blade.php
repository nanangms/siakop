<form action="/user/gudep/{{$user->uuid}}/verifikasi_submit" class="form-horizontal" method="post">
    @csrf
    <div class="form-group row {{$errors->has('is_active') ? ' has-error':''}}">
        <label class="label-text col-lg-3 col-form-label text-md-right">Status</label>
            <div class="col-lg-9">                                         
            <select name="is_active" class="form-control">
            <option value="">--Pilih--</option>
                <option value="Y" @if($user->is_active == 'Y') selected @endif>Aktif</option>
                <option value="N" @if($user->is_active == 'N') selected @endif>Non Aktif</option>
            </select>
            @if($errors->has('is_active'))
                <span class="help-block">{{$errors->first('is_active')}}</span>
            @endif
        </div>
    </div>

    <div class="form-group row {{$errors->has('verifikasi') ? ' has-error':''}}">
        <label class="label-text col-lg-3 col-form-label text-md-right">Verifikasi</label>
            <div class="col-lg-9">                                         
            <select name="verifikasi" class="form-control">
            <option value="">--Pilih--</option>
                <option value="Y" @if($user->verifikasi == 'Y') selected @endif>Verifikasi</option>
                <option value="N" @if($user->verifikasi == 'N') selected @endif>Ditolak</option>
            </select>
            @if($errors->has('verifikasi'))
                <span class="help-block">{{$errors->first('verifikasi')}}</span>
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