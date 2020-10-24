<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Division;

class DistrictController extends Controller
{

    public function index()

    {

    	$districts = District::orderBy('id','desc')->get();
    	return view('admin.pages.districts.manage',compact('districts'));
    }

    public function create()
    {
    	 $divisions = Division::orderBy('id','desc')->get();

    	return view('admin.pages.districts.create',compact('divisions'));

    }

   public function store(Request $request)
    {
    
    		
    	$this->validate($request,[
    		'name' => 'required' 
    	]);


    	$district = new District();
    	$district->name = $request->name;
    	$district->division_id = $request->division_id;
    	$district->save();

    	 session()->flash('success','District added successfully');
    	 return redirect()->route('admin.districts');
}

public  function edit($id)
{
	  $divisions = Division::orderBy('id','desc')->get();

	$district = District::find($id);
	if (!is_null($district)) {

		return view('admin.pages.districts.edit',compact('district','divisions'));
		# code...
	}else {
		# code...
		return redirect()->route('admin.districts');

	}

}
 public function update(Request $request,$id)
    {
    
    		
    	$validatedData = $request->validate([
        'name' => 'required',
        


    	]);


    	$district = District::find($id);
    	$district->name = $request->name;
    	$district->save();

    	 session()->flash('success','Distrct updated successfully');
    	 return redirect()->route('admin.districts');
}

public function delete($id){
		$district = District::find($id);

	if (!is_null($district)) {

		$district->delete();
		# code...
	}


    	 session()->flash('success','District delete successfully');
    	 return redirect()->route('admin.districts');
}
}
