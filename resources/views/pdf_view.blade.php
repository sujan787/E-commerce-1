<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        * {
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
           
        }

        th {
            padding: 15px;
        }

        td{
            text-align: center;
        }

        table {
            margin-bottom: 25px;
        }

        button {

            text-decoration: none;
            background: #dc3545;
            border: #dc3545;
            color: white;
            padding: 10px;

        }

        h1 {
            font-size: 30px;
            text-align: center;
            font-weight: bold;
        }

        span {
            font-size: 30px;
            color: #dc3545;
        }

        .information {
            padding-top: 5px;
            text-align: center;
            color: grey;
        }
       
        input{
            text-align: center;
        }
    </style>
</head>

<body class="bg-white" style="background: white !important;">

    <h1>E- <SPan>SHOPE</SPan></h1>
    <div class="information">
        <p>User Name : {{$users->name}} </p>
        <p>User Email : {{$users->email}} </p>
        <p>User Number : {{$order->number}} </p>
        <p>User Adress : {{$order->address}}</p>
    </div>
    <div class="container" class="bg-white">
        <div class="pt-5  cart-table" style="margin-top: 3rem;    margin-bottom: 4rem;">
            <div class="scroll">
                <table class="table product-table">
                    <thead class="bg-danger text-white " style="background: #dc3545;color:white">
                        <tr>
                            <th scope="col" class="hide-table">ITEM</th>
                            <th scope="col" class="hide-table"></th>

                            <th scope="col" class="hide-table">PRICE</th>
                            <th scope="col" class="hide-table">QUANTITY</th>
                            <th scope="col" class="hide-table">TOTAL</th>
                            <th scope="col" class="hide-table">TIME & DATE</th>

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
                                <img src="{{public_path('image/'.$product->font_image.'')}}" style="width: 5rem;" alt="">


                            </td>
                            <td scope="row" class="blur">


                                <h5 class="fs-5 ">{{$product->name}}</h5>
                                <p>WEB ID: {{$product->id}}</p>


                            </td>

                            <td class="cart-table blur">
                                <p>{{$product->price}}</p>
                            </td>
                            <td class="blur">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_input text-center" type="text" cart-id="{{$product->id}}" disabled name="quantity" value="{{$product_details[$product->id]}}" autocomplete="off" size="2">

                                </div>

                            </td>
                            <td class="cart_total blur">
                                <p class="cart_total_price ">{{$product->price * $product_details[$product->id]}} </p>
                            </td>

                            <td class="cart_total blur">
                                <p class="cart_total_price ">{{$order->time}} </p>
                            </td>


                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


            <button>Total Price ( {{$gtotal}} )</button>
        </div>
    </div>
</body>


</html>