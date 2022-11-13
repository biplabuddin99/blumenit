@extends('layout.backend.back')

            
@section('content')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{Session::get('identity')}}</a></li>
                            <li class="breadcrumb-item active">HomeSection2</li>
                        </ol>
                    </div>
                    <h4 class="page-title">HomeSection2</h4>
                </div>
            </div>
        </div>      
        <!-- end page title --> 


        <div class="card-box">
          <div>
            <a href="{{route(Session::get('identity').'.homesec2.edit')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
          </div>
          <div class="cs-with_shape cs-style1 cs-parallax">
            
            <div class="cs-height_100 cs-height_lg_60"></div>
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <div class="cs-vertical_middle">
                    <div class="cs-vertical_middle_in">
                      <div class="cs-text_box cs-style1">
                        <h3 class="cs-text_box_subtitle">{{$data->title}}</h3>
                        <h2 class="cs-text_box_titel">{{$data->heading1}}</br>
                          <span class="cs-accent_color">{{$data->heading2}}</span></h2>
                        <div class="cs-text_box_text">{!!$data->details!!}</div>
                        <div class="cs-text_box_brand">
                          <h4 class="cs-text_box_brand_title">Brand</h4>
                          <div class="cs-text_box_brands">
                            @if ($data->homesection2image)
                            @foreach ($data->homesection2image as $item)
                                <img src="{{asset($item->image)}}" alt="">
                            @endforeach
                                
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="cs-right_full_width cs-space_85">
                    <div class="cs-image_box_2_wrap  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                      <div class="cs-image_box cs-style2">
                        <div class="cs-image_box_shape">
                          <div class="cs-image_box_in cs-bg" style="background-image: url('{{ asset($data->feature_image)}}');"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
        

        
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


@endsection
        
@push('style')

<link href="{{asset('asset/css/style.css')}}" rel="stylesheet" type="text/css" />

 
@endpush
@push('script')


 <!-- dropify js -->


 <!-- form-upload init -->
 

@endpush


