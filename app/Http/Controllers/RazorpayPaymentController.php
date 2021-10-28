<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\add_product;

class RazorpayPaymentController extends Controller
{
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {        

        $a = session()->get('cart');
        
        $array = array_keys($a);


        $product = add_product::whereIn('id', $array)->get();
        
        return view('index.razorpayView');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        
        return redirect()->back()->with('success', 'Product created successfully.');
    }
}
