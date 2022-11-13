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
                            <li class="breadcrumb-item active">Shipping</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Shipping</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{route(Session::get('identity').'.shipping.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                    </div>
                    <h4 class="mt-0 header-title mb-3">Shipping List</h4>
                    @if(Session::has('response'))
                      <div class="alert alert-{{Session::get('response')['class']}}">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{Session::get('response')['message']}}
                      </div>
				    @endif
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Condition Amount</th>
                                <th>User can choice</th>
                                <th>Status</th>
                                <th>Terms</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($data)
                                    @foreach($data as $ship)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$ship->name}}</td>
                                            <td>{{$ship->amount}}</td>
                                            <td>{{$ship->condition_amount}}</td>
                                            <td>{{$ship->show_in_option?"Yes":"No"}}</td>
                                            <td>{{$ship->status?"Active":"Inactive"}}</td>
                                            <td>{!!$ship->terms!!}</td>
                                            <td>
                                                <a href="{{route(Session::get('identity').'.shipping.edit',$ship->id)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
                                                {{--<button type="button" class="btn btn-danger btn-rounded width-sm waves-effect waves-light">Delete</button>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

@endsection
