@extends('backend.layouts.app')

@section('title', 'Users')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-md-6 col-sm-6 col-6">
            <a class="{{ config('class.button.back') }}" href="{{ url()->previous() }}">
                <i class="{{ config('class.icon.back') }}"></i> Back
            </a>
            @can('change-password-user')
                <a href="{{ route('admin.assessments.users.change-password', $object->id) }}"
                   class="btn btn-sm btn-warning">
                    <i class="{{ config('class.icon.change-password') }}"></i> Change Password
                </a>
            @endcan
            @can('create-user')
                <a href="{{ route('admin.assessments.users.create') }}" class="{{ config('class.button.create') }}">
                    <i class="{{ config('class.icon.create') }}"></i> Add New
                </a>
            @endcan
        </div>
        <div class="col-md-6 col-sm-6 col-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.assessments.users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card b-t-green">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.assessments.users.update', $object->id) }}">
                @method('PUT')
                @csrf
                @include('backend.pages.assessments.users.partials.form')
                <div class="row justify-content-end">
                    <div class="col-md-10 col-sm-9 col-8">
                        <button type="submit" class="{{ config('class.button.update') }}">Update</button>
                        <a class="{{ config('class.button.cancel') }}" href="{{ route('admin.assessments.users.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    @include('backend.pages.assessments.users.partials.scripts')
@endpush
