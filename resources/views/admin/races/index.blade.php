@extends('layouts.admin')
@section('content')
    @canany(['races_manage'])
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.races.create") }}">Add Race</a>
            </div>
        </div>
    @endcanany
    <div class="card">
        <div class="card-header">Races list</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-races">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Location link</th>
                        <th>Start time</th>
                        <th>Min marshals</th>
                        <th>Max participants</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ $item->date ?? '' }}</td>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->location ?? '' }}</td>
                            <td><a href="{{ $item->location_link ?? '' }}" target="_blank">Link</a></td>
                            <td>{{ $item->start_time ?? '' }}</td>
                            <td>{{ $item->min_marshals ?? '' }} ( {{ $item->users->count() }} Registered )</td>
                            <td>{{ $item->max_marshals ?? '' }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.races.show', $item->id) }}">View</a>
                                @canany(['races_manage'])
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.races.edit', $item->id) }}">Edit</a>
                                @endcanany
                                @canany(['races_manage'])
                                    <form action="{{ route('admin.races.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcanany
                            </td>
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
            $('.datatable-races').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {
                        text: 'PDF',
                        extend: 'pdfHtml5',
                        title: '',
                        filename: 'races',
                        customize: function (doc) {
                            doc['header'] = (function () {
                                return {
                                    columns: [
                                        {
                                            alignment: 'left',
                                            text: 'Races list',
                                            fontSize: 18,
                                            margin: [40, 10]
                                        },
                                    ]
                                }
                            });
                        }
                    },
                    'colvis'
                ],
            })
        })
    </script>
@endsection