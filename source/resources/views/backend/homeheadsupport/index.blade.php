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
                            <li class="breadcrumb-item active">Home Header Support</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Home Header Support</h4>
                </div>
            </div>
        </div>       
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title mb-3">Home Header Support</h4>
                    @if(Session::has('response'))
                      <div class="alert alert-{{Session::get('response')['class']}}">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{Session::get('response')['message']}}
                      </div>
				            @endif
                    <div>
                        <div class="mb-0">
                            
                            <div class="d-flex row">
                                @if($data)
                              
                                    @foreach($data as $cat)
                                    <div class="col-1">
                                      {{ $loop->iteration }}
                                    </div>
                                    <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                          <div class="cs-info_icon">
                                            <img src="{{asset($cat->image_1st)}}" alt="" width="49" height="49">
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_1st}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_1st}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                      <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                          <div class="cs-info_icon">
                                            <img src="{{asset($cat->image_2nd)}}" alt="" width="49" height="49">
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_2nd}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_2nd}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                      <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                          <div class="cs-info_icon">
                                            <img src="{{asset($cat->image_3rd)}}" alt="" width="49" height="49">
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_3rd}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_3rd}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                      <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                          <div class="cs-info_icon">
                                            <img src="{{asset($cat->image_4th)}}" alt="" width="49" height="49">
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_4th}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_4th}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                      <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                          <div class="cs-info_icon">
                                            <img src="{{asset($cat->image_5th)}}" alt="" width="49" height="49">
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_5th}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_5th}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>
                                    <div class="col-1">
                                      <a href="{{route(Session::get('identity').'.headersupport.edit',$cat->id)}}" class="btn btn-primary btn-sm btn-rounded width-xs waves-effect">Edit</a>
                                    </div>
                                    @endforeach
                                @endif
                           
                           
                                    </div>
                                </div>
                        
                    
                </div>
        
            </div>
        </div>
        <!-- end row -->
        

        
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


@endsection
        
@push('style')

 <!-- custom css -->
 <style>
 .cs-info {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.cs-info .cs-info_icon {
  -webkit-box-flex: 0;
      -ms-flex: none;
          flex: none;
  margin-right: 20px;
}

.cs-info .cs-info_title {
  font-size: 17px;
  font-weight: 600;
  text-transform: uppercase;
  line-height: 25px;
  margin: 0;
}

.cs-info .cs-info_subtitle {
  font-size: 16px;
  line-height: 24px;
  color: #6e6e6e;
  margin-top: 1px;
}

.cs-info.cs-color1 .cs-info_title {
  color: #4d4c4c;
}

.cs-info.cs-color2 .cs-info_title {
  color: #095bff;
}

.cs-info.cs-color3 .cs-info_title {
  color: #fc0000;
}

.cs-info.cs-color4 .cs-info_title {
  color: #1cab8f;
}

.cs-info.cs-type1 .cs-info_title {
  color: #4d4c4c;
}

.cs-info.cs-type1 .cs-info_subtitle {
  font-size: 13px;
  margin-top: 4px;
}
</style>


 
@endpush
@push('script')


 <!-- dropify js -->


 <!-- form-upload init -->
 

@endpush


