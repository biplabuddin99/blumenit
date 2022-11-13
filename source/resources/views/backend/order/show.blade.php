@extends('layout.backend.back')
@section('content')
@php
    $head=App\Models\Headerview::all();
@endphp
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
                            <li class="breadcrumb-item active">Show</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Order Show</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3><img src="{{asset($head[0]->logo_image )}}" alt="" height="50px"></h3>
                            </div>
                            <div class="float-right">
                                <h4>Invoice # <br>
                                    <strong>{{date('Y',strtotime($order->created_at))}}-@if($order->id <= 99999)1{{str_pad($order->id,5,"0",STR_PAD_LEFT )}}@else {{$order->id}} @endif</strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                            @php $status=array('pending','processing','delivered','canceled'); @endphp
                                <div class="float-left mt-3">
                                    <address>
                                        <strong>{{$order->full_name}}</strong><br>
                                        {{$order->address}}<br>
                                        <abbr title="Phone">P:</abbr>{{$order->contact_ext}}-{{$order->contact}} ,<br>
                                        <abbr title="Email">E:</abbr>{{$order->email}}
                                    </address>
                                </div>
                                <div class="float-right mt-3">
                                    <p class="m-0"><strong>Order Date: </strong> {{date('M d, Y',strtotime($order->created_at))}}</p>
                                    <p class="m-0"><strong>Order ID: </strong> #@if($order->id <= 99999) 1{{str_pad($order->id,5,"0",STR_PAD_LEFT )}}@else {{$order->id}} @endif</p>
                                    <p class="m-0"><strong>Order Status: </strong> {{$status[$order->status]}}</p>
                                    <p class="m-0"><strong>Payment Status: </strong> {{$order->payment_status?"Paid":"Uppaid"}}</p>
                                    <p class="m-0"><strong>Payment Method: </strong> {{$order->pay_method}}</p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                @php
                                    $cart=json_decode(base64_decode($order->cart),true);
                                @endphp
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th>S NO</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Sku</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($cart)
                                            @php $i=0; @endphp
                                                @foreach($cart['cart'] as $item)
                                                    <tr>
                                                        <td>{{++$i}}</td>
                                                        <td><img src="{{asset($item['image'])}}" height="80px" alt=""></td>
                                                        <td>{{$item['name']}}</td>
                                                        <td>{{$item['sku']}}</td>
                                                        <td>{{$item['quantity']}}</td>
                                                        <td>AED {{number_format($item['price'],2)}}</td>
                                                        <td>@if($item['discount_amount'] > 0)AED {{number_format($item['discount_amount'],2)}} ({{$item['discount']}}%)@endif</td>
                                                        <td>AED {{number_format(($item['price'] * $item['quantity']),2)}}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-6">
                                <div class="clearfix mt-4">
                                    <h5 class="small text-dark">Order Comment By Customer</h5>
                                    <small>
                                    {{$order->comment}}
                                    </small>
                                    @if($order->shipping_id)
                                        @php $shipping=\App\Models\shipping::find($order->shipping_id); @endphp
                                        @if($shipping)
                                            @if($shipping->terms)
                                                Shipping Terms & Condition:<br>
                                                &nbsp;&nbsp;{{$shipping->terms}}<br>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 offset-xl-3">
                                <p class="text-right"><b>MRP Total:</b> AED {{number_format($order->total_mrp,2)}}</p>
                                <p class="text-right"><b>Discount:</b> AED {{number_format($order->discount,2)}}</p>
                                <p class="text-right"><b>Vat:</b> AED {{number_format($order->vat,2)}}</p>
                                <p class="text-right"><b>Sub Total:</b> AED {{number_format($order->subtotal,2)}}</p>
                                <p class="text-right"><b>Delivery Charges:</b> 
                                    @if(((float) $order->delivery_charge) <= 0)
                                        {{$order->delivery_charge}}
                                    @else
                                        AED {{number_format($order->delivery_charge,2)}}
                                    @endif
                                </p>
                                <hr>
                                <h3 class="text-right"> AED {{number_format($order->total,2)}}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="d-print-none">
                            <div class="float-right">
                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->
    </div> <!-- end container -->
</div>

@endsection
        
@push('style')
 
@endpush
@push('script')

@endpush


