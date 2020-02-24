@extends('layouts.admin')

@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Hello {{ Auth::user()->first_name }}!</h6>
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <p class="text-muted tx-13 my-3 mb-md-0">{{ _e('Welcome to your dashboard') }}</p>
                                @if(!is_null(Auth::user()->payment) && !is_null(Auth::user()->payment->invoice_url))
                                <a href="{{ Auth::user()->payment->invoice_url }}" target="_blank">
                                    <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40"> {{ _e('Your Receipt') }}
                                </a>
                                @endif
                            </div>
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
                    {{ _e('You are registered to marshal the following races') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                            <thead>
                            <tr>
                                <th>{{ _e('Race date') }}</th>
                                <th>{{ _e('Race name') }}</th>
                                <th>{{ _e('Location') }}</th>
                                <th>{{ _e('Start time') }}</th>
                                <th>{{ _e('DATE REGISTERED') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->races as $key => $item)
                                <tr data-entry-id="{{ $item->id }}">
                                    <td>{{ date('d.m.Y', $item->date) ?? '' }}</td>
                                    <td>{{ $item->name ?? '' }}</td>
                                    <td>
                                        @if($item->location_link != '')
                                            <a href="{{ $item->location_link }}" target="_blank">
                                                {{ $item->location ?? '' }}
                                                <img src="{{ asset('front-assets/img/ext_link.png') }}" class="ext_link">
                                            </a>
                                        @else
                                            {{ $item->location ?? '' }}
                                        @endif
                                    </td>
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