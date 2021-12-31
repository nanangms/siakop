<div class="form-group {{$errors->has($name) ? ' has-error':''}}">
    <label>{{$label}}
        @if($isRequired == 'true')
        <span class="text-danger">*</span>
        @endif
    </label>
   <textarea class="form-control form-control-sm" id="{{$id}}" name="{{$name}}">{{$slot}}</textarea>
    @if($errors->has($name))
        <span class="text-danger">{{$errors->first($name)}}</span>
    @endif
</div>