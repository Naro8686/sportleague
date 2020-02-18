@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.permissions.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td>{{ $permission->id ?? '' }}</td>
                            <td>{{ $permission->name ?? '' }}</td>
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
            $('.datatable-Permission').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'colvis'
                ]
            })
        })
    </script>
@endsection