@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.privacy-policy.index') }}">Privacy policy</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('global.update') }}</li>
            </ol>
        </nav>

        <div class="form-block">
            <form action="{{ route("admin.privacy-policy.update", [$data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div id="accordion" class="mb-3">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">Content</h5>
                        </div>
                        <div>
                            <div class="card-body">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                           value="{{ old('title', isset($data) ? $data->title : '') }}">
                                    @if($errors->has('title'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </em>
                                    @endif
                                    <p class="helper-block"></p>
                                </div>

                                <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                                    <label for="text">Text</label>
                                    <textarea type="text" id="text" name="text" class="form-control">{{ old('text', isset($data) ? $data->text : '') }}</textarea>
                                    @if($errors->has('text'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('text') }}
                                        </em>
                                    @endif
                                    <p class="helper-block"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input class="btn btn-danger" type="submit" value="Save">
            </form>
        </div>
    </div>
@endsection