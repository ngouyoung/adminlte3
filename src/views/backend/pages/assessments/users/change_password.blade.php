@extends('backend.layouts.app')

@section('title', 'users')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-md-6 col-sm-6 col-6">
            <a class="{{ config('class.button.back') }}" href="{{ url()->previous() }}">
                <i class="{{ config('class.icon.back') }}"></i> Back
            </a>
            @can('edit-user')
                <a href="{{ route('admin.assessments.users.edit', $object->id) }}"
                   class="btn btn-success btn-sm">
                    <i class="{{ config('class.icon.edit') }}"></i> Edit
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
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card b-t-green">
        <div class="card-header">
            <div class="h5 mb-0">
                Change Password for <span class="badge badge-info text-capitalize">{{ $object->name }}</span>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.assessments.users.update-password', $object->id) }}">
                @method('PUT')
                @csrf
                @include('backend.pages.assessments.users.partials.password')
                <div class="row justify-content-end">
                    <div class="col-md-10 col-sm-9 col-8">
                        <button type="submit" class="{{ config('class.button.update') }}">Change Password</button>
                        <a class="{{ config('class.button.cancel') }}" href="{{ route('admin.assessments.users.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
