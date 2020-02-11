@extends('layouts.admin')

@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Hello {{ Auth::user()->first_name }}!</h6>
                            @if(is_null(Auth::user()->payment))
                                <p class="text-muted tx-13 my-3 mb-md-0"><a href="{{ route('payment')  }}">Pay</a> to fully use the site</p>
                                <a href="{{action('Admin\RacesController@races_pdf')}}">
                                    <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40">
                                </a>
                            @else
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <p class="text-muted tx-13 my-3 mb-md-0">Welcome to dashboard</p>
                                    <a href="{{ Auth::user()->payment->invoice_url }}" target="_blank">
                                        <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40"> Invoice
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div>

@endsection
@section('scripts')
    @parent

@endsection