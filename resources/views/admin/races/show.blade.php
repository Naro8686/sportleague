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

            <div class="mb-2">
                <h4 class="my-3">Race marshals</h4>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable race_users">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($race->users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>{{ $user->id ?? '' }}</td>
                                <td>{{ $user->first_name ?? '' }}</td>
                                <td>{{ $user->last_name ?? '' }}</td>
                                <td>{{ $user->phone ?? '' }}</td>
                                <td>{{ $user->email ?? '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
        $(function () {
            $('.race_users').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: 'Race marshals',
                    }
                ]
            })
        })
    </script>
@endsection