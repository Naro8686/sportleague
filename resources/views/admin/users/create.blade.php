@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">{{ _e('Create user') }}</div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">{{ _e('First name') }}</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required>
                @if($errors->has('first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="last_name">{{ _e('Last name') }}</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" required>
                @if($errors->has('last_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ _e('Phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($user) ? $user->phone : '') }}" required>
                @if($errors->has('phone'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ _e('Email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('club') ? 'has-error' : '' }}">
                <label for="club">{{ _e('Club') }}</label>
                <select name="club">
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

            <div class="form-group {{ $errors->has('race_category') ? 'has-error' : '' }}">
                <label for="race_category">{{ _e('Race category') }}</label>
                <select name="race_category">
                    @foreach($race_categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('race_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('race_category') }}
                    </em>
                @endif
            </div>

            <div class="form-group">
                <label>{{ _e('Event to marshal') }}</label>
                <select class="register_events" name="event[]" multiple>
                    @foreach($races as $race)
                        @if(!$race->max_marshals && $race->max_marshals > $race->users->count() || $race->min_marshals > $race->users->count() )
                            <option value="{{ $race->id }}">{{ $race->name }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="helper-block">
                    {{ _e('Select 2 events to marshal') }}
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ _e('Password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="password_confirmation">{{ _e('Confirm password') }}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                @if($errors->has('password_confirmation'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ _e('Roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
            </div>
        </form>


    </div>
</div>
@endsection