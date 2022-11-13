@extends('layout.frontend.front')
@section('title', 'Cart')
@section('content')
  <div class="cs-height_80 cs-height_lg_60"></div>
  <div class="container">
        <div class="row cart_data">
          <div class="col-xl-7">
          @if(Session::has('response'))
                    <div class="cs-alert {{Session::get('response')['class']}}">
                      <span>{{Session::get('response')['message']}}</span>
                      <a href="javascript:void(0)" class="close float-end" data-dismiss="cs-alert">&times;</a>
                    </div>
    				        @endif
            <div class="cs-height_20 cs-height_lg_20"></div>
            @if(count((array) $products)>0)
              @foreach($products as $item)
                <div class="cs-cart_product">
                  <div class="cs-cart_product_thumb">
                    <img src="assets/img/product-view/thumb_1.png" alt="" width="50%">
                  </div>
                  <div class="cs-cart_product_right">
                    <h2 class="cs-cart_product_title">{{$item->name}}</h2>
                    <p class="cs-cart_product_subtitle">{{$item->product_title}}</p>
                    <div class="cs-cart_product_meta">
                      @if($item->discount >0)
                        <div class="cs-cart_meta_left">
                          <h3 class="cs-orange_color">AED: {{number_format(($item->price - ($item->price * ($item->discount/100))),2 )}}</h3>
                          <p>@if((float) $item->vat_status > 0) {{$item->vat_status}}% Vat @else {{$item->vat_status}}  @endif</p>
                        </div>
                        <div class="cs-cart_meta_right">
                          <span class="cs-badge cs-color3">{{$item->discount}}% OFF</span>
                          <div class="cs-height_5 cs-height_lg_5"></div>
                          <div class="cs-single_past_price">Was <span>{{number_format($item->price,2)}} AED</span></div>
                        </div>
                      @else
                        <div class="cs-cart_meta_left">
                          <h3 class="cs-orange_color">AED: {{number_format($item->price,2)}}</h3>
                          <p>@if((float) $item->vat_status > 0) {{$item->vat_status}}% Vat @else {{$item->vat_status}}  @endif</p>
                        </div>
                      @endif
                    </div>
                    <div class="cs-height_15 cs-height_lg_15"></div>
                    <select name="quantity" id="quantity" onchange="update_cart(this.value,{{$item->id}})">
                      @for($i=1;$i <= $item->max_qty; $i++)
                        <option value="0{{$i}}" @if($cart[$item->id]['quantity'] == $i) selected @endif>0{{$i}}</option>
                      @endfor
                    </select>
                    <div class="cs-height_15 cs-height_lg_15"></div>
                    <div class="cs-cart_btn_group">
                      <a href="#" class="cs-btn cs-style4">
                          <svg xmlns="http://www.w3.org/2000/svg" width="11.5" height="10.104" viewBox="0 0 11.5 10.104">
                          <path id="Path_2262" data-name="Path 2262" d="M1367.66,312.74a3.322,3.322,0,0,1,1.323-.943,3.287,3.287,0,0,1,4.409,2.781,4.306,4.306,0,0,1-.818,2.741,11.965,11.965,0,0,1-2.337,2.465c-.795.67-1.665,1.238-2.495,1.86-.053.039-.093.059-.157.012a29.882,29.882,0,0,1-3.556-2.813,8.039,8.039,0,0,1-1.723-2.293,3.581,3.581,0,0,1-.3-2.455,3.164,3.164,0,0,1,2.364-2.4,3.1,3.1,0,0,1,3.174.915C1367.579,312.653,1367.616,312.693,1367.66,312.74Z" transform="translate(-1361.902 -311.58)" fill="#53ba63"/>
                          </svg>                                   
                          <span>Favorite list</span>
                      </a>
                      <a href="javascript:void(0)" onclick="remove_cart({{$item->id}})" class="cs-btn cs-style4">
                          <svg xmlns="http://www.w3.org/2000/svg" width="10.999" height="13.012" viewBox="0 0 10.999 13.012">
                          <g id="Group_783" data-name="Group 783" transform="translate(-2068.196 -739.334)">
                              <path id="Path_2263" data-name="Path 2263" d="M2069.183,743.325h-.987v-.973l.46-.027c.01-.126.021-.247.027-.368.025-.473.141-.6.621-.607.5-.012,1.009-.006,1.513-.008h.318c.043-.262.074-.5.123-.734a1.722,1.722,0,0,1,1.672-1.271c.521.035,1.047,0,1.571.007a1.736,1.736,0,0,1,1.7,1.679c0,.095.009.189.016.319h1.548c.862.007.882.026.943.886a.509.509,0,0,0,.029.1l.453.027v.981h-1v.385c0,2.406-.018,4.812.006,7.217a1.564,1.564,0,0,1-1.386,1.413q-3.114-.04-6.228,0a1.55,1.55,0,0,1-1.4-1.4c.018-2.406,0-4.812-.006-7.217C2069.182,743.611,2069.183,743.5,2069.183,743.325Zm.973.031c0,.424,0,.811,0,1.2.008,2.076.011,4.152.027,6.228,0,.446.15.6.568.6q2.939.011,5.879,0c.417,0,.57-.175.572-.6q.013-3.58.021-7.159c0-.085-.009-.169-.015-.271Zm2.054-2.04h2.953c.036-.685-.237-.978-.892-.982-.4,0-.793,0-1.189,0C2072.462,740.342,2072.166,740.668,2072.209,741.316Z" fill="red"/>
                              <path id="Path_2264" data-name="Path 2264" d="M2121.239,825.779h-.933v5.958h.933Zm1.992,5.964v-5.966h-.944v5.966Zm1.085-5.976v5.968h.919v-5.968Z" transform="translate(-49.076 -81.401)" fill="red"/>
                              <path id="Path_2265" data-name="Path 2265" d="M2121.239,825.97v5.958h-.933V825.97Z" transform="translate(-49.076 -81.592)" fill="red"/>
                              <path id="Path_2266" data-name="Path 2266" d="M2155.279,831.9h-.944v-5.966h.944Z" transform="translate(-81.124 -81.563)" fill="red"/>
                              <path id="Path_2267" data-name="Path 2267" d="M2189.2,825.767h.919v5.968h-.919Z" transform="translate(-113.954 -81.401)" fill="red"/>
                          </g>
                          </svg>                                            
                          <span>Delete</span>
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
    
            <div class="cs-height_30 cs-height_lg_30"></div>
          </div>
          <div class="col-xl-5">
                @php
                    $total=0;
                    $t_discount=0;
                    $t_vat=0;
                @endphp
    
              @if(count((array) session('cart')))
                @foreach($cart as $c)
                    @php
                        $total+=$c['price'] * $c['quantity'];
                        $t_discount+=$c['quantity'] * $c['discount_amount'];
                        $t_vat+=$c['quantity'] * $c['vat_amount'];
                    @endphp
                @endforeach
              @endif
            <div class="cs-list2_wrap">
              <h3 class="cs-secondary_color">Price Details</h3>
              <ul class="cs-list cs-style2">
                <li>
                  <span>Total MRP</span>
                  <span>AED {{number_format($total,2)}} </span>
                </li>
                @if($t_discount>0)
                <li>
                  <span>Cart Discount</span>
                  <span class="cs-accent_color">-AED {{number_format($t_discount,2)}} </span>
                </li>
                @endif
                @if($t_vat>0)
                <li>
                  <span>VAT</span>
                  <span class="cs-orange_color">+AED {{number_format($t_vat,2)}} </span>
                </li>
                @endif
                <li>
                  <span>Sub Total</span>
                  <span>AED {{number_format((($total - $t_discount)+$t_vat),2)}} </span>
                </li>
                <!--<li>
                  <span>Delivery Charges</span>
                  <span class="cs-accent_color">{{$gs->shipping_charge}}</span>
                </li>-->
                <li>
                  <span>Total <span>(Inclusive of VAT)</span></span>
                  <!--<span>AED {{number_format((($total - $t_discount)+$t_vat + (float) $gs->shipping_charge),2)}} </span>-->
                  <span>AED {{number_format((($total - $t_discount)+$t_vat),2)}} </span>
                </li>
              </ul>
              <div class="cs-height_20 cs-height_lg_20"></div>
              <a href="{{route('front.checkout')}}" class="cs-btn cs-style3 cs-color1">                    
                <span>Proceed to Checkout</span>
              </a>
              <div class="cs-height_10 cs-height_lg_10"></div>
              <a href="{{route('front.category')}}" class="cs-btn cs-style3 cs-color2">  
                <svg xmlns="http://www.w3.org/2000/svg" width="24.17" height="19.001" viewBox="0 0 24.17 19.001">
                  <path id="Path_2268" data-name="Path 2268" d="M1824.794,113.1h.27q9.233,0,18.467,0a1.19,1.19,0,0,1,1.07.479,1.237,1.237,0,0,1,.094,1.313,1.111,1.111,0,0,1-1.068.636q-5.455,0-10.91,0H1824.9l-.025.037.281.283q2.934,2.934,5.869,5.867a1.2,1.2,0,0,1-.511,2,1.132,1.132,0,0,1-1.231-.329q-1.487-1.5-2.982-2.984-2.439-2.439-4.878-4.877a1.751,1.751,0,0,0-.237-.2,1.258,1.258,0,0,1-.178-1.883q4.144-4.144,8.294-8.283a1.205,1.205,0,1,1,1.7,1.705c-.189.194-.382.384-.573.576l-5.514,5.513C1824.888,112.985,1824.857,113.024,1824.794,113.1Z" transform="translate(-1820.669 -104.776)" fill="currentColor"/>
                </svg>                              
                <span>More Shopping</span>
              </a>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
          </div>
        </div>
      </div>
  <div class="cs-height_30 cs-height_lg_30"></div>
  <div class="container">
    <div class="cs-seciton_heading cs-style4 cs-type1">
      <h2 class="cs-seciton_title">Smilar items</h2>
    </div>
    <div class="cs-slider cs-style3 cs-gap-10">
      <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="5" data-add-slides="6">
        <div class="cs-slider_wrapper">
        @if(@similarpro)
            @foreach($similarpro as $item)
          <div class="cs-slide">
            <a href="{{route('front.product',$item->id)}}" class="cs-card cs-style1">
              <div class="cs-card_img"><img src='{{asset("$item->feature_image")}}' alt="Item"></div>
                @if($item->outofstock_product==1)
                    <div class="cs-card_alert cs-out_of_stock">Out Of Stock</div>
                  @elseif($item->limited_product==1)
                    <div class="cs-card_alert">Limited Stock</div>
                  @elseif($item->feature_product==1)
                  <div class="cs-card_alert">Available</div>
                  @elseif($item->new_product==1)
                  <div class="cs-card_alert cs-new_item">New Arrival</div>
                  @else
                  <div class="cs-card_alert">Available</div>
                  @endif
              <div class="cs-card_info">
                <div class="cs-card_desc">{{$item->name}}</div>
                    @if($item->discount>0)
                    <div class="cs-card_price"><span>AED</span> {{number_format(($item->price - ($item->price * ($item->discount/100))),2)}}</div>
                    <div class="cs-card_previous_price">AED {{number_format($item->price,2)}}</div>
                    @else
                    <div class="cs-card_price"><span>AED</span> {{number_format($item->price,2)}}</div>
                    @endif
              </div>
            </a>
          </div>
          @endforeach
        @endif
        </div>
      </div>
      <div class="cs-slider_arrows cs-style1 cs-type1">
        <div class="cs-left_arrow">
          <svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.01606 9.16699C1.11907 9.06512 1.23273 8.9746 1.35506 8.89699L9.38606 0.866991C9.76541 0.505651 10.271 0.306969 10.7949 0.313383C11.3187 0.319797 11.8193 0.530799 12.1897 0.901319C12.5601 1.27184 12.7709 1.7725 12.7772 2.29637C12.7834 2.82023 12.5845 3.32577 12.2231 3.70499L5.30906 10.621L12.2611 17.573C12.6375 17.9493 12.8491 18.4598 12.8492 18.9921C12.8493 19.5245 12.6379 20.035 12.2616 20.4115C11.8852 20.788 11.3747 20.9995 10.8424 20.9996C10.3101 20.9997 9.79954 20.7883 9.42306 20.412L1.35606 12.344C1.10299 12.1744 0.890204 11.9513 0.732703 11.6905C0.575202 11.4298 0.476822 11.1376 0.444498 10.8347C0.412173 10.5317 0.446692 10.2254 0.54562 9.93726C0.644548 9.64912 0.805477 9.38618 1.01706 9.16699H1.01606Z" fill="#1CAB8F"/>
          </svg>                
        </div>
        <div class="cs-right_arrow">
          <svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9839 11.833C11.8809 11.9349 11.7673 12.0254 11.6449 12.103L3.61394 20.133C3.23459 20.4943 2.72898 20.693 2.20512 20.6866C1.68126 20.6802 1.18067 20.4692 0.810278 20.0987C0.439888 19.7282 0.229061 19.2275 0.222832 18.7036C0.216602 18.1798 0.415464 17.6742 0.776937 17.295L7.69094 10.379L0.738937 3.42701C0.362463 3.05067 0.150908 2.54018 0.150814 2.00786C0.15072 1.47554 0.362095 0.964983 0.738438 0.588509C1.11478 0.212034 1.62526 0.000479053 2.15758 0.000385284C2.68991 0.000291516 3.20046 0.211667 3.57694 0.588009L11.6439 8.65601C11.897 8.82562 12.1098 9.04868 12.2673 9.30946C12.4248 9.57024 12.5232 9.86239 12.5555 10.1653C12.5878 10.4683 12.5533 10.7746 12.4544 11.0627C12.3555 11.3509 12.1945 11.6138 11.9829 11.833H11.9839Z" fill="#1CAB8F"/>
          </svg>                
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_60 cs-height_lg_60"></div>
@endsection

  @push('scripts')
  <script>
    function remove_cart(i){
    
        $.ajax({
        url: '{{ route('front.removeCart') }}',
        method: "get",
        data: {
            id: i
        },
        success: function (r) {
            $('.cart_data').html(r);

            setTimeout(() => {
            $('.cs-alert').hide('slowly');
            }, 3000);
        }
        });
    }
    function update_cart(q,i){
    
        $.ajax({
        url: '{{ route('front.updateCart') }}',
        method: "get",
        data: {
            id: i,
            qty:q
        },
        success: function (r) {
            $('.cart_data').html(r);

            setTimeout(() => {
            $('.cs-alert').hide('slowly');
            }, 3000);
        }
        });
    }
  </script>
  
  @endpush