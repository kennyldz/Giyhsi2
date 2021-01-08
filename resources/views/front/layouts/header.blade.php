<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Giyshi @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('front/')}}/images/icons/favicon-96x96.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('front/')}}/css/main.css">

    <link href="{{asset('admin/')}}/src/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!--===============================================================================================-->

    <style >
        .nav-pills .nav-link.active {
            color:white;
          background-color: #6d6d6d!important;
            border-radius:0px;
            border-left-style: solid;
            border-left-color: #FF5722;
            border-left-width: 7px;
        }
        .nav-pills .nav-link:hover{

            border-left-style: solid;
            border-left-color: #FF5722;
            border-left-width: 7px;
            border-radius:0px;
        }
    </style>
</head>
<!-- "animsition" sayfa açılışında animasyon için kullanılacak class -> Body'de -->
<body >

<!-- header fixed -->
<div class="wrap_header fixed-header2 trans-0-4">
    <!-- Logo -->
    <a href="/" class="logo">
        <img src="{{asset('front/')}}/images/icons/logo.png" alt="IMG-LOGO">
    </a>

    <!-- Menu -->
    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="/">Ana Sayfa</a>
                </li>

                @foreach($categories as $category)
                  <li >
                    <a href="{{route('Kategori',$category->slug)}}">{{$category->name}}</a>
                  </li>

                @endforeach

            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">
        @if(Auth::check()==true)

            <a class="nav-link dropdown-toggle nav-link" href="#" id="navbardrop" data-toggle="dropdown">
            @if(Auth::user()->profile_photo_path!=NULL)
                <img src="{{asset('front/')}}/images/icons/{{Auth::user()->profile_photo_path}}" height="30" width="30" class="header-icon1 rounded" >{{Auth::user()->name}}</a>
        @else
            <img src="{{asset('front/')}}/images/icons/user.png" height="30" width="30" class="header-icon1 rounded" >{{Auth::user()->name}}</a>
            @endif
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{asset('kullanici/hesabim')}}">Hesabım</a>
                <a class="dropdown-item" href="#">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Çıkış Yap') }}
                        </x-jet-dropdown-link>
                    </form>
                </a>

            </div>

        @else
            <a href="{{asset('kullanici/giris')}}">
                <img src="{{asset('front/')}}/images/icons/user.png" class="header-icon1" alt="ICON">
                Giriş Yap
            </a>

        @endif

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">
            <img src="{{asset('front/')}}/images/icons/sepet.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">{{count($WaitOrder)}}</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
                <ul class="header-cart-wrapitem">
                    @if(count($WaitOrder)==0)
                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="{{asset('front/')}}/images/icons/sepeturun.png">
                            </div>
                            <div class="header-cart-item-txt">
                                <strong class="header-cart-item-name">Bekleyen Siparişiniz Bulunmamaktadır.</strong>
                            </div>
                        </li>
                    @endif
                    @foreach($WaitOrder as $cart)
                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="/{{$cart->image}}" alt="IMG">
                            </div>
                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    {{$cart->title}}
                                </a>

                                <span class="header-cart-item-info ">
										<strong>{{$cart->status}}</strong>
										</span>
                            </div>
                        </li>

                    @endforeach
                </ul>




            </div>
        </div>
    </div>
</div>

<!-- top noti -->
<!-- DUYURU için
<div class="flex-c-m size22 bg0 s-text21 pos-relative">
    20% off everything!
    <a href="product.html" class="s-text22 hov6 p-l-5">
        Shop Now
    </a>

    <button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
        <i class="fa fa-remove fs-13" aria-hidden="true"></i>
    </button>
</div>

-->

