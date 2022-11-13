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
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                    </div>
                    <h4 class="page-title">My Account</h4>
                </div>
            </div>
        </div>   
        <!-- end page title --> 

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card-box">
                    <h4 class="mt-0 mb-3 header-title">My Account</h4>
						<form autocomplete="false" class="form-parsley" action="{{ route(Session::get('identity').'.profile_update',$user->id) }}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{$user->id}}">
							<div class="form-group">
								<label>Full Name <span class="text-danger sup">*</span></label>
								<input type="text" name="name" value="{{ $user->name }}" class="form-control @if($errors->has('name')) {{ 'is-invalid' }} @endif" placeholder="Full Name" />
								@if($errors->has('name'))
									<small class="d-block text-danger mb-3">
										{{ $errors->first('name') }}
									</small>
								@endif
							</div>
							<!--end form-group-->

							<div class="form-group row">
								<div class="col-md-6">
									<label>Mobile Number <span class="text-danger sup">*</span></label>
									<input name="contact" type="text"
										value="{{ $user->contact }}"
										class="form-control  @if($errors->has('contact')) {{ 'is-invalid' }} @endif"
										placeholder="Enter only digits" />
									@if($errors->has('contact'))
										<small class="d-block text-danger mb-3">
											{{ $errors->first('contact') }}
										</small>
									@endif
								</div>

								<div class="col-md-6">
									<label>E-Mail <span class="text-danger sup">*</span></label>
									<div>
										<input type="email" name="email" value="{{ $user->email }}"
											class="form-control @if($errors->has('email')) {{ 'is-invalid' }} @endif"
											placeholder="Enter a valid e-mail" />
									</div>
									@if($errors->has('email'))
										<small class="d-block text-danger mb-3">
											{{ $errors->first('email') }}
										</small>
									@endif
								</div>
							</div>
							<!--end form-group-->

							<div class="form-group row">
								<div class="col-md-12">
									<label>Username <span class="text-danger sup">*</span></label>
									<input type="text" name="username" value="{{ $user->username }}"
										class="form-control @if($errors->has('username')) {{ 'is-invalid' }} @endif"
										placeholder="Username" />
									@if($errors->has('username'))
										<small class="d-block text-danger mb-3">
											{{ $errors->first('username') }}
										</small>
									@endif
								</div>
							</div>
							<!--end form-group-->

							<div class="form-group row">
								<div class="col-md-6">
									<label>Password <span class="text-danger sup">*</span></label>
									<div>
										<input type="password" autocomplete="new-password" name="password" value="" class="form-control @if($errors->has('password')) {{ 'is-invalid' }} @endif" placeholder="******" />
									</div>
									@if($errors->has('password'))
										<small class="d-block text-danger mb-3">
											{{ $errors->first('password') }}
										</small>
									@endif
								</div>
								<!--end form-group-->
								<div class="col-md-6">
									<label>Confirm Password</label>
									<div>
										<input type="password" name="password_confirmation" class="form-control" placeholder="******" />
									</div>
								</div>
							</div>

							<div class="form-group mb-0">
								<button type="submit" class="btn btn-primary waves-effect waves-light">
									Submit
								</button>
								<button type="reset" class="btn btn-danger waves-effect m-l-5">
									Cancel
								</button>
							</div><!--end form-group-->
						</form><!--end form-->
					</div><!--end card-body-->
				</div><!--end card-->
			</div> <!-- end col -->
		</div> <!-- end row -->
	</div><!-- container -->
</div>
<!-- end page-wrapper -->
@endsection