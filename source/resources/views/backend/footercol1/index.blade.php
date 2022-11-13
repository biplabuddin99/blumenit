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
                            <li class="breadcrumb-item active">Footer Column 1</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Footer Column 1</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
           
            <div class="col-md-12">
                <div class="card-box">
                   
                    <h4 class="mt-0 header-title mb-3">Table head options</h4>
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
                                <th>Title</th>
                                <th>Details</th>
                                <th>Footer Logo</th>
                                <th>Copyright Notice</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($manufacturer)
                                    @foreach($manufacturer as $cat)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$cat->title}}</td>
                                            <td>{{$cat->text}}</td>
                                            <td> <img src="{{asset($cat->logo)}}" alt="" height="60" width="60"></td>
                                            <td>{{$cat->copyright_notice}}</td>
                                            <td><a href="{{route(Session::get('identity').'.homefootcol1.edit')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a></td>
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


