<div class="form-group row">
    <div class="col-md-12">
        <label class="control-label">{{$label}} <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="{{$field}}" value="{{old($field)}}" required/>
        @if($errors->has($field))
        	<span class="text-danger">{{$errors->first($field)}}</span>
        @endif
    </div>
</div>