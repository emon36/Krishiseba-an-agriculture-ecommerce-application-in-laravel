<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;


class AdminOrderController extends Controller
{
   

   public function index(){

   	$orders = Order::orderBy('id','desc')->get();
   	return view('admin.pages.orders.index',compact('orders'));
   }


   public function show($id){

   	$order = Order::find($id);
   	$order->seen = 1;
   	$order->save();
   	return view('admin.pages.orders.show',compact('order'));
   }

   public function completed($id){

   	  	$order = Order::find($id);
   	if ($order->completed) {

   		$order->completed = 0;
   	
   	}

   	else{
   		$order->completed = 1;
   	}

   	$order->save();
   	return back();

   
   }
   public function paid($id){

   	$order = Order::find($id);
   	if ($order->paid) {

   		$order->paid = 0;
   	}

   	else{
   		$order->paid = 1;
   	}

   	$order->save();

   	return back();
   }

    public function delete($id){
    	$order =  Order::find($id);
    	if (!is_null($order)) {
    		$order->delete();
    	}
    	session()->flash('success','Order deleted successfully');
        return redirect()->route('admin.orders');
}
}
