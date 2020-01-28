@extends('layouts.admin')
@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pr-md-0">
                            <div class="auth-left-wrapper"
                                 style="background-image: url({{asset('admin-assets/assets/images/carousel/img6.jpg')}}">

                            </div>
                        </div>
                        <div class="col-md-8 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">Name</a>
                                <h5 class="text-muted font-weight-normal mb-4">Welcome to login page</h5>
                                <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Email" value="{{ old('email', null) }}">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password">
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="remember" type="checkbox" id="remember" />
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection