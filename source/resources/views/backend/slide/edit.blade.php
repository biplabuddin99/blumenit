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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.slide.index')}}">Slider</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Slider</h4>
                </div>
            </div>
        </div>    
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Slider Update</h4>
                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.slide.update',$slide->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{$slide->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Slide For</label>
                            <div class="col-sm-9">
                                <select name="type" class="form-control" id="type">
                                    <option value="1" @if($slide->type==1) selected @endif>Home Page 1920 x 649</option>
                                    <option value="2" @if($slide->type==2) selected @endif>Category Page 192 x 420</option>
                                    <option value="3" @if($slide->type==3) selected @endif>Games Page 192 x 420</option>
                                    <option value="4" @if($slide->type==4) selected @endif>Product Page 1920 x 649</option>
                                    <option value="5" @if($slide->type==5) selected @endif>Corporate Business Page 1300 x 520</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{$slide->name}}" class="form-control @if($errors->has('name')) parsley-error @endif" id="name" placeholder="Name">
                                
                                @if ($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('name') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$slide->title}}" name="title" class="form-control @if($errors->has('title')) parsley-error @endif" id="title" placeholder="title">
                                
                                @if ($errors->has('title'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('title') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link" class="col-sm-3 col-form-label">Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="link" value="{{$slide->link}}" class="form-control @if($errors->has('link')) parsley-error @endif" id="link" placeholder="link">
                                
                                @if ($errors->has('link'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('link') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rank" class="col-sm-3 col-form-label">Rank</label>
                            <div class="col-sm-9">
                                <input type="number" name="rank" value="{{$slide->order}}" class="form-control @if($errors->has('rank')) parsley-error @endif" id="rank" placeholder="rank">
                                
                                @if ($errors->has('rank'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('rank') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3  col-form-label" for="example-textarea">Details</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @if($errors->has('details')) parsley-error @endif" name="details" rows="5" id="example-textarea">{{$slide->details}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                           
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-3">
                                <h4 class="header-title mt-0 mb-3">Upload Image</h4>
                            </div>
                            <div class="col-md-9">
                                    <input type="file" class="dropify" data-height="300" name="image" data-default-file='{{asset($slide->image)}}'/>
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

