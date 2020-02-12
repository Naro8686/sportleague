@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header w-100 d-flex justify-content-between align-items-center">
            Payments
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-payments">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Full name</th>
                        <th>Amount</th>
                        <th>Invoice URL</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ $item->user->email ?? '' }}</td>
                            <td>{{ $item->user->first_name . ' ' . $item->user->last_name  ?? '' }}</td>
                            <td>{{ $item->amount ?? '' }}</td>
                            <td><a href="{{ $item->invoice_url ?? '' }}">URL</a></td>
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