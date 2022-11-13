@extends('layout.frontend.front')
@section('title')
Category | {{$subcat->name}}
@endsection
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
    <div class="row">
      <div class="col-xl-2">
        <div class="cs-filter_sidebar">
          <div class="cs-mobile_filter_cross">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Close Circle</title><path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M320 320L192 192M192 320l128-128"/></svg>
          </div>
          
          <div class="cs-sidebar_widget">
            <h3 class="cs-sidebar_widget_title cs-widget_toggle">Manufacturer <span class="cs-widget_icon"></span></h3>
            <ul class="cs-checkbox_list">
              @if($manufacturer)
                  @foreach($manufacturer as $mf)
                    <li>
                      <div class="form-check">
                        <input class="form-check-input manu" onchange="filter()" type="checkbox" @if(in_array($mf->id,$manuFilt)) checked @endif value="{{ $mf->id}}" id="m{{ $mf->id}}">
                        <label class="form-check-label" for="m{{ $mf->id}}">{{ $mf->name}}</label>
                      </div>
                    </li>
                  @endforeach
                @endif
              <li>
                <div class="cs-clear manu-clear @if(count($manuFilt)<=0) hidden @endif" onclick="clear_filter('.manu')">
                  <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.65006 4.99994L9.74406 1.90694C9.90802 1.74286 10.0001 1.5204 10.0001 1.28844C10.0001 1.05648 9.90802 0.834018 9.74406 0.669941L9.33106 0.256941C9.16699 0.0929804 8.94452 0.00087793 8.71256 0.00087793C8.48061 0.00087793 8.25814 0.0929804 8.09406 0.256941L5.00006 3.35094L1.90706 0.255941C1.74299 0.0919804 1.52052 -0.00012207 1.28856 -0.00012207C1.05661 -0.00012207 0.83414 0.0919804 0.670063 0.255941L0.256063 0.668941C0.0921025 0.833018 0 1.05548 0 1.28744C0 1.5194 0.0921025 1.74186 0.256063 1.90594L3.35106 4.99994L0.257063 8.09394C0.0931025 8.25802 0.001 8.48048 0.001 8.71244C0.001 8.9444 0.0931025 9.16686 0.257063 9.33094L0.669063 9.74294C0.83314 9.9069 1.05561 9.999 1.28756 9.999C1.51952 9.999 1.74199 9.9069 1.90606 9.74294L5.00006 6.64994L8.09406 9.74394C8.25814 9.9079 8.48061 10 8.71256 10C8.94452 10 9.16699 9.9079 9.33106 9.74394L9.74306 9.33194C9.90702 9.16786 9.99913 8.9454 9.99913 8.71344C9.99913 8.48148 9.90702 8.25902 9.74306 8.09494L6.65006 4.99994Z" fill="currentColor"/>
                  </svg>
                  Clear
                </div>
              </li>
              
            </ul>
          </div>
          <div class="cs-sidebar_widget">
            <h3 class="cs-sidebar_widget_title cs-widget_toggle">Model Number <span class="cs-widget_icon"></span></h3>
            <ul class="cs-checkbox_list">
              @if($models)
                @foreach($models as $m)
              <li>
                <div class="form-check">
                  <input class="form-check-input model" onchange="filter()" type="checkbox" @if(in_array($m,$modelFilt)) checked @endif value="{{$m}}" id="md{{$m}}">
                  <label class="form-check-label" for="md{{$m}}">{{$m}}</label>
                </div>
              </li>
                @endforeach
              @endif
              
              <li>
                <div class="cs-clear model-clear @if(count($modelFilt)<=0) hidden @endif" onclick="clear_filter('.model')">
                  <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.65006 4.99994L9.74406 1.90694C9.90802 1.74286 10.0001 1.5204 10.0001 1.28844C10.0001 1.05648 9.90802 0.834018 9.74406 0.669941L9.33106 0.256941C9.16699 0.0929804 8.94452 0.00087793 8.71256 0.00087793C8.48061 0.00087793 8.25814 0.0929804 8.09406 0.256941L5.00006 3.35094L1.90706 0.255941C1.74299 0.0919804 1.52052 -0.00012207 1.28856 -0.00012207C1.05661 -0.00012207 0.83414 0.0919804 0.670063 0.255941L0.256063 0.668941C0.0921025 0.833018 0 1.05548 0 1.28744C0 1.5194 0.0921025 1.74186 0.256063 1.90594L3.35106 4.99994L0.257063 8.09394C0.0931025 8.25802 0.001 8.48048 0.001 8.71244C0.001 8.9444 0.0931025 9.16686 0.257063 9.33094L0.669063 9.74294C0.83314 9.9069 1.05561 9.999 1.28756 9.999C1.51952 9.999 1.74199 9.9069 1.90606 9.74294L5.00006 6.64994L8.09406 9.74394C8.25814 9.9079 8.48061 10 8.71256 10C8.94452 10 9.16699 9.9079 9.33106 9.74394L9.74306 9.33194C9.90702 9.16786 9.99913 8.9454 9.99913 8.71344C9.99913 8.48148 9.90702 8.25902 9.74306 8.09494L6.65006 4.99994Z" fill="currentColor"/>
                  </svg>
                  Clear
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-10">
        <div class="cs-seciton_heading cs-style4">
          <h2 class="cs-seciton_title">{{$subcat->name}}</h2>
          <div class="cs-mobile_filter_btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Options</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="176" cy="256" r="32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="336" cy="384" r="32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
            <span>Filter</span>
          </div>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
        <div class="cs-card_grip_1">
          @if($products)
            @foreach ($products as $item)
              <div class="cs-card_out">
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
        <div class="cs-height_45 cs-height_lg_45"></div>
        @if($products->lastPage()>1)
        <div class="text-center cs-page_controller">
          <a href="{{$products->appends($_GET)->nextPageUrl()}}" class="cs-btn cs-style2">Next</a>
          <div class="cs-page_nav">
            
            <a href="{{$products->appends($_GET)->previousPageUrl()}}" class="cs-page_prev">
              <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.410032 6.432C0.483932 6.36079 0.565035 6.29745 0.652032 6.243L6.47103 0.424001C6.60551 0.289527 6.76515 0.182857 6.94085 0.110081C7.11655 0.0373041 7.30486 -0.000153542 7.49503 -0.000153542C7.68521 -0.000153542 7.87352 0.0373041 8.04922 0.110081C8.22492 0.182857 8.38456 0.289527 8.51903 0.424001C8.65351 0.558474 8.76018 0.718118 8.83295 0.893816C8.90573 1.06951 8.94319 1.25783 8.94319 1.448C8.94319 1.63818 8.90573 1.82649 8.83295 2.00219C8.76018 2.17788 8.65351 2.33753 8.51903 2.472L3.53503 7.483L8.57303 12.521C8.70764 12.6554 8.81444 12.815 8.8873 12.9907C8.96016 13.1664 8.99767 13.3548 8.99767 13.545C8.99767 13.7352 8.96016 13.9236 8.8873 14.0993C8.81444 14.275 8.70764 14.4346 8.57303 14.569C8.44054 14.7066 8.28142 14.8158 8.10538 14.8899C7.92933 14.964 7.74003 15.0014 7.54903 15C7.35784 15.0038 7.16797 14.9674 6.99174 14.8932C6.81551 14.8189 6.65685 14.7085 6.52603 14.569L0.679032 8.722C0.468353 8.59224 0.295295 8.4096 0.177056 8.19225C0.0588162 7.97489 -0.000489096 7.73038 0.00503233 7.483C-0.00391713 7.28932 0.0274604 7.09589 0.0971768 6.91498C0.166893 6.73406 0.273429 6.56959 0.410032 6.432Z" fill="currentColor"/>
              </svg>                
            </a>
            <span class="cs-page_number">{{$products->currentPage()}}</span>
            <a href="{{$products->appends($_GET)->nextPageUrl()}}" class="cs-page_next">
              <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.58997 8.568C8.51607 8.63921 8.43497 8.70255 8.34797 8.757L2.52897 14.576C2.39449 14.7105 2.23485 14.8171 2.05915 14.8899C1.88345 14.9627 1.69514 15.0002 1.50497 15.0002C1.31479 15.0002 1.12648 14.9627 0.950783 14.8899C0.775085 14.8171 0.615441 14.7105 0.480968 14.576C0.346494 14.4415 0.239824 14.2819 0.167048 14.1062C0.0942709 13.9305 0.0568132 13.7422 0.0568132 13.552C0.0568132 13.3618 0.0942709 13.1735 0.167048 12.9978C0.239824 12.8221 0.346494 12.6625 0.480968 12.528L5.46497 7.517L0.426968 2.479C0.292356 2.3446 0.185565 2.18498 0.112701 2.00928C0.0398383 1.83357 0.00233364 1.64522 0.00233364 1.455C0.00233364 1.26478 0.0398383 1.07643 0.112701 0.900722C0.185565 0.725014 0.292356 0.565395 0.426968 0.430999C0.559459 0.293414 0.718576 0.184246 0.894625 0.110147C1.07067 0.0360485 1.25997 -0.00142882 1.45097 -1.2166e-06C1.64216 -0.00382862 1.83203 0.0325609 2.00826 0.106809C2.18449 0.181057 2.34315 0.291506 2.47397 0.430999L8.32097 6.278C8.53165 6.40776 8.7047 6.5904 8.82294 6.80775C8.94118 7.02511 9.00049 7.26962 8.99497 7.517C9.00392 7.71068 8.97254 7.90411 8.90282 8.08502C8.83311 8.26594 8.72657 8.43041 8.58997 8.568Z" fill="currentColor"/>
              </svg>                
            </a>
            <div class="cs-page_count">of {{$products->lastPage()}}</div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  <div class="cs-height_80 cs-height_lg_60"></div>

@endsection

@push('scripts')
<script>
  function clear_filter(e){
    $(e).attr('checked',false);
    filter();
  }
  function filter(){
    /* Manufacturer */
    var manu=new Array();
    $('.manu').each(function(t){
      if($(this).is(":checked")){
        manu.push($(this).val());
      }
    });
    if(manu.length > 0){
      $('.manu-clear').show();
    }

    /* subcats */
    var subcat=new Array();
    $('.subcat').each(function(t){
      if($(this).is(":checked")){
        subcat.push($(this).val());
      }
    });
    if(subcat.length > 0){
      $('.subcat-clear').show();
    }

    /* model */
    var model=new Array();
    $('.model').each(function(t){
      if($(this).is(":checked")){
        model.push($(this).val());
      }
    });
    if(model.length > 0){
      $('.model-clear').show();
    }

    window.location.href="{{route('front.subcategoryview',$subcat->id)}}?manu="+manu+"&subcat="+subcat+"&model="+model;
  }
</script>
 
@endpush