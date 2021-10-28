@extends('Template.home_template');
@section('content')

@section('style')
<style>
        .category-scetion {
            padding-top: 4rem;
            height: 28rem;
        }

        .slick-next:before {
            color: red !important;
            position: absolute;
            bottom: 36px;
            right: 10px;
        }

        .slick-prev:before {
            color: red !important;
            position: absolute;
            bottom: 36px;
            left: 10px;
        }
        .products {
    padding-top: 3.75rem;
}
        @media (max-width:735px) {
            .category-scetion {

                height: 15rem;
            }

            .slick-next:before {

                bottom: 11px;
                right: 3px;
            }

            .slick-prev:before {

                bottom: 11px;
                left: 3px;
            }
        }
    </style>
@endsection


    <!-- offer section -->

    <section class="category-scetion ">
        <div class="container-fluid">
            <div class="container">

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
            @foreach($product as $product)
        <div class="col-sm-4 col-lg-4  ">
          <a href="#" class="d-block text-decoration-none text-decoration-none text-center mb-4">
            <div class="product-list">
              <a href="{{route('single_product',$product->id)}}">
                <div class="product-image position-relative">
                  <span class="sale">sale</span>
                  <img src="{{asset('image/'.$product->font_image.'')}}" class=" img-fluid product-image-first" alt="">
                  <img src="{{asset('image/'.$product->back_image.'')}}" class="img-fluid product-image-secondery" alt="">
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
            <div class="overflow-hidden my-5">
                <div class="row">
                    <div class="col-sm-12 up_to_off">
                        <img src="{{asset('home/images/LK.jpg')}}" alt="" class="img-fluid w-100">
                        <div class="up_to_content">
                            <h2>UP TO 70% OFF SPRINGSALF!</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


   
    <!-- 
home section -->


    <!-- special section -->

  @endsection

  <script src="{{ asset('jquery.js') }}"></script>
<script src="{{ asset('ajax.js') }}"></script>