{!! Form::model($model, [
    'route' => $model->exists ? ['bungapinjaman.update', $model->id] : 'bungapinjaman.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
    <label>Jangka Waktu (Bulan) <small style="color: red;">*</small></label>
    {!! Form::text('jangka_waktu', null, ['class' => 'form-control form-control-sm', 'id' => 'jangka_waktu','placeholder' =>'Jangka Waktu']) !!}
</div>

<div class="form-group">
    <label>Nilai Bunga (%) <small style="color: red;">*</small></label>
    {!! Form::text('nilai_bunga', null, ['class' => 'form-control form-control-sm', 'id' => 'nilai_bunga','placeholder' =>'Nilai Bunga']) !!}
</div>

{!! Form::close() !!}