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
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        @if(Session::has('response'))
            <div class="alert alert-{{Session::get('response')['class']}}">
                {{Session::get('response')['message']}}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                        <form method="get" action="{{route(Session::get('identity').'.order.index')}}">
                    <div class="row mb-3">
                        <div class="col-sm-5 offset-sm-1">
                            <input type="text" class="form-control" value="{{$customer}}" placeholder="Customer name/ email / contact" aria-label="Name" name="customer">
                        </div>
                        <div class="col-sm-3">
                             <input type="date" class="form-control" value="{{$or_date}}" placeholder="Order Date" aria-label="Name" name="or_date">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                        </form>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#SL</th>
                                            <th data-priority="1">Customer</th>
                                            <th data-priority="1">Order Date</th>
                                            <th data-priority="1">Price</th>
                                            <th data-priority="2">Status</th>
                                            <th data-priority="1">Action</th>
                                        </tr>
                                    </thead>
                                    @php $status=array('Pending','Processing','Delivered','Canceled'); @endphp
                                    @php $statusclass=array('warning','info','success','danger'); @endphp
                                    @if($order)
                                        @foreach($order as $i=>$or)
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
                                </table>
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="clearfix">
                                            {{ $order->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<link href="{{asset('asset/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
 
@endpush
@push('script')
<!-- Responsive Table js -->
<script src="{{asset('asset/libs/rwd-table/rwd-table.min.js')}}"></script>

<!-- Init js -->
<script src="{{asset('asset/js/pages/responsive-table.init.js')}}"></script>
 

@endpush


