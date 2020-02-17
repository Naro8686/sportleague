@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">{{ _e('Edit profile') }}</div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">{{ _e('First name') }}*</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required>
                @if($errors->has('first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="last_name">{{ _e('Last name') }}*</label>
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
                <label for="email">{{ _e('Email') }}*</label>
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
                        <option value="{{ $club->id }}" {{ ($user->club->count() && $user->club[0]->id == $club->id) ? 'selected' : '' }}>{{ $club->name }}</option>
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
                        <option value="{{ $category->name }}" {{ ($user->race_category == $category->name) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('race_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('race_category') }}
                    </em>
                @endif
            </div>

            @if(Auth::user()->hasRole('administrator'))
                <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ _e('Roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <br>
                <label for="">
                    {{ _e('Connected roles') }}:
                    @php($connected_role = $user->roles()->get())
                    @foreach($connected_role as $id => $role_n)
                        <span class="btn btn-info btn-xs">{{ $role_n['name'] }}</span>
                    @endforeach
                </label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains('name', $id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block"></p>
            </div>
            @endif
            <div>
                <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
            </div>
        </form>

    </div>
</div>
@endsection