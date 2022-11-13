 
 @extends('layout.frontend.front')

 @section('title', 'Home')
 
 @section('content')
  
  @php
    $headsupport = App\Models\Homeheadersupportview::all();
    $view1 = App\Models\Homesection1view::all();
    $view2 = App\Models\Homesection2view::all();
    $view3 = App\Models\Homesection3view::all();
    $view4 = App\Models\Homesection4view::all();
  @endphp
  <div class="cs-slider cs-style1">
    <div class="cs-slider_container" data-autoplay="1" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="1">
      <div class="cs-slider_wrapper">
        @if ($slide)
            @foreach ($slide as $item)
            <div class="cs-slide">
              <div class="cs-hero">
                <div class="cs-hero_img cs-bg" style="background-image: url({{asset($item->image)}})"></div>
                <div class="container wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                  <div class="cs-hero_text">
                    <h1 class="cs-hero_title">{{$item->title}}</h1>
                    <p class="cs-hero_subtitle">{{$item->details}}</p>
                    <div class="cs-hero_btn">
                      <a href="{{$item->link}}" class="cs-btn cs-style1"><span>Shop Now</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        @endif
      </div>
    </div>
    <div class="cs-pagination cs-style1"></div>
  </div>
  <div class="cs-height_20 cs-height_lg_20"></div>
  <div class="container">
    <ul class="cs-info_list cs-type1">
      <li>
        <div class="cs-info cs-type1 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="cs-info_icon">
            <img src="{{asset($headsupport[0]->image_1st)}}" alt="" width="49" height="49">
            
          </div>
          <div class="cs-info_right">
            <h3 class="cs-info_title">{{$headsupport[0]->header_1st}}</h3>
            <div class="cs-info_subtitle">{{$headsupport[0]->details_1st}} </div>
          </div>
        </div><!-- .cs-info -->
      </li>
      <li>
        <div class="cs-info cs-type1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="cs-info_icon">
            <img src="{{asset($headsupport[0]->image_2nd)}}" alt="" width="49" height="49">
          </div>
          <div class="cs-info_right">
            <h3 class="cs-info_title">{{$headsupport[0]->header_2nd}}</h3>
            <div class="cs-info_subtitle">{{$headsupport[0]->details_2nd}}</div>
          </div>
        </div><!-- .cs-info -->
      </li>
      <li>
        <div class="cs-info cs-type1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="cs-info_icon">
            <img src="{{asset($headsupport[0]->image_3rd)}}" alt="" width="49" height="49">
          </div>
          <div class="cs-info_right">
            <h3 class="cs-info_title">{{$headsupport[0]->header_3rd}}</h3>
            <div class="cs-info_subtitle">{{$headsupport[0]->details_3rd}}</div>
          </div>
        </div><!-- .cs-info -->
      </li>
      <li>
        <div class="cs-info cs-type1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="cs-info_icon">
            <img src="{{asset($headsupport[0]->image_4th)}}" alt="" width="49" height="49">
          </div>
          <div class="cs-info_right">
            <h3 class="cs-info_title">{{$headsupport[0]->header_4th}}</h3>
            <div class="cs-info_subtitle">{{$headsupport[0]->details_4th}}</div>
          </div>
        </div><!-- .cs-info -->
      </li>
      <li>
        <div class="cs-info cs-type1 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="cs-info_icon">
            <img src="{{asset($headsupport[0]->image_5th)}}" alt="" width="49" height="49">
          </div>
          <div class="cs-info_right">
            <h3 class="cs-info_title">{{$headsupport[0]->header_5th}}</h3>
            <div class="cs-info_subtitle">{{$headsupport[0]->details_5th}}</div>
          </div>
        </div><!-- .cs-info -->
      </li>
    </ul>
  </div>
  <div class="cs-height_60 cs-height_lg_60"></div>
  <div class="container">
    <div class="row">
      @if($category)
        @foreach($category as $cat)
          <div class="col-lg-4 col-sm-6">
            <a href="{{route('front.categoryview',$cat->id)}}" class="cs-category cs-style1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
              <img src="{{asset($cat->feature_image)}}" alt="" class="cs-category_img">
              <h2 class="category_title">{{$cat->name}}</h2>
            </a>
          </div>
        @endforeach
      @endif
    </div>
  </div>
  <div class="cs-height_30 cs-height_lg_30"></div>
  <div class="cs-height_100 cs-height_lg_60"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="cs-left_full_width cs-space_85">
          <div class="cs-image_box cs-style1 cs-bg  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s" style="background-image: url({{asset($view1[0]->feature_image)}})"></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="cs-vertical_middle">
          <div class="cs-vertical_middle_in">
            <div class="cs-text_box cs-style1">
              <h3 class="cs-text_box_subtitle">{{$view1[0]->title}}</h3>
              <h2 class="cs-text_box_titel">{{$view1[0]->heading1}}</br>
                <span class="cs-accent_color">{{$view1[0]->heading2}}</span></h2>
              <div class="cs-text_box_text"> {!! html_entity_decode($view1[0]->details) !!}</div>
              <div class="cs-text_box_brand">
                <h4 class="cs-text_box_brand_title">Brand</h4>
                <div class="cs-text_box_brands">
                  @if ($view1[0]->homesection1image)
                  @foreach ($view1[0]->homesection1image as $item)
                  <img src="{{asset($item->image)}}" alt="">
                  @endforeach
                      
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="cs-with_shape cs-style1 cs-parallax">
    <div class="cs-shape cs-position1 cs-to_up">
      <img src="{{asset('assets/img/shapes/shape1.svg')}}" alt="">
    </div>
    <div class="cs-shape cs-position2 cs-to_rotate">
      <img src="{{asset('assets/img/shapes/shape2.svg')}}" alt="">
    </div>
    <div class="cs-height_100 cs-height_lg_60"></div>
    <div class="container">
      <div class="row cs-mobile_column_reverse">
        <div class="col-lg-6">
          <div class="cs-vertical_middle">
            <div class="cs-vertical_middle_in">
              <div class="cs-text_box cs-style1">
                <h3 class="cs-text_box_subtitle">{{$view2[0]->title}}</h3>
                <h2 class="cs-text_box_titel">{{$view2[0]->heading1}}</br>
                  <span class="cs-accent_color">{{$view2[0]->heading2}}</span></h2>
                <div class="cs-text_box_text"> {!! html_entity_decode($view2[0]->details) !!}</div>
                <div class="cs-text_box_brand">
                  <h4 class="cs-text_box_brand_title">Brand</h4>
                  <div class="cs-text_box_brands">
                    @if ($view2[0]->homesection2image)
                    @foreach ($view2[0]->homesection2image as $item)
                    <img src="{{asset($item->image)}}" alt="">
                    @endforeach
                        
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="cs-right_full_width cs-space_85">
            <div class="cs-image_box_2_wrap  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
              <div class="cs-image_box cs-style2">
                <div class="cs-image_box_shape">
                  <div class="cs-image_box_in cs-bg" style="background-image:url({{asset($view2[0]->feature_image)}})"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_100 cs-height_lg_60"></div>
  <div class="cs-with_shape cs-style1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="cs-left_full_width cs-space_85">
            <div class="cs-image_box_3_wrap wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
              <div class="cs-image_box cs-style3">
                <div class="cs-image_box_shape">
                  <div class="cs-image_box_in cs-bg" style="background-image:url({{asset($view3[0]->feature_image)}})"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="cs-vertical_middle">
            <div class="cs-vertical_middle_in">
              <div class="cs-text_box cs-style1">
                <h3 class="cs-text_box_subtitle">{{$view3[0]->title}}</h3>
                <h2 class="cs-text_box_titel">{{$view3[0]->heading1}}</br>
                  <span class="cs-accent_color">{{$view3[0]->heading2}}</span></h2>
                <div class="cs-text_box_text">{!! html_entity_decode($view3[0]->details) !!}</div>
                <div class="cs-text_box_brand">
                  <h4 class="cs-text_box_brand_title">Brand</h4>
                  <div class="cs-text_box_brands">
                    @if ($view3[0]->homesection3image)
                    @foreach ($view3[0]->homesection3image as $item)
                    <img src="{{asset($item->image)}}" alt="">
                    @endforeach
                        
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_100 cs-height_lg_60"></div>
  <div class="cs-with_shape cs-style2 cs-parallax">
    <div class="cs-shape cs-position1 cs-to_up">
      <img src="{{asset('assets/img/shapes/shape1.svg')}}" alt="">
    </div>
    <div class="cs-shape cs-position2 cs-to_left">
      <img src="{{asset('assets/img/shapes/shape3.svg')}}" alt="">
    </div>
    <div class="container">
      <div class="row cs-mobile_column_reverse">
        <div class="col-lg-6">
          <div class="cs-vertical_middle">
            <div class="cs-vertical_middle_in">
              <div class="cs-text_box cs-style1">
                <h3 class="cs-text_box_subtitle">{{$view4[0]->title}}</h3>
                <h2 class="cs-text_box_titel">{{$view4[0]->heading1}} </br>
                  <span class="cs-accent_color">{{$view4[0]->heading2}}</span></h2>
                <div class="cs-text_box_text">{!! html_entity_decode($view4[0]->details) !!}</div>
                <div class="cs-text_box_brand">
                  <h4 class="cs-text_box_brand_title">Brand</h4>
                  <div class="cs-text_box_brands">
                    @if ($view4[0]->homesection4image)
                    @foreach ($view4[0]->homesection4image as $item)
                    <img src="{{asset($item->image)}}" alt="">
                    @endforeach
                        
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="cs-right_full_width cs-space_85">
            <div class="cs-image_box cs-style1 cs-bg  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s" style="background-image:url({{asset($view4[0]->feature_image)}})"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_100 cs-height_lg_60"></div>
  <div class="cs-primary_bg">
    <div class="cs-height_70 cs-height_lg_50"></div>
    <div class="container wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s">
      <div class="cs-slider cs-style2 cs-gap-50">
        <div class="cs-slider_container" data-autoplay="1" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="4" data-md-slides="5" data-lg-slides="6" data-add-slides="6">
          <div class="cs-slider_wrapper">
            @if($manufacturer)
              @foreach($manufacturer as $man)
                <div class="cs-slide">
                  <div class="cs-logo_carousel">
                    <img src="{{asset($man->image)}}" alt="">
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
        <div class="cs-slider_arrows cs-style1">
          <div class="cs-left_arrow">
            <img src="{{asset('assets/img/icons/left_arrow_white.svg')}}">
          </div>
          <div class="cs-right_arrow">
            <img src="{{asset('assets/img/icons/right_arrow_white.svg')}}">
          </div>
        </div>
      </div>
    </div>
    <div class="cs-height_70 cs-height_lg_50"></div>
  </div>
 @endsection