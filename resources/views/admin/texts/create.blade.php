@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Create text
        </div>
        <div class="card-body">
            <form action="{{ route("admin.texts.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                    <label for="key">Key</label>
                    <input type="text" id="key" name="key" class="form-control" value="{{ old('key', isset($data) ? $data->key : '') }}" required>
                    @if($errors->has('key'))
                        <em class="invalid-feedback">
                            {{ $errors->first('key') }}
                        </em>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                    <label for="value">Value</label>
                    <input type="text" id="value" name="value" class="form-control" value="{{ old('value', isset($data) ? $data->value : '') }}" required>
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