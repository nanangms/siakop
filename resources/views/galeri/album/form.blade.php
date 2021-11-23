{!! Form::model($model, [
    'route' => $model->exists ? ['album.update', $model->id] : 'album.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

   <div class="form-group">
        <label>Nama Album</label>
        {!! Form::text('nama_album', null, ['class' => 'form-control', 'id' => 'nama_album','placeholder' =>'Nama Album']) !!}
    </div>

    <div class="form-group">
        <label>Publish</label><br>
        @if($model->published == 'Y')
            <input type='radio' name='published' value='Y' checked id="published"> Ya &nbsp; 
            <input type='radio' name='published' value='N' id="published"> Tidak 
        @elseif($model->published == 'N')
            <input type='radio' name='published' value='Y' id="published"> Ya &nbsp; 
            <input type='radio' name='published' value='N' checked id="published"> Tidak 
        @else
            <input type='radio' name='published' value='Y' checked id="published"> Ya &nbsp; 
            <input type='radio' name='published' value='N' id="published"> Tidak 
        @endif
    </div>
 
{!! Form::close() !!}