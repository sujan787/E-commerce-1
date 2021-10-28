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
            CATEGORY
        </th>

        <th>
            FONT PHOTO
        </th>
        <th>
            BACK PHOTO
        </th>
        <th>
            EDIT
        </th>
        <th>
            DELETE
        </th>
        <th>
            ADD FOR OFFER
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
            <td class="text-primary">
                {{$product->category}}
            </td>

            <td>
                <img src="/image/{{ $product->font_image }}" width="100px" height="100px">
            </td>
            <td>
                <img src="/image/{{ $product->back_image }}" width="100px" height="100px">
            </td>
            <td class=""><a type="submit" class="btn btn-outline-info" href="{{ route('add_product_edit',$product->id) }}">Edit</a></td>
            <td class=""><a type="submit" class="btn btn-outline-info" href="{{ route('add_product_destroy',$product->id) }}">Delete</a></td>
            @if($product->offer == '0')
            <td class=""><a type="submit" class="btn btn-outline-info" href="{{ route('offer',$product->id) }}">Add</a></td>
            @else
           
            <td class=""><a type="submit" class="btn btn-outline-info" href="{{ route('remove_offer',$product->id) }}">Remove</a></td>
            @endif
        </tr>


        @endforeach


    </tbody>
</table>



@endsection