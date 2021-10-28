@extends('Template.admin_template');
@section('content')

<table class="table">
    <thead class=" text-primary">
        <th>
            ID
        </th>
        <th>
            CATEGORY Name
        </th>
        <th>
            CATEGORY IMAGE
        </th>
        <th>
            EDIT
        </th>
        <th>
            DELETE
        </th>

    </thead>
    <tbody>
    @foreach($category as $category)
        <tr>
            <td>
                {{$category->id}}
            </td>
            <td>
            {{$category->category_name}}
            </td>
           
            <td>
            <img src="/image/{{ $category->image }}" width="100px" height="100px">
            </td>
            <td class=""><a type="submit" class="btn btn-outline-info" href="{{ route('add_category_edit',$category->id) }}">Edit</a></td>

            <td class=""><a type="submit" class="btn btn-outline-info" href="{{ route('add_category_destroy',$category->id) }}">Delete</a></td>
        </tr>
     
      
   @endforeach
    
        
    </tbody>
</table>


@endsection