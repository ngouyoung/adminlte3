@extends('backend.layouts.app')

@section('title', 'Categories')

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
        <div class="col-md-6 col-sm-6 col-6">
            <a class="{{ config('class.button.back') }}" href="{{ url()->previous() }}">
                <i class="{{ config('class.icon.back') }}"></i>
                Back</a>
        </div>
        <div class="col-md-6 col-sm-6 col-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.configurations.categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card b-t-green">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.configurations.categories.store') }}">
                @csrf
                @include('backend.pages.configurations.categories.partials.form')
                <div class="row justify-content-end">
                    <div class="col-md-10 col-sm-9 col-8">
                        <button type="submit" class="{{ config('class.button.create') }}">Create</button>
                        <a class="{{ config('class.button.cancel') }}" href="{{ route('admin.configurations.categories.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
   @include('backend.pages.configurations.categories.partials.scripts')
@endpush
