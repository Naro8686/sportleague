@extends('layouts.admin')
@section('content')
    @canany(['league_manage'])
        <div class="card">
            <div class="card-header">{{ _e('League settings') }}</div>

            <div class="card-body">
                <form action="{{ route("admin.league.update", [$league->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                        <label for="league_start_date">Start date</label>
                        <div class="input-group date datepicker" id="league_start_date">
                            <input type="text" class="form-control" name="start_date" value="{{ old('start_date', isset($league) ? $league->start_date : '') }}" required>
                            <span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                        @if($errors->has('start_date'))
                            <em class="invalid-feedback">
                                {{ $errors->first('start_date') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                        <label for="league_end_date">End date</label>
                        <div class="input-group date datepicker" id="league_end_date">
                            <input type="text" class="form-control" name="end_date" value="{{ old('end_date', isset($league) ? $league->end_date : '') }}" required>
                            <span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                        @if($errors->has('end_date'))
                            <em class="invalid-feedback">
                                {{ $errors->first('end_date') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($league) ? $league->price : '') }}" required>
                        @if($errors->has('price'))
                            <em class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('min_marshals') ? 'has-error' : '' }}">
                        <label for="min_marshals">Min marshals</label>
                        <input type="number" id="min_marshals" name="min_marshals" class="form-control" value="{{ old('min_marshals', isset($league) ? $league->min_marshals : '') }}" required>
                        @if($errors->has('min_marshals'))
                            <em class="invalid-feedback">
                                {{ $errors->first('min_marshals') }}
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