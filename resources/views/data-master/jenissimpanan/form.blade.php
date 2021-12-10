{!! Form::model($model, [
    'route' => $model->exists ? ['jenissimpanan.update', $model->uuid] : 'jenissimpanan.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
<div class="form-group">
    <label>Kode Jenis <small style="color: red;">*</small></label>
    {!! Form::text('kode_jenis', null, ['class' => 'form-control form-control-sm', 'id' => 'kode_jenis','placeholder' =>'Kode Jenis Simpanan']) !!}
</div>
<div class="form-group">
    <label>Nama Jenis Simpanan <small style="color: red;">*</small></label>
    {!! Form::text('nama_jenis', null, ['class' => 'form-control form-control-sm', 'id' => 'nama_jenis','placeholder' =>'Nama Jenis Simpanan']) !!}
</div>
<div class="form-group">
    <label>Posisi <small style="color: red;">*</small></label>
    {!! Form::text('posisi', null, ['class' => 'form-control form-control-sm', 'id' => 'posisi','placeholder' =>'D/K']) !!}
</div>
<div class="form-group">
    <label>Rekening <small style="color: red;">*</small></label>
    {!! Form::text('rekening_id', null, ['class' => 'form-control form-control-sm', 'id' => 'rekening_id','placeholder' =>'Rekening']) !!}
</div>

{!! Form::close() !!}