{!! Form::model($model, [
    'route' => $model->exists ? ['role.update', $model->id] : 'role.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group row">
    <label class="label-text col-lg-3 col-form-label text-md-right">Nama Role</label>
    <div class="col-lg-9">
        {!! Form::text('nama_role', null, ['class' => 'form-control form-control-sm', 'id' => 'nama_role']) !!}
    </div>
</div>
<!--     <div class="form-group row">
        <label for="example-text-input-sm" class="col-sm-3 col-form-label">Inisial</label>
        <div class="col-sm-9">
            {!! Form::text('inisial', null, ['class' => 'form-control', 'id' => 'inisial']) !!}
        </div>
    </div> -->

{!! Form::close() !!}