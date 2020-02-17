<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Second step</title>
    @include('partials.front.head')
</head>
<body>

<script src="https://www.paypal.com/sdk/js?client-id=AXiFCJAVKRr8CkyUdX_exLrxJ9u_EWVGMSsX4YvdIMP_5hIJoObK7mJoH0pKEfBYA3i__KCW6XXCsX5J&currency=EUR"></script>

<div class="signinup-area signup-area">
    <div class="content col-lg-6 col-md-6">
        <div class="login-panel">
            <div class="panel-heading">
                <a href="{{ route('home') }}"><img src="{{ asset('front-assets/img/logo.png') }}" alt="logo"></a>
            </div>
            <div class="panel-body">
                <h2>Pay to continue</h2>
                <div id="paypal-buttons"></div>
            </div>
        </div>
    </div>
</div>

@include('partials.front.js')

<script>
    $(document).ready(function () {

        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $league->price }}'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    $.ajax({
                        type:'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:'/payment-success',
                        data: details,
                        success:function(){
                            window.location.href = "{{URL::to('step-two')}}"
                        }
                    });
                });
            }
        }).render('#paypal-buttons');
    });
</script>
</body>
</html>