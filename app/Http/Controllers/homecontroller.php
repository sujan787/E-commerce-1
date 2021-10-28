<?php

namespace App\Http\Controllers;

use App\Models\add_category;
use App\Models\add_product;
use App\Models\bill;
use App\Models\contact_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class homecontroller extends Controller
{
    function index()
    {

        $category = add_category::all();
        $offer=add_product::where('offer','=',1)->first();
        $products = add_product::paginate(9);
        return view('Home.home', compact('category', 'products','offer'));
    }

    public function redirect()
    {
        if (Auth::id()) {

            if (Auth::user()->usertype == '0') {
                return redirect()->route('home');
            } else {
                return redirect()->route('add_product_view');
            }
        } else {
            return redirect()->back();
        }
    }

    public function filtercategory($id)
    {
        $category = add_category::all();
        $product = add_product::where([
            'category' => $id

        ])->get();
        return (view('Home.filter_category', compact('product', 'category')));
    }
    public function singleproduct($id)
    {
        $product = add_product::where(
            'id',
            '=',
            $id
        )->first();
        return (view('Home.product', compact('product')));
    }
    public function search()
    {
        $category = add_category::all();
        $search_text = $_GET['search'];
        $product = add_product::where('name', 'LIKE', '%' . $search_text . '%')->get();
        return view('Home.filter_category', compact('product', 'category'));
    }


    public function add_contact(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'massage' => 'required'
        ]);

        $input = $request->all();
        contact_info::create($input);
        return redirect()->route('home')->with('success', 'massage send  successfully.');
    }

    public function contact_view(){
        $user=contact_info::all();
        return view('Admin.contact_info',compact('user'));
    }

    public function order(){
        if (session()->has('password_hash_web')) {
       $userpass=session()->get('password_hash_web');
       $users = user::where('password', '=', $userpass)->first();
       $order = bill::where('userid', '=', $users->id)->first();
       $product_array=$order->products;
        $product_details = json_decode($product_array,true);
        $array_id = array_keys($product_details);
        $values = array_values($product_details);
        $product = add_product::whereIn('id', $array_id)->get();
        return view('Home.order',compact('product','product_details','order'));
        }else{
            return redirect()->back()->with('error','please login your account');
        }
    }
}
