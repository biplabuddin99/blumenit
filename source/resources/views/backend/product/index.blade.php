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
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
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
                    <div class="row">
                        <div class="col-sm-6 offset-sm-2">
                            <form method="get" action="{{route(Session::get('identity').'.product.index')}}">
                            <div class="input-group">
                              <input type="text" class="form-control" value="{{$search}}" placeholder="Product Name" aria-label="Product Name" name="name">
                              <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-sm-4 text-right pb-2">
                            <a href="{{route(Session::get('identity').'.product.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                        </div>
                    </div>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#SL</th>
                                            <th data-priority="1">Name</th>
                                            <th data-priority="1">Sku</th>
                                            <th data-priority="1">Price</th>
                                            <th data-priority="2">Image</th>
                                            <th data-priority="1">Action</th>
                                        </tr>
                                    </thead>
                                    @if($product)
                                        @foreach($product as $i=>$pro)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$pro->name}}</td>
                                                <td>{{$pro->sku}}</td>
                                                <td>{{$pro->price}}</td>
                                                <td><img class="img-fluid" width="80px" src="{{asset($pro->feature_image)}}" alt="Card image cap"></td>
                                                <td>
                                                    <a href="{{route(Session::get('identity').'.product.show',$pro->id)}}" class="btn btn-success btn-sm btn-rounded width-xs waves-effect">Show</a>
                                                    <a href="{{route(Session::get('identity').'.product.edit',$pro->id)}}" class="btn btn-primary btn-sm btn-rounded width-xs waves-effect">Edit</a>
                                                    {{--<button type="button" class="btn btn-danger btn-sm btn-rounded width-xs waves-effect waves-light">Delete</button>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif 
                                </table>
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="clearfix">
                                            {{ $product->appends($_GET)->links('pagination::bootstrap-4') }}
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


