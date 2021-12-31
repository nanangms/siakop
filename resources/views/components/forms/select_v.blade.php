<div class="form-group {{$errors->has($name) ? ' has-error':''}}">
    <label>{{$label}}@if($isRequired == 'true')<span class="text-danger">*</span>@endif</label>
    <select name="{{$name}}" id="{{$id}}" width="100%" class="form-control form-control-sm @if($isSelect2 == 'true') select2 @endif">
        {{$slot}}
    </select>
    @if($errors->has($name))
        <span class="text-danger">{{$errors->first($name)}}</span>
    @endif
</div>