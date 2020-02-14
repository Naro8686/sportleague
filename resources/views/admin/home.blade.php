@extends('layouts.admin')

@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Hello {{ Auth::user()->first_name }}!</h6>
                            @if(is_null(Auth::user()->payment) || Auth::user()->payment->status != 'success')
                                <p class="text-muted tx-13 my-3 mb-md-0"><a href="{{ route('payment')  }}">Pay</a> to fully use the site</p>
                            @else
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <p class="text-muted tx-13 my-3 mb-md-0">Welcome to dashboard</p>
                                    <a href="{{ Auth::user()->payment->invoice_url }}" target="_blank">
                                        <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40"> Receipt
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

        @if(Auth::user()->payment && Auth::user()->payment->status == 'success')
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-header">
                    You are registered to marshal the following races
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
                                <th>Register date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->races as $key => $item)
                                <tr data-entry-id="{{ $item->id }}">
                                    <td>{{ $item->date ?? '' }}</td>
                                    <td>{{ $item->name ?? '' }}</td>
                                    <td>{{ $item->location ?? '' }}</td>
                                    <td>{{ $item->start_time ?? '' }}</td>
                                    <td>{{ $item->pivot->created_at ?? '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endif
    </div>

@endsection
@section('scripts')
    @parent

@endsection