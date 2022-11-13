@extends('layout.backend.back')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row"><!-- start page title -->
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{Session::get('identity')}}</a></li>
                            <li class="breadcrumb-item active">Corporate Settings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Corporate Settings</h4>
                </div>
            </div>
        </div><!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title mb-3">Corporate Settings List</h4>
                    @if(Session::has('response'))
                      <div class="alert alert-{{Session::get('response')['class']}}">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{Session::get('response')['message']}}
                      </div>
				    @endif
				    <div class="row">
                        <div class="col-sm-12 text-right pb-2">
                            <a href="{{route(Session::get('identity').'.corporate_setting.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Title Green</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data)
                                    @foreach($data as $c)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$c->title}}</td>
                                            <td>{{$c->title_green}}</td>
                                            <td>{{$c->status==1?"Active":"Inactive"}}</td>
                                            <td><img src="{{asset($c->side_image)}}" width="50px"></td>
                                            <td>{{$c->order_no}}</td>
                                            <td>
                                                <a href="{{route(Session::get('identity').'.corporate_setting.edit',$c->id)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $data->appends($_GET)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
@endsection

