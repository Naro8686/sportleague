@extends('layouts.admin')
@section('content')
    @canany(['clubs_manage'])
        <div class="card">
            <div class="card-header">{{ _e('Edit club') }}</div>

            <div class="card-body">
                <form action="{{ route("admin.clubs.update", [$club->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ _e('Name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($club) ? $club->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                        <label for="website">{{ _e('Website') }}</label>
                        <input type="text" id="website" name="website" class="form-control" value="{{ old('website', isset($club) ? $club->website : '') }}" required>
                        @if($errors->has('website'))
                            <em class="invalid-feedback">
                                {{ $errors->first('website') }}
                            </em>
                        @endif
                        <p class="helper-block"></p>
                    </div>

                    <div class="form-group {{ $errors->has('person') ? 'has-error' : '' }}">
                        <label for="person">{{ _e('Contact person') }}</label>
                        <input type="text" id="person" name="person" class="form-control" value="{{ old('person', isset($club) ? $club->person : '') }}" required>
                        @if($errors->has('person'))
                            <em class="invalid-feedback">
                                {{ $errors->first('person') }}
                            </em>
                        @endif
                        <p class="helper-block"></p>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">{{ _e('Email') }}</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($club) ? $club->email : '') }}" required>
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">{{ _e('Phone') }}</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($club) ? $club->phone : '') }}" required>
                        @if($errors->has('phone'))
                            <em class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                    </div>
                </form>
            </div>
        </div>
    @endcanany
@endsection