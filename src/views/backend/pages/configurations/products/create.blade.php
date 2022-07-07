@extends('backend.layouts.app')

@section('title', 'Products')

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
                <li class="breadcrumb-item"><a href="{{ route('admin.configurations.products.index') }}">Products</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card b-t-green">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.configurations.products.store') }}">
                @csrf
                @include('backend.pages.configurations.products.partials.form')
                <div class="row justify-content-end">
                    <div class="col-md-10 col-sm-9 col-8">
                        <button type="submit" class="{{ config('class.button.create') }}">Create</button>
                        <a class="{{ config('class.button.cancel') }}" href="{{ route('admin.configurations.products.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
   @include('backend.pages.configurations.products.partials.scripts')
@endpush
