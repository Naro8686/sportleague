@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">{{ _e('Create setting') }}</div>
        <div class="card-body">
            <form action="{{ route("admin.settings.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                    <label for="title">{{ _e('Title') }}</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($data) ? $data->title : '') }}" required>
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label for="content">{{ _e('Content') }}</label>
                    <input type="text" id="content" name="content" class="form-control" value="{{ old('content', isset($data) ? $data->content : '') }}" required>
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