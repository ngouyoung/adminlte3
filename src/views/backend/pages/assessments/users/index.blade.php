@extends('backend.layouts.app')

@section('title', 'Users')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card">
        @can('create-user')
        <div class="card-header">
            <a href="{{ route('admin.assessments.users.create') }}" class="{{ config('class.button.create') }}">
                <i class="{{ config('class.icon.create') }}"></i> Add New
            </a>
        </div>
        @endcan
        <div class="card-body">
            <table class="{{ config('class.table') }}"
                   id="users_table">
                <thead>
                @include('backend.pages.assessments.users.partials.thead')
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            const Table = $('#users_table').DataTable({
                {{--language: {--}}
                    {{--    search: "{{ trans('label.search') }}"--}}
                    {{--},--}}
                ajax: {
                    url: '{{ route('admin.assessments.users.getData') }}',
                    type: "GET"
                },
                columns: [
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'roles', name: 'roles.name'},
                    {data: 'permissions', name: 'permissions.name'},
                    {data: 'created_at', orderable: false, searchable: false},
                    {data: 'actions', orderable: false, searchable: false}
                ],
                columnDefs: [
                    {
                        createdCell: function (td) {
                            $(td).attr('nowrap', true);
                        },
                        "targets": [0,1,4,5]
                    },
                ]
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
                                    Table.draw('page');
                                    Swal.fire(
                                        'Deleted!',
                                        'Your record has been deleted.',
                                        'success'
                                    );
                                }
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
        });
    </script>
@endpush
