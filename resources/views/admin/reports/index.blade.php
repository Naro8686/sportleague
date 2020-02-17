@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">{{ _e('Unpaid Registrations') }}</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>{{ _e('Paid') }}</th>
                        <th>{{ _e('Full name') }}</th>
                        <th>{{ _e('Email') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($not_paid as $key => $user)
                        <tr>
                            <td>
                                <input type="checkbox" data-id="{{ $user->id }}" class="user_paid">
                            </td>
                            <td>{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between w-100 mt-4">
        <h3 class="mb-4">{{ _e('Registration details') }}</h3>
        <a href="{{action('Admin\ReportsController@registrationPDF')}}">
            <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40">
        </a>
    </div>

    <div class="card">
        <div class="card-header">{{ _e('Total Registrations:') }} {{ $users->count() }}</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="250">{{ _e('Registrations by Club') }}</th>
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
                            <th width="250">{{ _e('Registrations by Category') }}</th>
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
                            <th width="250">{{ _e('Breakdown by Club') }}</th>
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
            $(document).on('click', ".user_paid", function(){
                let sure = confirm('Are you sure?');
                if(sure){
                    let user_id = $(this).data('id');

                    $.ajax({
                        type:'POST',
                        url:'/admin/paid',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:{
                            user_id: user_id
                        },
                        success: function() {
                            location.reload();
                        },
                    });
                }else{
                    $(this).prop( "checked", false );
                }
            });
        })
    </script>
@endsection