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

<script src="https://www.paypal.com/sdk/js?client-id={{ _c('Paypal Client ID') }}&currency=EUR&buyer-country=IE&locale=en_IE"></script>

<div class="signinup-area signup-area">
    <div class="content col-lg-6 col-md-6">
        <div class="login-panel">
            <div class="panel-heading">
                <a href="{{ route('home') }}"><img src="{{ asset('front-assets/img/logo/'. _c('logo')) }}" alt="logo"></a>
            </div>
            <div class="panel-body">
                <h2>Please Complete Payment To Continue</h2>
                <div id="paypal-buttons"></div>
            </div>
        </div>
    </div>
</div>

@include('partials.front.js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                let timerInterval
                Swal.fire({
                    title: 'Transferring you back to League Manager',
                    html: 'Thank you for your payment.<br> Please wait while we transfer you back',
                    timer: 20000,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                    b.textContent = Swal.getTimerLeft()
                                }
                            }
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                });
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