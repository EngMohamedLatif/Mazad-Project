<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mazad</title>
    <!--  CSS FILES
================================================== -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
        <!-- Fixed navbar start -->
        <div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
            <div class="navbar-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                            <div class="pull-left ">
                                <ul class="userMenu ">
                                    <li><a href="#"> <span class="hidden-xs">HELP</span><i
                                                class="glyphicon glyphicon-info-sign hide visible-xs "></i> </a></li>
                                    <li class="phone-number"><a href="callto:+88016000000"> <span> <i
                                                    class="glyphicon glyphicon-phone-alt "></i></span> <span class="hidden-xs"
                                                                                                     style="margin-left:5px"> 88 01680 53 1352 </span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                            <div class="pull-right social-links">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.navbar-top-->

            <div class="container">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Mazad </a></li>
                    </ul>
                    <!--- this part will be hidden for mobile version -->
                    <div class="nav navbar-nav navbar-right hidden-xs">
                       @if (Auth::guest()) 
                     <ul class="userMenu um_">
                         <li><a href="{{ route('login') }}"> <span class="hidden-xs"><i class="fa fa-sign-in"></i> Sign In</span>
                                 <i class="glyphicon glyphicon-log-in hide visible-xs "></i> </a></li>
                         <li class="hidden-xs"><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i>  Create
                                 Account </a>
                         </li>
                    </ul>
                                @else
                        <div class="dropdown cartMenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user-circle"></i>
                                <span class="cartRespons">
                                 {{ Auth::user()->name }}
                                 </span>
                                <b class="caret"> </b> 
                            </a>

                            <div class="dropdown-menu">
                                <div class="miniCartFooter text-right">
                                    <a href="{{ URL('/edit_user_data') }}"><i class="fa fa-pencil"></i> Edit Profile</a>
                                    <a href="{{ URL('/products') }}"><i class="fa fa-cubes"></i> My Products</a>
                                    
                                    
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>

                            </div>
                        </div>
                         @endif
                        <!--/.cartMenu-->

                        <div class="search-box">
                            <div class="input-group">
                                <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                            </div>
                            <!-- /input-group -->

                        </div>
                        <!--/.search-box -->
                    </div>
                    <!--/.navbar-nav hidden-xs-->
                </div>
                <!--/.nav-collapse -->

            </div>
            <!--/.container -->

            <div class="search-full text-right"><a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>

                <div class="searchInputBox pull-right">
                    <input type="search" data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search"
                           class="search-input">
                    <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
                </div>
            </div>
            <!--/.search-full-->

        </div>
        <!-- /.Fixed navbar  -->

<div class="dynamin-pages">
     @yield('content')
</div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/helper-plugins/jquery.mousewheel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/ion-checkRadio/ion.checkRadio.min.js') }}"></script>
        <script src="{{ asset('js/grids.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.minimalect.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.touchspin.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
         @yield('scripts')
</body>
</html>
