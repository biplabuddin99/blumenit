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
                            <li class="breadcrumb-item active">General Setting</li>
                        </ol>
                    </div>
                    <h4 class="page-title">General Setting</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3">General Setting Details form</h4>

                        <form action="{{route(Session::get('identity').'.gs.update',$gs->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$gs->company_name}}" name="company_name" class="form-control" id="company_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shipping_charge" class="col-sm-3 col-form-label">Shipping Charge</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$gs->shipping_charge}}" name="shipping_charge" class="form-control" id="shipping_charge">
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

