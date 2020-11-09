@extends('Home.index_layout.layout')



@section('content')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <header class="rt-site-header home-four rt-fixed-top ">
        <div class="main-header rt-sticky">
            <nav class="navbar">
                <div class="rt-container">
                    <a href="{{route('home')}}" class="brand-logo"><img
                            src={{asset($account_info !=NULL ? $account_info->application_logo:'themes/default_home/images/logo/logo.png')}} alt="" width="175px"></a>
                    <a href="{{route('home')}}" class="sticky-logo"><img
                            src={{asset($account_info !=NULL ? $account_info->application_logo:'themes/default_home/images/logo/logo.png')}} alt="" width="175px"></a>
                    <div class="ml-auto d-flex align-items-center">
                        <div class="main-menu">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a>

                                </li>
                                <li>
                                    <a href="#how">
                                        How It Works?
                                    </a>
                                </li>
                                <li>
                                    <a href="#service">
                                        Service
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('store_pricing')}}">
                                        Pricing
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('privacy')}}">
                                        Privacy Policy
                                    </a>
                                </li>


                                <li>
                                    <a href="{{route('store.login')}}">
                                        Login
                                    </a>
                                </li>

                                <li class="current-menu-item">
                                    <a href="{{route('store_register')}}">

                                        Register
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end main menu -->


                        <div class="rt-nav-tolls d-flex align-items-center">


                            <div class="mobile-menu">
                                <div class="menu-click">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </nav>
        </div><!-- /.bootom-header -->
    </header>


    <div class="rt-overlay"></div><!-- ./ rt overlay -->



    <div class="rt-breadcump rt-breadcump-height default-breadcump rt-dark-text">
        <div class="rt-page-bg rtbgprefix-cover" style="background-image: url({{asset('themes/default/images/all-img/bredcump-2.png')}});"></div>
        <!-- /.rt-page-bg -->
        <div class="rt-container">
            <div class="row rt-breadcump-height align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="inner-content">
                        <br>
                        <br>
                        <br>
                        <h3> Privacy Policy</h3>

                        <br>
                        <br>
                        <br>
                        <div class="breadcrumbs">
                            <div class="breadcrumbs-content">
                                <p class="f-size-18">
                                    @foreach($home as $data)
                                {!! $data->privacy_policy !!}
                                    @endforeach

                                </p>
                            </div><!-- /.breadcrumbs-content -->
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.inner-content -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.rt-bredcump -->





@endsection
