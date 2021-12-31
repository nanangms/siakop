<div class="form-group row {{$errors->has($name) ? ' has-error':''}}">
    <label class="label-text col-lg-3 col-form-label text-md-right">{{$label}} @if($isRequired == 'true')<span class="text-danger">*</span>@endif
    </label>
    <div class="col-lg-8">
        <input type="{{ $type }}" class="form-control form-control-sm @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id }}" @if( $value != null )value="{{ $value }}" @else value="{{ old($name) }}" @endif @if($isRequired == 'true') required @endif @if($isReadonly == 'true') readonly @endif placeholder="{{ $placeholder }}">
        @if($errors->has($name))
            <span class="text-danger">{{$errors->first($name)}}</span>
        @endif
    </div>
</div>