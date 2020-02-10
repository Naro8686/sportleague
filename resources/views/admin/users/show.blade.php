@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">Show user</div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    @if($user->race_category)
                        <tr>
                            <th>Race category</th>
                            <td>{{ $user->race_category }}</td>
                        </tr>
                    @endif
                    @if($user->club->count())
                        <tr>
                            <th>Club</th>
                            <td>{{ $user->club[0]->name }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Roles</th>
                        <td>
                            @foreach($user->roles()->pluck('name') as $role)
                                <span class="label label-info label-many">{{ $role }}</span>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">Back to list</a>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">User races</div>

        <div class="card-body">
            <div class="mb-2">
                <table class=" table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Location Link</th>
                        <th>Start time</th>
                        <th>Min marshals</th>
                        <th>Max participants</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->races as $race)
                        <tr data-entry-id="{{ $race->id }}">
                            <td>{{ $race->name ?? '' }}</td>
                            <td>{{ $race->location ?? '' }}</td>
                            <td><a href="{{ $race->location_link ?? '' }}">Link</a></td>
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