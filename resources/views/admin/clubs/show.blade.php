@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Show Club
        </div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $club->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $club->name }}</td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td>{{ $club->website }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $club->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $club->phone }}</td>
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