@extends('layout.frontend.front')
@section('title', 'Checkout')
@section('content')

<div class="cs-height_80 cs-height_lg_60"></div>
  <div class="container">
    <div class="row cs-reverse_row_lg">
      <div class="col-xl-7">
        <div class="cs-alert2">Already Registered?</div>
        <div class="cs-height_20 cs-height_lg_20"></div>
        <div class="row">
          <div class="col-md-4">
            <a href="#" class="cs-btn cs-style5 cs-color1 w-100">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="26.037" height="28.66" viewBox="0 0 26.037 28.66">
                  <path id="Path_2272" data-name="Path 2272" d="M1027.966,235.617c1.088.731,2.19,1.352,3.152,2.144a12.086,12.086,0,0,1,4.17,6.565,25.8,25.8,0,0,1,.463,2.794c.068.518.013.54-.529.541s-1.059-.019-1.587.007c-.337.017-.447-.1-.464-.433a10.471,10.471,0,0,0-1.066-4.175,10.688,10.688,0,0,0-2.6-3.347c-.238-.207-.372-.095-.543.064q-2.911,2.69-5.825,5.377c-.394.364-.387.363-.8-.013q-2.911-2.69-5.823-5.378c-.184-.171-.319-.231-.545-.036a10.074,10.074,0,0,0-3.067,4.512,18.315,18.315,0,0,0-.572,2.978c-.051.335-.132.474-.491.453-.527-.031-1.058-.007-1.587-.008s-.545-.023-.517-.521a13,13,0,0,1,2.61-7.257,13.264,13.264,0,0,1,5.283-4.164c-3.36-2.63-4.675-6-3.622-10.113a8.521,8.521,0,0,1,3.577-4.972,9,9,0,0,1,11.066.588,8.744,8.744,0,0,1,3.155,7.416A9.069,9.069,0,0,1,1027.966,235.617Zm-5.181-14.028a6.545,6.545,0,0,0-6.563,6.528,6.525,6.525,0,1,0,6.563-6.528Zm-4.134,16.541c.023.05.028.079.045.1q1.909,1.789,3.818,3.58c.2.191.347.124.517-.036q1.061-1,2.131-2c.569-.532,1.141-1.062,1.719-1.6C1025.095,236.992,1020.646,236.936,1018.651,238.13Z" transform="translate(-1009.738 -219.012)" fill="currentColor"/>
                </svg>
              </span>
              As Guest
            </a>
            <div class="cs-height_20 cs-height_lg_20"></div>
            <a href="{{route('front.signin')}}?p={{\Route::currentRouteName()}}" class="cs-btn cs-style5 cs-color2 w-100">
              <span>
                <svg id="Login" xmlns="http://www.w3.org/2000/svg" width="31.72" height="27.754" viewBox="0 0 31.72 27.754">
                  <path id="Path_36" data-name="Path 36" d="M10.941,13.217A6.608,6.608,0,1,1,17.55,6.609,6.616,6.616,0,0,1,10.941,13.217Zm0-11.234a4.626,4.626,0,1,0,4.626,4.626,4.631,4.631,0,0,0-4.626-4.626Zm0,0" transform="translate(0.953 0)" fill="currentColor"/>
                  <path id="Path_37" data-name="Path 37" d="M22.8,24.895H.991A.992.992,0,0,1,0,23.9V19.278A6.285,6.285,0,0,1,6.278,13H17.512a6.285,6.285,0,0,1,6.278,6.278V23.9A.992.992,0,0,1,22.8,24.895ZM1.982,22.912H21.807V19.278a4.3,4.3,0,0,0-4.3-4.3H6.278a4.3,4.3,0,0,0-4.3,4.3Zm0,0" transform="translate(0 2.86)" fill="currentColor"/>
                  <path id="Path_38" data-name="Path 38" d="M27.391,11.462H16.157a.991.991,0,1,1,0-1.982H27.391a.991.991,0,0,1,0,1.982Zm0,0" transform="translate(3.337 2.085)" fill="currentColor"/>
                  <path id="Path_39" data-name="Path 39" d="M21.032,17.7a.992.992,0,0,1-.7-1.693l4.586-4.586L20.332,6.837a.992.992,0,0,1,1.4-1.4l5.286,5.286a.992.992,0,0,1,0,1.4L21.734,17.41a.985.985,0,0,1-.7.292Zm0,0" transform="translate(4.409 1.131)" fill="currentColor"/>
                </svg>
              </span>
              Login
            </a>
            <div class="cs-height_20 cs-height_lg_20"></div>
            <a href="{{route('front.signup')}}?p={{\Route::currentRouteName()}}" class="cs-btn cs-style5 cs-color3 w-100">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="31" height="31" viewBox="0 0 31 31">
                  <defs>
                    <clipPath id="clip-path">
                      <rect id="Rectangle_179" data-name="Rectangle 179" width="31" height="31" transform="translate(0.24 0.36)" fill="currentColor" stroke="#707070" stroke-width="1"/>
                    </clipPath>
                  </defs>
                  <g id="Mask_Group_15" data-name="Mask Group 15" transform="translate(-0.24 -0.36)" clip-path="url(#clip-path)">
                    <g id="Register" transform="translate(0 1.322)">
                      <path id="Path_40" data-name="Path 40" d="M28.078,30.258H3.636A3.637,3.637,0,0,1,0,26.622V4.819A3.637,3.637,0,0,1,3.636,1.183H28.084A3.637,3.637,0,0,1,31.72,4.819v21.8A3.647,3.647,0,0,1,28.078,30.258ZM3.636,3.165A1.657,1.657,0,0,0,1.982,4.819v21.8a1.657,1.657,0,0,0,1.654,1.654H28.084a1.657,1.657,0,0,0,1.654-1.654V4.819a1.657,1.657,0,0,0-1.654-1.654Z" transform="translate(0 -1.183)" fill="currentColor"/>
                      <path id="Path_41" data-name="Path 41" d="M8.719,14.188a3.3,3.3,0,1,1,3.3-3.3A3.3,3.3,0,0,1,8.719,14.188Zm0-4.627a1.319,1.319,0,1,0,1.319,1.319A1.32,1.32,0,0,0,8.719,9.561Z" transform="translate(1.192 0.226)" fill="currentColor"/>
                      <path id="Path_42" data-name="Path 42" d="M14.152,19.369a.994.994,0,0,1-.991-.991v-.663a1.657,1.657,0,0,0-1.654-1.654H6.88a1.657,1.657,0,0,0-1.654,1.654v.663a.991.991,0,1,1-1.982,0v-.663A3.637,3.637,0,0,1,6.88,14.079h4.627a3.637,3.637,0,0,1,3.636,3.636v.663A.994.994,0,0,1,14.152,19.369Z" transform="translate(0.714 1.654)" fill="currentColor"/>
                      <path id="Path_43" data-name="Path 43" d="M23.422,10.106H16.156a.991.991,0,0,1,0-1.982h7.266a.991.991,0,1,1,0,1.982Z" transform="translate(3.336 0.344)" fill="currentColor"/>
                      <path id="Path_44" data-name="Path 44" d="M23.422,14.436H16.156a.991.991,0,0,1,0-1.982h7.266a.991.991,0,0,1,0,1.982Z" transform="translate(3.336 1.297)" fill="currentColor"/>
                      <path id="Path_45" data-name="Path 45" d="M23.422,18.772H16.156a.991.991,0,0,1,0-1.982h7.266a.991.991,0,0,1,0,1.982Z" transform="translate(3.336 2.251)" fill="currentColor"/>
                    </g>
                  </g>
                </svg> 
              </span>             
              Register
            </a>
            <div class="cs-height_20 cs-height_lg_20"></div>
          </div>
          <div class="col-md-8">
            <div class="cs-card_2">
              <form action="{{route('front.guestcheckout')}}" method="get">
                @if(Session::has('response'))
                <div class="cs-alert {{Session::get('response')['class']}}">
                  <span>{{Session::get('response')['message']}}</span>
                  <a href="javascript:void(0)" class="close float-end" data-dismiss="cs-alert">&times;</a>
                </div>
				        @endif
                <label class="form-label">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" viewBox="0 0 25 25">
                    <defs>
                      <clipPath id="clip-path">
                        <rect id="Rectangle_1396" data-name="Rectangle 1396" width="25" height="25" transform="translate(0.269 0.077)" fill="#1cab8f" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g id="Mask_Group_268" data-name="Mask Group 268" transform="translate(-0.269 -0.077)" clip-path="url(#clip-path)">
                      <g id="email" transform="translate(0.063 3.524)">
                        <path id="Path_2273" data-name="Path 2273" d="M24.4,4.54a2.807,2.807,0,0,0-2-.828H2.991A2.83,2.83,0,0,0,.165,6.539V18.4a2.83,2.83,0,0,0,2.826,2.826H22.4A2.83,2.83,0,0,0,25.228,18.4V6.539A2.825,2.825,0,0,0,24.4,4.54Zm-.507,2V18.4a1.486,1.486,0,0,1-1.486,1.486H3A1.486,1.486,0,0,1,1.511,18.4V6.539A1.486,1.486,0,0,1,3,5.053H22.407A1.489,1.489,0,0,1,23.893,6.539Z" transform="translate(-0.165 -3.712)" fill="#1cab8f"/>
                        <path id="Path_2274" data-name="Path 2274" d="M22.505,5.871a.679.679,0,0,0-.5.119l-8.38,6.051a1.576,1.576,0,0,1-1.869,0L3.379,5.99a.665.665,0,0,0-.932.15.679.679,0,0,0-.119.5.671.671,0,0,0,.269.435l8.38,6.051a2.926,2.926,0,0,0,1.718.559,2.89,2.89,0,0,0,1.718-.559L22.79,7.077a.671.671,0,0,0,.269-.435.679.679,0,0,0-.119-.5A.658.658,0,0,0,22.505,5.871Z" transform="translate(-0.16 -3.707)" fill="#1cab8f"/>
                        <path id="Path_2275" data-name="Path 2275" d="M7.909,12.516,2.515,17.9a.67.67,0,0,0,.471,1.144.649.649,0,0,0,.471-.2l5.394-5.394a.675.675,0,0,0,0-.947A.664.664,0,0,0,7.909,12.516Z" transform="translate(-0.16 -3.691)" fill="#1cab8f"/>
                        <path id="Path_2276" data-name="Path 2276" d="M17.444,12.516a.671.671,0,0,0-.471-.2.649.649,0,0,0-.471.2.671.671,0,0,0-.2.471.649.649,0,0,0,.2.471L21.9,18.852a.68.68,0,0,0,.471.2.649.649,0,0,0,.471-.2.675.675,0,0,0,0-.947Z" transform="translate(-0.125 -3.691)" fill="#1cab8f"/>
                      </g>
                    </g>
                  </svg>                               
                  Email
                </label>
                <input type="email" name="email" class="form-control" placeholder="Enter e-mail">
                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                <div class="cs-height_30 cs-height_lg_30"></div>
                <label class="form-label">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" viewBox="0 0 25 25">
                    <defs>
                      <clipPath id="clip-path">
                        <rect id="Rectangle_1397" data-name="Rectangle 1397" width="25" height="25" transform="translate(-0.077 0)" fill="#1cab8f" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g id="Mask_Group_269" data-name="Mask Group 269" transform="translate(0.077)" clip-path="url(#clip-path)">
                      <g id="phone-call" transform="translate(-0.124 0)">
                        <g id="Group_809" data-name="Group 809" transform="translate(0)">
                          <path id="Path_2277" data-name="Path 2277" d="M19.808,15.522a2.465,2.465,0,0,0-1.788-.82,2.549,2.549,0,0,0-1.809.815l-1.672,1.666c-.138-.074-.275-.143-.407-.212-.19-.1-.37-.185-.524-.28a18.168,18.168,0,0,1-4.353-3.967A10.718,10.718,0,0,1,7.826,10.47c.434-.4.836-.809,1.227-1.206.148-.148.3-.3.444-.45a2.427,2.427,0,0,0,0-3.66L8.054,3.71c-.164-.164-.333-.333-.492-.5-.317-.328-.651-.667-.994-.984A2.5,2.5,0,0,0,4.8,1.446,2.591,2.591,0,0,0,3,2.224l-.011.011-1.8,1.814A3.87,3.87,0,0,0,.04,6.508a9.273,9.273,0,0,0,.677,3.925,22.776,22.776,0,0,0,4.047,6.75,24.893,24.893,0,0,0,8.289,6.49,12.915,12.915,0,0,0,4.655,1.375c.111.005.227.011.333.011a3.986,3.986,0,0,0,3.052-1.312c.005-.011.016-.016.021-.026a12.026,12.026,0,0,1,.926-.957c.227-.217.46-.444.688-.682a2.639,2.639,0,0,0,.8-1.83,2.542,2.542,0,0,0-.815-1.814Zm1.894,5.57c-.005,0-.005.005,0,0-.206.222-.418.423-.645.645A13.91,13.91,0,0,0,20.035,22.8a2.55,2.55,0,0,1-1.989.841c-.079,0-.164,0-.243-.005a11.473,11.473,0,0,1-4.126-1.238,23.5,23.5,0,0,1-7.808-6.115A21.475,21.475,0,0,1,2.061,9.936a7.553,7.553,0,0,1-.592-3.311A2.428,2.428,0,0,1,2.2,5.054L4,3.25a1.2,1.2,0,0,1,.8-.376,1.131,1.131,0,0,1,.772.37l.016.016c.323.3.629.614.952.947.164.169.333.339.5.513L8.493,6.164a1.01,1.01,0,0,1,0,1.64c-.153.153-.3.307-.455.455-.444.455-.868.878-1.328,1.291-.011.011-.021.016-.026.026a1.079,1.079,0,0,0-.275,1.2l.016.048a11.594,11.594,0,0,0,1.709,2.788l.005.005a19.415,19.415,0,0,0,4.7,4.274,7.222,7.222,0,0,0,.651.354c.19.1.37.185.524.28.021.011.042.026.063.037a1.147,1.147,0,0,0,.524.132,1.131,1.131,0,0,0,.8-.365l1.809-1.809a1.2,1.2,0,0,1,.8-.4,1.077,1.077,0,0,1,.762.386l.011.011L21.7,19.436A1.046,1.046,0,0,1,21.7,21.092Z" transform="translate(-0.018 0.004)" fill="#1cab8f"/>
                          <path id="Path_2278" data-name="Path 2278" d="M13.512,5.95a6.808,6.808,0,0,1,5.544,5.544.71.71,0,0,0,.7.592.945.945,0,0,0,.122-.011.715.715,0,0,0,.587-.825,8.232,8.232,0,0,0-6.707-6.707.718.718,0,0,0-.825.582A.706.706,0,0,0,13.512,5.95Z" transform="translate(0.014 0.011)" fill="#1cab8f"/>
                          <path id="Path_2279" data-name="Path 2279" d="M25,11.056A13.555,13.555,0,0,0,13.956.011a.713.713,0,1,0-.233,1.407,12.107,12.107,0,0,1,9.871,9.871.71.71,0,0,0,.7.592.944.944,0,0,0,.122-.011A.7.7,0,0,0,25,11.056Z" transform="translate(0.015 0)" fill="#1cab8f"/>
                        </g>
                      </g>
                    </g>
                  </svg>
                  Example label
                </label>
                <div class="cs-input_group">
                  <select class="form-select" name="contact_ext">
                    @if($context)
                      @foreach($context as $cext)    
                        <option value="{{$cext->ext}}">{{$cext->ext}}</option>
                      @endforeach
                    @endif
                  </select>
                  <input type="text" name="contact" class="form-control" placeholder="55XXXXXXX">
                </div>
                  @error('contact')<small class="text-danger">{{ $message }}</small>@enderror
                  @error('contact_ext')<br><small class="text-danger">{{ $message }}</small>@enderror
                <div class="text-center">
                  <div class="cs-height_30 cs-height_lg_30"></div>
                  <p>Please provide your Email and Mobile Number to receive updates via Email and SMS regarding your order status and other order tracking details</p>
                  <div class="cs-height_20 cs-height_lg_20"></div>
                  <button type="submit" class="cs-btn cs-style5 cs-color2">Proceed</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
      <div class="col-xl-5">
        <div class="cs-list2_wrap">
          <div class="cs-alert">Review your order <a href="{{route('front.cart')}}" class="cs-alert_btn text-uppercase">Back to Cart</a></div>
          <div class="cs-height_30 cs-height_lg_30"></div>
          @if(count((array) $products)>0)
            @foreach($products as $item)
              <div class="cs-card_3">
                <div class="cs-card_image"><img src="assets/img/product-view/thumb_lg_1.png" alt=""></div>
                <div class="cs-card_content">
                  <h2>{{$item->name}}</h2>
                  <h3>AED: {{number_format($item->price,2)}}</h3>
                  <h4><b>Sku:</b> {{$item->sku}}</h4>
                  @if(isset($cart[$item->id]))
                  <h4><b>Qty:</b> {{$cart[$item->id]['quantity']}}</h4>
                  @endif
                </div>
              </div>
            @endforeach
          @endif
          <div class="cs-height_30 cs-height_lg_30"></div>
          <ul class="cs-list cs-style2">
            <li>
              <span>Sub Total</span>
              <span>AED {{$cal_cart['sub_total']}}</span>
            </li>
            @if($cal_cart['shipping'])
            <li>
              <span>Delivery Charges</span>
              <span class="cs-accent_color">{{$cal_cart['shipping']}}</span>
            </li>
            @endif
            <li class="cs-list_focus">
              <span>Total <span>(Inclusive of VAT)</span></span>
              <span>AED {{$cal_cart['total']}} </span>
            </li>
          </ul>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    </div>
  </div>
  <div class="cs-height_50 cs-height_lg_30"></div>
@endsection