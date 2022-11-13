@extends('layout.frontend.front')
@section('title', 'Contact')
@section('content')
<div class="container">
    <img src="{{asset('assets/img/contactus.jpg')}}" alt="" class="w-100">
  </div>
  <div class="cs-height_80 cs-height_lg_60"></div>
  <div class="container">
    <div class="row cs-reverse_row_md">
      <div class="col-lg-5">
        <div class="cs-height_0 cs-height_lg_40"></div>
        <div class="cs-iconbox_3_wrap">
          <div class="cs-iconbox cs-style3">
            <div class="cs-iconbox_icon">
              <img src="assets/img/contact_icon/1.png" alt="">
            </div>
            <div class="cs-iconbox_right">
              <h2>Dubai</h2>
              <p>Shop #S15, Sultan Mohammad Building 
                Al Soqu Al Kebeer (Computer Market)
                Bur Dubai, Dubai, UAE</p>
            </div>
          </div>
          <div class="cs-iconbox cs-style3">
            <div class="cs-iconbox_icon">
              <img src="assets/img/contact_icon/2.png" alt="">
            </div>
            <div class="cs-iconbox_right">
              <p>WhatsApp: <br> 
                +971 56664 4965</p>
                <p>Phone: <br>
                  +971 43867794</p>
            </div>
          </div>
          <div class="cs-iconbox cs-style3">
            <div class="cs-iconbox_icon">
              <img src="assets/img/contact_icon/3.png" alt="">
            </div>
            <div class="cs-iconbox_right">
              <h2>Our mail address</h2>
              <p>blumencomputer@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="cs-contact_title">
          <h3>Contact</h3>
          <h2>Get in Touch With Us</h2>
        </div>
        <form class="cs-contact_form">
          <input type="text" placeholder="Name*" class="cs-form_field_2">
          <div class="cs-height_25 cs-height_lg_25"></div>
          <div class="row">
            <div class="col-lg-6">
              <input type="text" placeholder="Email Address*" class="cs-form_field_2">
              <div class="cs-height_25 cs-height_lg_25"></div>
            </div>
            <div class="col-lg-6">
              <input type="text" placeholder="Phone*" class="cs-form_field_2">
              <div class="cs-height_25 cs-height_lg_25"></div>
            </div>
          </div>
          <textarea cols="30" rows="8" placeholder="Message goes here" class="cs-form_field_2"></textarea>
          <div class="cs-height_25 cs-height_lg_25"></div>
          <button class="cs-btn cs-style5 cs-type1 cs-color1">Send Message</button>
        </form>
      </div>
    </div>
  </div>
  <div class="cs-height_60 cs-height_lg_60"></div>
  <div class="cs-gray_bg">
    <div class="cs-height_60 cs-height_lg_60"></div>
    <div class="container">
      <div class="cs-google_map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96652.27317354927!2d-74.33557928194516!3d40.79756494697628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3a82f1352d0dd%3A0x81d4f72c4435aab5!2sTroy+Meadows+Wetlands!5e0!3m2!1sen!2sbd!4v1563075599994!5m2!1sen!2sbd"
          allowfullscreen></iframe>
      </div>
      <div class="cs-height_40 cs-height_lg_40"></div>
      <div class="row">
        <div class="col-lg-4">
          <div class="cs-iconbox cs-style4">
            <div class="cs-iconbox_icon"><img src="assets/img/contact_icon/1.svg" alt=""></div>
            <h2 class="cs-iconbox_title">How can we help you?</h2>
            <a href="" class="cs-iconbox_link">Send us an e-mail</a>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-lg-4">
          <div class="cs-iconbox cs-style4">
            <div class="cs-iconbox_icon"><img src="assets/img/contact_icon/2.svg" alt=""></div>
            <h2 class="cs-iconbox_title">Feel free to get in touch?</h2>
            <a href="" class="cs-iconbox_link">Give us a call today</a>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-lg-4">
          <div class="cs-iconbox cs-style4">
            <div class="cs-iconbox_icon"><img src="assets/img/contact_icon/3.svg" alt=""></div>
            <h2 class="cs-iconbox_title">Ready to request quote?</h2>
            <a href="" class="cs-iconbox_link">Describe your Business Plan</a>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_30 cs-height_lg_30"></div>

       
@endsection