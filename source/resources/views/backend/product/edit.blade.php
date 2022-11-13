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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Update Product Step by Step</h4>
                        <form action="{{route(Session::get('identity').'.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            
                            <div id="progressbarwizard">
                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-1">
                                    <li class="nav-item">
                                        <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-account-circle mr-1"></i>
                                            <span class="d-none d-sm-inline">Product Information</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-tab-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline">Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#long_description" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline">Long Description</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#key_feature" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline">Key Features</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pricing_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline">Pricing Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#other_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline">Other Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#gallary_image" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline">Gallary Image</span>
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
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="userName1">Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password1">Sku</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="sku" name="sku" class="form-control" value="{{$product->sku}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password1">Model No</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="model_no" name="model_no" class="form-control" value="{{$product->model_no}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="confirm1">Order Note</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="product_title" class="form-control" value="{{$product->product_title}}">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="userName1">Manufacturer</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="manufacturer">
                                                            <option value="">--Select Manufacturer--</option>
                                                            @foreach ($manufacturer as $item)
                                                                <option value="{{$item->id}}" @if($product->manufacturer?$product->manufacturer:0==$item->id) selected @endif>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password1">Category</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="category" id="cat">
                                                            <option value="">--Select Category--</option>
                                                            @foreach ($category as $item)
                                                                <option value="{{$item->id}}" @if($product->category_id==$item->id) selected @endif>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="confirm1">Sub Category</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="subcategory" id="subcat">
                                                            <option value="">--Select Category--</option>
                                                            @foreach ($subcategory as $item)
                                                                <option value="{{$item->id}}" @if($product->subcategory_id==$item->id) selected @endif>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <div class="tab-pane" id="profile-tab-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="name1">Feature Image</label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="dropify" data-height="300" name="feature_image" data-default-file='{{asset($product->feature_image)}}'/>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="name1">Short Description</label>
                                                    <div class="col-md-9">
                                                        <textarea class="summernote" name="short_description" rows="13" id="example-textarea">{!!$product->short_description!!}</textarea>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="long_description">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label class="col-md-3 col-form-label" for="name1">Long Description</label>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <textarea class="summernote" name="long_description" rows="13">{!!$product->long_description!!}</textarea>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="key_feature">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label class="col-md-3 col-form-label" for="name1">Specification</label>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <textarea class="summernote" name="specification" rows="13">{!!$product->specifications!!}</textarea>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="pricing_info">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-4 col-form-label" for="userName1">Price</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" id="userName1" name="price" value="{{$product->price}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-4 col-form-label" for="password1">Discount</label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="password1" name="discount" class="form-control" value="{{$product->discount}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-4 col-form-label" for="confirm1">VAT Status</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="vat" class="form-control" value="{{$product->vat}}">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-4 col-form-label">Warranty</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="warranty" class="form-control" value="{{$product->warranty}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-4 col-form-label">Product Condition</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="product_condition" class="form-control" value="{{$product->product_condition}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-4 col-form-label">Max Qty</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="max_qty" value="{{$product->max_qty}}" placeholder="Max Qty To buy in single order" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <!--<div class="form-group row mb-3">
                                                    <label class="col-md-3" for="confirm1">Review</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="inlineRadio1" value="1" name="review" checked>
                                                            <label for="inlineRadio1">One </label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="inlineRadio2" value="2" name="review">
                                                            <label for="inlineRadio2">Two </label>
                                                        </div>
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="inlineRadio3" value="3" name="review">
                                                            <label for="inlineRadio1">Three </label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="inlineRadio4" value="4" name="review">
                                                            <label for="inlineRadio2">Four</label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="inlineRadio5" value="5" name="review">
                                                            <label for="inlineRadio1">Five </label>
                                                        </div>
                                                       
                                                    </div>
                                                </div>-->
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="other_info">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="userName1">New Product</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="new_product1" value="1" name="new_product" @if($product->new_product==1) checked @endif>
                                                            <label for="new_product1">YES</label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="new_product2" value="2" name="new_product" @if($product->new_product==2) checked @endif>
                                                            <label for="new_product2">NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="refurbished_product">Refurbished Product</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="refurbished_product1" value="1" name="refurbished_product" @if($product->refurbished_product==1) checked @endif>
                                                            <label for="refurbished_product1">YES</label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="refurbished_product2" value="2" name="refurbished_product" @if($product->refurbished_product==2) checked @endif>
                                                            <label for="refurbished_product2">NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password1">Feature Product</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="feature_product1" value="1" name="feature_product" @if($product->feature_product==1) checked @endif>
                                                            <label for="feature_product1">YES</label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="feature_product2" value="2" name="feature_product" @if($product->feature_product==2) checked @endif>
                                                            <label for="feature_product2">NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="confirm1">Limited Product</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="limited_product1" value="1" name="limited_product" @if($product->limited_product==1) checked @endif>
                                                            <label for="limited_product1">YES</label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="limited_product2" value="2" name="limited_product" @if($product->limited_product==2) checked @endif>
                                                            <label for="limited_product2">NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-6">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="userName1">Out Of Stock</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="out_of_stock1" value="1" name="out_of_stock" @if($product->outofstock_product==1) checked @endif>
                                                            <label for="out_of_stock1">YES</label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="out_of_stock2" value="2" name="out_of_stock" @if($product->outofstock_product==2) checked @endif>
                                                            <label for="out_of_stock2">NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="password1">Best Seller</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="best_seller1" value="1" name="best_seller" @if($product->best_seller==1) checked @endif>
                                                            <label for="best_seller1">YES</label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="best_seller2" value="2" name="best_seller" @if($product->best_seller==2) checked @endif>
                                                            <label for="best_seller2">NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3" for="confirm1">Offer</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="offer1" value="1" name="offer" @if($product->offer==1) checked @endif>
                                                            <label for="offer1">YES </label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="offer2" value="2" name="offer" @if($product->offer==2) checked @endif>
                                                            <label for="offer2">NO </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3" for="confirm1">Most Popular</label>
                                                    <div class="col-md-9">
                                                        <div class="radio radio-info radio-info form-check-inline">
                                                            <input type="radio" id="popular1" value="1" name="popular" @if($product->popular==1) checked @endif>
                                                            <label for="popular1">YES </label>
                                                        </div>
                                                        <div class="radio radio-info form-check-inline">
                                                            <input type="radio" id="popular2" value="2" name="popular" @if($product->popular==2) checked @endif>
                                                            <label for="popular2">NO </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane" id="gallary_image">
                                        <div class="row">
                                            @php
                                                $i=0;
                                            @endphp
                                            @if($product->productimage)
                                                @foreach ($product->productimage as $i=>$item)
                                                    <div class="col-3 oldimgrm">
                                                        <div class="form-group mb-3">
                                                            <img src="{{asset("/source/public/images/thumbnails/$item->image")}}" width="100%" height="150px" alt="">
                                                            <a href="javascript:void(0)" class="btn btn-danger btn-block" onclick="remove_image('{{ basename(asset($item->image))}}',this)">Delete</a>
                                                        </div>
                                                    </div> <!-- end col -->
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-12">Gallary Image</div>
                                            <div class="col-4 mb-3">
                                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                                            </div> <!-- end col -->
                                            <div class="col-4 mb-3">
                                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                                            </div> <!-- end col -->
                                            <div class="col-4 mb-3">
                                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                                            </div>  <!-- end col -->
                                            <div class="col-4 mb-3">
                                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                                            </div> <!-- end col -->
                                            <div class="col-4 mb-3">
                                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                                            </div> 
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
   <script type="text/javascript">
        $(document).ready(function() {
        $('.summernote').summernote({height: 300});
        });
    </script>

<script>

$(document).ready(function(){
    $('#cat').on('change', function(){
		var cat_id = $(this).val();
		$.ajax({
            type:"GET",
            url:"{{route(Session::get('identity').'.product.getcat')}}",
            data: {'cat_id' : cat_id},
			success:function(data){
                $('#subcat').html(data);
			},
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        }  
		});
	});
})

</script>

@endpush
