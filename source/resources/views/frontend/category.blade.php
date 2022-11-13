@extends('layout.frontend.front')
@section('title', 'Home')
@section('content')

 <div class="cs-slider cs-style1">
    <div class="cs-slider_container" data-autoplay="1" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
      <div class="cs-slider_wrapper">
        @if ($slide)
          @foreach ($slide as $item)
            <div class="cs-slide">
              <div class="cs-banner cs-style1">
                <img src="{{asset($item->image)}}" alt="">
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
    <div class="cs-pagination cs-style1"></div>
  </div>
  <div class="cs-height_35 cs-height_lg_35"></div>
  
  <div class="container">
    <div class="row cs-card_wrap">
      <div class="col-lg-3">
        <a href="{{$catsetting->mp_add_link}}" class="cs-brand"><img src="@if($catsetting->mp_add) {{asset($catsetting->mp_add)}} @else {{asset('assets/img/category/add_1.jpg')}} @endif" alt=""></a>
      </div>
      <div class="col-lg-9">
        <div class="cs-seciton_heading cs-style2">
          <h2 class="cs-seciton_title"><span>Most Popular</span></h2>
        </div>
        <div class="cs-slider cs-style3 cs-gap-10">
          <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
            <div class="cs-slider_wrapper">
                @php
                    $products=App\Models\Product::where('popular',1)->whereIn('category_id',$categoryids)->take(10)->latest()->get();
                @endphp
          @if($products)
            @foreach ($products as $item)
              <div class="cs-slide">
                <a href="{{route('front.product',$item->id)}}" class="cs-card cs-style1">
                  <div class="cs-card_img"><img src='{{asset("$item->feature_image")}}' alt="Item"></div>
                  @if($item->outofstock_product==1)
                    <div class="cs-card_alert cs-out_of_stock">Out Of Stock</div>
                  @elseif($item->refurbished_product==1)
                    <div class="cs-card_alert">Refurbished</div>
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
    </div>
  </div>
  <div class="cs-height_60 cs-height_lg_60"></div>
  <div class="container">
    <div class="row cs-card_wrap">
      <div class="col-lg-3">
        <a href="{{$catsetting->fp_add_link}}" class="cs-brand"><img src="@if($catsetting->fp_add) {{asset($catsetting->fp_add)}} @else {{asset('assets/img/category/add_2.jpg')}} @endif" alt=""></a>
      </div>
      <div class="col-lg-9">
        <div class="cs-seciton_heading cs-style2">
          <h2 class="cs-seciton_title"><span>Featured Products</span></h2>
        </div>
        <div class="cs-slider cs-style3 cs-gap-10">
          <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
            <div class="cs-slider_wrapper">
                @php
                    $products=App\Models\Product::where('feature_product',1)->whereIn('category_id',$categoryids)->take(10)->latest()->get();
                @endphp
          @if($products)
            @foreach ($products as $item)
              <div class="cs-slide">
                <a href="{{route('front.product',$item->id)}}" class="cs-card cs-style1">
                  <div class="cs-card_img"><img src='{{asset("$item->feature_image")}}' alt="Item"></div>
                  @if($item->outofstock_product==1)
                    <div class="cs-card_alert cs-out_of_stock">Out Of Stock</div>
                  @elseif($item->refurbished_product==1)
                    <div class="cs-card_alert">Refurbished</div>
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
    </div>
  </div>
  <div class="cs-height_60 cs-height_lg_60"></div>
  <div class="container">
    <a href="{{$catsetting->large_add_link}}" class="cs-brand"><img src="@if($catsetting->large_add) {{asset($catsetting->large_add)}} @else {{asset('assets/img/category/add_3.jpg')}} @endif" alt=""></a>
    <div class="cs-height_30 cs-height_lg_30"></div>
    <div class="row">
      <div class="col-sm-4">
        <a href="{{$catsetting->small_add1_link}}" class="cs-brand"><img src="@if($catsetting->small_add1) {{asset($catsetting->small_add1)}} @else {{asset('assets/img/category/add_4.jpg')}} @endif" alt=""></a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
      <div class="col-sm-4">
        <a href="{{$catsetting->small_add2_link}}" class="cs-brand"><img src="@if($catsetting->small_add2) {{asset($catsetting->small_add2)}} @else {{asset('assets/img/category/add_5.jpg')}} @endif" alt=""></a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
      <div class="col-sm-4">
        <a href="{{$catsetting->small_add3_link}}" class="cs-brand"><img src="@if($catsetting->small_add3) {{asset($catsetting->small_add3)}} @else {{asset('assets/img/category/add_6.jpg')}} @endif" alt=""></a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    </div>
  </div>
  <div class="cs-height_30 cs-height_lg_30"></div>
  <div class="container">
    <div class="row cs-card_wrap">
      <div class="col-lg-3">
        <a href="{{$catsetting->bs_add_link}}" class="cs-brand"><img src="@if($catsetting->bs_add) {{asset($catsetting->bs_add)}} @else {{asset('assets/img/gaming/brand3.jpg')}} @endif" alt=""></a>
      </div>
      <div class="col-lg-9">
        <div class=" cs-tabs cs-fade_tabs cs-style1 cs-type1">
          <div class="cs-seciton_heading cs-style3">
            <h2 class="cs-seciton_title"><span>Best Seller</span></h2>
            <ul class="cs-tab_links cs-style1">
              <li class="active">
                <a href="#tab_one">Latest products</a>
              </li>
              <li>
                <a href="#tab_two">Sale products</a>
              </li>
            </ul>
            <!-- <div class="cs-section_nav">
              <a href="#">Latest products</a>
              <a href="#" class="active">Sale products</a>
            </div> -->
          </div>
          <div class="cs-tab_content">
            <div id="tab_one" class="cs-tab active">
              <div class="cs-slider cs-style3 cs-gap-10">
                <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
                  <div class="cs-slider_wrapper">
                    @php
                      $products=App\Models\Product::where('best_seller',1)->where('new_product',1)->whereIn('category_id',$categoryids)->orderBy('id','DESC')->paginate(8);
                    @endphp
                    @if($products)
                      @foreach ($products as $item)
                        <div class="cs-slide">
                          <a href="{{route('front.product',$item->id)}}" class="cs-card cs-style1">
                            <div class="cs-card_img"><img src='{{asset("$item->feature_image")}}' alt="Item"></div>
                            @if($item->outofstock_product==1)
                              <div class="cs-card_alert cs-out_of_stock">Out Of Stock</div>
                              @elseif($item->refurbished_product==1)
                                <div class="cs-card_alert">Refurbished</div>
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
                              @if($item->discount)
                              <div class="cs-card_price"><span>AED</span> {{$item->price - ($item->price * ($item->discount/100))}}</div>
                              <div class="cs-card_previous_price">AED {{$item->price}}</div>
                              @else
                              <div class="cs-card_price"><span>AED</span> {{$item->price}}</div>
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
            <div id="tab_two" class="cs-tab">
              <div class="cs-slider cs-style3 cs-gap-10">
                <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
                  <div class="cs-slider_wrapper">
                  @php
                      $products=App\Models\Product::where('best_seller',1)->whereIn('category_id',$categoryids)->inRandomOrder()->paginate(8);
                    @endphp
                    @if($products)
                      @foreach ($products as $item)
                        <div class="cs-slide">
                          <a href="{{route('front.product',$item->id)}}" class="cs-card cs-style1">
                            <div class="cs-card_img"><img src='{{asset("$item->feature_image")}}' alt="Item"></div>
                            @if($item->outofstock_product==1)
                              <div class="cs-card_alert cs-out_of_stock">Out Of Stock</div>
                              @elseif($item->refurbished_product==1)
                                <div class="cs-card_alert">Refurbished</div>
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
                              @if($item->discount)
                              <div class="cs-card_price"><span>AED</span> {{$item->price - ($item->price * ($item->discount/100))}}</div>
                              <div class="cs-card_previous_price">AED {{$item->price}}</div>
                              @else
                              <div class="cs-card_price"><span>AED</span> {{$item->price}}</div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="cs-height_80 cs-height_lg_60"></div>
  
  @if($category)
    @foreach($category as $cat)
        <div class="container">
    <div class="row cs-card_wrap">
      <div class="col-lg-3">
        <a href="{{route('front.categoryview',$cat->id)}}" class="cs-brand"><img src="{{asset($cat->lsb_image)}}" alt=""></a>
      </div>
      <div class="col-lg-9">
        <div class=" cs-tabs cs-fade_tabs cs-style1 cs-type1">
          <div class="cs-seciton_heading cs-style3">
            <h2 class="cs-seciton_title"><span>{{$cat->name}}</span></h2>
            <ul class="cs-tab_links cs-style1">
              <li class="active">
                <a href="#tab_one{{$cat->id}}">Latest products</a>
              </li>
              <li>
                <a href="#tab_two{{$cat->id}}">Sale products</a>
              </li>
            </ul>
          </div>
          <div class="cs-tab_content">
            <div id="tab_one{{$cat->id}}" class="cs-tab active">
              <div class="cs-slider cs-style3 cs-gap-10">
                <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
                  <div class="cs-slider_wrapper">
                    @php
                      $products=App\Models\Product::where('best_seller',1)->where('new_product',1)->where('category_id',$cat->id)->orderBy('id','DESC')->paginate(8);
                    @endphp
                    @if($products)
                      @foreach ($products as $item)
                        <div class="cs-slide">
                          <a href="{{route('front.product',$item->id)}}" class="cs-card cs-style1">
                            <div class="cs-card_img"><img src='{{asset("$item->feature_image")}}' alt="Item"></div>
                            @if($item->outofstock_product==1)
                              <div class="cs-card_alert cs-out_of_stock">Out Of Stock</div>
                              @elseif($item->refurbished_product==1)
                                <div class="cs-card_alert">Refurbished</div>
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
                              @if($item->discount)
                              <div class="cs-card_price"><span>AED</span> {{$item->price - ($item->price * ($item->discount/100))}}</div>
                              <div class="cs-card_previous_price">AED {{$item->price}}</div>
                              @else
                              <div class="cs-card_price"><span>AED</span> {{$item->price}}</div>
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
            <div id="tab_two{{$cat->id}}" class="cs-tab">
              <div class="cs-slider cs-style3 cs-gap-10">
                <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
                  <div class="cs-slider_wrapper">
                  @php
                      $products=App\Models\Product::where('best_seller',1)->where('category_id',$cat->id)->inRandomOrder()->paginate(8);
                    @endphp
                    @if($products)
                      @foreach ($products as $item)
                        <div class="cs-slide">
                          <a href="{{route('front.product',$item->id)}}" class="cs-card cs-style1">
                            <div class="cs-card_img"><img src='{{asset("$item->feature_image")}}' alt="Item"></div>
                            @if($item->outofstock_product==1)
                              <div class="cs-card_alert cs-out_of_stock">Out Of Stock</div>
                              @elseif($item->refurbished_product==1)
                                <div class="cs-card_alert">Refurbished</div>
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
                              @if($item->discount)
                              <div class="cs-card_price"><span>AED</span> {{$item->price - ($item->price * ($item->discount/100))}}</div>
                              <div class="cs-card_previous_price">AED {{$item->price}}</div>
                              @else
                              <div class="cs-card_price"><span>AED</span> {{$item->price}}</div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_80 cs-height_lg_60"></div>
    @endforeach
  @endif
 
 @endsection