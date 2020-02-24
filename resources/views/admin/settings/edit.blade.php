@extends('layouts.admin')
@section('content')
    <div class="card">
            <div class="card-header">{{ _e('Edit setting') }}</div>

            <div class="card-body">
                <form action="{{ route("admin.settings.update", [$setting->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <input type="hidden" id="title" name="title" value="{{ old('title', isset($setting) ? $setting->title : '') }}" required>

                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content">{{ _e('Content') }}</label>
                        <input type="text" id="content" name="content" class="form-control" value="{{ old('content', isset($setting) ? $setting->content : '') }}" required>
                        @if($errors->has('content'))
                            <em class="invalid-feedback">
                                {{ $errors->first('content') }}
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