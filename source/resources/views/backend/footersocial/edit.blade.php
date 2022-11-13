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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adminto</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            

            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Horizontal form</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.homefootsocial.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input type="text" name="facebook" value="{{$data->facebook}}" class="form-control @if($errors->has('facebook')) parsley-error @endif" id="title" placeholder="facebook">
                                
                                @if ($errors->has('facebook'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('facebook') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label">Twitter</label>
                            <div class="col-sm-9">
                                <input type="text" name="twitter" value="{{$data->twitter}}" class="form-control @if($errors->has('twitter')) parsley-error @endif" id="details" placeholder="twitter">
                                
                                @if ($errors->has('twitter'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('twitter') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="c_notice" class="col-sm-3 col-form-label">whatsapp</label>
                            <div class="col-sm-9">
                                <input type="text" name="whatsapp" value="{{$data->whatsapp}}" class="form-control @if($errors->has('whatsapp')) parsley-error @endif" id="c_notice" placeholder="whatsapp">
                                
                                @if ($errors->has('whatsapp'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('whatsapp') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="c_notice" class="col-sm-3 col-form-label">Linkdin</label>
                            <div class="col-sm-9">
                                <input type="text" name="linkedin" value="{{$data->linkedin}}" class="form-control @if($errors->has('linkedin')) parsley-error @endif" id="c_notice" placeholder="linkedin ">
                                
                                @if ($errors->has('linkedin'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('linkedin') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        
                      
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-md-1 mr-3">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
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
 <!-- dropify -->
 <link href="{{asset('asset/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('script')


 <!-- dropify js -->
 <script src="{{asset('asset/libs/dropify/dropify.min.js')}}"></script>

 <!-- form-upload init -->
 <script src="{{asset('asset/js/pages/form-fileupload.init.js')}}"></script>

@endpush

