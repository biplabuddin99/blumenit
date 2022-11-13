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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Footer Column 1</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Footer Column 1</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            

            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Horizontal form</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.homefootcol1.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3">
                                <h4 class="header-title mt-0 mb-3">Upload footer Logo</h4>
                            </div>
                            <div class="col-md-9">
                                    <input type="file" class="dropify" data-height="300" name="image" data-default-file='{{asset($data->logo)}}'/>
                            </div><!-- end col -->
                            
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$data->title}}" name="title" class="form-control @if($errors->has('name')) parsley-error @endif" id="title" placeholder="Head">
                                
                                @if ($errors->has('title'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('title') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label">Details</label>
                            <div class="col-sm-9">
                                <input type="text" name="details" value="{{$data->text}}" class="form-control @if($errors->has('details')) parsley-error @endif" id="details" placeholder="Details">
                                
                                @if ($errors->has('details'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('details') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="c_notice" class="col-sm-3 col-form-label">Copyright Notice</label>
                            <div class="col-sm-9">
                                <input type="text" name="c_notice" value="{{$data->copyright_notice}}" class="form-control @if($errors->has('c_notice')) parsley-error @endif" id="c_notice" placeholder="Copyright Notice">
                                
                                @if ($errors->has('c_notice'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('c_notice') }}</li>
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
@endpush
@push('script')


 <!-- dropify js -->
 <script src="{{asset('asset/libs/dropify/dropify.min.js')}}"></script>

 <!-- form-upload init -->
 <script src="{{asset('asset/js/pages/form-fileupload.init.js')}}"></script>

@endpush

