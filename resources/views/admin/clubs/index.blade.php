@extends('layouts.admin')
@section('content')
    @canany(['clubs_manage'])
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.clubs.create") }}">
                    Add Clubs
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Clubs list
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Website</th>
                            <th>Contact person</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr data-entry-id="{{ $item->id }}">
                                <td>{{ $item->name ?? '' }}</td>
                                <td>{{ $item->website ?? '' }}</td>
                                <td>{{ $item->person ?? '' }}</td>
                                <td>{{ $item->email ?? '' }}</td>
                                <td>{{ $item->phone ?? '' }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.clubs.show', $item->id) }}">
                                        View
                                    </a>
                                    @canany(['clubs_manage'])
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.clubs.edit', $item->id) }}">
                                            Edit
                                        </a>
                                    @endcanany
                                    @canany(['clubs_manage'])
                                        <form action="{{ route('admin.clubs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
    @endcanany
@endsection