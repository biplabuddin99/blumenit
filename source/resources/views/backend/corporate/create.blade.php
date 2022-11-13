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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.corporate_setting.index')}}">Corporate Settings</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Corporate Settings</h4>
                </div>
            </div>
        </div>  
        <!-- end page title --> 

        <div class="row">
            

            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Add New Corporate Settings</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.corporate_setting.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{--<div class="form-group row">
                            <label for="cat" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control @if($errors->has('category_id')) parsley-error @endif" id="category_id">
                                    <option value="">Select Category</option>
                                    @if($category)
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('category_id'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('category_id') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>--}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Title (Blue)</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Title (Green)</label>
                            <div class="col-sm-9">
                                <input type="text" name="title_green" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Details</label>
                            <div class="col-sm-9">
                                <textarea name="right_text" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Showing Order In Corporate Page</label>
                            <div class="col-sm-9">
                                <input type="text" name="order_no" class="form-control" placeholder="000">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="userName1">Status </label>
                            <div class="col-md-9">
                                <div class="radio radio-info radio-info form-check-inline">
                                    <input type="radio" id="status" value="1" name="status">
                                    <label for="status">Active</label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="status1" value="0" name="status" style="margin-top:-10px">
                                    <label for="status1">Inactive</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="side_image" class="col-sm-3 col-form-label">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="dropify" data-height="200" name="side_image"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <h4 class="header-title mt-0 mb-3">Upload Bottom Image size(119 x 39)</h4>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
                            </div><!-- end col -->
                            <div class="col-sm-3">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
                            </div><!-- end col -->
                            <div class="col-sm-3">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
                            </div><!-- end col -->
                            <div class="col-sm-3">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
                            </div><!-- end col -->
                            <div class="col-sm-3 mt-2">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
                            </div><!-- end col -->
                            <div class="col-sm-3 mt-2">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
                            </div><!-- end col -->
                            <div class="col-sm-3 mt-2">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
                            </div><!-- end col -->
                            <div class="col-sm-3 mt-2">
                                <input type="file" class="dropify" data-height="200" name="image[]"/>
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
        </div><!-- end row -->
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
