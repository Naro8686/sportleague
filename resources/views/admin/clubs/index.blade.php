@extends('layouts.admin')
@section('content')
    @canany(['clubs_manage'])
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.clubs.create") }}">{{ _e('Add Clubs') }}</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">{{ _e('Clubs list') }}</div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable clubs_table">
                        <thead>
                        <tr>
                            <th>{{ _e('Name') }}</th>
                            <th>{{ _e('Website') }}</th>
                            <th>{{ _e('Contact person') }}</th>
                            <th>{{ _e('Email') }}</th>
                            <th>{{ _e('Phone') }}</th>
                            <th>{{ _e('Actions') }}</th>
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
                                        {{ _e('View') }}
                                    </a>
                                    @canany(['clubs_manage'])
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.clubs.edit', $item->id) }}">
                                            {{ _e('Edit') }}
                                        </a>
                                    @endcanany
                                    @canany(['clubs_manage'])
                                        <form action="{{ route('admin.clubs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ _e('Delete') }}">
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
@section('javascript')
    @parent
    <script>
        $(function () {
            $('.clubs_table').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'colvis'
                ]
            })
        })
    </script>
@endsection