@php
    $head=App\Models\Headerview::all();
    $gs=App\Models\GeneralSetting::first();
    $footercol4 = App\Models\Footercol4::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice - {{date('Y',strtotime($order->created_at))}}-@if($order->id <= 99999)1{{str_pad($order->id,5,"0",STR_PAD_LEFT )}}@else {{$order->id}} @endif</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        .wrapper {
            width: 796px;
            display: block;
            margin: auto;
            box-sizing: border-box;
            padding: 10px;
        }
        header{
            display: flex;
            padding: 20px 20px;
            justify-content: space-between;
            border-bottom: 2px solid #000;
            margin-bottom: 10px;
        }
        h1,h2,h3,h4,h5,h6{
            margin-top: 2px;
            margin-bottom: 2px;
        }
        .right p{
            text-align: right;
        }
        p{
            font-size: 13px;
            padding-bottom: 3px;
            margin-bottom: 5px;
        }
        .right p.border{
            font-size: 15px;
            font-weight: 400;
            padding: 10px;
            border: 1.5px solid #000;
            text-align: left;
            margin-bottom: 10px;
        }
        section.order-id,.order-date{
            display: flex;
            justify-content: space-between;
        }
        .large-space {
            margin-bottom: 20px;
        }
        .order-id-child-2 p{
            font-size: 17px;
        }
        .order-id-child-2 p span{
            margin-left: 10px;
        }
        .btn-of-head h5{
            display: inline-block;
        }
        .btn-of-head h5{
            margin-right: 40px;
        }

        thead tr th,tbody tr td{
            font-size: 11px;
        }
        .table td, .table th {
            border-top: none;
        }
        .table-sec thead{
            border-bottom: 2.4px solid #000 !important;
            border-top: 2px solid #000;
        }

        thead{
                background: transparent !important;
        }
        .total-count{
            display: flex;
        }
        .total-count table.table{
            width: 48%;
            display: inline-block;
            margin-right: 1%;
            overflow: hidden;
        }

        .total-count .note-sec{
            width: 48%;
            display: inline-block;
            margin-left: 1%;
            overflow: hidden;
        }
        .btm-of-total{
            padding: 20px;
            box-sizing: border-box;
            border: 1.5px solid #000;
            width:50%;
        }
        .border-2{
            border-top: 1.5px solid #000;
            border-bottom: 1.5px solid #000;
            padding: 5px 0;
            display: flex;
            justify-content: space-between;
        }
        .mrp-total p span{
            text-align: right;
        }
        .all-count p{
            display: inline-block;
            margin-right: 40px;
        }
        .all-count p:last-of-type{
            float: right;
            margin-right: 0;
        }
        .up-section-left{
            width: 70%;
            margin-right: 2%;
            display: inline-block;
        }
        .thank{
            width: 25%;
            margin-left: 1%;
            display: inline-block;
        }
        footer{
            clear: both;
        }
        .up-footer{
            display: flex;
        }
        .thank h2{
            margin-top: 0%;
        }
        .dwn-footer p{
            font-size: 13px;
        }
        .dwn-footer p:last-of-type{
            text-align: center;
            margin-top: 15px;
        }
        .dwn-footer p a{
            color: #000;
            text-decoration: none;
        }



                .table {
                    width: 100%;
                    max-width: 100%;
                    margin-bottom: 1rem;
                    background-color: transparent;
                    border-collapse: collapse;
                }

                .table-striped tbody tr:nth-of-type(odd) {
                    background-color: rgba(0, 0, 0, .05)
                }

                .table td,
                .table th {
                    padding: .75rem;
                    vertical-align: top;
                    border-top: 1px solid #dee2e6
                }

                thead {
                    background: #abe18b;
                }

                .table thead th {
                    vertical-align: bottom;
                    border-bottom: 2px solid #dee2e6;
                    text-align: left;
                    text-transform: uppercase;
                }

                .table tbody+tbody {
                    border-top: 2px solid #dee2e6
                }

                .table .table {
                    background-color: #fff
                }


                .table-bordered {
                    border: 1px solid #dee2e6
                }

                .table-bordered td,
                .table-bordered th {
                    border: 1px solid #dee2e6
                }

                .table-bordered thead td,
                .table-bordered thead th {
                    border-bottom-width: 2px
                }
                }

    </style>
