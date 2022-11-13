@extends('layout.frontend.front')
@section('title', 'Product')
@section('content')

<div class="cs-height_80 cs-height_lg_60"></div>
  <div class="container">
    <div class="favorite_heading">
      <h2 class="favorite_heading_title">
        <svg xmlns="http://www.w3.org/2000/svg" width="28.428" height="24.978" viewBox="0 0 28.428 24.978">
          <path id="Path_2262" data-name="Path 2262" d="M1376.136,314.448a8.211,8.211,0,0,1,3.271-2.331,8.125,8.125,0,0,1,10.9,6.875,10.644,10.644,0,0,1-2.021,6.776,29.58,29.58,0,0,1-5.776,6.094c-1.965,1.655-4.115,3.06-6.167,4.6-.13.1-.23.146-.389.03a73.863,73.863,0,0,1-8.79-6.953,19.87,19.87,0,0,1-4.259-5.668,8.852,8.852,0,0,1-.752-6.068,7.822,7.822,0,0,1,5.844-5.924,7.671,7.671,0,0,1,7.846,2.261C1375.936,314.233,1376.026,314.332,1376.136,314.448Z" transform="translate(-1361.902 -311.58)" fill="#53ba63"/>
        </svg>        
        Favorite list
      </h2>
    </div>
    <div class="cs-height_40 cs-height_lg_40"></div>
    <div class="cs-card_grip_2">
        @if($products)
            @foreach($products as $item)
            <div class="cs-card_out">
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
                    <div class="cs-card_price"><span>AED</span> {{ number_format(($item->price - ($item->price * ($item->discount/100))),2) }}</div>
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
  <div class="cs-height_80 cs-height_lg_60"></div>

@endsection