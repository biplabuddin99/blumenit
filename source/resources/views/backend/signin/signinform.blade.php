@extends('layout.auth')

@section('title', 'Login')

@section('content')
    
@php
    $head=App\Models\Headerview::all();
@endphp

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center">
                    <a href="index.html">
                        <span><img src="{{asset($head[0]->logo_image )}}" alt="" height="22"></span>
                    </a>
                    <p class="text-muted mt-2 mb-4">Admin Login</p>
                </div>
                <div class="card">

                    <div class="card-body p-4">
                        
                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Sign In</h4>
                        </div>

                        <form method="post" action="{{route('signin.varify')}}">

                            @csrf

                            <div class="form-group mb-3">
                                <label for="emailaddress">User Name</label>
                                <input class="form-control"  name="username" type="text" id="emailaddress" placeholder="Enter your username">
                            </div>

                            <div class="form-group mb-3 has-danger">
                                <label for="password">Password</label>
                                <input class="form-control form-control-danger" name="password" type="password" id="password" placeholder="Enter your password">
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                            </div>

                        </form>

                    </div> <!-- end card-body -->

                    <div class="row">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>Forgot your password?</a></p>
                        </div> <!-- end col -->
                    </div><!-- end row -->
                </div><!-- end card -->
            </div> <!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page -->


@endsection




        
