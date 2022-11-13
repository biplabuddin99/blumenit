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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.admincustomer.index')}}">Customer</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Customer</h4>
                </div>
            </div>
        </div>  
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Update Customer</h4>
                    @if(Session::has('response'))
                      <div class="alert alert-{{Session::get('response')['class']}}">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{Session::get('response')['message']}}
                      </div>
				    @endif
                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.admincustomer.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$data->id}}" name="id">
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$data->first_name}}" name="first_name" class="form-control @if($errors->has('first_name')) parsley-error @endif" id="first_name" placeholder="First Name">
                                @if ($errors->has('first_name'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('first_name') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$data->last_name}}" name="last_name" class="form-control @if($errors->has('last_name')) parsley-error @endif" id="last_name" placeholder="Last Name">
                                @if ($errors->has('last_name'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('last_name') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="email" value="{{$data->email}}" name="email" class="form-control @if($errors->has('email')) parsley-error @endif" id="email" placeholder="Email">
                                @if ($errors->has('email'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('email') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Mobile Number</label>
                            <div class="col-sm-2">
                                <select class="form-control @if($errors->has('contact_ext')) parsley-error @endif" name="contact_ext">
                                    @if($context)
                                        @foreach($context as $cext)    
                                            <option value="{{$cext->ext}}" @if($cext->ext==$data->contact_ext) selected @endif>{{$cext->ext}}</option>
                                        @endforeach
                                    @endif
                                </select>    
                                @if ($errors->has('contact_ext'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('contact_ext') }}</li>
                                    </ul>
                                @endif
                            </div>
                            <div class="col-sm-7">
                                <input type="text" value="{{$data->contact}}" name="contact" class="form-control @if($errors->has('contact')) parsley-error @endif" id="contact" placeholder="XXXXXXXXXX">
                                @if ($errors->has('contact'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('contact') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea name="address" class="form-control @if($errors->has('address')) parsley-error @endif" id="address">{{$data->address}}</textarea>
                                @if ($errors->has('address'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('address') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip" class="col-sm-3 col-form-label">Postal Code/ZIP</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{$data->zip}}" name="zip" class="form-control" id="zip" placeholder="Zip">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country_id" class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="country_id" id="country_id" onchange="set_state(this.value)">
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
                            <label for="state_id" class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="state_id" id="state_id" onchange="set_city(this.value)">
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
                            <label for="city_id" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="city_id" id="city_id">
                                    <option value="">Select City</option>
                                    @if($city)
                                        @foreach($city as $c)
                                            <option value="{{$c->id}}" class="city ct{{$c->state_id}}">{{$c->city}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="statusp" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="statusp">
                                    <option value="1" @if(1 == $data->status) selected @endif>Active</option>
                                    <option value="0" @if(0 == $data->status) selected @endif>Inactive</option>
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

        </div>
        <!-- end row -->







        
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@endsection

@push('script')

<script>
    function set_state(c){
        $('.state').hide();
        if(c){
            var c=c.split('~');
            $('.st'+c[0]).show();
        }
    }
    function set_city(c){
        $('.city').hide();
        if(c){
            var c=c.split('~');
            $('.ct'+c[0]).show();
        }
    }

    @if($data->state_id)
        set_state('{{$data->country_id}}')
        $('#state_id').val('{{$data->state_id}}')
    @endif

    @if($data->city_id)
        set_city('{{$data->state_id}}')
        $('#city_id').val('{{$data->city_id}}')
    @endif
</script>

@endpush
