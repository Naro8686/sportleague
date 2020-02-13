@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            My races
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th>Race date</th>
                        <th>Race name</th>
                        <th>Location</th>
                        <th>Start time</th>
                        <th>Invoice</th>
                        <th>Register date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->races as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                            <td>{{ $item->date ?? '' }}</td>
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->location ?? '' }}</td>
                            <td>{{ $item->start_time ?? '' }}</td>
                            <td><a href="{{ $user->payment->invoice_url ?? '' }}">Open</a></td>
                            <td>{{ $item->pivot->created_at ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection