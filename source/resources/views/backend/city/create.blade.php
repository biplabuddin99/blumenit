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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.city.index')}}">City</a></li>
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                    <h4 class="page-title">City</h4>
                </div>
            </div>
        </div>  
        <!-- end page title --> 

        <div class="row">
            

            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Add New City</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.city.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="country" class="col-sm-3 col-form-label">Country </label>
                            <div class="col-sm-9">
                                <select name="country_id" onchange="$('.state').hide();$('.st'+this.value).show()" class="form-control" required>
                                    <option value="">Select Country</option>
                                    @if($country)
                                        @foreach($country as $c)
                                            <option value="{{$c->id}}">{{$c->country}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-sm-3 col-form-label">State </label>
                            <div class="col-sm-9">
                                <select name="state_id" class="form-control" required>
                                    <option value="">Select State</option>
                                    @if($state)
                                        @foreach($state as $c)
                                            <option value="{{$c->id}}" class="state st{{$c->country_id}}">{{$c->state}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-3 col-form-label">City Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="city" class="form-control" id="city" placeholder="City Name">
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