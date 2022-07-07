@if($items->count() > 0)
    <div hidden>{{ $level++ }}</div>
    @foreach($items as $key => $item)
        <tr>
            <td style="padding: 5px {{ $level * 35 + 15}}px" class="text-capitalize" id="{{ $level }}">
                {{ $item->name }}
                @if($item->permissions->count() >0)
                    @include('backend.pages.assessments.group_permissions.partials.permissionTable', ['items' => $item->permissions, 'level' => $level])
                @endif
            </td>
            <td style="padding: 5px">
                @can('edit-group-permission')
                    <a href="{{ route('admin.assessments.group_permissions.edit', $item->id) }}"
                       class="{{ config('class.button.edit') }}" data-toggle="tooltip" title="Edit Record">
                        <i class="{{ config('class.icon.edit') }}"></i>
                    </a>
                @endcan
                @can('delete-group-permission')
                    <button data-remote="{{ route('admin.assessments.group_permissions.ajaxDelete', $item->id) }}"
                            class="{{ config('class.button.delete') }}" data-toggle="tooltip" title="Delete Record"
                            id="delete">
                        <i class="{{ config('class.icon.delete') }}"></i>
                    </button>
                @endcan
            </td>
        </tr>
        @if($item->child->count() > 0)
            @include('backend.pages.assessments.group_permissions.partials.childTable', ['items' => $item->child, 'level' => $level])
        @endif
    @endforeach
@endif
