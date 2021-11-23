
{!! Form::model($model, [
    'route' => $model->exists ? ['kabupaten.update', $model->id] : 'kabupaten.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
    <label>Nama Kab/Kota <small style="color: red;">*</small></label>
    {!! Form::text('nama_kab_kota', null, ['class' => 'form-control', 'id' => 'nama_kab_kota','placeholder' =>'Nama Kab/Kota']) !!}
</div>

 

{!! Form::close() !!}