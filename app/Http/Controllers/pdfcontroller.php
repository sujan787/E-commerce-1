<?php

namespace App\Http\Controllers;
use App\Models\bill;
use App\Models\User;
use App\Models\add_product;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;

class pdfcontroller extends Controller
{
    public function pdf_view(){
        $userpass=session()->get('password_hash_web');
        $users = user::where('password', '=', $userpass)->first();
        $order = bill::where('userid', '=', $users->id)->first();
        $product_array=$order->products;
         $product_details = json_decode($product_array,true);
         $array_id = array_keys($product_details);
         $values = array_values($product_details);
         $product = add_product::whereIn('id', $array_id)->get();
         return view('pdf_view',compact('product','product_details','order','users'));
    }

    public function pdf_converter(){

        $userpass=session()->get('password_hash_web');
        $users = user::where('password', '=', $userpass)->first();
        $order = bill::where('userid', '=', $users->id)->first();
        $product_array=$order->products;
         $product_details = json_decode($product_array,true);
         $array_id = array_keys($product_details);
         $values = array_values($product_details);
         $product = add_product::whereIn('id', $array_id)->get();

     
        $pdf_doc = PDF::loadView('pdf_view', compact('product','product_details','order','users'));
      

        return $pdf_doc->download('pdf.pdf');
    }
}
