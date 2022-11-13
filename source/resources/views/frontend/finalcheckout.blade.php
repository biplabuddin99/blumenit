@extends('layout.frontend.front')
@section('title', 'Checkout')
@section('content')

<div class="cs-height_80 cs-height_lg_60"></div>
  <div class="container">
    <div class="row cs-reverse_row_lg">
      <div class="col-xl-7">
        <div class="cs-card_4">
          <div class="cs-card_4_head">
            <div class="cs-card_4_head_left">
              01. {{session()->get('type')}} <b>{{session()->get('email')}}</b> <a href="#">(Already Registered?)</a>
            </div>
          </div>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
        <div class="cs-card_4">
          <div class="cs-card_4_head">
            <div class="cs-card_4_head_left">
              02. Where do you want us to deliver? Please Fillup
            </div>
          </div>
          <div class="cs-height_25 cs-height_lg_25"></div>
          <div class="cs-card_in">
              @if($user_address['pickup']==1)
                <p>I want to pickup</p>
              @else
                <p>{{$user_address['full_name']}} <br>
                {{$user_address['address']}}<br>
                {{$user_address['city']}}, {{$user_address['state']}}, {{$user_address['country']}} <br>
                {{$user_address['contact_ext']}}-{{$user_address['contact']}}</p>
              @endif
                <div class="cs-height_10 cs-height_lg_10"></div>
                <div class="card_edit_btns">
                    <a href="{{route('front.detailscheckout')}}?type=edit">Edit</a>
                    <span>I</span>
                    <a href="{{route('front.detailscheckout')}}">Change</a>
                </div>
          </div>
          <div class="cs-height_25 cs-height_lg_25"></div>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
        <form action="{{route('front.ordersubmit')}}" method="post">
            @csrf
        <div class="cs-card_4">
          <div class="cs-card_in">
            <div class="cs-height_20 cs-height_lg_20"></div>
            <label class="form-label">
              Order Comments
            </label>
            <textarea class="form-control" cols="30" rows="4" name="comment"></textarea>
            <div class="cs-height_30 cs-height_lg_30"></div>
          </div>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
        <div class="cs-card_4">
          <div class="cs-card_4_head">
            <div class="cs-card_4_head_left" style="color: #127DC6;">
              03. How do you want to pay?
            </div>
          </div>
          <div class="cs-height_25 cs-height_lg_25"></div>
          <div class="cs-card_in">
            @if($gs->online_pay_status==1)
                <div class="cs-form_check">
                <input class="cs-form_check_input" type="radio" name="pay_method" id="online_pay" vlaue="{{$gs->online_pay_name}}">
                <label class="cs-form_check_label" for="online_pay">
                    {{$gs->online_pay_name}}
                </label>
                </div>
                <div class="cs-height_10 cs-height_lg_10"></div>
            @endif
            @if($gs->online_pay_status==1)
              <div class="cs-form_check">
                <input class="cs-form_check_input" type="radio" name="pay_method" id="cod" checked value="{{$gs->cod_name}}">
                <label class="cs-form_check_label" for="cod">
                    {{$gs->cod_name}}
                </label>
              </div>
            @endif
            @if($gs->cia_status==1)
              <div class="cs-form_check">
                <input class="cs-form_check_input" type="radio" name="pay_method" id="cia" value="{{$gs->cia_name}}">
                <label class="cs-form_check_label" for="cia">
                    {{$gs->cia_name}}
                </label>
              </div>
            @endif
            @if($gs->dot_status==1)
              <div class="cs-form_check">
                <input class="cs-form_check_input" type="radio" name="pay_method" id="dot" value="{{$gs->dot_name}}">
                <label class="cs-form_check_label" for="dot">
                    {{$gs->dot_name}}
                </label>
              </div>
            @endif
          </div>
          <div class="cs-height_25 cs-height_lg_25"></div>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
        <div class="text-end">
          <button type="submit" class="cs-btn cs-style5 cs-type1 cs-color2">PLACE ORDER</button>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
        </form>
      </div>
      <div class="col-xl-5">
        <div class="cs-list2_wrap">
          <div class="cs-alert">Review your order <a href="{{route('front.cart')}}" class="cs-alert_btn text-uppercase">Back to Cart</a></div>
          <div class="cs-height_30 cs-height_lg_30"></div>
          @if(count($cart)>0)
            @foreach($cart as $item)
              <div class="cs-card_3">
                <div class="cs-card_image"><img src="{{asset($item['image'])}}" alt=""></div>
                <div class="cs-card_content">
                  <h2>{{$item['name']}}</h2>
                  <h3>AED: {{number_format($item['price'],2)}}</h3>
                  <h4><b>Sku:</b> {{$item['sku']}}</h4>
                  <h4><b>Qty:</b> {{$item['quantity']}}</h4>
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
            <li>
              <span>Delivery Charges</span>
              <span class="cs-accent_color">AED {{$cal_cart['shipping']}}</span>
            </li>
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