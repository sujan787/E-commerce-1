<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\bill;
use App\Models\add_product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function user_info(){
       $user=User::all();
       return view('Admin.user_info',compact('user'));
    }

    public function order_info(){

        $order = DB::table('users')->join('bill','users.id','=','bill.userid')->select('users.name as name','users.email as email','bill.id as id','bill.number as number','bill.address as address','bill.payment as payment','bill.total as total')->get();
        return view('Admin.order_info',compact('order'));


    }


    public function order_product($id){

        $product=bill::where('id','=',$id)->first();
        $product_array=$product->products;
        $product_details = json_decode($product_array,true);
        $array_id = array_keys($product_details);
        $values = array_values($product_details);
        $product = add_product::whereIn('id', $array_id)->get();
        return view('Admin.order_product',compact('product','product_details'));

    }
}
