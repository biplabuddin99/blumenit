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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item active">Show</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product Show</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        @if($product)
        
        <!-- end row -->
        <div class="row">
            <div class="col-sm-8">
                <div class="bg-picture card-box">
                    <div class="profile-info-name">
                        <img src="{{asset($product->feature_image)}}" class="rounded-circle avatar-xl img-thumbnail float-left mr-3" alt="profile-image">

                        <div class="profile-info-detail overflow-hidden">
                            <h4 class="m-0">Product Name: {{$product->name}}</h4>
                            <p class="text-muted"><i>Sku :{{$product->sku}}</i></p>
                            <p class="font-13">Manufacturer :{{$product->manufacturer_id}}</p>
                            <p class="font-13">Category :{{$product->category->name}}</p>
                            <p class="font-13">Sub Category :{{$product->subcategory?$product->subcategory->name:""}}</p>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--/ meta -->

                <div class="card-box">
                    <p class="text-muted"><i>Product Title :{{$product->product_title}}</i></p>
                    <p class="font-13">Short Description :</p>
                    <p class="font-13">{!!$product->short_description!!}</p>
                </div>
                <div class="card-box">
                    <p class="font-13">Long Description :</p>
                    <p class="font-13">{!!$product->long_description!!}</p>
                </div>
                <div class="card-box">
                    <p class="font-13 mt-3">Specification</p>
                    <p class="font-13">{!!$product->specifications!!}</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 mb-3">Pricing Info</h4>
                    <ul class="list-group mb-0 user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-2.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">Price</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->price}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-3.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">Discount</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->discount}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-5.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">Quantity</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->qty}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-6.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">Review</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->review}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-1.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">Warranty</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->warranty}}</p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-1.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">Product Condition</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->product_condition}}</p>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user avatar-sm float-left mr-2">
                                    <img src="assets/images/users/user-1.jpg" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="user-desc">
                                    <h5 class="name mt-0 mb-1">VAT</h5>
                                    <p class="desc text-muted mb-0 font-12">{{$product->vat_status}}</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
@php
$status = array("","YES","NO");    
@endphp
                <div class="card-box">
                    <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all mr-1"></i>Other Info</h4>
                    <ul class="list-group mb-0 user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-primary"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">New Product</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->new_product]}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-primary"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">Refurbished Product</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->refurbished_product]}}</span>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-success"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">Feature Product</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->feature_product]}}</span>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-pink"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">Limited Product</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->limited_product]}}</span>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-muted"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">Out Of Stock</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->outofstock_product]}}</span>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-danger"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">Best Seller</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->best_seller]}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-dark"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">Offer</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->offer]}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="user float-left mr-3">
                                    <i class="mdi mdi-circle text-dark"></i>
                                </div>
                                <div class="user-desc overflow-hidden">
                                    <h5 class="name mt-0 mb-1">Most Popular</h5>
                                    <span class="desc text-muted font-12 text-truncate d-block">{{$status[$product->popular]}}</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>


           
        <!-- end row -->
        
        @endif
        
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


@endsection
        
@push('style')
 <!-- dropify -->
 
@endpush
@push('script')


 <!-- dropify js -->


 <!-- form-upload init -->
 

@endpush


