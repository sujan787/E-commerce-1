@extends('Template.home_template');
@section('content')


<section id="home" class="home pt-3 overflow-hidden">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>


    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="home-banner home-banner-1">
          <div class="home-banner-text">
            <h1>women</h1>
            <h2>52% discunt for this season</h2>
            <a href="#products" class="btn btn-danger text-uppercase mt-4">our product</a>
          </div>
        </div>

      </div>
      <div class="carousel-item">
        <div class="carousel-item active">
          <div class="home-banner home-banner-2 img-fluid">
            <div class="home-banner-text">
              <h1>E-SHOP</h1>
              <h2>with warking card & pay</h2>
              <a href="#products" class="btn btn-danger text-uppercase mt-4">our product</a>
            </div>
          </div>

        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true">
        <span class="ti-angle-left slider-icon"></span>
      </span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true">
        <span class="ti-angle-right slider-icon"></span>
      </span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section>


    <!-- offer box one -->
    <div class="offers  ">
      <div class="container">
        <div class="row ">
          <!-- offer box one -->
          <div class="col-sm-6 col-lg-4  mb-lg-0 mb-0">

            <a href="" style="text-decoration: none;" >
              <div class="offer-box text-center position-relative">
                <div class="offer-inner">
                  <div class="offer-image position-relative overflow-hidden">
                    <img src="{{asset('home/images/vg1.jpg')}}" class="img-fluid " alt="offer">
                    <div class="offer-overlay"></div>
                  </div>
                  <div class="offer-info">
                    <div class="offer-info">
                      <div class="offer-info-inner">
                        <p class="heading-bigger text-capitalize">Sale 30%</p>
                        <p class="offer-title-1 text-uppercase font-weight-bold">Don't miss the chance </p>
                        <a href="#products" type="button" class="btn btn-outline-danger text-uppercase mt-4">shope
                          now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>

          </div>

          <div class="col-sm-6 col-lg-4 mb-lg-0 mb-0 d-flex flex-column justify-content-between">

            <a href="" style="text-decoration: none;">
              <div class="offer-box text-center position-relative mb-4 mb-sm-0 mb-lg-0 ">
                <div class="offer-inner">
                  <div class="offer-image position-relative overflow-hidden">
                    <img src="{{asset('home/images/header8.jpg')}}" class="img-fluid " alt="offer">
                    <div class="offer-overlay"></div>
                  </div>
                  <div class="offer-info">
                    <div class="offer-info-inner">
                      <p class="heading-bigger text-capitalize">Sale 70%</p>
                      <p class="offer-title-1 text-uppercase font-weight-bold">Don't miss the chance </p>
                      <a href="#products" type="button" class="btn btn-outline-danger text-uppercase mt-4">shope
                          now</a>
                    </div>

                  </div>
                </div>
              </div>

            </a>
            <a href="" style="text-decoration: none;">
              <div class="offer-box text-center position-relative mb-4 mb-sm-0 mb-lg-0">
                <div class="offer-inner">
                  <div class="offer-image position-relative overflow-hidden">
                    <img src="{{asset('home/images/header7.jpg')}}" class="img-fluid " alt="offer">
                    <div class="offer-overlay"></div>
                  </div>
                  <div class="offer-info">
                    <div class="offer-info-inner">
                      <p class="heading-bigger text-capitalize">Sale 70%</p>
                      <p class="offer-title-1 text-uppercase font-weight-bold">Don't miss the chance </p>
                      <a href="#products" type="button" class="btn btn-outline-danger text-uppercase mt-4">shope
                          now</a>
                    </div>

                  </div>
                </div>
              </div>

            </a>
          </div>

          <div class="col-sm-6 col-lg-4 mb-lg-0 mb-0">

            <a href="" style="text-decoration: none;">
              <div class="offer-box text-center position-relative">
                <div class="offer-inner">
                  <div class="offer-image position-relative overflow-hidden">
                    <img src="{{asset('home/images/vg1.jpg')}}" class="img-fluid " alt="offer">
                    <div class="offer-overlay"></div>
                  </div>
                  <div class="offer-info">
                    <div class="offer-info">
                      <div class="offer-info-inner">
                        <p class="heading-bigger text-capitalize">Sale 30%</p>
                        <p class="offer-title-1 text-uppercase font-weight-bold">Don't miss the chance </p>
                        <a href="#products" type="button" class="btn btn-outline-danger text-uppercase mt-4">shope
                          now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>

          </div>

        </div>
      </div>
    </div>



  </section>
  <!-- offer section -->

  <section class="category-scetion ">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="heading text-center  mb-5">
              <h3 class="pb-3 ">CATEGORIES TO BAG</h3>
            </div>
          </div>
        </div>
        <div class=" slider ">

          @foreach($category as $category)

          <div class="col-2">

            <div class="category-image">
              <a href="{{route('filter_category',$category->id)}}"><img src="{{asset('image/'.$category->image.'')}}" class="" alt=""></a>
              <h5 class="text-center mt-3">{{$category->category_name}}</h5>
            </div>

          </div>


          @endforeach

        </div>
      </div>
  </section>

  <section id="products" class="products">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="heading text-center  mb-5">
            <h2 class="pb-3 position-relative d-line-block">FEATURED PRODUCT</h2>
          </div>
        </div>
      </div>

      <div class="row">
        @foreach($products as $product)
        <div class="col-sm-4 col-lg-4  ">
          <a href="#" class="d-block text-decoration-none text-decoration-none text-center mb-4">
            <div class="product-list">
              <a href="{{route('single_product',$product->id)}}">
                <div class="product-image position-relative">
                  <span class="sale">sale</span>
                  <img src="{{asset('image/'.$product->font_image.'')}}" class="product-image-first" alt="">
                  <img src="{{asset('image/'.$product->back_image.'')}}" class="product-image-secondery" alt="">
                </div>
              </a>

              <div class="product-name pt-3 text-center">
                <h3 class="text-captitalize">{{$product->name}}</h3>
                <p class="mb-0 amount ">₹{{$product->price}}<del class="ps-3">₹{{$product->pre_price}}</del></p>
                <div class="py1">
                  <span class="ti-star"></span>
                  <span class="ti-star"></span>
                  <span class="ti-star"></span>
                  <span class="ti-star"></span>
                  <span class="ti-star"></span>
                </div>
                <button type="button" data-id='{{$product->id}}' name="cart" id="cart-btn" class="add_to_cart">ADD TO CART</button>
              </div>
            </div>
          </a>
        </div>
        @endforeach
       
      </div>
      <div class="mx-auto justify-content-center pagination mt-5" >
          {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div class="overflow-hidden my-5">
      <div class="row">
        <div class="col-sm-12 up_to_off">
          <img src="home/images/LK.jpg" alt="" class="img-fluid w-100">
          <div class="up_to_content">
            <h2>UP TO 70% OFF SPRINGSALF!</h2>
          </div>

        </div>
      </div>
    </div>
    </div>
  </section>


</section>


</section>
<!-- 
home section -->


<!-- special section -->

<section class="special" id="special">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="heading text-center  mb-5">
          <h2 class="pb-3 position-relative d-line-block">SUMMER CLASS</h2>
        </div>
      </div>

      <div class="col-sm-12 col-lg-7 text-center text-lg-start">
        <div class="countdown-container">
          <h2 class="text-uppercase">{{$offer->name}}</h2>
          <p class="my-4">
           {{$offer->description}}
          </p>
         
          <input type="text" id="offer_time" value="{{$offer->offer_time}}" style="display: none;">
          <ul class="list-unstyled countdown-counter">
            <li><span class="fs-1 d-block" id="days">00</span>Days</li>
            <li><span class="fs-1 d-block" id="hours">00</span>Hr</li>
            <li><span class="fs-1 d-block" id="min">00</span>Min</li>
            <li><span class="fs-1 d-block" id="sec">00</span>Sec</li>
          </ul>
          <span class="countdown-price h3 d-block mb-4">₹{{$offer->price}}.00 <del class="ms-3">${{$offer->pre_price}}.00</del></span>
          <button type="button" data-id='{{$offer->id}}' name="cart" id="cart-btn" class="add_to_cart btn btn-danger">ADD TO CART</button>
        </div>
      </div>

      <div class="col-sm-12 col-lg-5">
        <div class="special-img position-relative">
          <span class="sale">Sale</span>
          <a href="{{route('single_product',$offer->id)}}"><img src="{{asset('image/'.$offer->font_image.'')}}" class="sale-offer-image" alt=""></a>
        </div>
      </div>


    </div>
  </div>



</section>
<!-- special section -->


<!-- testmonial section -->
<section id="testimonial" class="testimonial">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="heading text-center  mb-5">
          <h2 class="pb-3 position-relative d-line-block">Testimonials</h2>
        </div>
      </div>

      <div class="col-sm-12 col-lg-8 offset-lg-2 text-center">
        <div id="carouselExampleIndicatorsTwo" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide-to="1" aria-label="Slide 2"></button>


          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="testimonial-wrapper">
                <div class="row">
                  <div class="col-sm-12">
                    <img src="home/images/user1.png" class="img-fluid" alt="">
                  </div>
                  <div class="username">
                    <h3>Martin Johe, co-Founder /CEO</h3>
                    <span>Fastcompany ltd.</span>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam minima fugiat et porro vitae quo
                      doloremque? Praesentium cumque quaerat odit possimus? Minus ad, aperiam repellat corporis
                      dolorem officia consequatur corrupti?
                    </p>
                  </div>
                </div>
              </div>

            </div>
            <div class="carousel-item">
              <div class="carousel-item active">
                <div class="testimonial-wrapper">
                  <div class="row">
                    <div class="col-sm-12">
                      <img src="home/images/user2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="username">
                      <h3>Martin Johe, co-Founder /CEO</h3>
                      <span>Fastcompany ltd.</span>
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam minima fugiat et porro vitae
                        quo doloremque? Praesentium cumque quaerat odit possimus? Minus ad, aperiam repellat corporis
                        dolorem officia consequatur corrupti?
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">
              <span class="ti-angle-left slider-icon"></span>
            </span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">
              <span class="ti-angle-right slider-icon"></span>
            </span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection
<script src="{{ asset('jquery.js') }}"></script>
<script src="{{ asset('ajax.js') }}"></script>