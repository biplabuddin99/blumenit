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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div class="text-center">
                        <h2 class="font-weight-normal text-primary" data-plugin="counterup">
                            {{App\Models\Customer::count()}}
                        </h2>
                        <h5>Total Customer</h5>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div class="text-center">
                        <h2 class="font-weight-normal text-primary" data-plugin="counterup">
                            {{App\Models\Product::count()}}
                        </h2>
                        <h5>Total Product</h5>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div class="text-center">
                        <h2 class="font-weight-normal text-primary" data-plugin="counterup">
                            {{App\Models\Order::count()}}
                        </h2>
                        <h5>Total Order</h5>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div class="text-center">
                        <h2 class="font-weight-normal text-primary" data-plugin="counterup">
                            {{App\Models\Order::where('status',0)->count()}}
                        </h2>
                        <h5>Pending Order</h5>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card-box">
                    <h4 class="header-title mt-0 mb-3">Latest Order</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Details</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $status=array('pending','processing','delivered','canceled'); @endphp
                            @php $statusclass=array('warning','info','success','danger'); @endphp
                                @if(App\Models\Order::where('status',0)->count() > 0)
                                    @foreach(App\Models\Order::where('status',0)->latest()->get() as $i=>$or)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>
                                                {{$or->full_name}}<br>
                                                Call:{{$or->contact_ext}}-{{$or->contact}}<br>
                                                Email:{{$or->email}}
                                            </td>
                                            <td>{{date('d/m/Y',strtotime($or->created_at))}}</td>
                                            <td>{{number_format($or->total,2)}}</td>
                                            <td><span class="badge badge-{{$statusclass[$or->status]}}">{{$status[$or->status]}}</span></td>
                                            <td>
                                                <a href="{{route(Session::get('identity').'.order.show',$or->id)}}" class="btn btn-success btn-sm btn-rounded width-xs waves-effect">Show</a>
                                                <a href="{{route(Session::get('identity').'.order.edit',$or->id)}}" class="btn btn-warning btn-sm btn-rounded width-xs waves-effect">Edit</a>
                                                @if($or->status != 2)
                                                <a href="{{route(Session::get('identity').'.order.delete',$or->id)}}" class="btn btn-danger btn-sm btn-rounded width-xs waves-effect">Delete</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->        
    </div> <!-- end container -->
</div><!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


@endsection
        
@push('style')
   <!--Morris Chart-->
   <link rel="stylesheet" href="{{asset('asset/libs/morris-js/morris.css')}}" />
@endpush
@push('script')

<!-- knob plugin -->
<script src="{{asset('asset/libs/jquery-knob/jquery.knob.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('asset/libs/morris-js/morris.min.js')}}"></script>
<script src="{{asset('asset/libs/raphael/raphael.min.js')}}"></script>

<!-- Dashboard init js-->
<script src="{{asset('asset/js/pages/dashboard.init.js')}}"></script>



@endpush

     