</head>
 
<body onload="window.print();setTimeout(window.close, 0);">
    <div class="wrapper">
        <header>
            <div class="left">
                <h2><img src="{{asset($head[0]->logo_image )}}" alt=""></h2>
            </div>
            <div class="right">
                <p class="border">Invoice Number: {{date('Y',strtotime($order->created_at))}}-@if($order->id <= 99999)1{{str_pad($order->id,5,"0",STR_PAD_LEFT )}}@else {{$order->id}} @endif</p>
                <p> Customer Copy</p>
            </div>
        </header>
        <section class="order-id large-space">
            <div class="order-id-child-1" style="width:34%">
                <h4>Sold By</h4>
                <p class="large-space">{{$gs->company_name}}</p>
                <p>{{$footercol4[0]->address}}</p>
                <p>{{$footercol4[0]->email}}</p>
                <p>{{$footercol4[0]->contact}}</p>
            </div>
            <div class="order-id-child-2" style="width:33%">
            @php $status=array('pending','processing','delivered','canceled'); @endphp
                 
                <p>Order Id <span>@if($order->id <= 99999) 1{{str_pad($order->id,5,"0",STR_PAD_LEFT )}}@else {{$order->id}} @endif</span></p>
                <p>Order Date <span>{{date('d-m-Y',strtotime($order->created_at))}}</span></p>
            </div>
            <div class="order-id-child-3" style="width:33%">
                <p>Bill To / Ship To (Patient)</p>
                <p>{{$order->full_name}} ,</p>
                <p>{{$order->email}} ,</p>
                <p>{{$order->contact_ext}}-{{$order->contact}} ,</p>
                <p>{{$order->address}}</p>
            </div>
        </section>
        <div class="btn-of-head large-space ">
            <h5>Payment Method: <span style="margin-left: 5px;">{{$order->pay_method}}</span></h5>
            <h5>Payment Status : {{$order->payment_status?"Paid":"Uppaid"}}</h5>
            <h5>Order Status : {{$status[$order->status]}}</h5>
            <h5>Delivery Zone : {{$order->shipping_name}}</h5>
        </div>
        <div class="table-sec" style="margin-bottom: 30px;margin-top: 30px">
            @php
                $cart=json_decode(base64_decode($order->cart),true);
            @endphp
            <table class="table">
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
        <div class="total-count">
            <div class="note-sec">
                <p>Note:</p>
            </div>
        </div>
        <section class="border-2 large-space">
            <div class="btm-of-total">
                Comment:
                &nbsp;&nbsp;{{$order->comment}}<br><br>
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
            <div class="mrp-total">
                <p>MRP Total</p>
                <p>Discount</p>
                <p>Vat</p>
                <p>Subtotal</p>
                <p>Delivery Charges</p>
                <p>Total</p>
            </div>
            <div class="amount" style="text-align:right">
                <p>AED {{number_format($order->total_mrp,2)}}</p>
                <p>AED {{number_format($order->discount,2)}}</p>
                <p>AED {{number_format($order->vat,2)}}</p>
                <p>AED {{number_format($order->subtotal,2)}}</p>
                @if(((float) $order->delivery_charge) <= 0)
                    <p>{{$order->delivery_charge}}</p>
                @else
                    <p>AED {{number_format($order->delivery_charge,2)}}</p>
                @endif
                <p>AED {{number_format($order->total,2)}}</p>
            </div>
        </section>
        <footer>
            <div class="thank">
                <h2>Thank You!</h2>
                <p style="font-size:15px;">For shopping with us</p>
            </div>
            </div>
            <div class="dwn-footer">
                <p>Contact For Support : <a href="tel:{{$footercol4[0]->contact}}">{{$footercol4[0]->contact}}</a> || <a href="mailto:{{$footercol4[0]->email}}">Email: {{$footercol4[0]->email}}</a>
</p>
            </div>
        </footer>
    </div>
</body>

</html>
