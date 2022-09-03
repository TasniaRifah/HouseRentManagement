<div class="card sidebar-menu">
                <div class="card-header">
                  <h3 class="h4 card-title">Customer section</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                    <a href="{{ route('customer.bookingList', auth()->user()->name ?? '') }}" class="nav-link {{ request()->routeIs('customer.bookingList') ? 'active':'' }}"><i class="fa fa-list"></i> My orders</a>
                    <a href="{{ route('customer.wishlist', auth()->user()->name ?? '') }}" class="nav-link {{ request()->routeIs('customer.wishlist') ? 'active':'' }}"><i class="fa fa-heart"></i> My wishlist</a>
                    <a href="{{ route('customer.account', auth()->user()->id ?? '') }}" class="nav-link {{ request()->routeIs('customer.account') ? 'active':'' }}"><i class="fa fa-user"></i> My account</a>
                    <li > <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="nav-link" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fa fa-sign-out"></i>
                                {{ __('Log Out') }}</a>
                          </form>
                  </ul>
                </div>
              </div>