@extends('backend.layouts.app')

@section('title', 'Stocks')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-md-6 col-sm-6 col-6">
            <a class="{{ config('class.button.back') }}" href="{{ url()->previous() }}">
                <i class="{{ config('class.icon.back') }}"></i>
                Back</a>
        </div>
        <div class="col-md-6 col-sm-6 col-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.inventories.stocks.index') }}">Stocks</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@endsection

@section('contents')
    <div class="card b-t-green">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.inventories.stocks.store') }}">
                @csrf
                @include('backend.pages.inventories.stocks.partials.form')
                <div class="row justify-content-end mt-3">
                    <div class="col-md-12 col-sm-12 col-12">
                        <button type="submit" class="{{ config('class.button.create') }}">Create</button>
                        <a class="{{ config('class.button.cancel') }}"
                           href="{{ route('admin.inventories.stocks.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    @include('backend.pages.inventories.stocks.partials.scripts')
@endpush
