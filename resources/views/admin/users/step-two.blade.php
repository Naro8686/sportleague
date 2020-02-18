@extends('layouts.admin')
@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">{{ _e('Your payment was successfully.') }}</a>
                                <h5 class="text-muted font-weight-normal mb-4">{{ _e('Select 2 events to finish registration') }}</h5>
                                <form class="forms-sample" method="POST" action="{{ route('select-races') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label>{{ _e('Phone') }}</label>
                                        <input name="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" required placeholder="Phone" value="{{ old('phone', isset(Auth::user()->phone) ? Auth::user()->phone : null) }}">
                                        @if($errors->has('phone'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>{{ _e('Club') }}</label>
                                        <select name="club">
                                            @foreach($clubs as $club)
                                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ _e('Race category') }}</label>
                                        <select name="race_category">
                                            @foreach($race_categories as $race_category)
                                                <option value="{{ $race_category->name }}">{{ $race_category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ _e('Events to marshal') }}</label>
                                        <select class="register_events" name="event[]" multiple required>
                                            @foreach($races as $race)
                                                @if($race->max_marshals && $race->max_marshals <= $race->users->count() )

                                                @else
                                                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">{{ _e('Finish') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
        $(function () {
            $(document).on('submit', '.forms-sample', function (e) {
                if($(".register_events option:selected").length < 2) {
                    e.preventDefault();
                    alert('Select 2 events')
                }
            });
        })
    </script>
@endsection