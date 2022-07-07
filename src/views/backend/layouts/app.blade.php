<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title', 'Dashboard')</title>
    @include('backend.partials.css')
    @stack('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    @include('backend.partials.preloader')
    @include('backend.partials.nav')
    @include('backend.partials.sidebar')
    <div class="content-wrapper">
        @hasSection('breadcrumb')
            <div class="content-header">
                <div class="container-fluid">
                    @yield('breadcrumb')
                </div>
            </div>
        @endif
        <section class="content">
            <div class="container-fluid">
                @yield('contents')
            </div>
        </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    @include('backend.partials.footer')
</div>
@include('backend.partials.script')
@include('sweetalert::alert')
@stack('scripts')
</body>
</html>
