@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">{{ _e('Show Category') }}</div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>{{ _e('Name') }}</th>
                        <td>{{ $raceCategory->name }}</td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">{{ _e('Back to list') }}</a>
            </div>


        </div>
    </div>
@endsection