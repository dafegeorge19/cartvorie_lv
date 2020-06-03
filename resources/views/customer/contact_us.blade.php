@extends('layouts.customer')
@section('body-class', 'page home page-template-default')



@section('content')
<br>
<br>
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <header class="entry-header">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">Contact Us</h1>
                                        </div>
                                    </header>
                                    <!-- .entry-header -->
                                    <div class="entry-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-block">
                                                    <h2 class="contact-page-title">Leave us a Message</h2>
                                                    @if(session()->has('message'))
                                                        <div class="alert alert-success">{{ session()->get('message')}}</div>
                                                    @endif
                                                </div>
                                                <div class="contact-form">
                                                    <div role="form" class="wpcf7" id="wpcf7-f425-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <form action="{{ url('send_contact') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>First name
                                                                        <abbr title="required" class="required">*</abbr>
                                                                    </label>
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap first-name">
                                                                        <input type="text" value="" name="first_name" required>
                                                                    </span>
                                                                </div>
                                                                <!-- .col -->
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>Last name
                                                                        <abbr title="required" class="required">*</abbr>
                                                                    </label>
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap last-name">
                                                                        <input type="text" value="" name="last_name" required>
                                                                    </span>
                                                                </div>
                                                                <!-- .col -->
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>Phone Number
                                                                        <abbr title="required" class="required">*</abbr>
                                                                    </label>
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap first-name">
                                                                        <input type="text" value="" name="phone_number" required>
                                                                    </span>
                                                                </div>
                                                                <!-- .col -->
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>Email
                                                                        <abbr title="required" class="required">*</abbr>
                                                                    </label>
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap last-name">
                                                                        <input type="email" value="" name="email" required>
                                                                    </span>
                                                                </div>
                                                                <!-- .col -->
                                                            </div>
                                                            <!-- .form-group -->
                                                            <div class="form-group">
                                                                <label>Subject
                                                                <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <br>
                                                                <span class="wpcf7-form-control-wrap subject">
                                                                    <input type="text" value="" name="subject" required>
                                                                </span>
                                                            </div>
                                                            <!-- .form-group -->
                                                            <div class="form-group">
                                                                <label>Your Message
                                                                    <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <br>
                                                                <span class="wpcf7-form-control-wrap your-message">
                                                                    <textarea rows="10" cols="40" name="your_message" required></textarea>
                                                                </span>
                                                            </div>
                                                            <!-- .form-group-->
                                                            <div class="form-group clearfix">
                                                                <p>
                                                                    <input type="submit" value="Send Message">
                                                                </p>
                                                            </div>
                                                        </form>
                                                        <!-- .wpcf7-form -->
                                                    </div>
                                                    <!-- .wpcf7 -->
                                                </div>
                                                <!-- .contact-form7 -->
                                            </div>
                                            <!-- .col -->
                                            <div class="col-md-6 store-info store-info-v2">
                                                <!-- .google-map -->
                                                <div class="kc-elm kc-css-773435 kc_text_block">
                                                    <h2 class="contact-page-title">Our Contacts</h2>
                                                    <p> Address: Plot 809, Dahiru Musdafa Boulevard Wuye, Abuja.
                                                        <br> Support: 07043434010
                                                        <br> Email: <a href="mailto:info@skipoutlet.com">info@skipoutlet.com</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- .col -->
                                        </div>
                                        <!-- .row -->
                                    </div>
                                    <!-- .entry-header -->
                                </div>
                                <!-- .hentry -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
@endsection