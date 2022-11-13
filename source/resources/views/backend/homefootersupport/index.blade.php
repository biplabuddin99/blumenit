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
                            <li class="breadcrumb-item active">Home Footer Support</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Home Footer Support</h4>
                </div>
            </div>
        </div>    
        <!-- end page title --> 

        <div class="row">
           
            <div class="col-md-12">
                <div class="card-box">
                    
                    <h4 class="mt-0 header-title mb-3">Home Footer options</h4>
                    @if(Session::has('response'))
                      <div class="alert alert-{{Session::get('response')['class']}}">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{Session::get('response')['message']}}
                      </div>
				            @endif
                    <div>
                        <div class="mb-0">
                            
                            <div class="d-flex row">
                                @if($data)
                              
                                    @foreach($data as $cat)
                                    <div class="col-1">
                                      {{ $loop->iteration }}
                                    </div>
                                    <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                          <div class="cs-info_icon">
                                            @if($cat->image_1st)
                                              <img src="{{asset($cat->image_1st)}}" alt="" width="49" height="49">
                                            @else
                                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50">
                                                <defs>
                                                  <clipPath id="care-clip-path">
                                                    <rect width="50" height="50" transform="translate(225 4571)" fill="#fff" stroke="#707070" stroke-width="1"/>
                                                  </clipPath>
                                                </defs>
                                                <g transform="translate(-225 -4571)" clip-path="url(#care-clip-path)">
                                                  <g transform="translate(225.005 4571)">
                                                    <path d="M25,4.99a8.965,8.965,0,0,0-8.936,8.936v1.709c4.336.3,6.191-.693,10.674-2.383,2.832-.811,4.277.732,7.2,2.441V13.926A8.959,8.959,0,0,0,25,4.99Z" fill="#9ea6bf" fill-rule="evenodd"/>
                                                    <path d="M16.064,15.635v3.779a7.414,7.414,0,0,0,.068,1.045,8.925,8.925,0,0,0,16.279,3.916,8.812,8.812,0,0,0,1.455-3.916,9.239,9.239,0,0,0,.059-1.045V15.693c-2.92-1.709-4.355-3.252-7.2-2.441-4.473,1.68-6.328,2.686-10.664,2.383Z" fill="#f5c6af" fill-rule="evenodd"/>
                                                    <path d="M11.934,16.865V17.9a2.567,2.567,0,0,0,2.559,2.559h1.641a9.233,9.233,0,0,1-.068-1.045V14.307H14.492A2.561,2.561,0,0,0,11.934,16.865Z" fill="#cfd3df" fill-rule="evenodd"/>
                                                    <path d="M33.936,15.693v3.721a9.239,9.239,0,0,1-.059,1.045h1.641a2.576,2.576,0,0,0,2.275-1.387,2.5,2.5,0,0,0,.283-1.172V16.865a2.567,2.567,0,0,0-2.559-2.559H33.945v1.328l-.01.059Z" fill="#cfd3df" fill-rule="evenodd"/>
                                                    <path d="M20.732,27.246v4.082L25,34.209l4.268-2.881V27.246a8.872,8.872,0,0,1-8.535,0Z" fill="#f2b394" fill-rule="evenodd"/>
                                                    <path d="M23.232,41.24l-1.768,7.783h7.08L26.768,41.24Z" fill="#ff6c8a" fill-rule="evenodd"/>
                                                    <path d="M21.924,36.289l1.318,4.951h3.525l1.318-4.951L25,34.209Z" fill="#ff6c8a" fill-rule="evenodd"/>
                                                    <path d="M17,32.441l2.734,5.322,2.188-1.475L25,34.209l-4.268-2.881c-1.113.371-2.4.713-3.73,1.113Z" fill="#cbf4fb" fill-rule="evenodd"/>
                                                    <path d="M29.268,31.328,25,34.209l3.076,2.08,2.188,1.475,2.725-5.322C31.67,32.041,30.381,31.7,29.268,31.328Z" fill="#cbf4fb" fill-rule="evenodd"/>
                                                    <path d="M33,32.441l-2.725,5.322-2.187-1.475L26.768,41.24l1.777,7.783H43.105V41.4c-.1-5.537-5.391-7.559-10.107-8.955Z" fill="#98eaf9" fill-rule="evenodd"/>
                                                    <path d="M17,32.441c-4.707,1.4-10,3.418-10.1,8.955v7.627H21.465l1.777-7.783-1.318-4.951-2.2,1.475Z" fill="#98eaf9" fill-rule="evenodd"/>
                                                    <g>
                                                      <path d="M44.072,41.387c-.107-6.8-7.061-8.8-12.129-10.273-.6-.176-1.162-.332-1.7-.5v-2.8a10.047,10.047,0,0,0,2.676-2.461h3.086a2.747,2.747,0,0,0,2.744-2.744v-3.32a3.486,3.486,0,0,0,.283-1.387V16.865a3.418,3.418,0,0,0-.283-1.387V13.77a13.755,13.755,0,1,0-27.51-.01v1.7a3.505,3.505,0,0,0-.293,1.4v1.035a3.534,3.534,0,0,0,3.535,3.535h.811A9.944,9.944,0,0,0,19.746,27.8v2.8q-.806.249-1.7.5C12.979,32.568,6.025,34.58,5.918,41.377v7.646A.979.979,0,0,0,6.895,50H9.785a.977.977,0,1,0,0-1.953h-1.9V41.406a6.4,6.4,0,0,1,3.428-5.6,22.111,22.111,0,0,1,5.2-2.2l2.363,4.6a.991.991,0,0,0,1.416.361l1.055-.713.9,3.4-1.553,6.787H18.564a.977.977,0,0,0,0,1.953H43.1a.979.979,0,0,0,.977-.977V41.387ZM31.4,32.988l.2.059L29.9,36.338l-3.164-2.129L29.414,32.4c.635.2,1.289.391,1.982.586Zm-6.4,2.4,1.963,1.318-.947,3.555H23.994l-.947-3.555Zm0-2.363L21.709,30.8V28.74A9.956,9.956,0,0,0,25,29.307a9.67,9.67,0,0,0,3.291-.566v2.051Zm7.959-19.092c-.01-.01-.029-.02-.039-.029-2-1.279-3.73-2.373-6.445-1.6-.029.01-.049.02-.078.029-.576.215-1.094.42-1.6.615-3.086,1.191-4.775,1.836-7.744,1.758v-.781a7.959,7.959,0,0,1,15.918,0l-.01.01Zm3.848,8.672a.788.788,0,0,1-.791.791H34.072a10.245,10.245,0,0,0,.635-1.963h.811a3.571,3.571,0,0,0,1.3-.244l-.01,1.416Zm.283-4.717a1.582,1.582,0,0,1-1.582,1.582h-.6v-4.2h.6a1.588,1.588,0,0,1,1.582,1.582v1.035Zm-22.6,1.592A1.588,1.588,0,0,1,12.91,17.9V16.865a1.588,1.588,0,0,1,1.582-1.582h.6v4.2Zm.615-6.152h-.615a3.519,3.519,0,0,0-1.289.244,11.8,11.8,0,0,1,23.6,0,3.571,3.571,0,0,0-1.3-.244h-.615a9.91,9.91,0,0,0-19.785,0ZM17.1,20.361h0a7.591,7.591,0,0,1-.059-.947V16.66c3.34.078,5.332-.684,8.447-1.885.488-.186,1-.381,1.553-.6,1.846-.518,2.91.156,4.824,1.377.332.215.693.439,1.084.684V19.4a7.872,7.872,0,0,1-1.074,3.984H25a.977.977,0,1,0,0,1.953h5.283A7.955,7.955,0,0,1,17.1,20.361Zm3,15.977-1.689-3.291.2-.059c.693-.2,1.357-.391,1.973-.586l2.676,1.807Zm2.588,11.709,1.328-5.83h1.973l1.328,5.83Zm19.434,0h-12.8L27.764,41.26l.908-3.4,1.055.713a.991.991,0,0,0,1.416-.361l2.354-4.6a22.528,22.528,0,0,1,5.2,2.2,6.4,6.4,0,0,1,3.428,5.6v6.641Z" fill="#020288"/>
                                                      <path d="M38.262,43.164H33.34a.977.977,0,0,0,0,1.953h4.922a.977.977,0,0,0,0-1.953Z" fill="#020288"/>
                                                      <path d="M14.18,48.047a.977.977,0,0,0,0,1.953h0a.977.977,0,0,0,0-1.953Z" fill="#020288"/>
                                                    </g>
                                                  </g>
                                                </g>
                                              </svg>
                                            @endif
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_1st}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_1st}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                      <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                        <div class="cs-info_icon">
                                            @if($cat->image_2nd)
                                              <img src="{{asset($cat->image_2nd)}}" alt="" width="49" height="49">
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50">
                                              <defs>
                                                <clipPath id="quote-clip-path">
                                                  <rect width="50" height="50" transform="translate(606 4571)" fill="#fff" stroke="#707070" stroke-width="1"/>
                                                </clipPath>
                                              </defs>
                                              <g transform="translate(-606 -4571)" clip-path="url(#quote-clip-path)">
                                                <g transform="translate(606 4571)">
                                                  <path d="M29.949,40.182v-.435l.129-4.2,6.647-11.513V9.745H33.794a.98.98,0,0,1-.977.977h-21.5a.98.98,0,0,1-.977-.977H7.413V45.115H36.725V32.828l-2.839,4.918Z" fill="#a4fbc4" fill-rule="evenodd"/>
                                                  <g>
                                                    <path d="M22.069,5.837a.977.977,0,0,0,0-1.954h0A.977.977,0,0,0,22.069,5.837Z" fill="#020288"/>
                                                    <path d="M16.207,26.844H27.931a.977.977,0,0,0,.977-.977V15.119a.977.977,0,0,0-.977-.977H16.207a.977.977,0,0,0-.977.977V25.867a.977.977,0,0,0,.977.977ZM21.092,16.1h1.954v2.816l-.54-.27a.977.977,0,0,0-.874,0l-.54.27Zm-3.908,0h1.954v4.4a.977.977,0,0,0,1.414.874l1.517-.759,1.517.759A.977.977,0,0,0,25,20.493V16.1h1.954V24.89H17.184Z" fill="#020288"/>
                                                    <path d="M47.439,15.652a.977.977,0,0,0-.455-.593l-3.808-2.2a.977.977,0,0,0-1.335.358l-.231.4V7.791A2.934,2.934,0,0,0,38.679,4.86H34.508a1.955,1.955,0,0,0-1.692-.977h-5.96a4.892,4.892,0,0,0-9.575,0h-5.96A1.955,1.955,0,0,0,9.63,4.86H5.459A2.934,2.934,0,0,0,2.528,7.791V47.069A2.934,2.934,0,0,0,5.459,50h33.22a2.934,2.934,0,0,0,2.931-2.931V26.321l5.731-9.927a.977.977,0,0,0,.1-.741ZM18.161,5.837a.977.977,0,0,0,.977-.977A2.931,2.931,0,0,1,25,4.86a.977.977,0,0,0,.977.977h6.839V9.745h-21.5V5.837h6.839Zm21.5,41.232a.978.978,0,0,1-.977.977H5.459a.978.978,0,0,1-.977-.977V7.791a.978.978,0,0,1,.977-.977H9.367V9.745A1.956,1.956,0,0,0,11.321,11.7h21.5a1.956,1.956,0,0,0,1.954-1.954V6.814h3.908a.978.978,0,0,1,.977.977V17L32.542,29.326H11.321a.977.977,0,0,0,0,1.954H31.414l-1.151,1.993H11.321a.977.977,0,0,0,0,1.954H29.155a.976.976,0,0,0-.054.291l-.1,3.4c-.128-.089-.258-.2-.407-.319a3.688,3.688,0,0,0-5.176,0,1.78,1.78,0,0,1-2.691,0,3.689,3.689,0,0,0-5.176,0,1.878,1.878,0,0,1-1.345.615.977.977,0,0,0,0,1.954,3.778,3.778,0,0,0,2.588-1.061,1.78,1.78,0,0,1,2.691,0,3.689,3.689,0,0,0,5.176,0,1.78,1.78,0,0,1,2.691,0,3.778,3.778,0,0,0,2.588,1.061.977.977,0,0,0,.514-.146l3.95-2.444a.977.977,0,0,0,.332-.342l4.924-8.529ZM33.162,37.045,30.968,38.4l.079-2.579,12-20.782,2.115,1.221Z" fill="#020288"/>
                                                  </g>
                                                </g>
                                              </g>
                                            </svg>
                                            @endif
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_2nd}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_2nd}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                      <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                        <div class="cs-info_icon">
                                            @if($cat->image_1st)
                                              <img src="{{asset($cat->image_3rd)}}" alt="" width="49" height="49">
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50">
                                              <defs>
                                                <clipPath id="wholesale-clip-path">
                                                  <rect width="50" height="50" transform="translate(1027 4571)" fill="#fff" stroke="#707070" stroke-width="1"/>
                                                </clipPath>
                                              </defs>
                                              <g transform="translate(-1027 -4571)" clip-path="url(#wholesale-clip-path)">
                                                <g transform="translate(1027.186 4571.176)">
                                                  <rect width="18.794" height="18.794" transform="translate(21.169 18.484)" fill="#e2c4ff"/>
                                                  <g>
                                                    <rect width="3.614" height="1.962" transform="translate(23.833 20.642)" fill="#020288"/>
                                                    <rect width="3.614" height="1.962" transform="translate(33.736 20.642)" fill="#020288"/>
                                                    <rect width="3.614" height="1.962" transform="translate(33.736 27.241)" fill="#020288"/>
                                                    <rect width="3.614" height="1.962" transform="translate(23.833 27.241)" fill="#020288"/>
                                                    <rect width="3.614" height="1.962" transform="translate(23.833 33.839)" fill="#020288"/>
                                                    <rect width="3.614" height="1.962" transform="translate(33.736 33.839)" fill="#020288"/>
                                                    <path d="M47.243,47.862V12.784L24.9-.134l-.083-.041L2.385,12.784V33.323H4.347V13.951L24.814,2.158,45.291,13.951V47.862H37.505a3.41,3.41,0,0,0,.558-1.342h3.253a2.574,2.574,0,0,0,2.633-2.633V39.756a2.564,2.564,0,0,0-2.478-2.623V19.971a2.628,2.628,0,0,0-2.551-2.633H22.253A2.628,2.628,0,0,0,19.7,19.971V37.144H18.36V23.11H16.4v1.652H12.6a2.537,2.537,0,0,0-2.282,1.4L4.389,37.288a2.025,2.025,0,0,0-.351,1.239v5.359A2.574,2.574,0,0,0,6.671,46.52H8.292a6.053,6.053,0,0,0,.578,1.342H-.093v1.962H49.721V47.862ZM6.671,37.144l5.318-10.078a.712.712,0,0,1,.609-.341h3.81V37.144ZM21.665,23.936V19.961a.656.656,0,0,1,.589-.671h7.352v4.637H21.665Zm0,6.6V25.9h7.941v4.637Zm0,6.609V32.507h7.941v4.637Zm9.9-13.207V19.3H38.92a.656.656,0,0,1,.589.671v3.976H31.568Zm0,6.6V25.9h7.941v4.637Zm0,6.609V32.507h7.941v4.637Zm10.419,2.623V43.9a.629.629,0,0,1-.671.671H38.052a4.277,4.277,0,0,0-5.019-3.211,4.19,4.19,0,0,0-3.315,3.211H16.6a4.277,4.277,0,0,0-5.019-3.211,4.19,4.19,0,0,0-3.315,3.211H6.66a.629.629,0,0,1-.671-.671V39.106H41.316A.621.621,0,0,1,41.987,39.767ZM16.594,46.52H29.729a6.053,6.053,0,0,0,.578,1.342H16.016A5.851,5.851,0,0,0,16.594,46.52Zm-1.838-.971a2.318,2.318,0,1,1-2.313-2.323A2.276,2.276,0,0,1,14.756,45.549Zm21.458,0a2.323,2.323,0,1,1-2.323-2.323A2.276,2.276,0,0,1,36.214,45.549Z" fill="#020288"/>
                                                    <path d="M29.915,7.838l-5.1-3.067-5.1,3.067V15.18H29.926V7.838ZM23.833,7.7v5.514H21.665V8.994Zm1.962,5.5V7.7L27.964,9v4.213H25.8Z" fill="#020288"/>
                                                  </g>
                                                  <path d="M12.908,28.222,9.5,35.8h5.256v-7.58Z" fill="#ffbdbc"/>
                                                </g>
                                              </g>
                                            </svg>
                                            @endif
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_3rd}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_3rd}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                      <div class="col-2">
                                        <div class="cs-info cs-type1" data-wow-duration="1s" data-wow-delay="0.3s">
                                        <div class="cs-info_icon">
                                            @if($cat->image_1st)
                                              <img src="{{asset($cat->image_4th)}}" alt="" width="49" height="49">
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50">
                                              <defs>
                                                <clipPath id="insurence-clip-path">
                                                  <rect width="50" height="50" transform="translate(1464 4571)" fill="#fff" stroke="#707070" stroke-width="1"/>
                                                </clipPath>
                                              </defs>
                                              <g transform="translate(-1464 -4571)" clip-path="url(#insurence-clip-path)">
                                                <g transform="translate(1463.99 4571)">
                                                  <path d="M41.035,12.227,25.977,2.412V.977a.977.977,0,0,0-1.953,0V2.412L8.965,12.227a.976.976,0,0,0-.439.82V49.023A.979.979,0,0,0,9.5,50H40.518a.979.979,0,0,0,.977-.977V13.047a.994.994,0,0,0-.459-.82ZM25,12.861a.979.979,0,0,0,.977-.977V11.23a1.963,1.963,0,1,1-1.953,0v.654A.979.979,0,0,0,25,12.861ZM39.531,48.047H10.469V13.574L24.023,4.746V9.141a3.916,3.916,0,1,0,1.953,0V4.746l13.555,8.828Z" fill="#020288"/>
                                                  <path id="Path_100" data-name="Path 100" d="M14.189,25.068H35.811V46.758H14.189Z" fill="#f9ca78"/>
                                                  <path id="Path_101" data-name="Path 101" d="M22.363,42.822a1.062,1.062,0,0,1-.381-.078.981.981,0,0,1-.527-1.279L26.66,29.092a.978.978,0,1,1,1.807.752l-5.2,12.373a.992.992,0,0,1-.908.605Z" fill="#020288"/>
                                                  <path id="Path_102" data-name="Path 102" d="M20.879,35.205a3.472,3.472,0,0,1-3.271-3.643,3.472,3.472,0,0,1,3.271-3.643,3.472,3.472,0,0,1,3.271,3.643A3.472,3.472,0,0,1,20.879,35.205Zm0-5.332a1.742,1.742,0,0,0,0,3.379,1.742,1.742,0,0,0,0-3.379Z" fill="#020288"/>
                                                  <path d="M28.867,43.662a3.664,3.664,0,0,1,0-7.285,3.664,3.664,0,0,1,0,7.285Zm0-5.332a1.742,1.742,0,0,0,0,3.379,1.742,1.742,0,0,0,0-3.379Z" fill="#020288"/>
                                                </g>
                                              </g>
                                              <g>
                                                <path d="M13.926,23.525l-1.7-4.7h1.26l1.064,3.34,1.064-3.34h1.26l-1.7,4.7Z" fill="#020288"/>
                                                <path d="M18.105,22.471l-.332,1.055H16.621l1.621-4.7h1.211l1.621,4.7H19.922l-.332-1.055H18.105Zm.732-2.422L18.4,21.533h.889Z" fill="#020288"/>
                                                <path d="M22.988,19.854v3.672H21.846V19.854H20.83V18.828H24v1.025H22.988Z" fill="#020288"/>
                                                <path d="M27.734,19.854v3.672H26.592V19.854H25.576V18.828H28.75v1.025H27.734Z" fill="#020288"/>
                                                <path d="M30,22.471l-.332,1.055H28.516l1.621-4.7h1.211l1.621,4.7H31.816l-.332-1.055H30Zm.732-2.422-.439,1.484h.889Z" fill="#020288"/>
                                                <path d="M35.186,20.264l.791-1.436h1.348l-1.465,2.324,1.484,2.363h-1.27L35.186,22,34.3,23.516h-1.27l1.484-2.363-1.465-2.324h1.348Z" fill="#020288"/>
                                              </g>
                                            </svg>
                                            @endif
                                          </div>
                                          <div class="cs-info_right">
                                            <h3 class="cs-info_title">{{$cat->header_4th}}</h3>
                                            <div class="cs-info_subtitle">{{$cat->details_4th}}</div>
                                          </div>
                                        </div><!-- .cs-info -->
                                    </div>

                                     
                                    <div class="col-2">
                                      <a href="{{route(Session::get('identity').'.footersupport.edit',$cat->id)}}" class="btn btn-primary btn-sm btn-rounded width-xs waves-effect">Edit</a>
                                      </div>
                                    @endforeach
                                @endif
                           
                           
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

 <!-- custom css -->
 <style>
 .cs-info {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.cs-info .cs-info_icon {
  -webkit-box-flex: 0;
      -ms-flex: none;
          flex: none;
  margin-right: 20px;
}

.cs-info .cs-info_title {
  font-size: 17px;
  font-weight: 600;
  text-transform: uppercase;
  line-height: 25px;
  margin: 0;
}

.cs-info .cs-info_subtitle {
  font-size: 16px;
  line-height: 24px;
  color: #6e6e6e;
  margin-top: 1px;
}

.cs-info.cs-color1 .cs-info_title {
  color: #4d4c4c;
}

.cs-info.cs-color2 .cs-info_title {
  color: #095bff;
}

.cs-info.cs-color3 .cs-info_title {
  color: #fc0000;
}

.cs-info.cs-color4 .cs-info_title {
  color: #1cab8f;
}

.cs-info.cs-type1 .cs-info_title {
  color: #4d4c4c;
}

.cs-info.cs-type1 .cs-info_subtitle {
  font-size: 13px;
  margin-top: 4px;
}
</style>


 
@endpush
@push('script')


 <!-- dropify js -->


 <!-- form-upload init -->
 

@endpush


