@extends('layouts.admin')
@section('content')
    @canany(['race_categories_manage'])
        <div class="card">
            <div class="card-header">
                Create category
            </div>

            <div class="card-body">
                <form action="{{ route("admin.race-categories.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($data) ? $data->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    @endcanany
@endsection