@extends('Template.home_template');
@section('content')
    <!-- offer section -->


    <div class="container" style="margin-top: 8rem;">
        <div class="product-details row">
            <!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{asset('image/'.$product->font_image.'')}}" class="product-image" alt="" />
                    <h3 class="bg-danger">sale</h3>
                </div>


            </div>
            <div class="col-sm-7">
                <div class="product-information ">
                    <!--/product-information-->
                    <img src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
                    <h2>{{$product->name}}</h2>
                    <p>Web ID: {{$product->id}}</p>

                    <span>
                        <span class="text-danger">RS ₹{{$product->price}}</span>
                        <label>Quantity:</label>
                        <input type="text" value="1" disabled />
                        <button type="button" data-id='{{$product->id}}' name="cart" id="cart-btn" class="ms-3 add_to_cart btn btn-danger">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </span>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> E-SHOPPER</p>
                    <a href=""><img src="{{asset('images/product-details/share.png')}}" class="share img-responsive" alt="" /></a>
                    <div class="description mt-5" style="overflow-y: scroll;">
                    <h2 class="text-center">Product Details</h2>
                    {{$product->description}}
                    </div>
                </div>
                <!--/product-information-->
            </div>
        </div>
    </div>

    <!-- 
home section -->


    <!-- special section -->

   @endsection
   <script src="{{ asset('jquery.js') }}"></script>
<script src="{{ asset('ajax.js') }}"></script>