@extends('template.admin_template');
@section('content')

<table class="table">
    <thead class=" text-primary">
        <th>
           ODER ID
        </th>
        <th>
            USER NAME
        </th>
        <th>
           EMAIL
        </th>
        <th>
            PRODUCTS & QUENTITY
        </th>
        <th>
            ADRESS
        </th>
        <th>
            PHONE
        </th>
        <th>
            TOTAL PRICE
        </th>
        <th>
            PAYMENT
        </th>
       

    </thead>
    <tbody>
    @foreach($order as $order)
        <tr>
            <td>
                {{$order->id}}
            </td>
            <td>
            {{$order->name}}
            </td>
            <td class="text-primary">
            {{$order->email}}
            </td>
            <td class="text-primary">
            <a href="{{route('order_product',$order->id)}}" class="btn btn-primary">click Here</a>
            </td>
            <td class="text-primary">
            {{$order->address}}
            </td>
            <td class="text-primary">
            {{$order->number}}
            </td>
            <td class="text-primary">
            {{$order->total}}
            </td>
            @if($order->payment==null)
            <td class="text-primary">
           DONE
            </td>
            @else
            <td class="text-primary">
           LEFT
            </td>
           @endif
           
        </tr>
     
      
   @endforeach
    
        
    </tbody>
</table>




@endsection













