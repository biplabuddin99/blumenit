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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Update Order</h4>
                        <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.order.update',$order->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="payment_status" class="col-sm-3 col-form-label">Payment Status</label>
                            <div class="col-sm-9">
                                <select name="payment_status" class="form-control" id="payment_status">
                                    <option value="0" @if($order->payment_status==0) selected @endif>Unpaid</option>
                                    <option value="1" @if($order->payment_status==1) selected @endif>Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="orderstatus" class="col-sm-3 col-form-label">Order Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control" id="orderstatus">
                                    <option value="0" @if($order->status==0) selected @endif>Pending</option>
                                    <option value="1" @if($order->status==1) selected @endif>Processing</option>
                                    <option value="2" @if($order->status==2) selected @endif>Delivered</option>
                                    <option value="3" @if($order->status==3) selected @endif>Canceled</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-md-1 mr-3">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


@endsection
        
@push('style')
@endpush
@push('script')
    
@endpush
