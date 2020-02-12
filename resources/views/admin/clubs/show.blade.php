@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">{{ _e('Show Club') }}</div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>{{ _e('Name') }}</th>
                        <td>{{ $club->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Website') }}</th>
                        <td>{{ $club->website }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Contact person') }}</th>
                        <td>{{ $club->person }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Email') }}</th>
                        <td>{{ $club->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Phone') }}</th>
                        <td>{{ $club->phone }}</td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">{{ _e('Back to list') }}</a>
            </div>
        </div>
    </div>
@endsection