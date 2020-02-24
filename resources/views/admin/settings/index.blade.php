@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.settings.create") }}">{{ _e('Add setting') }}</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">{{ _e('Settings list') }}</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable_text">
                    <thead>
                    <tr>
                        <th>{{ _e('Title') }}</th>
                        <th>{{ _e('Content') }}</th>
                        <th>{{ _e('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td>{{ $item->title ?? '' }}</td>
                        <td>{{ $item->content ?? '' }}</td>
                        <td>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.settings.edit', $item->id) }}">{{ _e('Edit') }}</a>
                            <form action="{{ route('admin.settings.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
            $('.datatable_text').DataTable({
                "pageLength": 100
            })
        })
    </script>
@endsection