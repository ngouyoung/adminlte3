@if(isset($items) && count($items) > 0)
    @foreach($items as $item)
        <li class="icheck-primary">
            <input id="{{ $item->name }}" type="checkbox"/><label
                for="{{ $item->name }}" class="text-capitalize">{{ $item->name }}</label>
            <ul>
                @if(isset($item->child) && count($item->child) > 0)
                    @include('backend.pages.assessments.roles.partials.child', ['items' => $item->child, 'permissions', $item->permissions])
                @endif
                @if(isset($item->permissions) && count($item->permissions) > 0)
                    @include('backend.pages.assessments.roles.partials.permission', ['items' => $item->permissions])
                @endif
            </ul>
        </li>
    @endforeach
@endif

{{--@if(isset($permissions) && count($permissions) > 0)--}}
{{--    {{ $permissions }}--}}
{{--    @foreach($permissions as $permission)--}}
{{--        <ul>--}}
{{--            <li>--}}
{{--                <div class="icheck-primary icheck-inline">--}}
{{--                    <input type="checkbox" name="permissions[]"--}}
{{--                           id="check-{{$permission->id}}"--}}
{{--                           value="{{$permission->id}}"/>--}}
{{--                    <label for="check-{{ $permission->id }}"--}}
{{--                           class="text-capitalize">{{ $permission->name }}</label>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    @endforeach--}}
{{--@endif--}}
{{--@foreach($group_permission->child as $child)--}}

{{--    @if(isset($role))--}}
{{--        @php $found=false @endphp--}}
{{--        @foreach($role->permissions as $rolePermission)--}}
{{--            @if($permission->id == $rolePermission->id)--}}
{{--                @php $found = true @endphp--}}
{{--                @break;--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--        @if($found)--}}
{{--            <li>--}}
{{--                <div class="icheck-primary icheck-inline">--}}
{{--                    <input type="checkbox" name="permissions[]"--}}
{{--                           id="check-{{$permission->id}}"--}}
{{--                           value="{{$permission->id}}" checked/>--}}
{{--                    <label for="check-{{ $permission->id }}"--}}
{{--                           class="text-capitalize">{{ $permission->name }}</label>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li>--}}
{{--                <div class="icheck-primary icheck-inline">--}}
{{--                    <input type="checkbox" name="permissions[]"--}}
{{--                           id="check-{{$permission->id}}"--}}
{{--                           value="{{$permission->id}}"/>--}}
{{--                    <label for="check-{{ $permission->id }}"--}}
{{--                           class="text-capitalize">{{ $permission->name }}</label>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    @else--}}
{{--        <li>--}}
{{--            <div class="icheck-primary icheck-inline">--}}
{{--                <input type="checkbox" name="permissions[]"--}}
{{--                       id="check-{{$permission->id}}"--}}
{{--                       value="{{$permission->id}}"/>--}}
{{--                <label for="check-{{ $permission->id }}"--}}
{{--                       class="text-capitalize">{{ $permission->name }}</label>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    @endif--}}
{{--@endforeach--}}
