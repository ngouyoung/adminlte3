@if(isset($items) && count($items) > 0)
    @foreach($items as $item)
        @if(isset($object))
            @php $found=false @endphp
            @foreach($object->permissions as $rolePermission)
                @if($item->id == $rolePermission->id)
                    @php $found = true @endphp
                    @break;
                @endif
            @endforeach
            @if($found)
                <li class="icheck-primary">
                    <input id="{{ $item->id }}" type="checkbox" value="{{$item->id}}" name="permissions[]" checked/>
                    <label for="{{ $item->id }}" class="text-capitalize">
                        {{ $item->name }}
                    </label>
                </li>
            @else
                <li class="icheck-primary">
                    <input id="{{ $item->id }}" type="checkbox" value="{{$item->id}}" name="permissions[]"/>
                    <label for="{{ $item->id }}" class="text-capitalize">
                        {{ $item->name }}
                    </label>
                </li>
            @endif
        @else
            <li class="icheck-primary">
                <input id="{{ $item->id }}" type="checkbox" value="{{$item->id}}" name="permissions[]"/>
                <label for="{{ $item->id }}" class="text-capitalize">
                    {{ $item->name }}
                </label>
            </li>
        @endif
    @endforeach
@endif
