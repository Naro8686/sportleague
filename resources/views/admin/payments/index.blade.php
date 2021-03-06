@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header w-100 d-flex justify-content-between align-items-center">{{ _e('Payments') }}</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-payments">
                    <thead>
                    <tr>
                        <th>{{ _e('Email') }}</th>
                        <th>{{ _e('Full name') }}</th>
                        <th>{{ _e('Amount') }}</th>
                        <th>{{ _e('Invoice URL') }}</th>
                        <th>{{ _e('Date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ $item->email ?? $item->user->email }}</td>
                            <td>{{ $item->full_name ?? $item->user->first_name . ' ' . $item->user->first_name }}</td>
                            <td>{{ $item->amount ?? '' }}</td>
                            <td>
                                @if(is_null($item->invoice_url))
                                    {{ _e('Cash') }}
                                @else
                                    <a href="{{ $item->invoice_url ?? '' }}">{{ _e('URL') }}</a>
                                @endif
                            </td>
                            <td>{{ $item->created_at ?? '' }}</td>
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
            $('.datatable-payments').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'colvis'
                ],
            })
        })
    </script>
@endsection