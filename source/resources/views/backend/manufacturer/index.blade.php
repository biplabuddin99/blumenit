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
                            <li class="breadcrumb-item active">Manufacturer</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manufacturer</h4>
                </div>
            </div>
        </div>   
        <!-- end page title --> 

        <div class="row">
           
            <div class="col-md-12">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="{{route(Session::get('identity').'.manufacturer.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                    </div>
                    <h4 class="mt-0 header-title mb-3">Manufacturer List</h4>
                    @if(Session::has('response'))
					<div class="alert alert-{{Session::get('response')['class']}}">
					{{Session::get('response')['message']}}
					</div>
				    @endif
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($manufacturer)
                              
                                    @foreach($manufacturer as $cat)
                                   
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$cat->name}}</td>
                                            <td>{{$cat->email}}</td>
                                            <td>{{$cat->contact}}</td>
                                            <td>{{$cat->address}}</td>
                                            <td>
                                                <img src="{{asset($cat->image)}}" alt="" height="60" width="60">
                                            </td>
                                            <td>
                                               
                                <a href="{{route(Session::get('identity').'.manufacturer.edit',$cat->id)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
                                <!--<button type="button" class="btn btn-danger btn-rounded width-sm waves-effect waves-light">Delete</button>-->
                                            </td>
                                        </tr>
                                     
                                    @endforeach
                                @endif
                           
                           
                            </tbody>
                        </table>
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
 <!-- dropify -->
 
@endpush
@push('script')


 <!-- dropify js -->


 <!-- form-upload init -->
 

@endpush


