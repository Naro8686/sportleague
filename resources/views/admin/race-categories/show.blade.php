@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">Show Category</div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $raceCategory->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $raceCategory->name }}</td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">Back to list</a>
            </div>


        </div>
    </div>
@endsection