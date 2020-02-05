@extends('layouts.admin')
@section('content')
    @canany(['races_manage'])
        <div class="card">
            <div class="card-header">
                Edit race
            </div>

            <div class="card-body">
                <form action="{{ route("admin.races.update", $race->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                        <label for="race_date">Start date</label>
                        <div class="input-group date datepicker" id="race_date">
                            <input type="text" class="form-control" name="date" value="{{ old('date', isset($race) ? $race->date : '') }}" required>
                            <span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                        @if($errors->has('date'))
                            <em class="invalid-feedback">
                                {{ $errors->first('date') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($race) ? $race->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" class="form-control" value="{{ old('location', isset($race) ? $race->location : '') }}" required>
                        @if($errors->has('location'))
                            <em class="invalid-feedback">
                                {{ $errors->first('location') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                        <label for="start_time">Start time</label>
                        <input type="text" id="start_time" name="start_time" class="form-control" value="{{ old('start_time', isset($race) ? $race->start_time : '') }}" required>
                        @if($errors->has('start_time'))
                            <em class="invalid-feedback">
                                {{ $errors->first('start_time') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('max_marshals') ? 'has-error' : '' }}">
                        <label for="max_marshals">Max participants</label>
                        <input type="text" id="max_marshals" name="max_marshals" class="form-control" value="{{ old('max_marshals', isset($race) ? $race->max_marshals : '') }}">
                        @if($errors->has('max_marshals'))
                            <em class="invalid-feedback">
                                {{ $errors->first('max_marshals') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('min_marshals') ? 'has-error' : '' }}">
                        <label for="min_marshals">Min marshals</label>
                        <input type="text" id="min_marshals" name="min_marshals" class="form-control" value="{{ old('min_marshals', isset($race) ? $race->min_marshals : '') }}">
                        @if($errors->has('min_marshals'))
                            <em class="invalid-feedback">
                                {{ $errors->first('min_marshals') }}
                            </em>
                        @endif
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="Save">
                    </div>
                </form>


            </div>
        </div>
    @endcanany
@endsection