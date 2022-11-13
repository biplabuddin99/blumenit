
@extends('layout.frontend.front')
@section('title', 'Checkout Details')
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
        <form action="{{route('front.checkoutaddress')}}" method="post">
            @csrf
            <div class="cs-card_4">
                <div class="cs-card_4_head">
                    <div class="cs-card_4_head_left">
                    02. <a href="#">Where do you want us to deliver?</a> Please Fillup
                    </div>
                    <div class="cs-card_4_head_right">
                        <div class="form-check md">
                            <input name="pickup" onchange="get_shipping('#pickup')" class="form-check-input" type="checkbox" value="1" id="pickup">
                            <label class="form-check-label" for="pickup">No, I want to pickup </label>
                        </div>
                        @error('pickup')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="cs-height_25 cs-height_lg_25"></div>
                <input type="hidden" name="email" value="{{session()->get('email')}}">
                <div class="cs-card_in delivery_form">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label">Full Name<span>*</span></label>
                            <input type="text" name="full_name" @if($type && $user_address['full_name']) value="{{$user_address['full_name']}}" @endif class="form-control" placeholder="Your Full Name">
                            @error('full_name')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Mobile Number<span>*</span></label>
                            <div class="cs-input_group">
                                <select class="form-select" name="contact_ext">
                                    @if($context)
                                        @foreach($context as $cext)    
                                            <option value="{{$cext->ext}}">{{$cext->ext}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <input type="text" @if($type && $user_address['contact']) value="{{$user_address['contact']}}" @endif name="contact" class="form-control" placeholder="55XXXXXXX">
                            </div>
                            @error('contact')<small class="text-danger">{{ $message }}</small>@enderror
                            @error('contact_ext')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Address<span>*</span></label>
                            <textarea name="address" class="form-control" cols="30" rows="4">@if($type && $user_address['address']){{$user_address['address']}}@endif</textarea>
                            @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_30 cs-height_lg_30"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Postal Code/Zip<span>*</span></label>
                            <input type="text" name="zip" class="form-control" placeholder="XXXXX"  @if($type && $user_address['zip']) value="{{$user_address['zip']}}" @endif>
                            @error('zip')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Country<span>*</span></label>
                            <select class="form-select" name="country_id" id="country_id" onchange="set_state(this.value)">
                                <option value="">Select Country</option>
                                @if($country)
                                    @foreach($country as $c)
                                        <option @if($type && $user_address['country_id'] && $user_address['country_id']==$c->id) selected @endif value="{{$c->id}}~{{$c->country}}">{{$c->country}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('country_id')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">State<span>*</span></label>
                            <select class="form-select" name="state_id" id="state_id" onchange="set_city(this.value)">
                                <option value="">Select State</option>
                                @if($state)
                                    @foreach($state as $c)
                                        <option value="{{$c->id}}~{{$c->state}}" class="state st{{$c->country_id}}">{{$c->state}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('state_id')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">City<span>*</span></label>
                            <select class="form-select" name="city_id" id="city_id">
                                <option value="">Select City</option>
                                @if($city)
                                    @foreach($city as $c)
                                        <option value="{{$c->id}}~{{$c->city}}" class="city ct{{$c->state_id}}">{{$c->city}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label">Delivery Zone<span>*</span></label>
                            <select name="shipping_id" id="shipping_id" class="form-control" onchange="get_shipping('#shipping_id')">
                                @if($shipping)
                                    @foreach($shipping as $s)
                                        <option value="{{$s->id}}" >{{$s->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('shipping_id')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                            <span class="ship-terms"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <div class="text-end">
                <button type="submit" class="cs-btn cs-style5 cs-type1 cs-color2">CONTINUE</button>
            </div>
        </form>
        <div class="cs-height_30 cs-height_lg_30"></div>
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
              <span class="cs-accent_color dcharge">{{$cal_cart['shipping']}}</span>
            </li>
            <li class="cs-list_focus">
              <span>Total <span>(Inclusive of VAT)</span></span>
              <span class="total">AED {{$cal_cart['total']}} </span>
            </li>
          </ul>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    </div>
  </div>
  <div class="cs-height_50 cs-height_lg_30"></div>
@endsection

@push('scripts')
<script>
    function set_state(c){
        $('.state').hide();
        if(c){
            var c=c.split('~');
            $('.st'+c[0]).show();
        }
    }
    function set_city(c){
        $('.city').hide();
        if(c){
            var c=c.split('~');
            $('.ct'+c[0]).show();
        }
    }
    @if($type && $user_address['state_id'])
        set_state('{{$user_address['country_id']}}~{{$user_address['country']}}')
        $('#state_id').val('{{$user_address['state_id']}}~{{$user_address['state']}}')
    @endif

    @if($type && $user_address['city_id'])
        set_city('{{$user_address['state_id']}}~{{$user_address['state']}}')
        $('#city_id').val('{{$user_address['city_id']}}~{{$user_address['city']}}')
    @endif
    
    $('#pickup').click(()=>{
        if($('#pickup').is(":checked")){
            $('.delivery_form').hide();
        }else{
            $('.delivery_form').show();
        }
    })
    get_shipping('#shipping_id')
    function get_shipping(e){
        if(e=="#pickup"){
            var ship="pick";
        }else{
            var ship=$(e).val();
        }
        
        $.ajax({
            type: 'get',
            url: "{{route('front.shippingcheck')}}",
            data: {id:ship},
            dataType: 'JSON',
            success: function (d) {
                if(d){
                    $('.total').text('AED '+d.total)
                    $('.dcharge').text('AED '+d.cost)
                    $('.ship-terms').html(d.terms)
                }
            }
        });
        
    }
</script>
@endpush