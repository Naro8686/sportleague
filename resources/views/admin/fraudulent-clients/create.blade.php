@extends('layouts.admin')
@section('content')
    @canany(['add_ccl', 'add_anything', 'users_manage'])
        <div class="card">
            <div class="card-header">
                {{ trans('global.create') }} Fraudulent Client
            </div>

            <div class="card-body">
                <form action="{{ route("admin.clients.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('hotel_name') ? 'has-error' : '' }}">
                        <label for="hotel_name">Hotel Name*</label>
                        <input type="text" id="hotel_name" name="hotel_name" class="form-control"
                               value="{{ old('hotel_name', isset($data) ? $data->hotel_name : '') }}" required>
                        @if($errors->has('hotel_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('hotel_name') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('guest_name') ? 'has-error' : '' }}">
                        <label for="guest_name">Guest Name*</label>
                        <input type="text" id="guest_name" name="guest_name" class="form-control"
                               value="{{ old('guest_name', isset($data) ? $data->guest_name : '') }}" required>
                        @if($errors->has('guest_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('guest_name') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('booker_name') ? 'has-error' : '' }}">
                        <label for="booker_name">Booker Name*</label>
                        <input type="text" id="booker_name" name="booker_name" class="form-control"
                               value="{{ old('booker_name', isset($data) ? $data->booker_name : '') }}" required>
                        @if($errors->has('booker_name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('booker_name') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                        <label for="country">Country*</label>
                        <input type="text" id="country" name="country" class="form-control"
                               value="{{ old('country', isset($data) ? $data->country : '') }}" required>
                        @if($errors->has('country'))
                            <em class="invalid-feedback">
                                {{ $errors->first('country') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('card_type') ? 'has-error' : '' }}">
                        <label for="card_type">Card Type*</label>
                        <select name="card_type" id="card_type" class="form-control" required>
                            <option value=""></option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "MasterCard" ? "selected" : '') }} value="MasterCard">MasterCard</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "Visa" ? "selected" : '') }} value="Visa">Visa</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "American Express" ? "selected" : '') }} value="American Express">American Express</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "ArCa" ? "selected" : '') }} value="ArCa">ArCa</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "Maestro" ? "selected" : '') }} value="Maestro">Maestro</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "Cirrus" ? "selected" : '') }} value="Cirrus">Cirrus</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "Мир" ? "selected" : '') }} value="Мир">Мир</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "Diners Club" ? "selected" : '') }} value="Diners Club">Diners Club</option>
                            <option {{ old('card_type', isset($data) && $data->card_type == "JCB" ? "selected" : '') }} value="JCB">JCB</option>
                        </select>

                        @if($errors->has('card_type'))
                            <em class="invalid-feedback">
                                {{ $errors->first('card_type') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>

                    <div class="form-group {{ $errors->has('card_number') ? 'has-error' : '' }}">
                        <label for="card_number">Card Number*</label>
                        <input disabled="true" type="text" id="card_number" minlength="15" maxlength="19" name="card_number" class="form-control"
                               value="{{ old('card_number', isset($data) ? $data->card_number : '') }}" required>
                        @if($errors->has('card_number'))
                            <em class="invalid-feedback">
                                {{ $errors->first('card_number') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            Ex. of card number 3759 87xxxx x1001
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('date_of_payment') ? 'has-error' : '' }}">
                        <label for="date_of_payment">Date of Payment*</label>

                        <div class='input-group date' id='datetimepicker8'>
                    <span class="input-group-addon">
                        <span class="fa fa-calendar">
                        </span>
                    </span>
                            <input type="text" id="date_of_payment" data-provide="datepicker" name="date_of_payment"
                                   class="form-control input-group-addon"
                                   value="{{ old('date_of_payment', isset($data) ? $data->date_of_payment : '') }}"
                                   required>
                        </div>
                        @if($errors->has('date_of_payment'))
                            <em class="invalid-feedback">
                                {{ $errors->first('date_of_payment') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                        <label for="comment">Comment*</label>
                        <input type="text" id="comment" name="comment" class="form-control"
                               value="{{ old('comment', isset($data) ? $data->comment : '') }}" required>
                        @if($errors->has('comment'))
                            <em class="invalid-feedback">
                                {{ $errors->first('comment') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </form>


            </div>
        </div>
    @endcanany
@endsection