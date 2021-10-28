@extends('Template.admin_template');
@section('content')

<table class="table">
    <thead class=" text-primary">
        <th>
            ID
        </th>
        <th>
            Name
        </th>
        <th>
            PRICE
        </th>
        <th>
            PRE PRICE
        </th>
        <th>
            DESCRIPTION
        </th>
        

        <th>
            FONT PHOTO
        </th>
        <th>
            BACK PHOTO
        </th>
        <th>
            QUANTITY
        </th>


    </thead>
    <tbody>
      
        @foreach($product as $product)
        <tr>
            <td>
                {{$product->id}}
            </td>
            <td>
                {{$product->name}}
            </td>
            <td>
                {{$product->price}}
            </td>
            <td>
                {{$product->pre_price}}
            </td>
            <td>
                {{$product->description}}
            </td>

         

            <td>
                <img src="/image/{{ $product->font_image }}" width="100px" height="100px">
            </td>
            <td>
                <img src="/image/{{ $product->back_image }}" width="100px" height="100px">
            </td>
            <td class="text-primary">
              
             {{$product_details[$product->id]}}
             
            </td>
        </tr>
        @endforeach
      

    </tbody>
</table>



@endsection