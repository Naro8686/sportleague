@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show Race
        </div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $race->id }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $race->date }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $race->name }}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>{{ $race->location }}</td>
                    </tr>
                    <tr>
                        <th>Start time</th>
                        <td>{{ $race->start_time }}</td>
                    </tr>
                    <tr>
                        <th>Max marshals</th>
                        <td>{{ $race->max_marshals }}</td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    Back to list
                </a>
            </div>


        </div>
    </div>
@endsection