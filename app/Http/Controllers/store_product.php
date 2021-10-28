<?php

namespace App\Http\Controllers;

use App\Models\add_category;
use App\Models\add_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class store_product extends Controller
{


    function index()
    {
        $category = add_category::all();
        return view('Admin.add_product', compact('category'));
    }

    public  function show()
    {
        $product = DB::table('add_category')->join('add_product','add_category.id','=','add_product.category')->select('add_product.id as id','add_product.name as name','add_product.price as price','add_product.pre_price as pre_price','add_product.description as description','add_category.category_name as category','add_product.font_image as font_image','add_product.back_image as back_image','add_product.offer as offer')->get();
       
       
        return view('Admin.view_product', compact('product'));
    }


    public  function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'pre_price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'font_image' => 'required',
            'back_image' => 'required'

        ]);
        $input = $request->all();
         $input['offer_price']=$request->price;
        if ($image = $request->file('font_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis')."f" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['font_image'] = "$profileImage";
        }
        if ($image = $request->file('back_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis')."b" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['back_image'] = "$profileImage";
        }
        add_product::create($input);


        return redirect()->route('add_product_index')
            ->with('success', 'Product created successfully.');
    }
    public  function edit($id)
    {
        $category = add_category::all();
        $product = add_product::find($id);
        return view('Admin.edit_product', compact('product', 'category'));
    }
    public function update(Request $request,$id)
    {
  
        $input = $request->all();
     
        $query =add_product::find($id);
        $query['offer_price']=$request->price;
        if ($image = $request->file('font_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis')."f" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['font_image'] = "$profileImage";
        }
        else {
            unset($input['font_image']);
        }
        if ($image = $request->file('back_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis')."b" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['back_image'] = "$profileImage";
        }
        else {
            unset($input['back_image']);
        }
       
        
      
        $query->update($input);

        return redirect()->route('add_product_view')
            ->with('success', 'Product updated successfully');
    }


    public function destroy($id)
    {
        $query = add_product::find($id);
        $query->delete();
        return redirect()->route('add_product_view')
            ->with('success', 'Product deleted successfully');
    }

    public function set_offer($id){
        $product = add_product::find($id);
        $offer_no=add_product::where('offer','=',1)->count();
        if($offer_no==0){
            return view('Admin.offer', compact('product'));
        }else{
            return redirect()->route('add_product_view')
            ->with('error', 'offer already added atfirst remove this');
        }
       
    }
   

    public function add_offer(Request $request,$id){
        $input = $request->all();
     
        $query =add_product::find($id);
        $query['offer']=1;
        $query['offer_price']=$query->price;
        $query->update($input);

        return redirect()->route('add_product_view')
            ->with('success', 'offer added successfully');
    }

    public function remove_offer($id){
       
     
        $query =add_product::find($id);
        $query['offer']=0;
        $query['price']=$query->offer_price;
       
        $query['offer_time']=0;
        $query->update();

        return redirect()->route('add_product_view')
            ->with('success', 'offer remove successfully');
    }
}
