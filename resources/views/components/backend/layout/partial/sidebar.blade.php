<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="{{ route('backend.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
<!-- users -->
                <a class="nav-link {{ request()->routeIs('users.*')
                    || request()->routeIs('roles.*') ? 'collapse active': 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users & Role
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->routeIs('users.*') 
                    || request()->routeIs('roles.*')   ? 'show': '' }}" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active':'' }}" href="{{ route('users.index')}}">Users</a>
                        <a class="nav-link {{ request()->routeIs('roles.*') ? 'active':'' }}" href="{{ route('roles.index')}}">Roles</a>
                    </nav>
                </div>
<!-- end users -->
<!-- Categories -->
        @can('admin-access')
                <a class="nav-link {{ request()->routeIs('categories.*') ? 'collapse active': 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->routeIs('categories.*')  ? 'show': '' }}" id="collapseCategories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('categories.index')
                            || request()->routeIs('categories.show')
                            || request()->routeIs('categories.edit') ? 'active':'' }}" href="{{ route('categories.index')}}">List</a>
                        <a class="nav-link {{ request()->routeIs('categories.create') ? 'active':'' }}" href="{{ route('categories.create')}}">Add</a>
                    </nav>
                </div>
            @endcan
<!-- end Categories -->
<!-- Products -->
                <a class="nav-link {{ request()->routeIs('products.*') ? 'collapse active': 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->routeIs('products.*')  ? 'show': '' }}" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('products.index')
                            || request()->routeIs('products.show')
                            || request()->routeIs('products.edit') ? 'active':'' }}" href="{{ route('products.index')}}">List</a>
                        <a class="nav-link {{ request()->routeIs('products.create') ? 'active':'' }}" href="{{ route('products.create')}}">Create</a>
                    </nav>
                </div>
<!-- end Products -->
<!-- Sliders -->
                <a class="nav-link {{ request()->routeIs('sliders.*') ? 'collapse active': 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSliders" aria-expanded="false" aria-controls="collapseSliders">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Sliders
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->routeIs('sliders.*')  ? 'show': '' }}" id="collapseSliders" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('sliders.index')
                            || request()->routeIs('sliders.show')
                            || request()->routeIs('sliders.edit') ? 'active':'' }}" href="{{ route('sliders.index')}}">Sliders List</a>
                        <a class="nav-link {{ request()->routeIs('sliders.create') ? 'active':'' }}" href="{{ route('sliders.create')}}">Add Slider</a>
                    </nav>
                </div>
<!-- end Sliders -->

<!-- Faqs -->
@can('admin-access')
<a class="nav-link {{ request()->routeIs('faqs.*') ? 'collapse active': 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFaqs" aria-expanded="false" aria-controls="collapsefaqs">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    Faqs
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse {{ request()->routeIs('faqs.*')  ? 'show': '' }}" id="collapseFaqs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link {{ request()->routeIs('faqs.index')
            || request()->routeIs('faqs.show')
            || request()->routeIs('faqs.edit') ? 'active':'' }}" href="{{ route('faqs.index')}}">List</a>
        <a class="nav-link {{ request()->routeIs('faqs.create') ? 'active':'' }}" href="{{ route('faqs.create')}}">Add</a>
    </nav>
</div>
@endcan
<!-- end Faqs -->
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div> -->




                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div> -->

                            <!--@can('admin-access')
                            <a class="nav-link" href="{{route('products.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Products
                            </a>
                            @endcan
                            @can('admin-access')
                            <a class="nav-link" href="{{route('categories.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Categories
                            </a>
                            @endcan -->
                            <!-- @can('admin-access')
                            <a class="nav-link" href="{{route('brands.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Brands
                            </a>
                            @endcan
                            <a class="nav-link" href="{{route('sizes.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Sizes
                            </a>
                            @can('admin-access')
                            <a class="nav-link" href="{{route('colors.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Colors
                            </a>
                            @endcan
                            <a class="nav-link" href="{{route('tags.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tags
                            </a>
                            @can('admin-access')
                            <a class="nav-link" href="{{route('districts.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Districts
                            </a>
                            @endcan
                            @can('admin-access')
                              <a class="nav-link" href="{{route('courses.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Courses
                            </a>
                            @endcan
                            @can('admin-access')
                            <a class="nav-link" href="{{route('users.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Users
                            </a>
                            @endcan
                            @can('admin-access')
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            @endcan -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{ Auth::user()->role->name?? '' }} </div>
           
        </div>
                    
                </nav>
            </div>
