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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.manufacturer.index')}}">Manufacturer</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manufacturer</h4>
                </div>
            </div>
        </div>  
        <!-- end page title --> 

        <div class="row">
            

            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Update Manufacturer</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.manufacturer.update',$manufacturer->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$manufacturer->id}}" name="id">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$manufacturer->name}}" name="name" class="form-control @if($errors->has('name')) parsley-error @endif" id="name" placeholder="Name">
                                
                                @if ($errors->has('name'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('name') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" value="{{$manufacturer->email}}" class="form-control @if($errors->has('email')) parsley-error @endif" id="email" placeholder="Email">
                                
                                @if ($errors->has('email'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('email') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact" value="{{$manufacturer->contact}}" class="form-control @if($errors->has('contact')) parsley-error @endif" id="contact" placeholder="Contact">
                                
                                @if ($errors->has('contact'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('contact') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3  col-form-label" for="example-textarea">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @if($errors->has('address')) parsley-error @endif" name="address" rows="5" id="example-textarea">{{$manufacturer->address}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                           
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-3">
                                <h4 class="header-title mt-0 mb-3">Upload Image</h4>
                            </div>
                            <div class="col-md-9">
                                    <input type="file" class="dropify" data-height="300" name="image" data-default-file='{{asset($manufacturer->image)}}'/>
                            </div><!-- end col -->
                            
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

