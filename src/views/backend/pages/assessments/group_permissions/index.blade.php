@extends('backend.layouts.app')

@section('title', 'Group Permissions')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Group Permissions</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Group Permissions</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card">
        @can('create-group-permission')
            <div class="card-header">
                <a href="{{ route('admin.assessments.group_permissions.create') }}"
                   class="{{ config('class.button.create') }}">
                    <i class="{{ config('class.icon.create') }}"></i> Add New
                </a>
            </div>
        @endcan
        <div class="card-body">
            <div class="row">
                @if(isset($array) && $array->count() > 0)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="cf nestable-lists">
                                    <div
                                        class="dd @if(!auth()->user()->can('sort-group-permission')){{'nestable-disable'}}@endif"
                                        id="nestable">
                                        <ol class="dd-list">
                                            @foreach($array as $group)
                                                <li class="dd-item" data-id="{!! $group->id !!}">
                                                    <div class="dd-handle">
                                                        {!! $group->name !!}
                                                        <span class="float-right">
                                                            <span class="badge badge-info">
                                                                {!! $group->permissions->count() !!}
                                                            </span>
                                                            Permissions
                                                        </span>
                                                    </div>
                                                    @if(isset($group->child) && $group->child->count())
                                                        @include('backend.pages.assessments.group_permissions.partials.child', ['items' => $group->child])
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(isset($array) && $array->count() > 0)
                    <div class="col-md-6">
                        <table class="{{ config('class.table') }}">
                            <thead>
                            @include('backend.pages.assessments.group_permissions.partials.thead')
                            </thead>
                            <tbody>
                            @include('backend.pages.assessments.group_permissions.partials.childTable', ['items' => $array, 'level' => -1])
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/jquery.nestable.css') }}">
@endpush

@push('scripts')
    <script>
        let nestable = $('#nestable');
        nestable.nestable({group: 1, maxDepth: 10}).on('change', function () {
            $.ajax({
                url: "{!! route('admin.assessments.group_permissions.sort') !!}",
                type: "post",
                data: {data: nestable.nestable('serialize')},
                success: function (data) {
                    if (data.status === "OK") Swal.fire('Sort!', 'Your record has been Updated.', 'success');
                    else Swal.fire('Sort!', 'Something went wrong!.', 'error');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire('Sort!', errorThrown, 'error');
                }
            });
        });

        $(document).on('click', '#delete', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this record!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: $(this).attr('data-remote'),
                        dataType: "html",
                        success: function (response, textStatus, xhr) {
                            if (xhr.status === 200) {
                                location.reload();
                                Swal.fire('Deleted!', 'Your record has been deleted.', 'success');
                            } else Swal.fire('Warning!', 'Something went wrong!.', 'error');
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            Swal.fire('error!', errorThrown, 'error');
                        }
                    })
                } else {
                    Swal.fire(
                        'Cancelled',
                        'Your record is safe :)',
                        'error'
                    )
                }
            })
        });
    </script>
@endpush
