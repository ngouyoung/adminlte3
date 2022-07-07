<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('node_modules/overlayscrollbars/css/OverlayScrollbars.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/croppie/croppie.css') }}">
<link rel="stylesheet" href="{{ asset('\node_modules/daterangepicker/daterangepicker.css') }}">
@if(config('sweetalert.animation.enable'))
    <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
@endif
@toastr_css
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/check-tree.css') }}">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
