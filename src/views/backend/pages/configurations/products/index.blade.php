@extends('backend.layouts.app')

@section('title', 'Products')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card">
        @can('create-product')
            <div class="card-header">
                <a href="{{ route('admin.configurations.products.create') }}"
                   class="{{ config('class.button.create') }}">
                    <i class="{{ config('class.icon.create') }}"></i> Add New
                </a>
            </div>
        @endcan
        <div class="card-body">
            <table class="{{ config('class.table') }}" id="products_table">
                <thead>
                @include('backend.pages.configurations.products.partials.thead')
                </thead>
            </table>
        </div>
    </div>

    <input type="file" class="item-img file center-block" id="image" name="file_photo"
           style="display:none;"/>

    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="upload-demo" class="center-block"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal">Close</button>
                    <button type="button" id="cropImageBtn" class="btn btn-sm btn-outline-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const Table = $('#products_table').DataTable({
            {{--language: {--}}
                {{--    search: "{{ trans('label.search') }}"--}}
                {{--},--}}
            ajax: {
                url: '{{ route('admin.configurations.products.getData') }}',
                type: "GET"
            },
            order: [[7, "desc"]],
            columns: [
                {data: 'image', orderable: false, searchable: false},
                {data: 'name'},
                {data: 'code'},
                {data: 'quantity'},
                {data: 'slot_name', orderable: false, searchable: false},
                {data: 'category_name', orderable: false, searchable: false},
                {data: 'currency_code', orderable: false, searchable: false},
                {data: 'created_at', searchable: false},
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

        var $uploadCrop,
            tempFilename,
            dataRemote,
            rawImg,
            imageId;

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    $('#cropImagePop').modal('show');
                    rawImg = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        function uploadDemo(w = 200, h = 200) {
            return $('#upload-demo').croppie({
                viewport: {
                    width: w,
                    height: h,
                },
                enforceBoundary: false,
                enableExif: true
            });
        }

        function optionCrop(w = 200, h = 200, bc = '#ffffff', f = 'jpeg', t = 'base64') {
            return {
                type: t,
                format: f,
                backgroundColor: bc,
                size: "original",
                quality: 1
            }
        }


        $(document).on('click', '#changeImage', function (e) {
            dataRemote = $(this).attr('data-remote')
            $('.item-img').trigger('click');
        });

        $uploadCrop = uploadDemo()

        $('#cropImagePop').on('shown.bs.modal', function () {
            $uploadCrop.croppie('bind', {
                url: rawImg
            }).then(function () {
                console.log('jQuery bind complete');
            });
        });

        $('.item-img').on('change', function (e) {
            const extension = $('#image').val().split('.').pop().toLowerCase();
            if (/^(jpg|jpeg|png|gif|bmp)$/.test(extension)) {
                imageId = $(this).data('id');
                tempFilename = $(this).val();
                $('#cancelCropBtn').data('id', imageId);
                readFile(this);
            } else {
                toastr.warning('Please input file image.');
            }
        });

        $('#cropImageBtn').on('click', function (ev) {
            $uploadCrop.croppie('result', optionCrop()).then(function (resp) {
                $.ajax({
                    url: dataRemote,
                    type: 'PUT',
                    data: {
                        image: resp
                    },
                    success: (response) => {
                        if (response.code === 202) {
                            Table.draw('page')
                            $('#cropImagePop').modal('hide');
                            toastr.success(response.message);
                        }
                    }
                })
            });
        });

    </script>
@endpush
