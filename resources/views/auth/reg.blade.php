<x-frontend.layout.master>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                          @if ($errors->any())
                          <x-backend.alerts.errors />
                      @endif
                            <h1>New account</h1>
                            <p class="lead">Not our registered customer yet?</p>
                            <p>With registration with us new world of fashion, fantastic discounts and much more opens
                                to you! The whole process will not take you more than a minute!</p>
                            <p class="text-muted">If you have any questions, please feel free to <a
                                    href="contact.html">contact us</a>, our customer service center is working for you
                                24/7.</p>
                            <hr>
                            <form method="POST" action="{{ route('register') }}">
                              @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                        :value="old('name')" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        :value="old('email')" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>
                                        Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <h1>Login</h1>
                            <p class="lead">Already our customer?</p>
                            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada
                                fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor
                                sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae
                                est. Mauris placerat eleifend leo.</p>
                            <hr>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email-model" type="email" name="email" placeholder="email"
                                        :value="old('email')" required autofocus class="form-control">
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
                                        <button  type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                    </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layout.master>
