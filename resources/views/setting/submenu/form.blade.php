<form action="/setting/submenu/update/{{$model->uuid}}" method="post">
    @csrf
    <input type="hidden" name="id_menu" value="{{$model->id_menu}}" class="form-control">
    <x-forms.input_v id="nama_menu" type="text" name="nama_menu" label="Nama Sub Menu" isRequired="true" value="{{$model->nama_menu}}"/>
    <x-forms.input_v id="url" type="text" name="url" label="URL" isRequired="true" value="{{$model->url}}"/>
    <x-forms.input_v id="icon" type="text" name="icon" label="Icon" isRequired="true" value="{{$model->icon}}"/>
    <x-forms.input_v id="urutan" type="number" name="urutan" label="Urutan" isRequired="true" value="{{$model->urutan}}"/>

    <div class="form-group">
        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> SIMPAN</button>
    </div>
</form>