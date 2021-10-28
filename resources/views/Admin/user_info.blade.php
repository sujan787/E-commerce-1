@extends('template.admin_template');
@section('content')


<table class="table">
    <thead class=" text-primary">
        <th>
           USER ID
        </th>
        <th>
            USER NAME
        </th>
        <th>
           EMAIL
        </th>
        <th>
            PHONE
        </th>
        <th>
            CREATED AT
        </th>
        <th>
            UPDATED AT
        </th>
       

    </thead>
    <tbody>
    @foreach($user as $user)
        <tr>
            <td>
                {{$user->id}}
            </td>
            <td>
            {{$user->name}}
            </td>
            <td class="text-primary">
            {{$user->email}}
            </td>
            <td class="text-primary">
            {{$user->phone}}
            </td>
            <td class="text-primary">
            {{$user->created_at}}
            </td>
            <td class="text-primary">
            {{$user->updated_at}}
            </td>
           
           
        </tr>
     
      
   @endforeach
    
        
    </tbody>
</table>











@endsection