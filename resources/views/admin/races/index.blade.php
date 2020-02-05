@extends('layouts.admin')
@section('content')
    @canany(['races_manage'])
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.races.create") }}">
                    Add Race
                </a>
            </div>
        </div>
    @endcanany
    <div class="card">
        <div class="card-header">
            Races list
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Start time</th>
                        <th>Min marshals</th>
                        <th>Max participants</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ $item->id ?? '' }}</td>
                            <td>{{ $item->date ?? '' }}</td>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->location ?? '' }}</td>
                            <td>{{ $item->start_time ?? '' }}</td>
                            <td>{{ $item->min_marshals ?? '' }}</td>
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