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
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Customer</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    @if(Session::has('response'))
                      <div class="alert alert-{{Session::get('response')['class']}}">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{Session::get('response')['message']}}
                      </div>
				    @endif
				    <div class="row">
                        <div class="col-sm-6 offset-sm-2">
                            <form method="get" action="{{route(Session::get('identity').'.admincustomer.index')}}">
                            <div class="input-group">
                              <input type="text" class="form-control" value="{{$search}}" placeholder="Name" aria-label="Name" name="name">
                              <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-sm-4 text-right pb-2">
                            <a href="{{route(Session::get('identity').'.admincustomer.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                        </div>
                    </div>
                    
                    <h4 class="mt-0 header-title mb-3">Customer List</h4>
                    
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($customer)
                                    @foreach($customer as $cust)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$cust->first_name}} {{$cust->last_name}}</td>
                                            <td>{{$cust->email}}</td>
                                            <td>{{$cust->contact_ext}}-{{$cust->contact}}</td>
                                            <td>
                                                {{$cust->address}}
                                                @if($cust->zip),{{$cust->zip}}@endif
                                                @if($cust->city_id),<br>{{$cust->city->city}},  @endif
                                                @if($cust->state_id) {{$cust->state->state}}, @endif
                                                @if($cust->country_id)<br>{{$cust->country->country}}  @endif
                                            </td>
                                            <td>{{$cust->status==1?"Active":"Inactive"}}</td>
                                            <td>
                                                <a href="{{route(Session::get('identity').'.admincustomer.edit',$cust->id)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="card-box">
                                <div class="clearfix">
                                    {{ $customer->appends($_GET)->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div> <!-- end container -->
</div><!-- end wrapper -->
@endsection