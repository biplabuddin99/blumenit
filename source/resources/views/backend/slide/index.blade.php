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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.slide.index')}}">Slider</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Slider</h4>
                </div>
            </div>
        </div>    
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{route(Session::get('identity').'.slide.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                    </div>
                    <h4 class="mt-0 header-title mb-3">Slider List</h4>
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
                                <th>For</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Details</th>
                                <th>Order</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($slide)
                              @php $type=array("","Home Page","Category Page","Games Page","Product Page","Corporate Business Page"); @endphp
                                    @foreach($slide as $cat)
                                   
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$type[$cat->type]}}</td>
                                            <td>{{$cat->name}}</td>
                                            <td>{{$cat->title}}</td>
                                            <td>{{$cat->link}}</td>
                                            <td>{{$cat->details}}</td>
                                            <td>{{$cat->order}}</td>
                                            <td>
                                                <img src="{{asset($cat->image)}}" alt="" height="60" width="60">
                                            </td>
                                            <td>
                                               
                                                <a href="{{route(Session::get('identity').'.slide.edit',$cat->id)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
                                                <form action="{{route(Session::get('identity').'.slide.destroy',$cat->id)}}" onsubmit="return confirm('Are you sure to delete this data?')" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-rounded width-sm waves-effect waves-light">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                     
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $slide->links() }}
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


