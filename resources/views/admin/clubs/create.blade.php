@extends('layouts.admin')
@section('content')
    @canany(['clubs_manage'])
        <div class="card">
            <div class="card-header">
                Create club
            </div>

            <div class="card-body">
                <form action="{{ route("admin.clubs.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($data) ? $data->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" class="form-control" value="{{ old('website', isset($data) ? $data->website : '') }}" required>
                        @if($errors->has('website'))
                            <em class="invalid-feedback">
                                {{ $errors->first('website') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($data) ? $data->email : '') }}" required>
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($data) ? $data->phone : '') }}" required>
                        @if($errors->has('phone'))
                            <em class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="Save">
                    </div>
                </form>


            </div>
        </div>
    @endcanany
@endsection