@extends('layouts.admin')
@section('content')
    @canany('users_manage')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.users.create") }}">{{ _e('Add user') }}</a>
            </div>
        </div>
    @endcanany
    <div class="card">
        <div class="card-header">{{ _e('Users list') }}</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th>{{ _e('Full name') }}</th>
                        <th>{{ _e('Phone') }}</th>
                        <th>{{ _e('Email') }}</th>
                        <th>{{ _e('Club') }}</th>
                        <th>{{ _e('Race category') }}</th>
                        <th>{{ _e('Type') }}</th>
                        <th>{{ _e('Paid') }}</th>
                        @canany('users_manage')
                            <th>Actions</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</td>
                            <td>{{ $user->phone ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            <td>{{ $user->club->first()->name ?? '' }}</td>
                            <td>{{ $user->race_category ?? '' }}</td>
                            <td>
                                @foreach($user->roles()->pluck('name') as $role)
                                    @if( $role == 'league_admin')
                                        <span class="badge badge-info">League Admin</span>
                                    @else
                                        <span class="badge badge-info">Participant</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if($user->payment && $user->payment->status == 'success')
                                    {{ _e('Yes') }}
                                @else
                                    {{ _e('No') }}
                                @endif
                            </td>
                            @canany('users_manage')
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                        {{ _e('View') }}
                                    </a>
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ _e('Edit') }}
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?');"
                                          style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                               value="{{ _e('Delete') }}">
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
                    'colvis'
                ]
            })
        })
    </script>
@endsection