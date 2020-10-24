<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cart;
use App\Payment;
use App\Division;
use App\District;
use App\Sub_district;
use App\Union;
use App\Order;
use Auth;
use Session;

class OrderController extends Controller
{
     
    public function __construct()
   {
    $this->middleware('auth');
    



   }
    

     public function index(){

     	$divisions = Division::orderBy('id','asc')->get();

        $districts = District::orderBy('id','asc')->get();

        $sub_districts = Sub_district::orderBy('id','asc')->get();

        $unions = Union::orderBy('id','asc')->get();


     	$payments = Payment::orderBy('priority','asc')->get();
return view('pages.checkouts',compact('payments','divisions','districts','sub_districts','unions'));
     }

    




    public function store(Request $request){

    	$validatedData = $request->validate([
        'name' => 'required',
        'phone_no' => 'required',
        'payment_method_id' => 'required',
        'division_id' => 'required',
        'district_id' => 'required',
        'sub_district_id' => 'required',
        'union_id' => 'required',

     

    ]);
    	$order = new Order();

    	if ($request->payment_method_id != 'cash_in') {
    		if ($request->transaction_id == NULL || empty($request->transaction_id)) {

    			session()->flash('sticky_error','give transaction id');
    			return back();

    		}
    	}


    	$order->name = $request->name;
    	$order->phone_no = $request->phone_no;
    	$order->ip_address = request()->ip();
        $order->transaction_id = $request->transaction_id;
        $order->division_id = $request->division_id;
        $order->district_id = $request->district_id;
        $order->sub_district_id = $request->sub_district_id;
        $order->union_id = $request->union_id;
    	if (Auth::check()) {
    		# code...
    		$order->user_id = Auth::id();
    	}
    	


    	$order->payment_id = Payment::where('short_name',$request->payment_method_id)->first()->id;

    	$order->save();

    	foreach (Cart::totalCarts() as $cart) {
    		$cart->order_id = $order->id;

    		$cart->save();
    		# code...
    	}
    	

       session()->flash('success','আপনার অর্ডারের জন্য আবেদনটি সম্পূর্ন হয়েছে আপনার সাথে তাড়াতাড়ি যোগাযোগ করা হবে');

    	return redirect()->back();



    }

 
     


}
