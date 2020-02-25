@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">{{ _e('Show user') }}</div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>{{ _e('Name') }}</th>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Email') }}</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Phone') }}</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    @if($user->race_category)
                        <tr>
                            <th>{{ _e('Race category') }}</th>
                            <td>{{ $user->race_category }}</td>
                        </tr>
                    @endif
                    @if($user->club->count())
                        <tr>
                            <th>{{ _e('Club') }}</th>
                            <td>{{ $user->club[0]->name }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>{{ _e('Roles') }}</th>
                        <td>
                            @foreach($user->roles()->pluck('name') as $role)
                                <span class="label label-info label-many">{{ $role }}</span>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">{{ _e('Back to list') }}</a>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">{{ _e('User races') }}</div>

        <div class="card-body">
            <div class="mb-2">
                <table class=" table table-bordered table-striped table-hover user_races_table">
                    <thead>
                    <tr>
                        <th>{{ _e('Name') }}</th>
                        <th>{{ _e('Location') }}</th>
                        <th>{{ _e('Start time') }}</th>
                        <th>{{ _e('Min marshals') }}</th>
                        <th>{{ _e('Max participants') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->races as $race)
                        <tr data-entry-id="{{ $race->id }}">
                            <td>{{ $race->name ?? '' }}</td>
                            <td>
                                <a href="{{ $race->location_link ?? '' }}" target="_blank">{{ $race->location }}<img src="{{ asset('admin-assets/assets/images/location.png') }}" class="ext_link">
                            </td>
                            <td>{{ $race->start_time ?? '' }}</td>
                            <td>{{ $race->min_marshals ?? '' }} ( {{ $race->users->count() }} Registered )</td>
                            <td>{{ $race->max_marshals ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
        $(function () {
            $('.user_races_table').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'colvis'
                ]
            });
        })
    </script>
@endsection