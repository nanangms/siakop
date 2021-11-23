{!! Form::model($model, [
    'route' => $model->exists ? ['role_menu.update', $model->id] : 'role_menu.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group row">
        <label for="example-text-input-sm" class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <select name="role_id" id="role_id" class="form-control select">
                <option value="">--Pilih--</option>
                <?php $role = \App\Models\Role::all(); ?>
                @foreach($role as $listrole)
                    <option value="{{$listrole->id}}" @if($listrole->id == $model->role_id) selected @endif>{{$listrole->nama_role}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-text-input-sm" class="col-sm-3 col-form-label">Menu</label>
        <div class="col-sm-9">
            <select name="menu_id" id="menu_id" class="form-control select">
            <option value="">--Pilih--</option>
            <?php $menu = \App\Models\Menu::all(); ?>
            @foreach($menu as $list_menu)
                <option value="{{$list_menu->id}}" @if($list_menu->id == $model->menu_id) selected @endif>{{$list_menu->nama_menu}}</option>
            @endforeach
        </select>
        </div>
    </div>


{!! Form::close() !!}