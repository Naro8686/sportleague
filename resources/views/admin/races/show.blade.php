@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">{{ _e('Show Race') }}</div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>{{ _e('Date') }}</th>
                        <td>{{ $race->date }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Name') }}</th>
                        <td>{{ $race->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Location') }}</th>
                        <td>{{ $race->location }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Location link') }}</th>
                        <td><a href="{{ $item->location_link ?? '' }}" target="_blank">Link</a></td>
                    </tr>
                    <tr>
                        <th>{{ _e('Start time') }}</th>
                        <td>{{ $race->start_time }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Min marshals') }}</th>
                        <td>{{ $race->min_marshals }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('Max participants') }}</th>
                        <td>{{ $race->max_marshals }}</td>
                    </tr>
                    <tr>
                        <th>{{ _e('No. of marshals') }}</th>
                        <td>{{ $race->users->count() }}</td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ _e('Back to list') }}
                </a>
            </div>

            <div class="mb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="my-3">Marshals ({{ $race->users->count() }})</h4>
                    <a href="{{ route('admin.marshals-pdf', $race->id)}}">
                        <img src="{{ asset('pdf.png') }}" alt="Download PDF" width="40">
                    </a>
                </div>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable race_users">
                        <thead>
                        <tr>
                            <th>{{ _e('Present') }}</th>
                            <th>{{ _e('Full name') }}</th>
                            <th>{{ _e('Club') }}</th>
                            <th>{{ _e('Category') }}</th>
                            <th>{{ _e('Phone') }}</th>
                            <th>{{ _e('Email') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($race->users as $key => $user)
                            <tr data-user-id="{{ $user->id }}">
                                <td>
                                    <input type="checkbox" class="marshal_present" value="{{$race->id}}" {{ ( \Illuminate\Support\Facades\DB::table('user_races')->where('user_id', $user->id)->where('race_id', $race->id)->first()->present == 'yes' ) ? 'checked' : '' }}>
                                </td>
                                <td>{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</td>
                                <td>{{ $user->club->first()->name ?? '' }}</td>
                                <td>{{ $user->race_category ?? '' }}</td>
                                <td>{{ $user->phone ?? '' }}</td>
                                <td>{{ $user->email ?? '' }}</td>
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
            $('.race_users').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'colvis'
                ]
            })

            $(document).on('click', ".marshal_present", function(){

                let race_id = $(this).val();
                let user_id = $(this).parent().parent().data('user-id');

                $.ajax({
                    type:'POST',
                    url:'/admin/present',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        race_id: race_id,
                        user_id: user_id
                    },
                    success:function(data){

                    }
                });

            });
        })
    </script>
@endsection