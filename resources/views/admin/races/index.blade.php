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
        <div class="card">
            <div class="card-header">
                Races list
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                        <tr>
                            <th width="10"></th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Start time</th>
                            <th>Max marshals</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr data-entry-id="{{ $item->id }}">
                                <td></td>
                                <td>{{ $item->id ?? '' }}</td>
                                <td>{{ $item->date ?? '' }}</td>
                                <td>{{ $item->name ?? '' }}</td>
                                <td>{{ $item->location ?? '' }}</td>
                                <td>{{ $item->start_time ?? '' }}</td>
                                <td>{{ $item->max_marshals ?? '' }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.races.show', $item->id) }}">
                                        View
                                    </a>
                                    @canany(['races_manage'])
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.races.edit', $item->id) }}">
                                            Edit
                                        </a>
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
    @endcanany
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                    @can('users_manage')
            let deleteButtonTrans = 'Delete',
                deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.clients.mass_destroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('Not selected')

                        return
                    }

                    if (confirm('Are you sure?')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 100,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({buttons: dtButtons})
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection