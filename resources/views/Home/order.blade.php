@extends('Template.home_template');
@section('content')
<div id="quantity">
    <div class="container">
        <div class="pt-5  cart-table" style="margin-top: 3rem;    margin-bottom: 4rem;">
            <div class="scroll" style="overflow-x: scroll !important;">
                <table class="table product-table">
                    <thead class="bg-danger text-white ">
                        <tr>
                            <th scope="col" class="hide-table">ITEM</th>
                            <th scope="col" class="hide-table"></th>

                            <th scope="col" class="hide-table">PRICE</th>
                            <th scope="col" class="hide-table">QUANTITY</th>
                            <th scope="col" class="hide-table">TOTAL</th>
                            <th scope="col" class="hide-table">TIME & DATE</th>

                            <th scope="col" class="show-table" style="display: none;">YOUR CART ITEMS</th>
                        </tr>
                    </thead>
                    <tbody class="">
                          @foreach($product as $product)
                          @php
                          
                          $gtotal=null;
                          $total=$product->price * $product_details[$product->id];
                          $gtotal+=$total;



                          @endphp
                        <tr class="">
                            <td scope="row" class="">
                                <img src="{{asset('image/'.$product->font_image.'')}}" style="width: 5rem;" alt="">


                            </td>
                            <td scope="row" class="blur">


                                <h5 class="fs-5 ">{{$product->name}}</h5>
                                <p>WEB ID: {{$product->id}}</p>


                            </td>

                            <td class="cart-table blur">
                                <p>₹{{$product->price}}</p>
                            </td>
                            <td class="blur">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_input text-center" type="text" cart-id="{{$product->id}}" disabled name="quantity" value="{{$product_details[$product->id]}}" autocomplete="off" size="2">

                                </div>

                            </td>
                            <td class="cart_total blur">
                                <p class="cart_total_price ">₹{{$product->price * $product_details[$product->id]}} </p>
                            </td>

                            <td class="cart_total blur">
                                <p class="cart_total_price ">{{$order->time}} </p>
                            </td>
                           
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


            <a href="{{route('place_order_view')}}" class=" btn  btn-danger px-5 mt-3 w-100">Total Price ( ₹{{$gtotal}} )</a>

<div class="d-flex justify-content-center align-items-center w-100 mt-5">
<a href="{{route('pdf_converter')}}" class="btn btn-outline-danger">Download PDF</a>
</div>
            
        </div>
    </div>
</div>

@endsection
<script src="jquery.js"></script>