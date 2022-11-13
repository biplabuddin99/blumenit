<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <!-- Site Title -->
  <title>Home Page</title>
  <!-- Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/extra.css')}}">
</head>

<body>
  <div class="user_card">
    <div class="user_card_images" style="background-image: url(assets/img/sighup_bg.jpg);">
      <div class="overlay"></div>
      <div class="user_content">
        <img src="assets/img/user_logo.png" alt="">
        <h3>Register Now</h3>
      </div>
      <div class="user_image"><img src="assets/img/user_image.png" alt=""></div>
    </div>
    <div class="user_card_info">
      <div class="user_card_in">
        <div>
          <div class="text-center"><img src="assets/img/signup_img.png" alt=""></div>
          <div class="cs-height_30 cs-height_lg_30"></div>
          @if(Session::has('response'))
            <div class="cs-alert {{Session::get('response')['class']}} mb-2">
              <span>{{Session::get('response')['message']}}</span>
              <a href="javascript:void(0)" class="close float-end" data-dismiss="cs-alert">&times;</a>
            </div>
		      @endif
          <form class="cs-user_form" method="post" action="{{route('front.signup.store')}}?p={{$request->p}}">
            @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="cs-form_field">
                  <label>First Name<span>*</span></label>
                  <input name="first_name" type="text" placeholder="First Name" value="{{old('first_name')}}">
                  @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="cs-height_20 cs-height_lg_20"></div>
              </div>
              <div class="col-lg-6">
                <div class="cs-form_field">
                  <label>Last Name<span>*</span></label>
                  <input name="last_name" type="text" placeholder="Last Name" value="{{old('last_name')}}">
                  @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="cs-height_20 cs-height_lg_20"></div>
              </div>
              <div class="col-lg-12">
                <div class="cs-form_field">
                  <label>E-mail<span>*</span></label>
                  <input name="email" type="text" placeholder="E-mail" value="{{old('email')}}">
                  @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="cs-height_20 cs-height_lg_20"></div>
              </div>
              <div class="col-lg-12">
                <div class="cs-form_field">
                  <label>Mobile<span>*</span></label>
                  <input name="contact" type="text" value="{{old('contact')}}" placeholder="Mobile ex:+xxx-xxxxxxxxx">
                  @error('contact')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="cs-height_30 cs-height_lg_30"></div>
              </div>
              <div class="col-lg-12">
                <button type="submit" class="cs-btn cs-style5 cs-type2 cs-color3 w-100">SIGN UP</button>
              </div>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <div class="cs-user_devider"><span>Already have an account?</span></div>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <div class="cs-user_note">If you already have an account with us, Please login at the <a href="{{route('front.signin')}}?p={{$request->p}}">Login Page</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Script -->
  <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.slick.min.js')}}"></script>
  <script src="{{asset('assets/js/wow.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/js/extra.js')}}"></script>
</body>
</html>