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
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Category</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title mb-3">Category List</h4>
                    @if(Session::has('response'))
                      <div class="alert alert-{{Session::get('response')['class']}}">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{Session::get('response')['message']}}
                      </div>
				    @endif
				    <div class="row">
                        <div class="col-sm-6 offset-sm-2">
                            <form method="get" action="{{route(Session::get('identity').'.categoryy.index')}}">
                            <div class="input-group">
                              <input type="text" class="form-control" value="{{$search}}" placeholder=" Name" aria-label=" Name" name="name">
                              <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-sm-4 text-right pb-2">
                            <a href="{{route(Session::get('identity').'.categoryy.create')}}" class="btn btn-primary btn-rounded width-sm waves-effect">Add New</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>For Games?</th>
                                    <th>Featured?</th>
                                    <th>Show Category Page?</th>
                                    <th>Category Page Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($category)
                                    @foreach($category as $cat)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$cat->name}}</td>
                                            <td>{{$cat->is_game==1?"Yes":"No"}}</td>
                                            <td>{{$cat->feature_cat==1?"Yes":"No"}}</td>
                                            <td>{{$cat->show_catpage==1?"Yes":"No"}}</td>
                                            <td>{{$cat->cat_page_order}}</td>
                                            <td>
                                                <a href="{{route(Session::get('identity').'.categoryy.edit',$cat->id)}}" class="btn btn-primary btn-rounded width-sm waves-effect">Edit</a>
                                                {{--<button type="button" class="btn btn-danger btn-rounded width-sm waves-effect waves-light">Delete</button>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $category->appends($_GET)->links('pagination::bootstrap-4') }}
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

