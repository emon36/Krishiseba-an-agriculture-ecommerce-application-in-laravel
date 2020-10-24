<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpline;
use App\Division;

class AdminHelplineController extends Controller
{
    

   public function index(){

   	$helplines = Helpline::orderBy('id','desc')->get();
  
   	return view('admin.pages.helpline.index',compact('helplines'));
   }

 public function completed($id){

        $helpline = Helpline::find($id);
    if ($helpline->completed) {

      $helpline->completed = 0;
    
    }

    else{
      $helpline->completed = 1;
    }

    $helpline->save();
    return back();

   
   }

    public function delete($id){
    	$helpline =  Helpline::find($id);
    	if (!is_null($helpline)) {
    		$helpline->delete();
    	}
    	session()->flash('success','Order deleted successfully');
        return redirect()->route('admin.helplines');
}

}
