@extends('layout.backend.back')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
         <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{Session::get('identity')}}</a></li>
                            <li class="breadcrumb-item active">Category Page Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Category Page Setting</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3">Category Page Setting Details form</h4>

                        <form action="{{route(Session::get('identity').'.categorysetting.update',$cat->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Most Popular side Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="mp_add" data-default-file='{{asset($cat->mp_add)}}'/>
                                    <input type="text" value="{{$cat->mp_add_link}}" name="mp_add_link" class="form-control" Placeholder="Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Featured Products side Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="fp_add" data-default-file='{{asset($cat->fp_add)}}'/>
                                    <input type="text" value="{{$cat->fp_add_link}}" name="fp_add_link" class="form-control" Placeholder="Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Large Banner (middle) Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="large_add" data-default-file='{{asset($cat->large_add)}}'/>
                                    <input type="text" value="{{$cat->large_add_link}}" name="large_add_link" class="form-control" Placeholder="Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Small Banner 1 (middle) Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="small_add1" data-default-file='{{asset($cat->small_add1)}}'/>
                                    <input type="text" value="{{$cat->small_add1_link}}" name="small_add1_link" class="form-control" Placeholder="Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Small Banner 2 (middle) Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="small_add2" data-default-file='{{asset($cat->small_add2)}}'/>
                                    <input type="text" value="{{$cat->small_add2_link}}" name="small_add2_link" class="form-control" Placeholder="Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Small Banner 3 (middle) Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="small_add3" data-default-file='{{asset($cat->small_add3)}}'/>
                                    <input type="text" value="{{$cat->small_add3_link}}" name="small_add3_link" class="form-control" Placeholder="Link">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">BEST SELLER Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="bs_add" data-default-file='{{asset($cat->bs_add)}}'/>
                                    <input type="text" value="{{$cat->bs_add_link}}" name="bs_add_link" class="form-control" Placeholder="Link">
                                </div>
                            </div>
                            
                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-md-1 mr-3">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                </div>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
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
<!-- dropify -->
<link href="{{asset('asset/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Plugins css -->
<link href="{{asset('asset/libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('asset/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('asset/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
<style> 
   .vertical { 
       border-left: 2px dotted black; 
   } 
</style>
@endpush
@push('script')

 <!-- dropify js -->
 <script src="{{asset('asset/libs/dropify/dropify.min.js')}}"></script>

 <!-- form-upload init -->
 <script src="{{asset('asset/js/pages/form-fileupload.init.js')}}"></script>
 
  <!-- Plugins js-->
  <script src="{{asset('asset/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>

  <!-- Init js-->
  <script src="{{asset('asset/js/pages/form-wizard.init.js')}}"></script>
   <!-- Plugins js -->
   <script src="{{asset('asset/libs/katex/katex.min.js')}}"></script>
   <script src="{{asset('asset/libs/quill/quill.min.js')}}"></script>

@endpush

