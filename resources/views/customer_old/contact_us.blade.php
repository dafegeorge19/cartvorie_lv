@extends('layouts.customer')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>C<span>ontact Us </span></h3>
	</div>
</div>

<div class="banner_bottom_agile_info">
	<div class="container">
	    <div class="agile-contact-grids">
            <div class="agile-contact-left">
                <div class="col-md-6 address-grid">
                    <h4>For More <span>Information</span></h4>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Telephone </p><span>080888888888</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Mail </p><a href="mailto:info@example.com">info@skipoutlet.com</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Location</p><span>My company address</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
                        <li class="share">Our Social Handles : </li>
                        <li><a href="javascript:void(0)" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                        <li><a href="javascript:void(0)" class="twitter"> 
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                        <li><a href="javascript:void(0)" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                        <li><a href="javascript:void(0)" class="pinterest">
                                <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                    </ul>
                </div>
                <div class="col-md-6 contact-form">
                    <h4 class="white-w3ls">Contact <span>Form</span></h4>
                    <frm action="#" method="post">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="Name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="Email" required=""> 
                            <label>Email</label>
                            <span></span>
                        </div> 
                        <div class="styled-input">
                            <input type="text" name="Subject" required="">
                            <label>Subject</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <textarea name="Message" required=""></textarea>
                            <label>Message</label>
                            <span></span>
                        </div>	 
                        <input type="submit" value="SEND">
                    </frm>
                </div>
            </div>
            <div class="clearfix"> </div>
		</div>
    </div>
</div>
 <!--//contact-->

<div class="contact-w3-agile1 map" data-aos="flip-right">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783" class="map" style="border:0" allowfullscreen=""></iframe>
</div>

 @endsection