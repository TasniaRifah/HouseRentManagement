<header class="header mb-3 sticky-top">
    <!--
      *** TOPBAR ***   _________________________________________________________
    -->
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offer mb-3 mb-lg-0" style="text-align:right">
                    <h4 style="color:aqua"> House Rent Management System </h4>
                </div>
                <div class="col-lg-4 text-center text-lg-right">
                    <ul class="menu list-inline mb-0 " style="padding-top:3px;">
                        
                        @auth
                        <li class="list-inline-item"> 
                            @if(Auth::user()->role_id == 1 | Auth::user()->role_id == 2)
                                <a href="{{ route('backend.index') }}">{{ (Auth::user()->name)."'s Dashboard" }}</a>
                            @elseif(Auth::user()->role_id == 3)

                                <a href="{{ route('customer.bookingList', auth()->user()->name ?? '') }}">{{ (Auth::user()->name)."'s Dashboard" }}</a>
                            @endif
                        </li>
                        @endauth
                            
                        @guest 
                            <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                            <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                        @endguest 
                        

                        <li class="list-inline-item"><a href="contact.html">Contact</a></li>
                        <li class="list-inline-item"><a href="#">Recently viewed</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <x-frontend.layout.partial.login-modal />
        <!-- <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true"
            class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email-model" type="email" name="email" placeholder="email" :value="old('email')"
                                    required autofocus class="form-control">
                            </div>
                            <div class="form-group">
                                <input id="password-modal" type="password" name="password" required
                                    autocomplete="current-password" placeholder="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end form-group">
                                @if (Route::has('password.request'))
<a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
@endif
                                <p class="text-center">
                                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                </p>
                        </form>
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="{{ route('register') }}"><strong>Register now</strong></a>! It
                            is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- *** TOP BAR END ***-->


    </div>
    <div class="">
        <nav class="navbar navbar-expand-lg ">
            <div class="container"><a href="{{ route('Homepage') }}" class="navbar-brand home"><img
                        src="{{ asset('ui/frontend/img/logo2.png') }}" alt="Obaju logo"
                        class="d-none d-md-inline-block" height="80"><img src="img/logo-small.png" alt="Obaju logo"
                        class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
                <div class="navbar-buttons">
                    <button type="button" data-toggle="collapse" data-target="#navigation"
                        class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle
                            navigation</span><i class="fa fa-align-justify"></i></button>
                    <button type="button" data-toggle="collapse" data-target="#search"
                        class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i
                            class="fa fa-search"></i></button><a href="basket.html"
                        class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
                </div>
                <div id="navigation" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('Homepage') }}" class="nav-link active">Home</a></li>

                        {{-- @foreach ($categories as $category) --}}
                        <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown"
                                data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Category<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">
                                      
                                        <ul class="list-unstyled mb-3">
                                            @foreach ($categories as $category)
                                          
                                            <li class="nav-item">
                                                <a href="{{ route('categories.products' , ['category' => $category->id]) }}" class="nav-link">{{ $category->categories_name }}</a>
                                            </li>
                                           
                                            @endforeach
                                            
                                          </ul>
                                   

                </div>
                </li>
                </ul>
                </li>


                </ul>
                <div class="navbar-buttons d-flex justify-content-end">
                    <!-- /.nav-collapse-->
                    <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse"
                        href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span
                            class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
                    <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a
                            href="{{route('carts.index')}}" class="btn btn-primary navbar-btn"><i
                                class="fa fa-shopping-cart"></i><span id="cartItemCount">{{ count($cartItems) }} items in cart</span></a></div>
                </div>
            </div>
    </div>
    </nav>

    <div id="search" class="collapse">
        <div class="container">
            <form role="search" class="ml-auto">
                <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>
