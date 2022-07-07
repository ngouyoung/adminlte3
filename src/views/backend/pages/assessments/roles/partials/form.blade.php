<div class="form-group row">
    <label for="name" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Name:</label>
    <div class="col-md-8 col-sm-8 col-8">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
               placeholder="Name" @if(isset($object)) value="{{ $object->name }}"
               @else value="{{ old('name') }}" @endif>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="row">

</div>
<div class="form-group row">
    <label for="roles" class="col-md-2 col-sm-3 col-4 col-form-label text-right">Permissions
        :</label>
    <div class="col-md-8 col-sm-8 col-8">
        {{--        class="card-columns"--}}
        <div>
            <ul class="checktree">
                @if(isset($group_permissions))
                    @foreach($group_permissions as $group_permission)
                        <li class="icheck-primary">
                            <input id="{{ $group_permission->name }}" type="checkbox"/>
                            <label for="{{ $group_permission->name }}" class="text-capitalize">
                                {{ $group_permission->name }}
                            </label>
                            <ul>
                                @if(count($group_permission->child) > 0)
                                    @include('backend.pages.assessments.roles.partials.child', ['items' => $group_permission->child])
                                @endif
                                @if(count($group_permission->permissions) > 0)
                                    @include('backend.pages.assessments.roles.partials.permission', ['items' => $group_permission->permissions])
                                @endif
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
