<!DOCTYPE html>
<html>

<head>
    @include('partials.admin.head')
</head>

<body>
<script src="{{ asset('admin-assets/assets/js/spinner.js')}}"></script>

<div class="main-wrapper" id="app">
    @if(Auth::check())

        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @include('partials.admin.menu')

        {{--@include('partials.admin.settings')--}}
    @endif
    <div class="page-wrapper  @if(!Auth::check()) full-page @endif">
        @if(Auth::check())
            @include('partials.admin.navbar')
        @endif
        <div style="padding-top: 80px" class="container-fluid">
            @if(Auth::check())
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
            @endif
            @if($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        @yield('content')
        @include('partials.admin.footer')
    </div>
</div>

@include('partials.admin.javascripts')
@yield('storeMediajs')
</body>

</html>