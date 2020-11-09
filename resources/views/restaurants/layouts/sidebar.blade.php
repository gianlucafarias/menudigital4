


<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" >
               <h2>{{ Auth::user()->store_name }}</h2>
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">




                    <li {{Route::currentRouteNamed('store_admin.dashboard')? 'class=nav-item active':null }}>
                        <a class="nav-link"   href="{{route('store_admin.dashboard')}}">
                            <i class="ni ni-books text-blue"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>




                    <li {{ Request::is("admin/store/orders*") ? 'class=nav-item active':null}} >
                        <a  class="nav-link"   href="{{route('store_admin.orders')}}">
                            <i class="ni ni-cart text-green"></i>
                            <span class="nav-link-text">Orders</span>
                        </a>
                    </li>

                    <li {{ Request::is("admin/store/orders/status*") ? 'class=nav-item active':null}} >
                        <a  class="nav-link"   href="{{route('store_admin.orderstatus')}}">
                            <i class="ni ni-watch-time text-red"></i>
                            <span class="nav-link-text">Orders Status Screen</span>
                        </a>
                    </li>




                    <li {{Route::currentRouteNamed('store_admin.banner')? 'class=nav-item active':null }} >
                        <a  class="nav-link"   href="{{route('store_admin.banner')}}">
                            <i class="ni ni-bullet-list-67 text-yellow"></i>
                            <span class="nav-link-text">Promo Banner</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="ni ni-box-2 text-orange"></i>
                            <span class="nav-link-text">Inventory</span>
                        </a>
                        <div class="collapse" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li {{ Request::is("admin/store/categories*") ? 'class=nav-item active':null}} class="nav-item">
                                    <a href="{{route('store_admin.categories')}}" class="nav-link">Category</a>
                                </li>
                                <li {{ Request::is("admin/store/products*") ? 'class=nav-item active':null}} class="nav-item">
                                    <a href="{{route('store_admin.products')}}" class="nav-link">Products</a>
                                </li>

                                <li {{ Request::is("admin/store/products*") ? 'class=nav-item active':null}} class="nav-item">
                                    <a href="{{route('store_admin.addon_categories')}}" class="nav-link">Addon Categories</a>
                                </li>

                                <li {{ Request::is("admin/store/products*") ? 'class=nav-item active':null}} class="nav-item">
                                    <a href="{{route('store_admin.addon')}}" class="nav-link">Addons</a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <li {{Route::currentRouteNamed('store_admin.all_tables')? 'class=nav-item active':null }} >
                        <a  class="nav-link"   href="{{route('store_admin.all_tables')}}">
                            <i class="ni ni-bullet-list-67 text-info"></i>
                            <span class="nav-link-text">Tables</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('download_qr',[Auth::user()->view_id])}}">
                            <i class="ni ni-cloud-download-95 text-green"></i>
                            <span class="nav-link-text"> Print Qr-Code</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('store_admin.subscription_plans')}}">
                            <i class="ni ni-spaceship text-flat-darker"></i>
                            <span class="nav-link-text"> Subscription Plans</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('store_admin.customers')}}">
                            <i class="ni ni-satisfied text-red"></i>
                            <span class="nav-link-text"> Customers</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('store_admin.settings')}}">
                            <i class="ni ni-settings text-blue"></i>
                            <span class="nav-link-text"> Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ni ni-lock-circle-open text-pink"></i>
                            <span class="nav-link-text"> Logout</span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{route('store.logout')}}" method="POST" style="display: none;">
                        {{csrf_field()}}
                    </form>
                </ul>




                </ul>
                <!-- Divider -->



            </div>
        </div>
    </div>
</nav>
