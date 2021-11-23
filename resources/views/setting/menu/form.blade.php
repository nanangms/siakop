{!! Form::model($model, [
    'route' => $model->exists ? ['menu.update', $model->id] : 'menu.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
    <label>Nama Menu</label>
        {!! Form::text('nama_menu', null, ['class' => 'form-control', 'id' => 'nama_menu','placeholder' =>'Nama Menu']) !!}
  
</div>

<div class="form-group">
    <label>URL</label>
        {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'url','placeholder' =>'URL']) !!}
    
</div>
{!! Form::hidden('id_menu', '0', ['class' => 'form-control', 'id' => 'id_menu','placeholder' =>'URL']) !!}
<div class="form-group">
    <label>Icon</label>
        {!! Form::text('icon', null, ['class' => 'form-control', 'id' => 'icon','placeholder' =>'Icon']) !!}
   
</div>

<div class="form-group">
    <label>Urutan</label>
        {!! Form::number('urutan', null, ['class' => 'form-control', 'id' => 'urutan','placeholder' =>'Urutan']) !!}

</div>



{!! Form::close() !!}