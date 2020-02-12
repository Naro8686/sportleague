@extends('layouts.front')

@section('content')
    <!-- contact area -->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <span class="contact-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet semper augue.</span>
                        <span class="contact-text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet semper augue.</span>
                        <div class="info margin-top-50">
                            <h3>Address</h3>
                            <span>Iris Watson<br> P.O. Box 283 8562 Fusce Rd. Frederick Nebraska 20620<br>(372) 587-2335</span>
                        </div>
                        <div class="info margin-top-50">
                            <h3>Online Service</h3>
                            <a href="#">www.billatrail.com</a><br>
                            <a href="#">info@billatrail.com</a><br>
                            <a href="#">fax.info@mail.com</a><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-right margin-top-120">
                        <div class="contact-title">
                            Send Us a Message
                        </div>
                        <div class="form-group">
                            <form class="contact-form form" action="" name="registration">
                                <div class="form-field margin-top-20 margin-bottom-25">
                                    <label for="name">Full Name</label>
                                    <input name="firstname" id="name" type="text" placeholder="Mr willium smith" class="input-form"/>
                                </div>
                                <div class="form-field margin-top-20 margin-bottom-25">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" type="email" placeholder="santa@gmail.com" class="input-form" data-required="text" data-required-email="email"/>
                                </div>
                                <div class="form-field margin-top-20 margin-bottom-25">
                                    <label for="thought">Thought</label>
                                    <textarea name="message" id="thought" cols="30" rows="5" placeholder="xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"></textarea>
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