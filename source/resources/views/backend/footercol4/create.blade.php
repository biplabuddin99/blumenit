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
            

            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Horizontal form</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.homefootcol4.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control @if($errors->has('address')) parsley-error @endif" id="title" placeholder="Head">
                                
                                @if ($errors->has('address'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('address') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control @if($errors->has('email')) parsley-error @endif" id="details" placeholder="Details">
                                
                                @if ($errors->has('email'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('email') }}</li>
                                        </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="c_notice" class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-9">
                                <input type="text" name="contact" class="form-control @if($errors->has('contact')) parsley-error @endif" id="c_notice" placeholder="Contact">
                                
                                @if ($errors->has('contact'))
                                        <ul class="parsley-errors-list filled">
                                            <li>{{ $errors->first('contact') }}</li>
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
