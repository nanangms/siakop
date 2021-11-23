<div class="form-group {{$errors->has($name) ? ' has-error':''}}">
    <label>{{$label}}
        @if($isRequired == 'true')
        <span class="text-danger">*</span>
        @endif
    </label>
    <input type="{{ $type }}" class="form-control form-control-sm @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id }}"
    @if( $value != null )
        value="{{ $value }}"
    @else
        value="{{ old('.$name.') }}"
    @endif

    @if($isRequired == 'true') required @endif />
    @if($errors->has($name))
        <span class="text-danger">{{$errors->first($name)}}</span>
    @endif
</div>