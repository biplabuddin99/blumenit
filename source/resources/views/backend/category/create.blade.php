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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.categoryy.index')}}">Category</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Category</h4>
                </div>
            </div>
        </div>  
        <!-- end page title --> 

        <div class="row">
            

            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Add New Category</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.categoryy.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @if($errors->has('name')) parsley-error @endif" id="inputEmail3" placeholder="Category Name">
                                @if ($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('name') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="userName1">For Games? </label>
                            <div class="col-md-9">
                                <div class="radio radio-info radio-info form-check-inline">
                                    <input type="radio" id="is_game" value="1" name="is_game">
                                    <label for="is_game">YES</label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="is_game1" value="0" name="is_game" checked>
                                    <label for="is_game1">NO</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="userName1">Featured? </label>
                            <div class="col-md-9">
                                <div class="radio radio-info radio-info form-check-inline">
                                    <input type="radio" id="feature_cat" value="1" name="feature_cat">
                                    <label for="feature_cat">YES</label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="feature_cat1" value="0" name="feature_cat" checked>
                                    <label for="feature_cat1">NO</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="userName1">Show Category Page? </label>
                            <div class="col-md-9">
                                <div class="radio radio-info radio-info form-check-inline">
                                    <input type="radio" id="show_catpage" value="1" name="show_catpage">
                                    <label for="show_catpage">YES</label>
                                </div>
                                <div class="radio radio-info form-check-inline">
                                    <input type="radio" id="show_catpage1" value="0" name="show_catpage">
                                    <label for="show_catpage1">NO</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Showing Order In Category Page</label>
                            <div class="col-sm-9">
                                <input type="text" name="cat_page_order" class="form-control" placeholder="000">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Icon</label>
                            <div class="col-sm-9">
                                <input type="file" class="dropify" data-height="100" name="cat_icon"/>
                                <span>SVG Format only</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="dropify" data-height="200" name="feature_image"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="dropify" data-height="200" name="cat_image"/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Left Side Banner</label>
                            <div class="col-sm-9">
                                <input type="file" class="dropify" data-height="200" name="lsb_image"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <h4 class="header-title mt-0 mb-3">Upload Category Slider Image</h4>
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
