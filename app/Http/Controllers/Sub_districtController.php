<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Sub_district;

class Sub_districtController extends Controller

{
    
    public function index()

    {

    	$sub_districts = Sub_district::orderBy('id','desc')->get();
    	return view('admin.pages.sub_districts.manage',compact('sub_districts'));
    }

    public function create()
    {
    	 $districts = District::orderBy('id','desc')->get();

    	return view('admin.pages.sub_districts.create',compact('districts'));

    }

   public function store(Request $request)
    {
    
    		
    	$this->validate($request,[
    		'name' => 'required' 
    	]);


    	$sub_district = new Sub_district();
    	$sub_district->name = $request->name;
    	$sub_district->district_id = $request->district_id;
    	$sub_district->save();

    	 session()->flash('success','District added successfully');
    	 return redirect()->route('admin.sub_districts');
}

public  function edit($id)
{
	  $districts = District::orderBy('id','desc')->get();

	$sub_district = Sub_district::find($id);
	if (!is_null($sub_district)) {

		return view('admin.pages.sub_districts.edit',compact('sub_district','districts'));
		# code...
	}else {
		# code...
		return redirect()->route('admin.sub_districts');

	}

}
 public function update(Request $request,$id)
    {
    
    		
    	$validatedData = $request->validate([
        'name' => 'required',
        


    	]);



    	$sub_district = Sub_district::find($id);
    	$sub_district->name = $request->name;
    	$sub_district->save();

    	 session()->flash('success','Distrct updated successfully');
    	 return redirect()->route('admin.sub_districts');
}

public function delete($id){
		$sub_district = Sub_district::find($id);

	if (!is_null($sub_district)) {

		$sub_district->delete();
		# code...
	}


    	 session()->flash('success','District delete successfully');
    	 return redirect()->route('admin.sub_districts');
}
}

