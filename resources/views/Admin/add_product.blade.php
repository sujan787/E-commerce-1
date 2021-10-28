@extends('Template.admin_template');
@section('content')








<form action="{{route('add_product_store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">product name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">pre_Price</label>
    <input type="text" name="pre_price" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">description</label>
    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <select class="form-select mb-5 mr-3" name="category" aria-label="Default select example">
    <option selected>Open this select menu</option>
    @foreach($category as $category)
    <option value="{{$category->id}}">{{$category->category_name}}</option>
    @endforeach
  </select>
 
  <div class="mb-5">
    <label for="formFile" class="form-label">select a image for front</label>
    <input name="font_image" class="form-control" type="file" id="font_image">
  </div>
  <div class="img-holder1"></div>
  <div class="mb-5">
    <label for="formFile" class="form-label">select a image for back</label>
    <input name="back_image" class="form-control" type="file" id="back_image">
  </div>
  <div class="img-holder2"></div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>








<script src="{{asset('jquery.js')}}"></script>



<script>

 
    $(document).ready(function() {

        $('input[type="file"][name="font_image"]').on('change', function() {
            var img_path = $(this)[0].value;
            var img_holder = $('.img-holder1');
            var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();
            if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {

                if (typeof(FileReader) != 'undefined') {

                    img_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e) {

                        $('<img/>', {
                            'src': e.target.result,
                            'calss': 'img-fluid',
                            'style': 'max-width:100px;margin-bottom:10px'
                        }).appendTo(img_holder);
                    }

                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    $(img_holder).html(
                        ' this browser not support filereader'
                    )
                }
            } else {
                $(img_holder).empty();
            }

        })


        $('input[type="file"][name="back_image"]').on('change', function() {
            var img_path = $(this)[0].value;
            var img_holder = $('.img-holder2');
            var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();
            if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {

                if (typeof(FileReader) != 'undefined') {

                    img_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e) {

                        $('<img/>', {
                            'src': e.target.result,
                            'calss': 'img-fluid',
                            'style': 'max-width:100px;margin-bottom:10px'
                        }).appendTo(img_holder);
                    }

                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    $(img_holder).html(
                        ' this browser not support filereader'
                    )
                }
            } else {
                $(img_holder).empty();
            }

        })

    });
</script>





@endsection