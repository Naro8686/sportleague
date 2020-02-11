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
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Payer ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Country</th>
                        <th>Invoice number</th>
                        <th>Amount</th>
                        <th>Token</th>
                        <th>Invoice URL</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ $item->user_id  ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ $item->payer_id ?? '' }}</td>
                            <td>{{ $item->first_name ?? '' }}</td>
                            <td>{{ $item->last_name ?? '' }}</td>
                            <td>{{ $item->country ?? '' }}</td>
                            <td>{{ $item->invoice_number ?? '' }}</td>
                            <td>{{ $item->amt ?? '' }}</td>
                            <td>{{ $item->token ?? '' }}</td>
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