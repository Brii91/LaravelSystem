@extends('layout', ['title'=> 'Home'])

@section('page-content')

<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

    <!-- ***** Main Banner Area Start ***** -->
    <style>
        #top {
            padding: 20px 0;
        }
        .left-content {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        .left-content h3 {
            margin: 0;
            font-size: 2rem;
        }
        .left-content h4 {
            margin: 10px 0;
            font-size: 1.5rem;
            color: #888;
        }
        .main-white-button {
            margin-top: 20px;
        }
        .main-white-button a {
            color: #fff;
            background-color: #ff0000;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2rem;
        }
        .main-banner .img-fill img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="left-content">
                        <div class="inner-content">
                            <h3>Tasty Donut's</h3>
                            <h4>LA MEJOR EXPERIENCIA</h4>
                            <div class="main-white-button scroll-to-section">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                            @foreach($banners as $banner)
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="{{ asset('assets/images/'.$banner->image)}}" alt="Banner Image">
                                </div>
                            </div>
                            <!-- // Item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                        @foreach($about_us as $a_us)
                            <h6>Sobre nosotros</h6>
                            <h2>{{  $a_us->title  }}</h2>
                        </div>
                        <p>{{  $a_us->description  }}</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('assets/images/'.$a_us->image1)}}" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('assets/images/'.$a_us->image2)}}" alt="">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('assets/images/'.$a_us->image3)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/'.$a_us->vd_image)}}" alt="">

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

     <!-- ***** Menu Area Starts ***** -->
     <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Ofertas</h6>
                        <h2>Ofertas especiales de esta semana</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                  
                                          <li><a href='#tabs-1'><img src="{{ asset('assets/images/tab-icon-01.png')}}" alt="">Combo de Temporada</a></li>
                                          <li><a href='#tabs-2'><img src="{{ asset('assets/images/tab-icon-02.png')}}" alt="">Combo Sorpresa</a></a></li>
                                          <li><a href='#tabs-3'><img src="{{ asset('assets/images/tab-icon-03.png')}}" alt="">Combo Light</a></a></li>
                                      
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center;" class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">

                                        @foreach($breakfast as $item)

                                        <?php

                            
                                        $total_rate=DB::table('rates')->where('product_id',$item->id)
                                        ->sum('star_value');


                                        $total_voter=DB::table('rates')->where('product_id',$item->id)
                                        ->count();

                                        if($total_voter>0)
                                        {

                                            $per_rate=$total_rate/$total_voter;

                                        }
                                        else
                                        {

                                            $per_rate=0;


                                        }

                                        $per_rate=number_format($per_rate, 1);


                                        $whole = floor($per_rate);      // 1
                                        $fraction = $per_rate - $whole

                                        ?>

                                        @if($item->id %2 ==0)
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('assets/images/'.$item->image)}}" alt="">
                                                            <h4>{{ $item->name }}</h4>
                                                            <p>{{  $item->description }}</p>
                                                            <div class="price">
                                                                <h6>RD${{  $item->price }}</h6>
                                                            </div>
                                                            <span class="product_rating">
                                                        @for($i=1;$i<=$whole;$i++)

                                                            <i class="fa fa-star "></i>

                                                            @endfor

                                                            @if($fraction!=0)

                                                            <i class="fa fa-star-half"></i>

                                                            @endif
                                                                
                                                                
                                                            <span class="rating_avg">({{  $per_rate}})</span>
                                    </span>
                            <br>
                                                        </div>
                                                    </div>
                                                
                                                </div>      
                                            </div>
                                        </div>
                                        @endif

                                        @endforeach
                                        @foreach($breakfast as $item)


                                        <?php

                            
                                        $total_rate=DB::table('rates')->where('product_id',$item->id)
                                        ->sum('star_value');


                                        $total_voter=DB::table('rates')->where('product_id',$item->id)
                                        ->count();

                                        if($total_voter>0)
                                        {

                                            $per_rate=$total_rate/$total_voter;

                                        }
                                        else
                                        {

                                            $per_rate=0;


                                        }

                                        $per_rate=number_format($per_rate, 1);


                                        $whole = floor($per_rate);      // 1
                                        $fraction = $per_rate - $whole

                                        ?>

                                        @if($item->id %2 !=0)
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('assets/images/'.$item->image)}}" alt="">
                                                            <h4>{{ $item->name }}</h4>
                                                            <p>{{  $item->description }}</p>
                                                            <div class="price">
                                                                <h6>RD${{  $item->price }}</h6>
                                                            </div>
                                                            <span class="product_rating">
                                                        @for($i=1;$i<=$whole;$i++)

                                                            <i class="fa fa-star "></i>

                                                            @endfor

                                                            @if($fraction!=0)

                                                            <i class="fa fa-star-half"></i>

                                                            @endif
                                                                
                                                                
                                                            <span class="rating_avg">({{  $per_rate}})</span>
                                    </span>
                            <br>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @endforeach
                                        
                                      
                                    </div>
                                </article>  
                                <article id='tabs-2'>
                                    <div class="row">
                                    @foreach($lunch as $item)


                                    <?php

                            
                                        $total_rate=DB::table('rates')->where('product_id',$item->id)
                                        ->sum('star_value');


                                        $total_voter=DB::table('rates')->where('product_id',$item->id)
                                        ->count();

                                        if($total_voter>0)
                                        {

                                            $per_rate=$total_rate/$total_voter;

                                        }
                                        else
                                        {

                                            $per_rate=0;


                                        }

                                        $per_rate=number_format($per_rate, 1);


                                        $whole = floor($per_rate);      // 1
                                        $fraction = $per_rate - $whole

                                        ?>

                                        @if($item->id %2 ==0)
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('assets/images/'.$item->image)}}" alt="">
                                                            <h4>{{ $item->name }}</h4>
                                                            <p>{{  $item->description }}</p>
                                                            <div class="price">
                                                                <h6>RD${{  $item->price }}</h6>
                                                            </div>
                                                            <span class="product_rating">
                                                        @for($i=1;$i<=$whole;$i++)

                                                            <i class="fa fa-star "></i>

                                                            @endfor

                                                            @if($fraction!=0)

                                                            <i class="fa fa-star-half"></i>

                                                            @endif
                                                                
                                                                
                                                            <span class="rating_avg">({{  $per_rate}})</span>
                                    </span>
                                                        </div>
                                                    </div>
                                                  
                                                </div>      
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    @foreach($lunch as $item)

                                    <?php

                            
                                        $total_rate=DB::table('rates')->where('product_id',$item->id)
                                        ->sum('star_value');


                                        $total_voter=DB::table('rates')->where('product_id',$item->id)
                                        ->count();

                                        if($total_voter>0)
                                        {

                                            $per_rate=$total_rate/$total_voter;

                                        }
                                        else
                                        {

                                            $per_rate=0;


                                        }

                                        $per_rate=number_format($per_rate, 1);


                                        $whole = floor($per_rate);      // 1
                                        $fraction = $per_rate - $whole

                                        ?>

                                        @if($item->id %2 !=0)
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('assets/images/'.$item->image)}}" alt="">
                                                            <h4>{{ $item->name }}</h4>
                                                            <p>{{  $item->description }}</p>
                                                            <div class="price">
                                                                <h6>RD${{  $item->price }}</h6>
                                                            </div>
                                                            <span class="product_rating">
                                                        @for($i=1;$i<=$whole;$i++)

                                                            <i class="fa fa-star "></i>

                                                            @endfor

                                                            @if($fraction!=0)

                                                            <i class="fa fa-star-half"></i>

                                                            @endif
                                                                
                                                                
                                                            <span class="rating_avg">({{  $per_rate}})</span>
                                    </span>
                            <br>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                      
                                    </div>
                                </article>  
                                <article id='tabs-3'>
                                    <div class="row">
                                    @foreach($dinner as $item)


                                    <?php

                            
                                        $total_rate=DB::table('rates')->where('product_id',$item->id)
                                        ->sum('star_value');


                                        $total_voter=DB::table('rates')->where('product_id',$item->id)
                                        ->count();

                                        if($total_voter>0)
                                        {

                                            $per_rate=$total_rate/$total_voter;

                                        }
                                        else
                                        {

                                            $per_rate=0;


                                        }

                                        $per_rate=number_format($per_rate, 1);


                                        $whole = floor($per_rate);      // 1
                                        $fraction = $per_rate - $whole

                                        ?>

                                        @if($item->id %2 ==0)
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('assets/images/'.$item->image)}}" alt="">
                                                            <h4>{{ $item->name }}</h4>
                                                            <p>{{  $item->description }}</p>
                                                            <div class="price">
                                                                <h6>RD${{  $item->price }}</h6>
                                                            </div>
                                                            <span class="product_rating">
                                                        @for($i=1;$i<=$whole;$i++)

                                                            <i class="fa fa-star "></i>

                                                            @endfor

                                                            @if($fraction!=0)

                                                            <i class="fa fa-star-half"></i>

                                                            @endif
                                                                
                                                                
                                                            <span class="rating_avg">({{  $per_rate}})</span>
                                    </span>
                            <br>
                                  
                                                        </div>
                                                    </div>
                                                
                                                </div>      
                                            </div>
                                        </div>
                                        @endif

                                        @endforeach
                                        @foreach($dinner as $item)


                                        <?php

                            
                                        $total_rate=DB::table('rates')->where('product_id',$item->id)
                                        ->sum('star_value');


                                        $total_voter=DB::table('rates')->where('product_id',$item->id)
                                        ->count();

                                        if($total_voter>0)
                                        {

                                            $per_rate=$total_rate/$total_voter;

                                        }
                                        else
                                        {

                                            $per_rate=0;


                                        }

                                        $per_rate=number_format($per_rate, 1);


                                        $whole = floor($per_rate);      // 1
                                        $fraction = $per_rate - $whole

                                        ?>

                                        @if($item->id %2 !=0)
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('assets/images/'.$item->image)}}" alt="">
                                                            <h4>{{ $item->name }}</h4>
                                                            <p>{{  $item->description }}</p>
                                                            <div class="price">
                                                                <h6>RD${{  $item->price }}</h6>
                                                            </div>
                                                            <span class="product_rating">
                                                        @for($i=1;$i<=$whole;$i++)

                                                            <i class="fa fa-star "></i>

                                                            @endfor

                                                            @if($fraction!=0)

                                                            <i class="fa fa-star-half"></i>

                                                            @endif
                                                                
                                                                
                                                            <span class="rating_avg">({{  $per_rate}})</span>
                                    </span>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                     
                                    </div>
                                </article>   
                            </section>
                            <br>
                            <a href="/menu"><input style="color:#fff; background-color:#c83f71; font-size:20px;"
                            class="btn" type="submit" value="Browse All"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** --> 
