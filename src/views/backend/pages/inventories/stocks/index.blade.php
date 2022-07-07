@extends('backend.layouts.app')

@section('title', 'Stocks')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Stocks</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Stocks</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card">
        @can('create-stock')
            <div class="card-header">
                <a href="{{ route('admin.inventories.stocks.create') }}"
                   class="{{ config('class.button.create') }}">
                    <i class="{{ config('class.icon.create') }}"></i> Add New
                </a>
            </div>
        @endcan
        <div class="card-body">
            <table class="{{ config('class.table') }}" id="stocks_table">
                <thead>
                @include('backend.pages.inventories.stocks.partials.thead')
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            const Table = $('#stocks_table').DataTable({
                {{--language: {--}}
                    {{--    search: "{{ trans('label.search') }}"--}}
                    {{--},--}}
                ajax: {
                    url: '{{ route('admin.inventories.stocks.getData') }}',
                    type: "GET"
                },
                order: [[3, "desc"]],
                columns: [
                    {data: 'product.name'},
                    {data: 'batch'},
                    {data: 'quantity'},
                    {data: 'customer_price'},
                    {data: 'price'},
                    // {data: 'imported_date', searchable: false},
                    {data: 'expired_date', searchable: false},
                    {data: 'actions', orderable: false, searchable: false}
                ],
                columnDefs: [
                    {
                        createdCell: function (td) {
                            $(td).attr('nowrap', true);
                        },
                        targets: [2, 3]
                    },
                    {
                        className: "dt-center",
                        targets: [0]
                    }
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
