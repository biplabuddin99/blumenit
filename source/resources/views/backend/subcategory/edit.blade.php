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
                            <li class="breadcrumb-item"><a href="{{route(Session::get('identity').'.subcategory.index')}}">Sub-Category</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sub-Category</h4>
                </div>
            </div>
        </div>   
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">Update Sub-Category</h4>

                    <form class="form-horizontal" role="form" action="{{route(Session::get('identity').'.subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" value={{$subcategory->name}} name="name" class="form-control @if($errors->has('name')) parsley-error @endif" id="inputEmail3" placeholder="Category Name">
                                @if ($errors->has('name'))
                                    <ul class="parsley-errors-list filled">
                                        <li>{{ $errors->first('name') }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="">select</option>
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}" @if($item->id == $subcategory->category_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Icon</label>
                            <div class="col-sm-9">
                                <input type="file" class="dropify" data-height="100" name="cat_icon" data-default-file='{{asset($subcategory->cat_icon)}}'/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <h4 class="header-title mt-0 mb-3">Upload Category Image</h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            @php
                                $i=0;
                            @endphp
                            @if($categoryimage)
                                @foreach ($categoryimage as $i=>$item)
                                    <div class="col-3 oldimgrm">
                                        <div class="form-group mb-3">
                                            <img src="{{asset($item->image)}}" width="100%" height="150px" alt="">
                                            <a href="javascript:void(0)" class="btn btn-danger btn-block" onclick="remove_image('{{ basename(asset($item->image))}}',this)">Delete</a>
                                        </div>
                                    </div> <!-- end col -->
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group row">
                            
                            
                            @for($a=1;$a <= 4; $a++)
                            <div class="col-sm-3">
                                <input type="file" class="dropify" data-height="300" name="image[]"/>
                            </div><!-- end col -->
                            @endfor
                        </div>

                        <div>
                            <input type="hidden" name="old_image" id="old_image">
                        </div>
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-md-1 mr-3">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
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
 <link href="{{asset('asset/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('script')


 <!-- dropify js -->
 <script src="{{asset('asset/libs/dropify/dropify.min.js')}}"></script>

 <!-- form-upload init  -->
 <script src="{{asset('asset/js/pages/form-fileupload.init.js')}}"></script>
<!-- <script>
    var drEvent=$(".dropify").dropify({messages:{default:"Drag and drop a file here or click",replace:"Drag and drop or click to replace",remove:"Remove",error:"Ooops, something wrong appended."},error:{fileSize:"The file size is too big (1M max)."}});
    var oldimageglobal="";
    drEvent.on('dropify.beforeClear', function(event, element){
        oldimageglobal=element.file.name
        return confirm("Do you really want to delete this?");
    });
    
</script>-->
<script>
    function remove_image(e,s){
        if($('#old_image').val()){
            $('#old_image').val($('#old_image').val()+"/"+e);
        }else{
            $('#old_image').val(e);
        }
        $(s).parents('.oldimgrm').remove();
    }
</script>

@endpush

