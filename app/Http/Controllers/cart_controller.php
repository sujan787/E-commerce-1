<?php

namespace App\Http\Controllers;
use App\Models\add_product;
use Illuminate\Http\Request;

class cart_controller extends Controller
{
    public function addToCart(Request $request)
    {



        $cart = session()->has('cart') ? session()->get('cart') : [];
        if (array_key_exists($request->id, $cart)) {
            $cart[$request->id] += 1;
        } else {
            $cart[$request->id] = 1;
        }
        session(['cart' => $cart]);
        session()->flash('message', $request->title . ' added to cart.');

        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        return response()->json($data);
    }
    public function updatecart(Request $request)
    {

     $cart=session()->get('cart');
     if (array_key_exists($request->cart_id, $cart)) {
            $cart[$request->cart_id] = $request->update_quantity;
            session(['cart' => $cart]);
      
       return("sucessfully updated");
        }
    }

    public function delete_cart(Request $request)
    {

        if($request->delete_id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->delete_id])) {
                unset($cart[$request->delete_id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }

   
  
    }

    public function view_cart()
    {


        if(session()->has('cart')){
            $a = session()->get('cart');
       
            $array = array_keys($a);
           
            $product = add_product::whereIn('id', $array)->get();
            return (view('Home.view_cart', compact('product')));
        }else{
            return redirect()->back()->with('error', 'No item is added for cart.');
        }


       
    }
}
