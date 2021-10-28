<?php

namespace App\Http\Controllers;
use App\Models\add_category;
use Illuminate\Http\Request;

class store_category extends Controller
{


  public  function index(){
        return view('Admin.add_category');
    }



    public  function show(){
        $category=add_category::all();
        return view('Admin.view_category',compact('category'));
    }



  public  function store(Request $request){

     
        $request->validate([
         
            'category_name' => 'required',
            'image' => 'required'
           
            
        ]);
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        add_category::create($input);

       
        return redirect()->route('add_category_index')
        ->with('success', 'Product created successfully.');

    }

  

  public  function edit($id){
        $category=add_category::find($id);
        return view('Admin.edit_category',compact('category'));
    }

    

   public function update(Request $request,$id){
        
     
    $input = $request->all();
  
    if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    }else{
        unset($input['image']);
    }
    $query=add_category::find($id);
    $query->update($input);

    return redirect()->route('add_category_view')
                    ->with('success','Product updated successfully');


    }

   public function destroy($id){
        $query=add_category::find($id);
        $query->delete();
        return redirect()->route('add_category_view')
        ->with('success','Product deleted successfully');
        
    }
}
