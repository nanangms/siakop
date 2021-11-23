{!! Form::model($model, [
    'route' => $model->exists ? ['kategori.update', $model->id] : 'kategori.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
    <label>Nama Kategori <small style="color: red;">*</small></label>
    {!! Form::text('nama_kategori', null, ['class' => 'form-control form-control-sm', 'id' => 'nama_kategori','placeholder' =>'Nama Kategori']) !!}
</div>

{!! Form::close() !!}