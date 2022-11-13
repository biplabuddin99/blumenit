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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3">Wizard With Progress Bar</h4>

                        <form action="{{route(Session::get('identity').'.homesec4.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="progressbarwizard">

                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-1">
                                    <li class="nav-item">
                                        <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-account-circle mr-1"></i>
                                            <span class="d-none d-sm-inline">Section Content</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline">Brand Image</span>
                                        </a>
                                    </li>
                                   
                                   
                                    <li class="nav-item">
                                        <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline">Save</span>
                                        </a>
                                    </li>
                                </ul>
                            
                                <div class="tab-content border-0 mb-0">
                            
                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                    </div>
                            
                                    <div class="tab-pane" id="account-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="title1">Title</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="title1" name="title" value="Title">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="head1">Heading 1</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="head1" name="head1" value="Heading 1">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="head2">Heading 2</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="head2" name="head2" value="Heading 2">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="details1">Details</label>
                                                    <div class="col-md-9">
                                                        <textarea type="text" id="details1" name="details1" class="form-control" rows="5">Details </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="fimage">Feature Image</label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" data-height="150" name="fimage"/>
                                                    </div>
                                                </div>
                                                
                                            </div> <!-- end col -->
                                           
                                        </div> <!-- end row -->
                                    </div>

                                    <div class="tab-pane" id="profile-tab-2">
                                        <div class="row">
                                            <div class="col-4">
                                               
                                                <div class="form-group row mb-3">
                                                    
                                                    <div class="col-md-12">
                                                        <input type="file" class="dropify" data-height="150" name="image[]"/>
                                                    </div>
                                                </div>
                                                
                                            </div> <!-- end col -->
                                            <div class="col-4">
                                               
                                                <div class="form-group row mb-3">
                                                    
                                                    <div class="col-md-12">
                                                        <input type="file" class="dropify" data-height="150" name="image[]"/>
                                                    </div>
                                                </div>
                                                
                                            </div> <!-- end col --><div class="col-4">
                                               
                                                <div class="form-group row mb-3">
                                                    
                                                    <div class="col-md-12">
                                                        <input type="file" class="dropify" data-height="150" name="image[]"/>
                                                    </div>
                                                </div>
                                                
                                            </div> <!-- end col --><div class="col-4">
                                               
                                                <div class="form-group row mb-3">
                                                    <div class="col-md-12">
                                                        <input type="file" class="dropify" data-height="150" name="image[]"/>
                                                    </div>
                                                </div>
                                                
                                            </div> <!-- end col --><div class="col-4">
                                               
                                                <div class="form-group row mb-3">
                                                    
                                                    <div class="col-md-12">
                                                        <input type="file" class="dropify" data-height="150" name="image[]"/>
                                                    </div>
                                                </div>
                                                
                                            </div> <!-- end col --><div class="col-4">
                                               
                                                <div class="form-group row mb-3">
                                                 
                                                    <div class="col-md-12">
                                                        <input type="file" class="dropify" data-height="150" name="image[]"/>
                                                    </div>
                                                </div>
                                                
                                            </div> <!-- end col -->
                                            
                                        </div> <!-- end row -->
                                    </div>
                                  
                                 
                                   
                                    
                                    <div class="tab-pane" id="finish-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-0 row">
                                                    <div class="col-md-6 mr-3 mb-3 offset-md-6">
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <ul class="list-inline mb-0 wizard">
                                        <li class="previous list-inline-item">
                                            <a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                        </li>
                                        <li class="next list-inline-item float-right">
                                            <a href="javascript: void(0);" class="btn btn-secondary">Next</a>
                                        </li>
                                    </ul>

                                </div> <!-- tab-content -->
                            </div> <!-- end #progressbarwizard-->
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
      $('.summernote').summernote();
    });
</script>
@endpush