<!-- ***** Menu Area Starts ***** -->
<section class="section"  id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading" >
                        <h6>Nuestro menú</h6>
                        <h2>Nuestra selección de mini donas con sabor de calidad.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel" >
                  
                    @foreach($menu as $product)
                   
                    <div class="item">

                    <?php
                        $img=$product->image;
                    ?>
                        <div class='card' style="background-image: url({{asset('assets/images/'.$img)}})"> 

                            <div class="price"><h6>${{ $product->price }}</h6>
                            @if($product->available!="Stock")
                            <h4 style="">Out Of Stock</h4> 

                            @endif
                        
                        </div>
                        <?php

                            
                            $total_rate=DB::table('rates')->where('product_id',$product->id)
                            ->sum('star_value');


                            $total_voter=DB::table('rates')->where('product_id',$product->id)
                            ->count();

                            if($total_voter>0)
                            {

                                $per_rate=$total_rate/$total_voter;

                            }
                            else
                            {

                                $per_rate=0;


                            }

                            $per_rate=number_format($per_rate, 1);


                            $whole = floor($per_rate);      // 1
                            $fraction = $per_rate - $whole

                        ?>
                            <div class='info'>
                              <h1 class='title'>{{ $product->name }}</h1>
                              <p class='description'>{{ $product->description  }}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section" >
                                  <span class="product_rating">
                                  @for($i=1;$i<=$whole;$i++)

                                    <i class="fa fa-star "></i>

                                    @endfor

                                    @if($fraction!=0)

                                    <i class="fa fa-star-half"></i>

                                    @endif
                                        
                                        
                                    <span class="rating_avg">({{  $per_rate}})</span>
            </span>
      <br>
                                   <a href="/rate/{{ $product->id }}" style="color:blue;">Califica esto</a>
                                  <p>Cantidad: </p>
                                @if($product->available=="Stock")
                                  <form method="post" action="{{route('cart.store',$product->id)}}">
                                     @csrf
                                  <input type="number" name="number" style="width:50px;" id="myNumber" value="1">
                                    <input type="submit" class="btn btn-success" value="Agregar al carrito">
                                  </form>
                                @endif

                                @if($product->available!="Stock")
                                  <form method="post" action="{{route('cart.store',$product->id)}}">
                                     @csrf
                                  <input type="number" name="number" style="width:50px;" id="myNumber" value="1">
                                    <input type="submit" class="btn btn-success" disabled value="Agregar al carrito">
                                  </form>
                                @endif
                                </div>
                              </div>
                              
                            </div>
                        </div>
                    </div>
                   
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
          
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Nuestro equipo</h6>
                        <h2>Ofrecemos lo mejor para ti.</h2>
                    </div>
                </div>
            </div>
           
            <div class="row">
                @foreach($chefs as $chef)
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="{{ $chef->facebook_link  }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $chef->twitter_link  }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $chef->instragram_link  }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img src="{{ asset('assets/images/'.$chef->image)}}" alt="Chef #1">
                        </div>
                        <div class="down-content">
                            <h4>{{ $chef->name  }}</h4>
                            <span>{{ $chef->job_title  }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    <section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Contacto</h6>
                            <h2>Aquí puedes hacer una comentario o simplemente enviarnos algo a mejorar.</h2>
                        </div>
                        <p>Los miembros de Tasty Donut's siempre están activos para responder a su llamada.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Números de teléfono</h4>
                                    <span><a href="#">01824072334</a>
									<br><a href="#">01554649446</a>
									</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Gmail</h4>
                                    <span><a href="mailto:britneypolanco19@gmail.com">britneypolanco19@gmail.com</a><br>
									<a href="mailto:britneypolanco19@gmail.com">britneypolanco19@gmail.com</a><br>
									</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" action="/reserve/confirm" method="post">
                            @csrf
                          <div class="row">
                            <div class="col-lg-12">
                                <h4>Deja tu mensaje</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Tu nombre*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Tu correo electrónico*" required="">
                            </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Número de teléfono*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">    
                                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                                    <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                    <div class="input-group-addon" >
                                      <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                                </div>   
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Mensaje" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">Enviar</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Reservation Area Ends ***** -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    
   @endsection