@extends('layouts.admin')
@section('content')

    <div class="d-flex justify-content-between w-100">
        <h3 class="mb-4">Registration details</h3>
        <a href="{{action('Admin\ReportsController@registrationPDF')}}">
            <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40">
        </a>
    </div>

    <div class="card">
        <div class="card-header">Total Registrations: {{ $users->count() }}</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="250">Registrations by Club</th>
                        @foreach($clubs as $club)
                            <th>{{ $club->name }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        @foreach($clubs as $club)
                            <td>{{ $club->users->count() }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th width="250">Registrations by Category</th>
                            @foreach($categories as $category)
                                <th>{{ $category->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            @foreach($categories as $category)
                                <td>{{ $users->where('race_category', $category->name)->count() }}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th width="250">Breakdown by Club</th>
                            @foreach($categories as $category)
                                <th>{{ $category->name }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clubs as $club)
                            <tr>
                                <td>{{ $club->name }}</td>
                                @foreach($categories as $category)
                                    <td>{{ $club->users->where('race_category', $category->name)->count() }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('javascript')
    @parent
    <script>
        $(function () {

        })
    </script>
@endsection