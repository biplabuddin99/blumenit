@php
  $footsupport = App\Models\Homefootersupportview::all();
  $footercol1 = App\Models\Footercol1::all();
  $footercol4 = App\Models\Footercol4::all();
  $Social = App\Models\Sociallink::all();
@endphp
<footer class="cs-footer no-print">
    <div class="cs-gray_bg">
      <div class="container">
        <div class="row">
          <ul class="cs-info_list">
            <li>
              <div class="cs-info cs-color1 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="cs-info_icon">
                  @if($footsupport[0]->image_1st)
                  <img src="{{asset($footsupport[0]->image_1st)}}" alt="" width="50" height="50">
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
                  <h3 class="cs-info_title">{{$footsupport[0]->header_1st}}</h3>
                  <div class="cs-info_subtitle">{{$footsupport[0]->details_1st}}</div>
                </div>
              </div><!-- .cs-info -->
            </li>
            <li>
              <div class="cs-info cs-color2 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="cs-info_icon">
                  @if($footsupport[0]->image_2nd)
                    <img src="{{asset($footsupport[0]->image_2nd)}}" alt="" width="50" height="50">
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
                  <h3 class="cs-info_title">{{$footsupport[0]->header_2nd}}</h3>
                  <div class="cs-info_subtitle">{{$footsupport[0]->details_2nd}}</div>
                </div>
              </div><!-- .cs-info -->
            </li>
            <li>
              <div class="cs-info cs-color3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="cs-info_icon">
                  @if($footsupport[0]->image_3rd)
                    <img src="{{asset($footsupport[0]->image_3rd)}}" alt="" width="50" height="50">
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
                  <h3 class="cs-info_title">{{$footsupport[0]->header_3rd}}</h3>
                  <div class="cs-info_subtitle">{{$footsupport[0]->details_3rd}}</div>
                </div>
              </div><!-- .cs-info -->
            </li>
            <li>
              <div class="cs-info cs-color4 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="cs-info_icon">
                  @if($footsupport[0]->image_4th)
                    <img src="{{asset($footsupport[0]->image_4th)}}" alt="" width="50" height="50">
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
                  <h3 class="cs-info_title">{{$footsupport[0]->header_4th}}</h3>
                  <div class="cs-info_subtitle">{{$footsupport[0]->details_4th}}</div>
                </div>
              </div><!-- .cs-info -->
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="cs-main_footer">
      <div class="container wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="cs-footer_row">
          <div class="cs-footer_col cs-first_column">
            <div class="cs-footer_widget">
              <div class="cs-footer_logo">
                <img src="{{asset($footercol1[0]->logo)}}" alt="Logo" width="200" height="200">
              </div>
              <div class="cs-footer_newsletter">
                <h3 class="cs-newsletter_title">{{$footercol1[0]->title}}</h3>
                <div class="cs-newsletter_subtitle">{{$footercol1[0]->text}}</div>
                <form class="cs-newsletter_form">
                  <input type="text" class="cs-newsletter_input" placeholder="Your email address">
                  <button class="cs-newsletter_button">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
          <div class="cs-footer_col cs-middle_column">
            <div class="cs-footer_combine_widgert">
              <div class="cs-footer_widget">
                <h2 class="cs-footer_widget_title">Information</h2>
                <ul class="cs-footer_menu">
                  <li><a href="{{route('front.aboutus')}}">Abour Us</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">Tarms & Conditions</a></li>
                  <li><a href="#">Contect Us</a></li>
                  <li><a href="#">Help</a></li>
                </ul>
              </div>
              <div class="cs-footer_widget">
                <h2 class="cs-footer_widget_title">Customer Service</h2>
                <ul class="cs-footer_menu">
                  <li><a href="#">Payment Methods</a></li>
                  <li><a href="#">Returns</a></li>
                  <li><a href="#">Shipping</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
            <div class="cs-footer_social">
              <h2 class="cs-footer_social_title">Follow with us:  </h2>
              <div class="cs-footer_social_links">
                <a href="{{$Social[0]->facebook}}">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" viewBox="0 0 25 25">
                    <defs>
                      <clipPath id="facebook_clip">
                        <rect width="25" height="25" transform="translate(0 -0.208)" fill="#fff" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g transform="translate(0 0.208)" clip-path="url(#facebook_clip)">
                      <path d="M4.527,0A4.517,4.517,0,0,0,0,4.527V20.264a4.517,4.517,0,0,0,4.527,4.527h8.53V15.1H10.494V11.61h2.562V8.629c0-2.342,1.514-4.493,5-4.493a21.136,21.136,0,0,1,2.456.136L20.433,7.53s-1.065-.01-2.227-.01c-1.258,0-1.459.58-1.459,1.542V11.61h3.787L20.368,15.1H16.747v9.692h3.518a4.517,4.517,0,0,0,4.527-4.527V4.527A4.517,4.517,0,0,0,20.265,0Z" fill="#fff"/>
                    </g>
                  </svg>                 
                </a>
                <a href="{{$Social[0]->twitter}}">                
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="25" viewBox="0 0 24 25">
                    <defs>
                      <clipPath id="twitter_clip">
                        <rect width="24" height="25" transform="translate(0.469 -0.208)" fill="#fff" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g transform="translate(-0.469 0.208)" clip-path="url(#twitter_clip)">
                      <path d="M24.792,2.385a10.3,10.3,0,0,1-2.541,2.626q.015.291.015.658a14.61,14.61,0,0,1-2.412,8,15.452,15.452,0,0,1-2.912,3.312,12.979,12.979,0,0,1-4.062,2.3,14.835,14.835,0,0,1-5.084.858A14.157,14.157,0,0,1,0,17.854a11,11,0,0,0,1.213.07,9.972,9.972,0,0,0,6.318-2.179A4.935,4.935,0,0,1,4.577,14.73a5,5,0,0,1-1.8-2.517,5.084,5.084,0,0,0,2.3-.085,4.957,4.957,0,0,1-2.92-1.753A4.921,4.921,0,0,1,1,7.143V7.08a5.02,5.02,0,0,0,2.3.636A5.052,5.052,0,0,1,1.651,5.9,4.963,4.963,0,0,1,1.04,3.485,5,5,0,0,1,1.728.93,14.482,14.482,0,0,0,6.365,4.683,14.134,14.134,0,0,0,12.21,6.245a4.974,4.974,0,0,1-.134-1.158,4.9,4.9,0,0,1,1.49-3.6,5.088,5.088,0,0,1,7.309.114A10.13,10.13,0,0,0,24.1.37,4.917,4.917,0,0,1,21.87,3.184,10.165,10.165,0,0,0,24.792,2.385Z" transform="translate(-0.221 2.326)" fill="#fff"/>
                    </g>
                  </svg>
                </a>
                <a href="{{$Social[0]->whatsapp}}">              
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" viewBox="0 0 25 25">
                    <defs>
                      <clipPath id="whatsapp_clip">
                        <rect width="25" height="25" transform="translate(-0.177 -0.208)" fill="#fff" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g transform="translate(0.177 0.208)" clip-path="url(#whatsapp_clip)">
                      <path d="M15.775,14.182a7.312,7.312,0,0,1,1.562.7,6.938,6.938,0,0,1,1.434.848.679.679,0,0,1,.032.24,3.373,3.373,0,0,1-.273,1.217,2.149,2.149,0,0,1-1.137,1.049,3.787,3.787,0,0,1-1.634.425,8.652,8.652,0,0,1-3.043-.993,9.131,9.131,0,0,1-2.723-1.89,21.121,21.121,0,0,1-2.37-2.963A5.6,5.6,0,0,1,6.487,9.714V9.586a3.542,3.542,0,0,1,1.185-2.53A1.212,1.212,0,0,1,8.5,6.7a2.53,2.53,0,0,1,.288.024,2.575,2.575,0,0,0,.3.024.658.658,0,0,1,.424.1,1.155,1.155,0,0,1,.248.441q.128.32.528,1.409a9.517,9.517,0,0,1,.4,1.2,1.627,1.627,0,0,1-.552.921q-.552.585-.553.744a.457.457,0,0,0,.08.24,7.221,7.221,0,0,0,1.634,2.194,10.221,10.221,0,0,0,2.418,1.617.709.709,0,0,0,.352.112q.24,0,.865-.777t.833-.777Zm-3.251,8.488a9.79,9.79,0,0,0,3.9-.8,9.9,9.9,0,0,0,5.357-5.357,9.9,9.9,0,0,0,0-7.8,9.9,9.9,0,0,0-5.357-5.357,9.9,9.9,0,0,0-7.8,0A9.9,9.9,0,0,0,3.267,8.713a9.959,9.959,0,0,0,1.121,9.794L3.123,22.238,7,21.005a9.847,9.847,0,0,0,5.525,1.666Zm0-22.133a11.734,11.734,0,0,1,4.684.961,11.937,11.937,0,0,1,6.43,6.43,11.9,11.9,0,0,1,0,9.369,11.937,11.937,0,0,1-6.43,6.43,11.727,11.727,0,0,1-4.684.961,11.891,11.891,0,0,1-5.846-1.505L0,25.329l2.178-6.486A12.006,12.006,0,0,1,1.409,7.929,11.937,11.937,0,0,1,7.84,1.5,11.715,11.715,0,0,1,12.524.537Z" transform="translate(0.428 -0.538)" fill="#fff"/>
                    </g>
                  </svg>
                </a>
                <a href="{{$Social[0]->linkedin}}">                
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" viewBox="0 0 25 25">
                    <defs>
                      <clipPath id="linkedin_clip">
                        <rect width="25" height="25" transform="translate(0.292 -0.208)" fill="#fff" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g transform="translate(-0.292 0.208)" clip-path="url(#linkedin_clip)">
                      <path d="M4.864.008A4.873,4.873,0,0,0,.006,4.867V19.942A4.872,4.872,0,0,0,4.865,24.8H19.941A4.871,4.871,0,0,0,24.8,19.942V4.867A4.873,4.873,0,0,0,19.941.008ZM6.086,4.1a1.952,1.952,0,1,1-.025,3.892H6.037A1.951,1.951,0,1,1,6.086,4.1ZM17.126,9.266c2.464,0,4.31,1.61,4.31,5.071V20.8H17.692V14.77c0-1.514-.542-2.548-1.9-2.548a2.05,2.05,0,0,0-1.922,1.369,2.557,2.557,0,0,0-.123.914V20.8H10.006s.049-10.209,0-11.266H13.75v1.6a3.717,3.717,0,0,1,3.375-1.86ZM4.19,9.531H7.933V20.8H4.19Z" transform="translate(0.326 -0.008)" fill="#fff"/>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="cs-footer_col  cs-last_column">
            <div class="cs-footer_widget">
              <h2 class="cs-footer_widget_title">Get In Tuch</h2>
              <ul class="cs-footer_address_widget">
                <li>
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                    <defs>
                      <clipPath id="location_clip">
                        <rect width="20" height="20" transform="translate(1296 4735)" fill="#39b54a" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g transform="translate(-1296 -4735)" clip-path="url(#location_clip)">
                      <path d="M11.429,1.429c-3.943,0-7.143,2.88-7.143,6.429,0,5.714,7.143,13.571,7.143,13.571s7.143-7.857,7.143-13.571C18.571,4.309,15.372,1.429,11.429,1.429Zm0,10a2.857,2.857,0,1,1,2.857-2.857A2.857,2.857,0,0,1,11.429,11.429Z" transform="translate(1294.571 4733.571)" fill="#39b54a"/>
                    </g>
                  </svg>
                  {{$footercol4[0]->address}}
                </li>
                <li>
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                    <defs>
                      <clipPath id="envlop_clip">
                        <rect width="20" height="20" transform="translate(1296 4809)" fill="#39b54a" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g transform="translate(-1296 -4809)" clip-path="url(#envlop_clip)">
                      <path d="M17.986.984a1.944,1.944,0,0,1,1.429.586A1.941,1.941,0,0,1,20,3V14.988A2,2,0,0,1,17.986,17H2.014a1.944,1.944,0,0,1-1.429-.586A1.941,1.941,0,0,1,0,14.989V3A1.944,1.944,0,0,1,.586,1.569,1.941,1.941,0,0,1,2.014.984Zm0,4.028V3L9.977,8.009,2.014,3V5.011L9.977,9.976Z" transform="translate(1296 4810.007)" fill="#39b54a"/>
                    </g>
                  </svg>
                  {{$footercol4[0]->email}}
                </li>
                <li>
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                    <defs>
                      <clipPath id="call_clip">
                        <rect width="20" height="20" transform="translate(1296 4851)" fill="#39b54a" stroke="#707070" stroke-width="1"/>
                      </clipPath>
                    </defs>
                    <g transform="translate(-1296 -4851)" clip-path="url(#call_clip)">
                      <path d="M17.455,21.428a8.412,8.412,0,0,1-3.929-1.339,25.54,25.54,0,0,1-6.17-4.615A23.431,23.431,0,0,1,2.723,9.306C1.079,6.315,1.359,4.747,1.672,4.077A4.175,4.175,0,0,1,3.309,2.321a7.87,7.87,0,0,1,1.279-.679l.123-.054a1.194,1.194,0,0,1,.98-.09,2.868,2.868,0,0,1,.931.714A15.466,15.466,0,0,1,8.95,5.67a3.441,3.441,0,0,1,.457,1.416,2.239,2.239,0,0,1-.569,1.331c-.058.08-.117.156-.173.23-.34.446-.414.575-.365.806a8.467,8.467,0,0,0,2.062,3.058,8.122,8.122,0,0,0,3.023,2.012c.24.051.372-.026.832-.378.066-.05.134-.1.205-.155a2.249,2.249,0,0,1,1.351-.6h0a3.237,3.237,0,0,1,1.422.5A17.041,17.041,0,0,1,20.642,16.2a2.88,2.88,0,0,1,.717.929,1.2,1.2,0,0,1-.09.982c-.017.037-.035.077-.054.123a7.878,7.878,0,0,1-.683,1.276,4.172,4.172,0,0,1-1.758,1.633,3.009,3.009,0,0,1-1.32.29Z" transform="translate(1294.569 4849.571)" fill="#39b54a"/>
                    </g>
                  </svg>
                  {{$footercol4[0]->contact}}
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="cs-footer_bottom">
            <div class="cs-copyright">{{$footercol1[0]->copyright_notice}}</div>
            <div class="cs-scroll_up">         
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
                <defs>
                  <clipPath id="arrawup_clip">
                    <rect width="32" height="32" transform="translate(1724 4901.333)" fill="#fff" stroke="#707070" stroke-width="1"/>
                  </clipPath>
                </defs>
                <g transform="translate(-1724 -4901.333)" clip-path="url(#arrawup_clip)">
                  <g transform="translate(1724 4903.144)">
                    <path d="M32.17,20.713,16.757,3.3a.705.705,0,0,0-1.081,0L.164,20.714c-.3.337-.178.609.272.609h9.774v8.959a.813.813,0,0,0,.814.813H21.308a.814.814,0,0,0,.814-.813V21.323H31.9C32.346,21.323,32.469,21.051,32.17,20.713Z" transform="translate(0 -3.05)" fill="#fff"/>
                  </g>
                </g>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
