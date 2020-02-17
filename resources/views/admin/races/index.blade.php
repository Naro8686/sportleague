@extends('layouts.admin')
@section('content')
    @canany(['races_manage'])
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.races.create") }}">{{ _e('Add Race') }}</a>
            </div>
        </div>
    @endcanany
    <div class="card">
        <div class="card-header w-100 d-flex justify-content-between align-items-center">
            Races list
            <a href="{{action('Admin\RacesController@races_pdf')}}">
                <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40">
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-races">
                    <thead>
                    <tr>
                        <th>{{ _e('Date') }}</th>
                        <th>{{ _e('Name') }}</th>
                        <th>{{ _e('Club') }}</th>
                        <th>{{ _e('Location') }}</th>
                        <th>{{ _e('Start time') }}</th>
                        <th>{{ _e('Min marshals') }}</th>
                        <th>{{ _e('Max participants') }}</th>
                        <th>{{ _e('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ date('Y.m.d', $item->date) ?? '' }}</td>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->club->name ?? '' }} ( Phone: {{ $item->club->phone ?? '' }} )</td>
                            <td><a href="{{ $item->location_link ?? '' }}" target="_blank">{{ $item->location ?? '' }}</a></td>
                            <td>{{ $item->start_time ?? '' }}</td>
                            <td>{{ $item->min_marshals ?? '' }} ( {{ $item->users->count() }} Registered )</td>
                            <td>{{ $item->max_marshals ?? '' }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.races.show', $item->id) }}">{{ _e('View') }}</a>
                                @canany(['races_manage'])
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.races.edit', $item->id) }}">{{ _e('Edit') }}</a>
                                @endcanany
                                @canany(['races_manage'])
                                    <form action="{{ route('admin.races.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
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
@endsection
@section('javascript')
    @parent
    <script>
        $(function () {
            $('.datatable-races').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'colvis'
                ],
            })
        })
    </script>
@endsection