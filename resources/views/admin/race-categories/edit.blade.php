@extends('layouts.admin')
@section('content')
    @canany(['race_categories_manage'])
        <div class="card">
            <div class="card-header">{{ _e('Edit category') }}</div>

            <div class="card-body">
                <form action="{{ route("admin.race-categories.update", $raceCategory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">{{ _e('Name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($raceCategory) ? $raceCategory->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
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