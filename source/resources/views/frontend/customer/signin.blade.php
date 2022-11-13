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
@php
    $head=App\Models\Headerview::all();
@endphp
<body>
  <div class="user_card style2">
    <div class="user_card_info">
      <div class="user_card_in">
        <div>
          <div class="text-center">
            <h2>Welcome to</h2>
            <div class="cs-height_5 cs-height_lg_5"></div>
            <div class="text-center"><img src="{{asset($head[0]->logo_image )}}" alt=""></div>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <p style="font-size: 18px; line-height: 1.4em;">Log in to get in the moment Update on <br>
            the things that interest you.</p>
          </div>
          <div class="cs-height_20 cs-height_lg_20"></div>
          @if(Session::has('response'))
            <div class="cs-alert {{Session::get('response')['class']}} mb-2">
              <span>{{Session::get('response')['message']}}</span>
              <a href="javascript:void(0)" class="close float-end" data-dismiss="cs-alert">&times;</a>
            </div>
		  @endif
          
          <form class="cs-user_form" method="post" action="{{route('front.signin.valid')}}?p={{$request->p}}">
          @csrf
            <div class="cs-form_field">
              <svg xmlns="http://www.w3.org/2000/svg" width="20.912" height="25.061" viewBox="0 0 20.912 25.061">
                <g id="user" transform="translate(-111.87 -109.824)">
                  <path id="Path_1557" data-name="Path 1557" d="M115.757,134.854c-.294-.061-.587-.1-.875-.19a3.913,3.913,0,0,1-2.967-3.737,13.371,13.371,0,0,1,.862-5.646,5.194,5.194,0,0,1,2.318-2.8,4.549,4.549,0,0,1,2.276-.544,1.783,1.783,0,0,1,.746.257c.373.2.716.453,1.077.673a5.559,5.559,0,0,0,6.276-.006c.287-.177.587-.355.856-.557a2.1,2.1,0,0,1,1.645-.336,4.64,4.64,0,0,1,3.542,2.545,10.458,10.458,0,0,1,1.138,4.056,20.178,20.178,0,0,1,.1,2.19,4,4,0,0,1-3.695,4.043,1.531,1.531,0,0,0-.159.043Q122.327,134.857,115.757,134.854Zm6.57-1.468h0c2.068-.006,4.135.012,6.2-.012a2.6,2.6,0,0,0,2.759-2.832,18.958,18.958,0,0,0-.1-1.951,8.934,8.934,0,0,0-.93-3.334,3.148,3.148,0,0,0-2.7-1.853.622.622,0,0,0-.343.086c-.318.184-.618.391-.93.587a6.94,6.94,0,0,1-7.163.422c-.575-.281-1.095-.667-1.645-1a.508.508,0,0,0-.263-.1,2.979,2.979,0,0,0-2.068.856,4.774,4.774,0,0,0-1.04,1.664,12.586,12.586,0,0,0-.722,4.918,2.435,2.435,0,0,0,1.23,2.147,3.4,3.4,0,0,0,1.762.4Z" fill="#bcb9b9" stroke="#707070" stroke-width="0.061"/>
                  <path id="Path_1558" data-name="Path 1558" d="M128.2,115.867a6.022,6.022,0,1,1-6.019-6.013A6.02,6.02,0,0,1,128.2,115.867Zm-6.025,4.563a4.557,4.557,0,1,0-4.557-4.557A4.541,4.541,0,0,0,122.174,120.431Z" fill="#bcb9b9" stroke="#707070" stroke-width="0.061"/>
                </g>
              </svg>                           
              <input type="text" placeholder="E-mail" name="email">
            </div>
            <div class="cs-height_15 cs-height_lg_15"></div>
            <div class="cs-form_field">
              <svg xmlns="http://www.w3.org/2000/svg" width="18.831" height="25.08" viewBox="0 0 18.831 25.08">
                <g id="Password" transform="translate(-129.239 -126.047)">
                  <path id="Path_1559" data-name="Path 1559" d="M131.619,136.229v-.3c.007-1.074-.028-2.149.028-3.216a7.025,7.025,0,0,1,13.946-.721,9.277,9.277,0,0,1,.09,1.317c.014.88.007,1.761.007,2.648v.256a8.147,8.147,0,0,1,.853.2,2.287,2.287,0,0,1,1.49,2.267c.007,1.164,0,2.336,0,3.5v6.46a2.247,2.247,0,0,1-1.324,2.218,2.489,2.489,0,0,1-1.026.229q-7.028.021-14.057.007a2.3,2.3,0,0,1-2.35-2.4c-.007-1.365,0-2.731,0-4.1,0-1.968-.007-3.944,0-5.912a2.287,2.287,0,0,1,1.684-2.336C131.155,136.3,131.363,136.277,131.619,136.229Zm7.035,1.594h-6.848c-.721,0-.97.243-.97.963v9.8c0,.7.256.957.957.957H145.51c.7,0,.957-.256.957-.957v-9.829c0-.686-.256-.936-.943-.936Zm5.441-1.58c.007-.062.021-.111.021-.159,0-1.074.028-2.142-.014-3.216a5.461,5.461,0,0,0-10.917.277c-.014.957,0,1.92,0,2.877,0,.076.014.146.021.222Z" fill="#bcb9b9" stroke="#707070" stroke-width="0.069"/>
                  <path id="Path_1560" data-name="Path 1560" d="M137.871,145.669c0-.243-.014-.485.007-.728.014-.187-.062-.263-.222-.34a2.26,2.26,0,0,1-1.338-2.28,2.284,2.284,0,0,1,1.539-2.017,2.348,2.348,0,0,1,2.967,1.3,2.318,2.318,0,0,1-1.227,3.029.246.246,0,0,0-.166.27q.01.738,0,1.476a.742.742,0,0,1-.769.818.751.751,0,0,1-.79-.832Zm.8-2.391a.731.731,0,0,0,.762-.79.78.78,0,0,0-1.56.035A.732.732,0,0,0,138.668,143.278Z" fill="#bcb9b9" stroke="#707070" stroke-width="0.069"/>
                </g>
              </svg>                          
              <input type="text" placeholder="Mobile ex:+xxx-xxxxxxxxx" name="contact">
            </div>
            <div class="cs-height_15 cs-height_lg_15"></div>
            <button class="cs-btn cs-style5 cs-type2 cs-color1 w-100" type="submit">SIGN IN</button>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <div class="cs-user_devider"><span>OR</span></div>
            <div class="cs-height_20 cs-height_lg_20"></div>
            <div class="cs-user_note" style="font-size: 18px;">Continue with social media</div>
            <div class="cs-height_15 cs-height_lg_15"></div>
            <div class="social_btns">
              <a href="#" class="social_btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="15.837" height="29.76" viewBox="0 0 15.837 29.76">
                  <path id="Path_1561" data-name="Path 1561" d="M117.486-47.3h2.329V-51.86a28.462,28.462,0,0,0-4.14-.362c-4.244,0-6.987,2.588-6.987,7.194v4.089h-4.71v5.331h4.71v13.146h5.8V-35.608h4.3l.828-5.331h-5.124v-3.468A2.664,2.664,0,0,1,117.486-47.3Z" transform="translate(-103.978 52.222)" fill="#4373b9"/>
                </svg>                
              </a>
              <a href="#" class="social_btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="28.052" height="22.721" viewBox="0 0 28.052 22.721">
                  <path id="Path_1562" data-name="Path 1562" d="M197.294-46.063a12.132,12.132,0,0,1-3.312.932,5.685,5.685,0,0,0,2.536-3.157,11.271,11.271,0,0,1-3.675,1.4,5.707,5.707,0,0,0-4.192-1.811,5.732,5.732,0,0,0-5.745,5.745,5.215,5.215,0,0,0,.155,1.294,16.479,16.479,0,0,1-11.852-6,5.657,5.657,0,0,0-.776,2.9,5.692,5.692,0,0,0,2.536,4.762,5.546,5.546,0,0,1-2.588-.725v.052a5.778,5.778,0,0,0,4.606,5.641,7,7,0,0,1-1.5.207,3.875,3.875,0,0,1-1.087-.1,5.869,5.869,0,0,0,5.383,4.037,11.456,11.456,0,0,1-7.142,2.433,6.359,6.359,0,0,1-1.4-.1,16.138,16.138,0,0,0,8.85,2.588c10.61,0,16.407-8.8,16.407-16.407v-.725A10.882,10.882,0,0,0,197.294-46.063Z" transform="translate(-169.242 48.702)" fill="#429ad5"/>
                </svg>                               
              </a>
              <a href="#" class="social_btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="28.053" height="28" viewBox="0 0 28.053 28">
                  <g id="Group_547" data-name="Group 547" transform="translate(-94.764 67.593)">
                    <path id="Path_1563" data-name="Path 1563" d="M95.179-58.277h5.8v18.684h-5.8Zm2.95-9.316a3.357,3.357,0,0,1,3.364,3.364,3.357,3.357,0,0,1-3.364,3.364,3.357,3.357,0,0,1-3.364-3.364,3.325,3.325,0,0,1,3.364-3.364" fill="#0a66c2"/>
                    <path id="XMLID_25_" d="M104.651-58.277h5.59v2.536h.1a6.156,6.156,0,0,1,5.486-3c5.9,0,6.987,3.882,6.987,8.9v10.248h-5.848V-48.7c0-2.174-.052-4.969-3-4.969-3,0-3.468,2.381-3.468,4.813v9.264h-5.8V-58.277Z" fill="#0a66c2"/>
                  </g>
                </svg>                              
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="user_card_images" style="background-image: url(assets/img/sighup_bg.jpg);">
      <div class="overlay"></div>
      <div class="user_content">
        <img src="assets/img/user_logo2.png" alt="">
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