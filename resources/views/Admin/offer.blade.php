@extends('Template.admin_template');
@section('content')







<form action="{{route('add_offer',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h3 class="text-white">Price of the item is {{$product->price}}</h3>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">enter offer price</label>
        <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">enter offer time</label>
        <input type="text" name="offer_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection