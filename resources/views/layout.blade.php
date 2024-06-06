<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/donas.png') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Tasty Donut's - Tu mejor experiencia</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/css-library.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css')}}">

    <script src="{{ asset('assets/js/angular.min.js')}}"></script>
    <script src="{{ asset('assets/js/bKash-checkout.js')}}"></script>
    <script src="{{ asset('assets/js/bKash-checkout-sandbox.js')}}"></script>

    </head>
    
    <body ng-app="">
    
    <!-- ***** Preloader Start ***** -->
      
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <style>
        .badge {
            padding-left: 9px;
            padding-right: 9px;
            padding-top: 10px;
            -webkit-border-radius: 9px;
            -moz-border-radius: 9px;
            border-radius: 9px;
            height: 16px;
            text-align: center;
        }

        .label-warning[href],
        .badge-warning[href] {
            background-color: #c67605;
        }

        #lblCartCount {
            font-size: 12px;
            background: #ff0000;
            color: #fff;
            padding: 0 5px;
            vertical-align: top;
            margin-left: -10px;
        }
    </style>
</head>
<body>
    <header class="header-area" style="z-index: 1000">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{url('home')}}">
                    <img width="100px" src="{{ asset('assets/images/LOGO2.png')}}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#about">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#menu">Menú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#offers">Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/my-order">Mis pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#chefs">Equipo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#reservation">Contacto</a>
                        </li>
                        <li><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li>


                            <?php
                                
                                if(Auth::user())
                                {
                        
                                    $cart_amount=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_order','no')->count();
                        
                        
                                }
                                else
                                {
                        
                                    $cart_amount=0;
                        
                                }


                            ?>


                            <span class='badge badge-warning' id='lblCartCount'> {{ $cart_amount }} </span>
                        <li class="nav-item">
                            @if (Route::has('login'))
                            <div class="nav-item">
                                @auth
                                <li class="nav-item">
                                    <x-app-layout> </x-app-layout>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link text-sm text-gray-700 underline">Iniciar sesión</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link ml-4 text-sm text-gray-700 underline">Registrarse</a>
                                </li>
                                @endif
                                @endauth
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div style="min-height:750px">
        @yield('page-content')
    </div>

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="https://web.facebook.com/rahathosenmanik/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/rahathosenmanik"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/rahathossenmanik/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.instagram.com/rahathossenmanik/?hl=en"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="{{url('home')}}"><img src="{{ asset('assets/images/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Tasty Donut's
							<br>2024</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/popper.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets/js/accordions.js')}}"></script>
    <script src="{{ asset('assets/js/datepicker.js')}}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js')}}"></script> 
    <script src="{{ asset('assets/js/slick.js')}}"></script> 
    <script src="{{ asset('assets/js/lightbox.js')}}"></script> 
    <script src="{{ asset('assets/js/isotope.js')}}"></script> 
    
    <!-- Global Init -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>