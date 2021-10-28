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
           MASSAGE
        </th>
        <th>
            TINE
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
            {{$user->massage}}
            </td>
            <td class="text-primary">
            {{$user->time}}
            </td>
         
           
           
        </tr>
     
      
   @endforeach
    
        
    </tbody>
</table>











@endsection