<?php

namespace App\Http\Controllers; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\bill;
use Illuminate\Http\Request;

class placeordercontroller extends Controller
{
    public function index(){
    
        if (Auth::check()) {
                
           
                $curt=session()->get('cart');
                $curt_no=count($curt);
                if($curt_no==0){

                    return redirect()->route('home')->with('error','No item is added in cart');

                }else{
                    $user= User::where('password','=',session()->get('password_hash_web'))->first();
            
                    return view('Home.place_order_view',compact('user'));
                }
            
           
          
           
          
        }else{
           return redirect()->route('register');
        }
    
    }
    
    public function placeorder(Request $request){
    
        $this->validate($request, [
            'address' => 'required',
            'number' => 'required'
           
        ]);
        $order = $request->all();
       
        
        $array = session()->get('cart');
        $order['products']=json_encode($array);
    
        $user= User::where('password','=',session()->get('password_hash_web'))->first();
        $order['userid']=$user->id;
        $order['total']=session()->get('total');
       
       bill::create($order);
       if(session()->has('cart')){
        session()->forget('cart');
       }
        return redirect()->route('home')->with('success','Order Placed');
    
    
    }
}
