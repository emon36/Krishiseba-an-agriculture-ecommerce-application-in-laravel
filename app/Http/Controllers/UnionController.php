<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sub_district;
use App\Union;  

class UnionController extends Controller
{
    
    public function index()

    {

    	$unions = Union::orderBy('id','desc')->get();
    	return view('admin.pages.unions.manage',compact('unions'));
    }

    public function create()
    {
    	 $sub_districts = Sub_district::orderBy('id','desc')->get();

    	return view('admin.pages.unions.create',compact('sub_districts'));

    }

   public function store(Request $request)
    {
    
    		
    	$this->validate($request,[
    		'name' => 'required' 
    	]);


    	$union = new Union();
    	$union->name = $request->name;
    	$union->sub_district_id = $request->sub_district_id;
    	$union->save();

    	 session()->flash('success','union added successfully');
    	 return redirect()->route('admin.unions');
}

public  function edit($id)
{
	  $sub_districts = Sub_district::orderBy('id','desc')->get();

	$union = Union::find($id);
	if (!is_null($union)) {

		return view('admin.pages.unions.edit',compact('sub_districts','union'));
		# code...
	}else {
		# code...
		return redirect()->route('admin.unions');

	}

}
 public function update(Request $request,$id)
    {
    
    		
    	$validatedData = $request->validate([
        'name' => 'required',
        


    	]);



    	$union = new Union();
    	$union->name = $request->name;
    	$union->save();

    	 session()->flash('success','Distrct updated successfully');
    	 return redirect()->route('admin.unions');
}

public function delete($id){
		$union = Union::find($id);

	if (!is_null($union)) {

		$union->delete();
		# code...
	}


    	 session()->flash('success','District delete successfully');
    	 return redirect()->route('admin.unions');
}
}
