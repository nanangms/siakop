{!! Form::model($model, [
    'route' => $model->exists ? ['anggota-koperasi.update', $model->uuid] : 'anggota-koperasi.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>No. Anggota <small style="color: red;">*</small></label>
            <input type="text" name="no_anggota" id="no_anggota" class="form-control form-control-sm" placeholder="No. Anggota" value="@if($model->no_anggota == null){{$format}}@else{{str_pad($model->no_anggota,3,'0',STR_PAD_LEFT)}}@endif" readonly>
        </div>
        <div class="form-group">
            <label>Nama Lengkap <small style="color: red;">*</small></label>
            {!! Form::text('nama_lengkap', null, ['class' => 'form-control form-control-sm', 'id' => 'nama_lengkap','placeholder' =>'Nama Lengkap']) !!}
        </div>
        <div class="form-group">
            <label>Jenis Kelamin <small style="color: red;">*</small></label>
            <select name="jenis_kelamin" class="form-control form-control-sm" id="jenis_kelamin">
                <option value="">[Pilih]</option>
                <option value="Laki-laki" @if($model->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                <option value="Perempuan" @if($model->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir <small style="color: red;">*</small></label>
                    {!! Form::text('t4_lahir', null, ['class' => 'form-control form-control-sm', 'id' => 't4_lahir','placeholder' =>'Tempat Lahir']) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Lahir <small style="color: red;">*</small></label>
                    {!! Form::date('tgl_lahir', null, ['class' => 'form-control form-control-sm', 'id' => 'tgl_lahir','placeholder' =>'Tanggal Lahir']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Agama <small style="color: red;">*</small></label>
            <select name="agama_id" class="form-control form-control-sm" id="agama_id">
                <option value="">[Pilih]</option>
                @foreach($agama as $a)
                <option value="{{$a->id}}" @if($model->agama_id == $a->id) selected @endif>{{$a->nama_agama}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Status <small style="color: red;">*</small></label>
            <select name="status" class="form-control form-control-sm" id="status">
                <option value="">[Pilih]</option>
                <option value="AKTIF" @if($model->status == 'AKTIF') selected @endif>AKTIF</option>
                <option value="TIDAK AKTIF" @if($model->status == 'TIDAK AKTIF') selected @endif>TIDAK AKTIF</option>
            </select>
        </div>
   </div> 

   <div class="col-md-6">
        <div class="form-group">
            <label>Kota <small style="color: red;">*</small></label>
            {!! Form::text('kota', null, ['class' => 'form-control form-control-sm', 'id' => 'kota','placeholder' =>'Kota']) !!}
        </div>
       <div class="form-group">
            <label>Alamat</label>
            {!! Form::text('alamat', null, ['class' => 'form-control form-control-sm', 'id' => 'alamat','placeholder' =>'Alamat']) !!}
        </div>
        <div class="form-group">
            <label>Kode Pos</label>
            {!! Form::text('kode_pos', null, ['class' => 'form-control form-control-sm', 'id' => 'kode_pos','placeholder' =>'Kode Pos']) !!}
        </div>
        <div class="form-group">
            <label>No. Telp/No.HP </label>
            {!! Form::text('no_hp', null, ['class' => 'form-control form-control-sm', 'id' => 'no_hp','placeholder' =>'No. Hp']) !!}
        </div>
        <div class="form-group">
            <label>Catatan/Keterangan</label>
            {!! Form::textarea('keterangan', null, ['class' => 'form-control form-control-sm', 'id' => 'keterangan','placeholder' =>'Keterangan','rows' => '3']) !!}
        </div>
        
   </div> 
</div>


{!! Form::close() !!}