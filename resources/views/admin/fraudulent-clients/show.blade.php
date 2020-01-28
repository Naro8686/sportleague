@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} Client
        </div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $client->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Hotel name
                        </th>
                        <td>
                            {{ $client->hotel_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Guest name
                        </th>
                        <td>
                            {{ $client->guest_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Booker name if different
                        </th>
                        <td>
                            {{ $client->booker_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Country of origin/citizenship
                        </th>
                        <td>
                            {{ $client->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Card type (VISA, MasterCard, etc.)
                        </th>
                        <td>
                            {{ $client->card_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Card number
                        </th>
                        <td>
                            {{ $client->card_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Date of payment
                        </th>
                        <td>
                            {{ $client->date_of_payment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Comment
                        </th>
                        <td>
                            {{ $client->comment }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>


        </div>
    </div>
@endsection