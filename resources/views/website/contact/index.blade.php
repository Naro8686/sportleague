@extends('layouts.front')

@section('content')
    <!-- contact area -->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <div class="info margin-top-50">
                            <h3>{{ $contact->title }}</h3>
                            <span>{!! $contact->text !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-right margin-top-120">
                        <div class="contact-title">{{ _e('Send Us a Message') }}</div>
                        <div class="form-group">
                            <form class="contact-form form" action="" name="registration">
                                <div class="form-field margin-top-20 margin-bottom-25">
                                    <label for="name">{{ _e('Full Name') }}</label>
                                    <input name="name" id="name" type="text" class="input-form"/>
                                </div>
                                <div class="form-field margin-top-20 margin-bottom-25">
                                    <label for="email">{{ _e('Email') }}</label>
                                    <input name="email" id="email" type="email" class="input-form" data-required="text" data-required-email="email"/>
                                </div>
                                <div class="form-field margin-top-20 margin-bottom-25">
                                    <label for="message">{{ _e('Message') }}</label>
                                    <textarea name="message" id="message" cols="30" rows="5" placeholder=""></textarea>
                                </div>
                                <div class="btn-wrapper desktop-right">
                                    <button type="submit" class="btn sm-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection

@section('javascript')
    @parent
    <script>
        // form validation
        var contactform = $("form[name='registration']");
        if(contactform.length) {
            $(function() {
                $("form[name='registration']").validate({
                    rules: {
                        name: "required",
                        message: "required",
                        subject: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 5
                        }
                    },
                    messages: {
                        name: "Please enter your name",
                        message: "Please enter your message",
                        subject: "Please enter subject",
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        email: "Please enter a valid email address"
                    }
                });
            });
        }

        // Forms Validation
        var filterEmail  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,6})+$/;
        $('.contact-form').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let errors = 0;
            $(this).find('[data-required="text"]').each(function () {
                if ($(this).attr('data-required-email') === 'email'){
                    if (!filterEmail.test($(this).val())) {
                        $(this).addClass("redborder");
                        errors++;
                    }
                    else {
                        $(this).removeClass("redborder");
                    }
                    return;
                }
                if ($(this).val() === '') {
                    $(this).addClass('redborder');
                    errors++;
                } else {
                    $(this).removeClass('redborder');
                }
            });
            if (errors === 0) {
                console.log(123);
                let form1 = $(this);
                let name = $('#name').val();
                let email = $('#email').val();
                let message = $('#message').val();
                $.ajax({
                    type:'POST',
                    url:'/send-mail',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        name: name,
                        email: email,
                        message: message
                    },
                    success: function(data) {
                        form1.append('<p class="form-result">Message has been sent successfully!</p>');
                        $("form").trigger('reset');
                    }
                });
            }
            return false;
        });
        $('.contact-form').find('[data-required="text"]').blur(function () {
            if ($(this).attr('data-required-email') === 'email' && ($(this).hasClass("redborder"))) {
                if (filterEmail.test($(this).val()))
                    $(this).removeClass("redborder");
                return;
            }
            if ($(this).val() != "" && ($(this).hasClass("redborder")))
                $(this).removeClass("redborder");
        });

    </script>
@endsection