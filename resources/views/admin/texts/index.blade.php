@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.texts.create") }}">Add text</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Texts list</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable_text">
                    <thead>
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td>{{ $item->key ?? '' }}</td>
                        <td>{{ $item->value ?? '' }}</td>
                        <td>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.texts.edit', $item->id) }}">Edit</a>
                            <form action="{{ route('admin.texts.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
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