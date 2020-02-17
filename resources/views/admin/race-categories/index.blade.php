@extends('layouts.admin')
@section('content')
    @canany(['race_categories_manage'])
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.race-categories.create") }}">{{ _e('Add Category') }}</a>
            </div>
        </div>
    @endcanany
    <div class="card">
        <div class="card-header">{{ _e('Race categories') }}</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-race-categories">
                    <thead>
                    <tr>
                        <th>{{ _e('Name') }}</th>
                        <th>{{ _e('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ $item->name ?? '' }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary"
                                   href="{{ route('admin.race-categories.show', $item->id) }}">{{ _e('View') }}</a>
                                <a class="btn btn-xs btn-info"
                                   href="{{ route('admin.race-categories.edit', $item->id) }}">{{ _e('Edit') }}</a>
                                <form action="{{ route('admin.race-categories.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ _e('Delete') }}">
                                </form>
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
            $('.datatable-race-categories').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'colvis'
                ]
            })
        })
    </script>
@endsection