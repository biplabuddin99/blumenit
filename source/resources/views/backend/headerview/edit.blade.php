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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.headerview.index')}}">Header</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Header</h4>
                </div>
            </div>
        </div>    
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Header form</h4>
                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.headerview.update',$headerview->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$headerview->id}}" name="id">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Logo link</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$headerview->logo_link}}" name="link" class="form-control @if($errors->has('link')) parsley-error @endif" id="inputEmail3" placeholder="Logo Link">
                                @if ($errors->has('link'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('link') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3">
                                <label  class="col-form-label mt-0 mb-3">Upload Logo</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" data-default-file='{{asset($headerview->logo_image)}}' class="dropify" data-height="150" name="image"/>
                                @if ($errors->has('image'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('image') }}</li>
                                    </ul>
                                @endif
                                <span>Logo image should be 137:50 ratio</span>
                             </div><!-- end col -->
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-3">
                                <label  class="col-form-label mt-0 mb-3">Upload Favicon</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" data-default-file='{{asset($headerview->favicon)}}' class="dropify" data-height="43" name="favicon"/>
                                <span>favicon image should be 53:43 ratio</span>
                             </div><!-- end col -->
                        </div>
                        
                        <div class="form-group row">
                            <label for="whatsapp" class="col-sm-3 col-form-label">Whatsapp number</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$headerview->whatsapp}}" name="whatsapp" class="form-control @if($errors->has('whatsapp')) parsley-error @endif" id="whatsapp" placeholder="Whatsapp Number">
                                @if ($errors->has('whatsapp'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('whatsapp') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-sm-3 col-form-label">Contact number</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$headerview->contact}}" name="contact" class="form-control @if($errors->has('contact')) parsley-error @endif" id="contact" placeholder="Contact Number">
                                @if ($errors->has('contact'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('contact') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Contact Email</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$headerview->email}}" name="email" class="form-control @if($errors->has('email')) parsley-error @endif" id="email" placeholder="Contact Email">
                                @if ($errors->has('email'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('email') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="menu_setting" class="col-sm-3 col-form-label">Menu Setting</label>
                            <div class="col-sm-9">
                                <?php $menu_settings=json_decode($headerview->menu_setting); ?>
                                <select multiple="multiple" class="multi-select" id="menu_setting" name="menu_setting[]" data-plugin="multiselect">
                                    <option value="about" @if($menu_settings->about=="show") selected @endif>About Us</option>
                                    <option value="category" @if($menu_settings->category=="show") selected @endif>Category</option>
                                    <option value="games" @if($menu_settings->games=="show") selected @endif>Gaming</option>
                                    <option value="corporate" @if($menu_settings->corporate=="show") selected @endif>Corporate</option>
                                    <option value="shopview" @if($menu_settings->shopview=="show") selected @endif>Products</option>
                                    <option value="contact" @if($menu_settings->contact=="show") selected @endif>Contact</option>
                                </select>
                            </div>
                        </div>

                        <hr style="height:0.5px;border:none;color:rgb(220, 220, 220);background-color:rgb(220, 220, 220);" />
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
 <link href="{{asset('asset/libs/multiselect/multi-select.css')}}" rel="stylesheet" type="text/css" />
 <style>
    .ms-selectable::before{
        content: "Inactive";
        font-weight: bold;
        padding: 4px 20px;
        font-size: 16px;
     }
     .ms-selection::before{
        content: "Active";
        font-weight: bold;
        padding: 4px 20px;
        font-size: 16px;
     }
 </style>
@endpush
@push('script')


 <!-- dropify js -->
 <script src="{{asset('asset/libs/dropify/dropify.min.js')}}"></script>

 <!-- form-upload init -->
 <script src="{{asset('asset/js/pages/form-fileupload.init.js')}}"></script>
 
 <script src="{{asset('asset/libs/multiselect/jquery.multi-select.js')}}"></script>
 <script>
     $('[data-plugin="multiselect"]').multiSelect()
 </script>

@endpush

