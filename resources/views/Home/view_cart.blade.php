@extends('Template.home_template');
@section('content')
<div id="quantity" >
<div class="container" >
    <div class="pt-5 mt-sm-0 cart-table" style="margin-top: 3rem;    margin-bottom: 4rem;" >
        <div class="scroll" style="overflow-x: scroll !important;">
            <table class="table product-table">
                <thead class="bg-danger text-white ">
                    <tr>
                        <th scope="col" class="hide-table">ITEM</th>
                        <th scope="col" class="hide-table"></th>
                      
                        <th scope="col" class="hide-table">PRICE</th>
                        <th scope="col" class="hide-table">QUANTITY</th>
                        <th scope="col" class="hide-table">TOTAL</th>
                        <th scope="col" class="hide-table">DELETE</th>
                        <th scope="col" class="show-table" style="display: none;">YOUR CART ITEMS</th>
                    </tr>
                </thead>
                <tbody class="">
                    @php
                    $gtoltal=null;
                    @endphp
                    @foreach($product as $product)
                    @php
                    $total = $product->price * session()->get('cart')[$product->id];
                    $gtoltal+=$total;
                    @endphp
                    <tr class="">
                        <td scope="row" class="">
                            <img src="{{asset('image/'.$product->font_image.'')}}" style="width: 5rem;" alt="">
                           

                        </td>
                        <td scope="row" class="blur">
                           
                          
                                <h5 class="fs-5 ">{{$product->name}}</h5>
                                <p>WEB ID: {{$product->id}}</p>
                           

                        </td>
                        
                        <td class="cart-table blur"  >
                            <p>₹{{$product->price}}</p>
                        </td>
                        <td  class="blur">
                            <div class="cart_quantity_button" >

                                <input class="cart_quantity_input text-center" type="text" cart-id="{{$product->id}}" name="quantity" value="{{session()->get('cart')[$product->id]}}" autocomplete="off" size="2">

                            </div>

                        </td>
                        <td class="cart_total blur">
                            <p class="cart_total_price ">₹ {{$total}}</p>
                        </td>
                        <td class="blur"><a class="cart_quantity_delete text-decoration-none " href="" data-id='{{$product->id}} '><span class="ti-trash fs-4 text-danger"></span></a></td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        @php
        session()->put('total',$gtoltal);
        @endphp
      
        <a href="{{route('place_order_view')}}" class=" btn  btn-danger px-5 mt-3">Pace Order ( ₹ {{$gtoltal}} )</a>
    </div>
</div>
</div>

@endsection
<script src="jquery.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("change", '.cart_quantity_input', function() {
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var cart_id = $(this).attr('cart-id');
            var update_quantity = $(this).val();
            alert("Updated Quantity"+update_quantity);
            $.ajax({
                url: "/updatecart",
                method: "patch",
                data: {
                    cart_id,
                    update_quantity
                },
                success: function(data) {
                    console.log("Updated Quantity"+ data);

                    $("#quantity").load(location.href + " #quantity");


                }
            });

        });
    });
    $(document).on("click", ".cart_quantity_delete", function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var delete_id = $(this).attr('data-id');

        $.ajax({
            url: "delete_cart",
            method: "delete",
            data: {
                delete_id
            },
            success: function(data) {
                $("#quantity").load(location.href + " #quantity");
                $("#cart-no").load(location.href + " #cart-no");
            }
        });

    });
</script>