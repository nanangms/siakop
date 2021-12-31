<div class="form-group row {{$errors->has($name) ? ' has-error':''}}">
    <label class="label-text col-lg-3 col-form-label text-md-right">{{$label}} @if($isRequired == 'true')<span class="text-danger">*</span>@endif
    </label>
    <div class="col-lg-6">
        <select name="{{$name}}" id="{{$id}}" width="100%" class="form-control form-control-sm @if($isSelect2 == 'true') select2 @endif">
            {{$slot}}
        </select>
        
        @if($errors->has($name))
            <span class="text-danger">{{$errors->first($name)}}</span>
        @endif
    </div>
</div>