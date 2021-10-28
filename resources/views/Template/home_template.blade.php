<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">




  <link rel="stylesheet" href="{{asset('home/icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('home/style.css')}}">
  <link rel="stylesheet" href="{{asset('home/responsive.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>E-SHOPE</title>
  @yield('style')
  <style>
    #loader {
      background: #fff url(https://miro.medium.com/max/1400/1*CsJ05WEGfunYMLGfsT2sXA.gif) no-repeat center;
      background-size: 50%;
      height: 100vh;
      width: 100%;
      position: fixed;
      z-index: 100;
    }

    .close {
      top: 3px;
      left: 97%;
      font-weight: bold;
      font-size: 23px
    }

    @media (max-width:735px) {
      .close {

        left: 93%;

      }
    }
  </style>

</head>

<body>

  @if($message = Session::get('success'))
  <div class="alert alert-success position-absolute w-100 " style="top:0;z-index: 50000;">
    <p class="text-center fs-3">{{$message}}</p>


  </div>
  @endif
  @if($message = Session::get('error'))
  <div class="alert alert-danger position-absolute w-100" style="top:0;z-index: 50000;">

    <p class="text-danger text-center fs-3">!!! {{$message}}</p>


  </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger fixed-top w-100 ">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="close fixed-top" data-dismiss="alert">X</button>
  </div>
  @endif


  <section id="header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <h4 class="text-danger">E-SHOPE</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="ti-align-justify navbar-toggler-icon"></span>
          <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <form class="d-flex m-auto w-100 mx-lg-4" action=" {{route('search')}}" method="get">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="#products">product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#special">special</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#testimonial">testimonial</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#contact">contact</a>
            </li>


            @if (Route::has('login'))
            @auth

            <x-app-layout>

            </x-app-layout>


            @else
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="ti-user pe-2 fs-5"></span>Profile
              </a>
              <ul class="dropdown-menu loginnav" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">
                    <h5>Hello user</h5>
                  </a></li>
                <li><a class="dropdown-item" href="#">
                    <p>To access your E-SHOPE account</p>
                  </a></li>

                <li><a class="dropdown-item text-center" type="button" href="{{route('register')}}"><button class=" btn btn-danger w-100 " type="button">sing up</button></a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{route('order')}}"><span class="ti-bag pe-3 fs-5"></span class="fs-5 ">My Orders<span></a></li>
              </ul>
            </li>
            @endauth
            @endif
            @php
            $curt_no=null;
            if(session()->has('cart')){
            $curt=session()->get('cart');
            $curt_no=count($curt);
            }

            @endphp
            @if($curt_no==0)
            <li class="nav-item">
              <a class="nav-link  " href="{{route('view_cart')}}">
                <div id="cart-no" class="position-relative"><span class="ti-shopping-cart pe-2 fs-5"></span>Cart
                </div>
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link  " href="{{route('view_cart')}}">
                <div id="cart-no" class="position-relative"><span class="ti-shopping-cart pe-2 fs-5"></span>Cart <div class="cart-no">{{$curt_no}}</div>
                </div>
              </a>
            </li>
            @endif
            @if (Route::has('login'))
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('order')}}"><span class="ti-bag pe-2 fs-5"></span>Order</a>
            </li>
            @endauth
            @endif
          </ul>

        </div>
      </div>
    </nav>

    <!-- home section -->


    @yield('content')


    <!-- testmonial section -->

    <!-- contact section -->

    <section id="contact">
      <div class="contact">
        <div class="container">
          <div class="mb-5 text-center">
            <h5>Let's start a Conversation</h5>
            <h2 class="fw-bold ">Contact us</h2>
          </div>

          <div class="row">
            <div class="col-lg-5 col-md-5">
              <h4 class="fw-bold">Contact Info</h4>

              <ul class="info list-unstyled">
                <li class="d-flex align-items-center">
                  <span class="pe-3 ti-location-pin fs-5"></span>
                  <p><a href="">Lorem ipsum dolor sit amet. dff mhfe</a></p>
                </li>
                <li class="d-flex align-items-center">
                  <span class="pe-3 ti-mobile fs-5"></span>
                  <p><a href="">+91 999-999-9999</a></p>
                </li>
                <li class="d-flex align-items-center">
                  <span class="pe-3 ti-envelope fs-5"></span>
                  <p><a href="">Sujanmoi787@gmail.com</a></p>
                </li>
              </ul>
            </div>

            <div class="col-lg-7 col-md-7 pt-md-0 pt-4">
              <form action="{{route('contact')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea type="text" class="textarea" name="massage" id="massage" placeholder="Enter your your massage"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-danger"><span class="ti-rocket pe-2 fs-5"></span>Send Massage</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contact section -->


    <!-- footer -->

    <div class="p-3 copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 p-1 p-lg-3 text-center text-lg-start">
            <p class="my-0">Copyright c 2021 <a href="">E-SHOP</a>All Rights Reserved</p>
          </div>
          <div class="col-12 col-lg-6 p-1 p-lg-3 text-center text-lg-start">
            <p class="my-0 text-lg-end">Designed by <a href="" target="_blank">SUJAN MOI</a>.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- scroll -->
    <div id="scrollup" title="Scroll To Top">
      <a href="#home"><span class="ti-arrow-up fs-4 text-white"></span></a>
    </div>
    @if($curt_no==0)
    <a href="{{route('view_cart')}}">
    <span class="text-danger cart-logo-no"></span> </a>
    @else
    <div id="logo-cart-no">
      <div>
      <a href="{{route('view_cart')}}" >
      
      <span class="text-danger cart-logo-no">{{$curt_no}}</span>
     </a>
      </div>
    
      </div>
    
    @endif
    <div class="position-relative"><a href="{{route('view_cart')}}" title="Image from freeiconspng.com"><img src="https://www.freeiconspng.com/uploads/red-simple-shopping-cart-icon-12.png" class="cart-logo " alt="red simple shopping cart icon" /></a></div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="{{asset('home/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $('.slider').slick({

        centerMode: true,
        variableWidth: false,
        centerPadding: '0px',
        dots: false,
        infinite: true,
        arrows: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {

            breakpoint: 600,
            settings: {

              slidesToShow: 3,
              slidesToScroll: 3
            }
          },
          {
            breakpoint: 480,
            settings: {

              slidesToShow: 3,
              slidesToScroll: 3
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
    </script>
    <script>
      $(document).ready(function() {
        setTimeout(function() {
          $("div.alert").remove();
        }, 2000)
      });
    </script>
    <script>
      var loader = document.getElementById("loader");
      window.addEventListener("load", function() {
        loader.style.display = "none";
      })
    </script>

</body>

</html>