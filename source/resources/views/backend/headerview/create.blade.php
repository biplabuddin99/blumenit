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
            

            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Header View</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.headerview.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Logo link</label>
                            <div class="col-sm-9">
                                <input type="text" name="link" class="form-control @if($errors->has('link')) parsley-error @endif" id="inputEmail3" placeholder="Logo Link">
                                
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
                                <input type="file" class="dropify" data-height="150" name="image"/>
                                @if ($errors->has('image'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('image') }}</li>
                                        </ul>
                                @endif
                             </div><!-- end col -->
                        </div>
                        <hr style="height:0.5px;border:none;color:rgb(220, 220, 220);background-color:rgb(220, 220, 220);" />
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Whatsapp number</label>
                            <div class="col-sm-9">
                                <input type="text" name="whatsapp" class="form-control @if($errors->has('whatsapp')) parsley-error @endif" id="inputEmail3" placeholder="Whatsapp Number">
                                
                                @if ($errors->has('whatsapp'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('whatsapp') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <hr style="height:0.5px;border:none;color:rgb(220, 220, 220);background-color:rgb(220, 220, 220);" />
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Contact number</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact" class="form-control @if($errors->has('contact')) parsley-error @endif" id="inputEmail3" placeholder="Contact Number">
                                
                                @if ($errors->has('contact'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('contact') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>

                        <hr style="height:0.5px;border:none;color:rgb(220, 220, 220);background-color:rgb(220, 220, 220);" />

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Contact Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control @if($errors->has('email')) parsley-error @endif" id="inputEmail3" placeholder="Contact Email">
                                @if ($errors->has('email'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('email') }}</li>
                                        </ul>
                                @endif
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
