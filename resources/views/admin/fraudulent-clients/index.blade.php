@extends('layouts.admin')
@section('content')
    @canany(['add_ccl', 'add_anything', 'users_manage'])
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.clients.create") }}">
                    Add Clients
                </a>
            </div>
        </div>
    @endcanany
    @canany(['view_ccl', 'view_anything', 'users_manage'])
        <div class="card">
            <div class="card-header">
                Fraudulent Clients {{ trans('global.list') }}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <th>
                                Hotel name
                            </th>
                            <th>
                                Guest name
                            </th>
                            <th>
                                Booker name if different
                            </th>
                            <th>
                                Country of origin/citizenship
                            </th>
                            <th>
                                Card type
                            </th>
                            <th>
                                Card number
                            </th>
                            <th>
                                Date of payment
                            </th>
                            <th>
                                Comment
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $item)
                            <tr data-entry-id="{{ $item->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $item->id ?? '' }}
                                </td>
                                <td>
                                    {{ $item->hotel_name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->guest_name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->booker_name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->country ?? '' }}
                                </td>
                                <td>
                                    {{ $item->card_type ?? '' }}
                                </td>
                                <td>
                                    {{ $item->card_number ?? '' }}
                                </td>
                                <td>
                                    {{ $item->date_of_payment ?? '' }}
                                </td>
                                <td>
                                    {{ $item->comment ?? '' }}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary"
                                       href="{{ route('admin.clients.show', $item->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                    @canany(['edit_ccl', 'edit_anything', 'users_manage'])
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $item->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcanany
                                    @canany(['users_manage'])
                                        <form action="{{ route('admin.clients.destroy', $item->id) }}" method="POST"
                                              onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                              style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                   value="{{ trans('global.delete') }}">
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
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.clients.mass_destroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
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