<!-- Header -->
<header class="header2">
    <!-- Header desktop -->
    <div class="container-menu-header-v2 p-t-26" >
        <div class="topbar2" >
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <!-- Logo2 -->
            <a href="/" class="logo2">
                <img src="{{asset('front/')}}/images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <div class="topbar-child2" style="flex-wrap: nowrap">
					<span class="topbar-email">
						info@giyshi.com
					</span>


                <!--Web Menu  -->

                @if(Auth::check()==true)

                        <a class="nav-link dropdown-toggle nav-link" href="#" id="navbardrop" data-toggle="dropdown">
                            @if(Auth::user()->profile_photo_path!=NULL)
                                <img src="{{asset('front/')}}/images/icons/{{Auth::user()->profile_photo_path}}" height="30" width="30" class="header-icon1 rounded" >{{Auth::user()->name}}</a>
                @else
                    <img src="{{asset('front/')}}/images/icons/user.png" height="30" width="30" class="header-icon1 rounded" >{{Auth::user()->name}}</a>
                @endif
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{asset('kullanici/hesabim')}}">Hesabım</a>
                            <a class="dropdown-item" href="#">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Çıkış Yap') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </a>

                        </div>

                    @else
                        <a href="{{asset('kullanici/giris')}}">
                            <img src="{{asset('front/')}}/images/icons/user.png" class="header-icon1" alt="ICON">
                            Giriş Yap
                        </a>

                    @endif


                <span class="linedivide1"></span>

                <!-- Masaüstü versiyon -->
                <div class="header-wrapicon2 m-r-13">
                    <img src="{{asset('front/')}}/images/icons/sepet.png" class="header-icon1 js-show-header-dropdown " alt="ICON">
                    <span class="header-icons-noti ">{{count($WaitOrder)}}</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        Siparişlerim
                        <ul class="header-cart-wrapitem" >

                                @if(count($WaitOrder)==0)
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="{{asset('front/')}}/images/icons/sepeturun.png">
                                    </div>
                                    <div class="header-cart-item-txt">
                                        <strong class="header-cart-item-name">Bekleyen Siparişiniz Bulunmamaktadır.</strong>
                                    </div>
                                </li>
                                @endif
                               @foreach($WaitOrder as $cart)
                               <li class="header-cart-item">
                                   <div class="header-cart-item-img">
                                       <img src="/{{$cart->image}}" alt="IMG">
                                   </div>
                                   <div class="header-cart-item-txt">
                                       <a href="#" class="header-cart-item-name">
                                          {{$cart->title}}
                                       </a>

                                       <span class="header-cart-item-info ">
										<strong>{{$cart->status}}</strong>
										</span>
                                   </div>
                               </li>

                                @endforeach


                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="wrap_header " >

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="/">Ana Sayfa</a>

                        </li>


                        @foreach($categories as $category)
                            <li >
                                <a href="{{route('Kategori',$category->slug)}}">{{$category->name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">

            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="/" class="logo-mobile">
            <img src="{{asset('front/')}}/images/icons/logo.png" alt="IMG-LOGO" width="90">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">


                    @if(Auth::check()==true)
                        <a class="nav-link dropdown-toggle nav-link" style="font-size:10px" href="#" id="navbardrop" data-toggle="dropdown">
                            @if(Auth::user()->profile_photo_path!=NULL)
                                <img src="{{asset('front/')}}/images/icons/{{Auth::user()->profile_photo_path}}" height="30" width="30" class="header-icon1 rounded" >{{Auth::user()->name}}</a>
                @else
                    <img src="{{asset('front/')}}/images/icons/user.png" height="30" width="30" class="header-icon1 rounded" >{{Auth::user()->name}}</a>
                @endif
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{asset('kullanici/hesabim')}}">Hesabım</a>
                            <a class="dropdown-item" href="#">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Çıkış Yap') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </a>

                        </div>
                    @else
                        <a href="{{asset('kullanici/giris')}}">
                            <img src="{{asset('front/')}}/images/icons/user.png" class="header-icon1" alt="ICON">
                            Giriş Yap
                        </a>

                    @endif


                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="{{asset('front/')}}/images/icons/sepet.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">{{count($WaitOrder)}}</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            @if(count($WaitOrder)==0)
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="{{asset('front/')}}/images/icons/sepeturun.png">
                                    </div>
                                    <div class="header-cart-item-txt">
                                        <strong class="header-cart-item-name">Bekleyen Siparişiniz Bulunmamaktadır.</strong>
                                    </div>
                                </li>
                            @endif
                            @foreach($WaitOrder as $cart)
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="/{{$cart->image}}" alt="IMG">
                                    </div>
                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            {{$cart->title}}
                                        </a>

                                        <span class="header-cart-item-info ">
										<strong>{{$cart->status}}</strong>
										</span>
                                    </div>
                                </li>

                            @endforeach
                        </ul>




                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <!-- DUYURU MOBİL
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
                </li>
                -->

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
							<span class="topbar-email">
								info@giyshi.com
							</span>


                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="/">Ana Sayfa</a>

                <!--    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i> -->
                </li>


                @foreach($categories as $category)
                    <li class="item-menu-mobile">
                     <a href="{{route('Kategori',$category->slug)}}">{{$category->name}}</a>
                    </li>
                @endforeach

            </ul>
        </nav>
    </div>
</header>



<!--
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">




    <link href="{{asset('front/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link href="{{asset('front/')}}/css/shop-homepage.css" rel="stylesheet">

</head>

<body>
Navigation
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>

                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="container">

    <div class="row">
-->
