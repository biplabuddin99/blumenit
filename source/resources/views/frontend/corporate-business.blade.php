@extends('layout.frontend.front')
@section('title', 'Corporate Business')
@section('content')
    <div class="cs-slider cs-style1">
        <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="1">
            <div class="cs-slider_wrapper">
                @if ($slide)
                    @foreach ($slide as $item)
                        <div class="cs-slide">
                            <img src="{{asset($item->image)}}" alt="" class="w-100">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="cs-pagination cs-style1 cs-type1"></div>
    </div>
    <div class="cs-height_60 cs-height_lg_60"></div>
    
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                @if(Session::has('response'))
                  <div class="alert alert-{{Session::get('response')['class']}}">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      {{Session::get('response')['message']}}
                  </div>
                @endif
			</div>
		</div>
	</div>
    
    @if($data)
        @foreach($data as $i=>$c)
            @if($i % 2 == 0)
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="cs-image_box_5">
                                <img src="{{asset($c->side_image)}}" alt="" class="w-100">
                            </div>
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-xl-7">
                            <div class="cs-text_box cs-style2">
                                <h2 class="cs-text_box_title"><span>{{$c->title}} <span class="cs-accent_color">{{$c->title_green}}</span></span></h2>
                                <p>{{$c->right_text}}</p>
                            </div>
                            <div class="cs-height_25 cs-height_lg_25"></div>
                            <div class="cs-logos_3">
                                @if($c->logos)
                                    @foreach($c->logos as $i=>$l)
                                        @if($i == 3) @php break; @endphp @endif
                                            <div class="cs-logo_carousel_2"><img src="{{asset($l->logo)}}" alt="Logo"></div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="cs-logos_5">
                        @if($c->logos)
                            @foreach($c->logos as $i=>$l)
                                @if($i > 2)
                                    <div class="cs-logo_carousel_2"><img src="{{asset($l->logo)}}" alt="Logo"></div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="cs-height_30 cs-height_lg_30"></div>
                    <div class="text-center"><a href="#" onclick="get_n('{{$c->title}} {{$c->title_green}}','{{$c->id}}')" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="cs-btn cs-style5 cs-type3 cs-color1">REQUEST</a></div>
                </div>
                <div class="cs-height_50 cs-height_lg_50"></div>
            @else
                <div class="container">
                    <div class="cs-sectoin_wrap_2">
                        <div class="row cs-col_reverse_xl">
                            <div class="col-xl-7">
                                <div class="cs-text_box cs-style2">
                                    <h2 class="cs-text_box_title"><span>{{$c->title}} <span class="cs-accent_color">{{$c->title_green}}</span></span></h2>
                                    <p>{{$c->right_text}}</p>
                                </div>
                                <div class="cs-height_25 cs-height_lg_25"></div>
                                <div class="cs-logos_3">
                                    @if($c->logos)
                                        @foreach($c->logos as $i=>$l)
                                            @if($i == 3) @php break; @endphp @endif
                                                <div class="cs-logo_carousel_2"><img src="{{asset($l->logo)}}" alt="Logo"></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="cs-image_box_5">
                                    <img src="{{asset($c->side_image)}}" alt="" class="w-100">
                                </div>
                                <div class="cs-height_20 cs-height_lg_20"></div>
                            </div>
                        </div>
                        <div class="cs-logos_5">
                            @if($c->logos)
                                @foreach($c->logos as $i=>$l)
                                    @if($i > 2)
                                        <div class="cs-logo_carousel_2"><img src="{{asset($l->logo)}}" alt="Logo"></div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="cs-height_30 cs-height_lg_30"></div>
                        <div class="text-center"><a href="#" onclick="get_n('{{$c->title}} {{$c->title_green}}','{{$c->id}}')" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="cs-btn cs-style5 cs-type3 cs-color1">REQUEST</a></div>
                    </div>
                </div>
                <div class="cs-height_50 cs-height_lg_50"></div>
            @endif
        @endforeach
    @endif

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" action="{{route('front.corporate_inq')}}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="title" id="title_g">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="contact" class="col-form-label">Contact:</label>
                                    <input type="text" class="form-control" id="contact" name="contact">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="address" class="col-form-label">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea rows="4" class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  
@endsection
@push('scripts')
    <script>
        function get_n(e,i){
            $('#staticBackdropLabel').text(e);
            $('#title_g').val(i);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
@endpush