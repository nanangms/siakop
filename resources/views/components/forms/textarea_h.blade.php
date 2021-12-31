<div class="form-group row {{$errors->has($name) ? ' has-error':''}}">
    <label class="label-text col-lg-3 col-form-label text-md-right">{{$label}} @if($isRequired == 'true')<span class="text-danger">*</span>@endif
    </label>
    <div class="col-lg-6">
        <textarea class="form-control form-control-sm" id="{{$id}}" name="{{$name}}">{{$slot}}</textarea>
        @if($errors->has($name))
            <span class="text-danger">{{$errors->first($name)}}</span>
        @endif
    </div>
</div>