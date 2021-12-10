{!! Form::model($model, [
    'route' => $model->exists ? ['jenispinjaman.update', $model->uuid] : 'jenispinjaman.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
    <label>Nama Jenis Pinjaman <small style="color: red;">*</small></label>
    {!! Form::text('nama_jenis', null, ['class' => 'form-control form-control-sm', 'id' => 'nama_jenis','placeholder' =>'Nama Jenis Pinjaman']) !!}
</div>

{!! Form::close() !!}