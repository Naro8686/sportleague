@extends('layouts.admin')
@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pr-md-0">
                            <div class="auth-left-wrapper" style="background-image: url({{asset('admin-assets/assets/images/carousel/img6.jpg')}}"></div>
                        </div>
                        <div class="col-md-8 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">Sport League</a>
                                <h5 class="text-muted font-weight-normal mb-4">Welcome to registration page</h5>
                                <form class="forms-sample" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input name="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" required placeholder="First name" value="{{ old('first_name', null) }}">
                                        @if($errors->has('first_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input name="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" required placeholder="Last name" value="{{ old('last_name', null) }}">
                                        @if($errors->has('last_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('last_name') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Club</label>
                                        <select name="club">
                                            @foreach($clubs as $club)
                                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required placeholder="Phone" value="{{ old('phone', null) }}">
                                        @if($errors->has('phone'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="Email" value="{{ old('email', null) }}">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Event to marshal</label>
                                        <select class="register_events" name="event[]" multiple required>
                                            @foreach($races as $race)
                                                <option value="{{ $race->id }}">{{ $race->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="helper-block">
                                            Select 2 events to marshal
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password">
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input name="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Confirm Password">
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="form-check form-check-flat form-check-primary d-flex">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="agree" type="checkbox" id="agree" required />
                                            I agree with&nbsp;
                                        </label>
                                        <a href="{{ route('privacy.page') }}" target="_blank">privacy policy</a>
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

@section('javascript')
    @parent
    <script>
        $(function () {
            $(document).on('submit', '.forms-sample', function (e) {
                if($(".register_events option:selected").length < 2) {
                    e.preventDefault();
                    alert('Select 2 events')
                }
            });
        })
    </script>
@endsection