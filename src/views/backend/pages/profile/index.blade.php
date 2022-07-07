@extends('backend.layouts.app')

@section('title', 'Profile')

@push('style')
    <style>
        #upload-demo {
            height: 250px;
            padding-bottom: 25px;
        }
    </style>
@endpush

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card b-t-green">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#info" id="info-tab" data-toggle="tab" role="tab"
                       aria-controls="info" aria-selected="true">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#change-password" id="change-password-tab" data-toggle="tab"
                       role="tab" aria-controls="change-password" aria-selected="true">Change Password</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="card" style="width: 175px">
                                @if(file_exists(public_path(auth()->user()->avatar)))
                                    <img src="{{ asset(auth()->user()->avatar) }}"
                                         class="card-img img-thumbnail" alt="" id="avatar">
                                @else
                                    <img src="{{ asset('img/default.png') }}"
                                         class="card-img img-thumbnail" alt="" id="avatar">
                                @endif
                                <div class="card-img-overlay d-flex flex-column">
                                    <h3 class="card-title link-muted text-capitalize">{{ auth()->user()->name }}</h3>
                                    <button type="button" id="changeImage"
                                            class="mt-auto btn btn-sm btn-x-sm btn-block btn-secondary">
                                        <i class="fas fa-image"></i> Change Image
                                    </button>
                                </div>
                                <input type="file" class="item-img file center-block" id="image" name="file_photo"
                                       style="display:none;"/>
                            </div>
                        </div>
                    </div>
                    @include('backend.pages.profile.partials.information')
                </div>
                <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-passwordc-tab">
                    @include('backend.pages.profile.partials.password')
                </div>
            </div>
        </div>
        <div class="card-footer text-muted text-center">
            Welcome to our system.
        </div>
    </div>

    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="upload-demo" class="center-block"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal">Close</button>
                    <button type="button" id="cropImageBtn" class="btn btn-sm btn-outline-primary"
                            data-remote="{{ route('admin.profile.update-avatar') }}">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="{{ asset('js/uploadImage.js') }}"></script>
@endpush
