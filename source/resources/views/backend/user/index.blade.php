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
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Admin</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{route(Session::get('identity').'.admins.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                    </div>
                    <h4 class="mt-0 header-title mb-3">Admin List</h4>
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
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($allUser))
                                    @foreach($allUser as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->contact}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if($user->status == 1)
                                                <span class="badge badge-success">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route(Session::get('identity').'.admins.edit',$user->id)}}" class="btn btn-info btn-rounded width-sm waves-effect">Edit</a>
                                                {{--<a href="{{route(Session::get('identity').'.admins.delete', $user->id)}}"><i class="fas fa-trash-alt text-danger font-16"></i></a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table><!--end /table-->
                    </div>
                    <!--end /tableresponsive-->
                    <div class="d-flex align-items-center justify-content-between">
                        {{$allUser->links()}}
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div><!--end row-->
</div>
@endsection