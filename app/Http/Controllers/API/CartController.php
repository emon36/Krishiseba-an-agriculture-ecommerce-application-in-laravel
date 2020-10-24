<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Cart;
use Auth;

class CartController extends Controller
{


    
    
   
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


      session()->flash('success','Product has added to cart !!'); 
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

        return json_encode(['status' => 'success', 'Message' => 'Added' , 'totalItems' => Cart::totalItems()]);


    }

    public function delete($id){

        $cart = Cart::find($id);
        if (!is_null($cart)) {
            $cart->delete();

    }

return redirect()->route('carts');

    }
}
       