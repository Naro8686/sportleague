@extends('layouts.admin')
@section('content')
    <div class="card">
            <div class="card-header">{{ _e('Edit text') }}</div>

            <div class="card-body">
                <form action="{{ route("admin.texts.update", [$text->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <input type="hidden" id="key" name="key" value="{{ old('key', isset($text) ? $text->key : '') }}" required>

                    <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                        <label for="value">{{ _e('Value') }}</label>
                        <input type="text" id="value" name="value" class="form-control" value="{{ old('value', isset($text) ? $text->value : '') }}" required>
                        @if($errors->has('value'))
                            <em class="invalid-feedback">
                                {{ $errors->first('value') }}
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