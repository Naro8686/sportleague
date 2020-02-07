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
                        <th>Location link</th>
                        <td><a href="{{ $item->location_link ?? '' }}" target="_blank">Link</a></td>
                    </tr>
                    <tr>
                        <th>Start time</th>
                        <td>{{ $race->start_time }}</td>
                    </tr>
                    <tr>
                        <th>Min marshals</th>
                        <td>{{ $race->min_marshals }}</td>
                    </tr>
                    <tr>
                        <th>Max participants</th>
                        <td>{{ $race->max_marshals }}</td>
                    </tr>
                    <tr>
                        <th>No. of marshals</th>
                        <td>{{ $race->users->count() }}</td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    Back to list
                </a>
            </div>

            <div class="mb-2">
                <h4 class="my-3">Marshals ({{ $race->users->count() }})</h4>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable race_users">
                        <thead>
                        <tr>
                            <th>Full name</th>
                            <th>Club</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($race->users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</td>
                                <td>{{ $user->club->first()->name ?? '' }}</td>
                                <td>{{ $user->race_category ?? '' }}</td>
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
                "buttons": [
                {
                    text: 'PDF',
                    extend: 'pdfHtml5',
                    title: '',
                    filename: 'race-marshals',
                    customize: function (doc) {
                        doc['header']=(function() {
                            return {
                                columns: [
                                    {
                                        alignment: 'left',
                                        text: '{{ $race->name }} Race marshals',
                                        fontSize: 18,
                                        margin: [40,10]
                                    },
                                ]
                            }
                        });
                    }
                }],
            })
        })
    </script>
@endsection