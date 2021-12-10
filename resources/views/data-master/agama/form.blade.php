{!! Form::model($model, [
    'route' => $model->exists ? ['agama.update', $model->uuid] : 'agama.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
    <label>Nama Agama <small style="color: red;">*</small></label>
    {!! Form::text('nama_agama', null, ['class' => 'form-control form-control-sm', 'id' => 'nama_agama','placeholder' =>'Nama Agama']) !!}
</div>

{!! Form::close() !!}