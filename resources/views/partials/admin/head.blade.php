<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('favicon.png')}}">
<title>FutureSystems</title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />

<!-- plugin css -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('admin-assets/assets/fonts/feather-font/css/iconfont.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/select2/select2.min.css')}}">
<!-- end plugin css -->

<link media="all" type="text/css" rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">

<!-- common css -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('admin-assets/css/app.css')}}">
<!-- end common css -->

@yield('styles')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
