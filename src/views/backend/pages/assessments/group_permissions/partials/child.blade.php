@if(isset($items) && count($items) > 0)
    <ol class="dd-list">
        @foreach($items as $item)
            <li class="dd-item" data-id="{{ $item->id }}">
                <div class="dd-handle">
                    {{ $item->name }}
                    <span class="float-right">
                        <span class="badge badge-info">
                            {!! $item->permissions->count() !!}
                        </span>
                        Permissions
                    </span>
                </div>
                @if(isset($item->child) && count($item->child) > 0)
                    @include('backend.pages.assessments.group_permissions.partials.child', ['items' => $item->child])
                @endif
            </li>
        @endforeach
    </ol>
@endif
