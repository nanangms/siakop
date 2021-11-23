
{!! Form::model($model, [
    'route' => $model->exists ? ['video.update', $model->id] : 'video.store',
    'method' => $model->exists ? 'PUT' : 'POST'
    ]) !!}

    <div class="form-group">
        <label>Judul</label>
        {!! Form::text('judul', null, ['class' => 'form-control', 'id' => 'judul','placeholder' =>'Judul']) !!}

    </div>

    <div class="form-group">
        <label>Link Video</label>
        {!! Form::text('link_video', null, ['class' => 'form-control', 'id' => 'link_video','placeholder' =>'Link Video']) !!}

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
    <script>
       $.AdminBSB.input = {
        activate: function ($parentSelector) {
            $parentSelector = $parentSelector || $('body');
        //On focus event
        $parentSelector.find('.form-control').focus(function () {
            $(this).closest('.form-line').addClass('focused');
        });
    }
</script>