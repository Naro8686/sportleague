@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">{{ _e('Edit setting') }}</div>

        <div class="card-body">
            <form action="{{ route("admin.coming-update") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="content">{{ _e('Site status') }}</label>
                    <div class="d-flex align-items-center">
                        <label>
                            <input type="radio" name="show" value="true" {{ ($setting['show'] == 'true') ? 'checked' : '' }}>Coming soon
                        </label>
                        <label>
                            <input type="radio" name="show" value="false" class="ml-2" {{ ($setting['show'] == 'false') ? 'checked' : '' }}>Live
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">{{ _e('Date') }}</label>
                    <input type="text" id="content" name="date" class="form-control" value="{{ $setting['date'] }}" required>
                </div>

                <div class="form-group">
                    <label for="title">{{ _e('Text') }}</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $setting['title'] }}" required>
                </div>

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label for="description">{{ _e('Content') }}</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ $setting['description'] }}" required>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection