<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Auth;

class CartController extends Controller
{


    
    public function index()
    {
        return view('pages.carts');
    }

   
   
    public function store(Request $request)
    {

        $this->validate($request, [
            'product_id' => 'required'
            



        ]);


        if (Auth::check()) {

            # code...

        $cart =   Cart::Where('user_id', Auth::id()) 
                      ->orWhere('ip_address',request()->ip())
                      ->Where('product_id',$request->product_id)
                      ->first();

            
        }else{
            $cart =   Cart::Where('ip_address',request()->ip())
                      ->Where('product_id',$request->product_id)
                      ->first();
                  }



                        $cart = new Cart();

                 if (Auth::check()) {
                    $cart->user_id = Auth::id();
                

        $cart->ip_address = request()->ip();
        $cart->product_id = $request->product_id;
        $cart->save();
        
    }
    else {
       $cart->ip_address = request()->ip();
        $cart->product_id = $request->product_id;
        $cart->save();
      }

      


      session()->flash('success','আইটেমটির  সফলভাবে আপনার শপিং ব্যাগ যোগ করা হয়েছে'); 
        return back();
    
    }


    public function update(Request $request, $id){

        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->product_quantity = $request->product_quantity;
            $cart->save();

        }else{

            return redirect()->route('carts');
        }
        
        session()->flash('success','আইটেমটির পরিমান সফলভাবে যোগ করা হয়েছে ');
        return back();

        


    }

    public function delete($id){

        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->delete();

    }
    session()->flash('success','আইটেমটির  সফলভাবে আপনার শপিং ব্যাগ থিকে মুছে ফেলা হয়েছে ');

return redirect()->route('carts');

    }
}
       