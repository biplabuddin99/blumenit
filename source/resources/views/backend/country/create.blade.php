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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.country.index')}}">Country</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Country</h4>
                </div>
            </div>
        </div>  
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Add New Country</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.country.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="country" class="col-sm-3 col-form-label">Country Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="country" class="form-control" id="country" placeholder="Country Name">
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