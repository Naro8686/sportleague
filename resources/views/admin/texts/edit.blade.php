@extends('layouts.admin')
@section('content')
    <div class="card">
            <div class="card-header">Edit text</div>

            <div class="card-body">
                <form action="{{ route("admin.texts.update", [$text->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
{{--                    <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">--}}
{{--                        <label for="key">Key</label>--}}
                        <input type="hidden" id="key" name="key" class="form-control" value="{{ old('key', isset($text) ? $text->key : '') }}" required>
{{--                        @if($errors->has('key'))--}}
{{--                            <em class="invalid-feedback">--}}
{{--                                {{ $errors->first('key') }}--}}
{{--                            </em>--}}
{{--                        @endif--}}
{{--                    </div>--}}

                    <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                        <label for="value">Value</label>
                        <input type="text" id="value" name="value" class="form-control" value="{{ old('value', isset($text) ? $text->value : '') }}" required>
                        @if($errors->has('value'))
                            <em class="invalid-feedback">
                                {{ $errors->first('value') }}
                            </em>
                        @endif
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
@endsection