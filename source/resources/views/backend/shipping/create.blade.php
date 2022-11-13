@extends('layout.backend.back')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row"><!-- start page title -->
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{Session::get('identity')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.shipping.index')}}">Shipping</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Shipping</h4>
                </div>
            </div>
        </div><!-- end page title --> 

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Add New Shipping</h4>
                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.shipping.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Shipping Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Shipping Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-3 col-form-label">Shipping Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="condition_amount" class="col-sm-3 col-form-label">Condition Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="condition_amount" class="form-control" id="condition_amount" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="terms" class="col-sm-3 col-form-label">Terms & Condition</label>
                            <div class="col-sm-9">
                                <textarea name="terms" class="form-control" id="terms"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="state" class="col-sm-3 col-form-label">Show can choice </label>
                            <div class="col-sm-9">
                                <select name="show_in_option" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
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
        </div><!-- end row -->
    </div> <!-- end container -->
</div><!-- end wrapper -->

@endsection