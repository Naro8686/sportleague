@extends('layouts.admin')
@section('content')
    @canany(['races_manage'])
        <div class="card">
            <div class="card-header">{{ _e('Create race') }}</div>

            <div class="card-body">
                <form action="{{ route("admin.races.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                        <label for="race_date">{{ _e('Start date') }}</label>
                        <div class="input-group date datepicker" id="race_date">
                            <input type="text" class="form-control" name="date" value="{{ old('date', isset($data) ? $data->date : '') }}" required>
                            <span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                        @if($errors->has('date'))
                            <em class="invalid-feedback">
                                {{ $errors->first('date') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ _e('Name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($data) ? $data->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                        <label for="location">{{ _e('Location') }}</label>
                        <input type="text" id="location" name="location" class="form-control" value="{{ old('location', isset($data) ? $data->location : '') }}" required>
                        @if($errors->has('location'))
                            <em class="invalid-feedback">
                                {{ $errors->first('location') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('location_link') ? 'has-error' : '' }}">
                        <label for="location_link">{{ _e('Location link') }}</label>
                        <input type="text" id="location_link" name="location_link" class="form-control" value="{{ old('location_link', isset($data) ? $data->location_link : '') }}" required>
                        @if($errors->has('location_link'))
                            <em class="invalid-feedback">
                                {{ $errors->first('location_link') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                        <label for="start_time">{{ _e('Start time') }}</label>
                        <input type="text" id="start_time" name="start_time" class="form-control" value="{{ old('start_time', isset($data) ? $data->start_time : '') }}" required>
                        @if($errors->has('start_time'))
                            <em class="invalid-feedback">
                                {{ $errors->first('start_time') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('club') ? 'has-error' : '' }}">
                        <label for="club">{{ _e('Club') }}</label>
                        <select name="club_id">
                            @foreach($clubs as $club)
                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('club'))
                            <em class="invalid-feedback">
                                {{ $errors->first('club') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('max_marshals') ? 'has-error' : '' }}">
                        <label for="max_marshals">{{ _e('Max participants') }}</label>
                        <input type="number" id="max_marshals" name="max_marshals" class="form-control" value="{{ old('max_marshals', isset($data) ? $data->max_marshals : '') }}">
                        @if($errors->has('max_marshals'))
                            <em class="invalid-feedback">
                                {{ $errors->first('max_marshals') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('min_marshals') ? 'has-error' : '' }}">
                        <label for="min_marshals">{{ _e('Min marshals') }}</label>
                        <input type="number" id="min_marshals" name="min_marshals" class="form-control" value="{{ old('min_marshals', isset($data) ? $data->min_marshals : '') }}">
                        @if($errors->has('min_marshals'))
                            <em class="invalid-feedback">
                                {{ $errors->first('min_marshals') }}
                            </em>
                        @endif
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                    </div>
                </form>


            </div>
        </div>
    @endcanany
@endsection