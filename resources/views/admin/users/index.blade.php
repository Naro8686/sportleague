@extends('layouts.admin')
@section('content')
    @canany('users_manage')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                Add user
            </a>
        </div>
    </div>
    @endcanany
    <div class="card">
        <div class="card-header">Users list</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        @canany('users_manage')
                            <th>Type</th>
                            <th></th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td></td>
                            <td>{{ $user->id ?? '' }}</td>
                            <td>{{ $user->first_name ?? '' }}</td>
                            <td>{{ $user->last_name ?? '' }}</td>
                            <td>{{ $user->phone ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            @canany('users_manage')
                                <td>
                                    @foreach($user->roles()->pluck('name') as $role)
                                        <span class="badge badge-info">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                    View
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            </td>
                            @endcanany
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
            $('.datatable-User:not(.ajaxTable)').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            })
        })
    </script>
@endsection