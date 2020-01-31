@extends('layouts.admin')

@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Hello {{ Auth::user()->first_name }}!</h6>
                            <p class="text-muted tx-13 my-3 mb-md-0">Welcome to dashboard</p>
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