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
                            <li class="breadcrumb-item active">About Us Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">About Us Setting</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3">About Us Setting Details form</h4>

                        <form action="{{route(Session::get('identity').'.aboutsetting.update',$about->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Page Header Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="page_image" data-default-file='{{asset($about->page_image)}}'/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">First Section Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify" data-height="100" name="fsecimage" data-default-file='{{asset($about->fsecimage)}}'/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fsectitle1" class="col-sm-3 col-form-label">First Section Title 1</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$about->fsectitle1}}" name="fsectitle1" class="form-control" id="fsectitle1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fsectitle2" class="col-sm-3 col-form-label">First Section Title 2</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$about->fsectitle2}}" name="fsectitle2" class="form-control" id="fsectitle2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fsectitle3" class="col-sm-3 col-form-label">First Section Title 3</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$about->fsectitle3}}" name="fsectitle3" class="form-control" id="fsectitle3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fsectitle4" class="col-sm-3 col-form-label">First Section Title 4</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$about->fsectitle4}}" name="fsectitle4" class="form-control" id="fsectitle4">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fsectitle5" class="col-sm-3 col-form-label">First Section Title 5</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$about->fsectitle5}}" name="fsectitle5" class="form-control" id="fsectitle5">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fsecdetails" class="col-sm-3 col-form-label">First Section Details</label>
                                <div class="col-sm-9">
                                    <textarea name="fsecdetails" class="form-control summernote" id="fsecdetails">{{$about->fsecdetails}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Vision Image / Details</label>
                                <div class="col-sm-3">
                                    <input type="file" class="dropify" data-height="100" name="visionimage" data-default-file='{{asset($about->visionimage)}}'/>
                                </div>
                                <div class="col-sm-6">
                                    <textarea name="visiondetails" rows="4" class="form-control" id="visiondetails">{{$about->visiondetails}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mission Image / Details </label>
                                <div class="col-sm-3">
                                    <input type="file" class="dropify" data-height="100" name="missionimage" data-default-file='{{asset($about->missionimage)}}'/>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="4" name="missiondetails" class="form-control" id="missiondetails">{{$about->missiondetails}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Goals Image / Details</label>
                                <div class="col-sm-3">
                                    <input type="file" class="dropify" data-height="100" name="goalsimage" data-default-file='{{asset($about->goalsimage)}}'/>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="4" name="goalsdetails" class="form-control" id="goalsdetails">{{$about->goalsdetails}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="promisetext" class="col-sm-3 col-form-label">Our Promise To You Text</label>
                                <div class="col-sm-9">
                                    <textarea rows="4" name="promisetext" class="form-control" id="promisetext">{{$about->promisetext}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer Relationship Image / Details</label>
                                <div class="col-sm-3">
                                    <input type="file" class="dropify" data-height="100" name="relationimage" data-default-file='{{asset($about->relationimage)}}'/>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="4" name="relationdetails" class="form-control" id="relationdetails">{{$about->relationdetails}}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Our Target Market Image / Details</label>
                                <div class="col-sm-3">
                                    <input type="file" class="dropify" data-height="100" name="targetimage" data-default-file='{{asset($about->targetimage)}}'/>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="4" name="targetdetails" class="form-control" id="targetdetails">{{$about->targetdetails}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Retail & Wholesale Trade Image / Details</label>
                                <div class="col-sm-3">
                                    <input type="file" class="dropify" data-height="100" name="retailimage" data-default-file='{{asset($about->retailimage)}}'/>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="4" name="retaildetails" class="form-control" id="retaildetails">{{$about->retaildetails}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="visionlastdetails" class="col-sm-3 col-form-label">To Grow Better Business</label>
                                <div class="col-sm-9">
                                    <textarea rows="4" name="visionlastdetails" class="form-control" id="visionlastdetails">{{$about->visionlastdetails}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12"> To Grow Better Business Image / Title</div>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" class="dropify" data-height="100" name="visionimage1" data-default-file='{{asset($about->visionimage1)}}'/>
                                    <input type="text" class="form-control" name="visiondetails1" value="{{$about->visiondetails1}}">
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" class="dropify" data-height="100" name="visionimage2" data-default-file='{{asset($about->visionimage2)}}'/>
                                    <input type="text" class="form-control" name="visiondetails2" value="{{$about->visiondetails2}}">
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" class="dropify" data-height="100" name="visionimage3" data-default-file='{{asset($about->visionimage3)}}'/>
                                    <input type="text" class="form-control" name="visiondetails3" value="{{$about->visiondetails3}}">
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" class="dropify" data-height="100" name="visionimage4" data-default-file='{{asset($about->visionimage4)}}'/>
                                    <input type="text" class="form-control" name="visiondetails4" value="{{$about->visiondetails4}}">
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" class="dropify" data-height="100" name="visionimage5" data-default-file='{{asset($about->visionimage5)}}'/>
                                    <input type="text" class="form-control" name="visiondetails5" value="{{$about->visiondetails5}}">
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <input type="file" class="dropify" data-height="100" name="visionimage6" data-default-file='{{asset($about->visionimage6)}}'/>
                                    <input type="text" class="form-control" name="visiondetails6" value="{{$about->visiondetails6}}">
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
 <script>
    function remove_image(e,s){
        if($('#old_image').val()){
            $('#old_image').val($('#old_image').val()+"/"+e);
        }else{
            $('#old_image').val(e);
        }
        $(s).parents('.oldimgrm').remove();
    }
</script>

  <!-- Plugins js-->
  <script src="{{asset('asset/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>

  <!-- Init js-->
  <script src="{{asset('asset/js/pages/form-wizard.init.js')}}"></script>
   <!-- Plugins js -->
   <script src="{{asset('asset/libs/katex/katex.min.js')}}"></script>
   <script src="{{asset('asset/libs/quill/quill.min.js')}}"></script>

   <!-- init js -->
   <script src="{{asset('asset/js/pages/form-editor.init.js')}}"></script>   
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

   <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({height: 200});
    });
</script>
@endpush

