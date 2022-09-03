<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>House Rent Management</title>
    @stack('css')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    
    <link rel="stylesheet" href="{{asset('ui/frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href=" {{asset('ui/frontend/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{asset('ui/frontend/vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('ui/frontend/vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('ui/frontend/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('ui/frontend/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('ui/frontend/favicon.png')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
   
   <x-frontend.layout.partial.header/>
   {{$slot}}
  <x-frontend.layout.partial.footer/>
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->
    
    
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-2 mb-lg-0">
            <p class="text-center text-lg-left">©2019 Your name goes here.</p>
          </div>
          <div class="col-lg-6">
            <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/">Bootstrapious</a>
              <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="{{asset('ui/frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('ui/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('ui/frontend/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('ui/frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ui/frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js')}}"></script>
    <script src="{{asset('ui/frontend/js/front.js')}}"></script>
    @stack('js')
  </body>
</html>