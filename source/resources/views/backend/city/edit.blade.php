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
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">City</h4>
                </div>
            </div>
        </div>  
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Update City</h4>
                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.city.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="country" class="col-sm-3 col-form-label">Country </label>
                            <div class="col-sm-9">
                                <select name="country_id" onchange="$('.state').hide();$('.st'+this.value).show()" class="form-control" required>
                                    <option value="">Select Country</option>
                                    @if($country)
                                        @foreach($country as $c)
                                            <option value="{{$c->id}}" @if($c->id==$data->country_id) selected @endif>{{$c->country}}</option>
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
                                            <option value="{{$c->id}}" @if($c->id==$data->state_id) selected @endif class="state @if($c->country_id!=$data->country_id) hidden @endif st{{$c->country_id}}">{{$c->state}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-3 col-form-label">City Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="city" class="form-control" id="city" value="{{$data->city}}">
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
        
@push('style')
    <!-- dropify -->
    <style>
        .hidden{
            display:none;
        }
    </style>
@endpush