@extends('layout.frontend.front')
@section('title','Customer Order List')
@section('content')
  <div class="cs-height_35 cs-height_lg_35"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-2">
        <div class="cs-filter_sidebar">
          <div class="cs-mobile_filter_cross">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Close Circle</title><path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M320 320L192 192M192 320l128-128"/></svg>
          </div>
          
          <div class="cs-sidebar_widget">
            <h3 class="cs-sidebar_widget_title">User Panel </h3>
            <ul class="cs-checkbox_list">
                <li><a href="{{route('front.cprofile')}}" class="text-info">Change Profile</a></li>
                <li><a href="{{route('front.corderlist')}}">Order List</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-10">
        <div class="cs-seciton_heading cs-style4">
          <h2 class="cs-seciton_title">User Profile</h2>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
        @if(Session::has('response'))
            <div class="cs-alert {{Session::get('response')['class']}} mb-2">
              <span>{{Session::get('response')['message']}}</span>
              <a href="javascript:void(0)" class="close float-end" data-dismiss="cs-alert">&times;</a>
            </div>
		@endif
        <div class="cs-card_grip_5">
        <form action="{{route('front.customer.profileup')}}?type=edit" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="cs-card_12">
                <div class="cs-height_25 cs-height_lg_25"></div>
                <div class="cs-card_in delivery_form">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label">
                            First Name<span>*</span>
                            </label>
                            <input type="text" name="first_name" disabled value="{{$user->first_name}}" class="form-control">
                            @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">
                            Last Name<span>*</span>
                            </label>
                            <input type="text" name="last_name" disabled value="{{$user->last_name}}" class="form-control">
                            @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">
                            E-mail<span>*</span>
                            </label>
                            <input type="text" name="email" disabled value="{{$user->email}}" class="form-control">
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">
                            Mobile Number<span>*</span>
                            </label>
                            <div class="cs-input_group">
                            <select class="form-select" disabled name="contact_ext">
                                @if($context)
                                    @foreach($context as $cext)    
                                        <option value="{{$cext->ext}}" @if($cext->ext==$user->contact_ext) selected @endif>{{$cext->ext}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <input type="text" disabled value="{{$user->contact}}" name="contact" class="form-control" placeholder="55XXXXXXX">
                            </div>
                            @error('contact')<small class="text-danger">{{ $message }}</small>@enderror
                            @error('contact_ext')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">
                            Address
                            </label>
                            <textarea name="address" disabled class="form-control" cols="30" rows="4">{{$user->address}}</textarea>
                            @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_30 cs-height_lg_30"></div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="">
                                <label class="form-label">
                                Postal Code/Zip<span>*</span>
                                </label>
                                <input type="text" disabled name="zip" class="form-control" value="{{$user->zip}}">
                                @error('zip')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div>
                                <label class="form-label">
                                Country<span>*</span>
                                </label>
                                <select class="form-select" disabled name="country_id" onchange="set_state(this.value)">
                                    <option value="">Select Country</option>
                                @if($country)
                                    @foreach($country as $c)
                                        <option @if($user->country_id==$c->id) selected @endif value="{{$c->id}}">{{$c->country}}</option>
                                    @endforeach
                                @endif
                                </select>
                                @error('country_id')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">
                            State<span>*</span>
                            </label>
                            <select class="form-select" disabled name="state_id" id="state_id" onchange="set_city(this.value)">
                                <option value="">Select State</option>
                            @if($state)
                                @foreach($state as $c)
                                    <option value="{{$c->id}}" class="state st{{$c->country_id}}">{{$c->state}}</option>
                                @endforeach
                            @endif
                            </select>
                            @error('state_id')<small class="text-danger">{{ $message }}</small>@enderror
                        
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">
                            City<span>*</span>
                            </label>
                            <select class="form-select" disabled name="city_id" id="city_id">
                                <option value="">Select City</option>
                            @if($city)
                                @foreach($city as $c)
                                    <option value="{{$c->id}}" class="city ct{{$c->state_id}}">{{$c->city}}</option>
                                @endforeach
                            @endif
                            </select>
                            @error('city_id')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="cs-height_20 cs-height_lg_20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <div class="text-start update_now">
                <button type="button" onclick="enable_update()" class="cs-btn cs-style5 cs-type1 cs-color1">Do you want to update now?</button>
            </div>
            <div class="text-end upbtn hidden">
                <button type="submit" class="cs-btn cs-style5 cs-type1 cs-color2">Update</button>
                <button type="button" onclick="disable_update()" class="cs-btn cs-style5 cs-type1 cs-color-danger">Cancel</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_80 cs-height_lg_60"></div>

@endsection

@push('scripts')
<script>
  function enable_update(){
      $('.upbtn').show();
      $('.update_now').hide();
      $('input, select, textarea').removeAttr('disabled');
  }
  @if ($errors->any())
    enable_update()
  @endif
  function disable_update(){
      $('.upbtn').hide();
      $('.update_now').show();
      $('input, select, textarea').attr('disabled','disabled');
  }



  function set_state(c){
        $('.state').hide();
        if(c){
            var c=c.split('~');
            $('.st'+c[0]).show();
        }
    }
    function set_city(c){
        $('.city').hide();
        if(c){
            var c=c.split('~');
            $('.ct'+c[0]).show();
        }
    }
    @if($user->state_id)
        set_state('{{$user->country_id}}')
        $('#state_id').val('{{$user->state_id}}')
    @endif

    @if($user->city_id)
        set_city('{{$user->state_id}}')
        $('#city_id').val('{{$user->city_id}}')
    @endif
</script>
 
@endpush