
@php
    $head=App\Models\Headerview::all();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin panel | {{Session::get('identity')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
  <link rel="shortcut icon" href="{{asset($head[0]->favicon )}}">

          @stack('style')

        <!-- App css -->
        <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('asset/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('asset/css/app.min.css')}}" rel="stylesheet" type="text/css" />
   
    </head>

    <body class="menubar-dark">

@include('layout.backend.header')
@include('layout.backend.navbar')


@yield('content')

@include('layout.backend.footer')
@include('layout.backend.rightsidebar')
        <!-- Right bar overlay-->
        <div class="{{asset('rightbar-overlay')}}"></div>

        <!-- Vendor js -->
        <script src="{{asset('asset/js/vendor.min.js')}}"></script>


        @stack('script')
        
        <!-- App js-->
        <script src="{{asset('asset/js/app.min.js')}}"></script>
       
    </body>
</html>


        