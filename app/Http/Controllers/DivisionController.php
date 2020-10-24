<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\District;
class DivisionController extends Controller
{
    
    public function index()
    {
    	$divisions = Division::orderBy('id','desc')->get();
    	return view('admin.pages.divisions.manage',compact('divisions'));
    }

    public function create()
    {
    	return view('admin.pages.divisions.create');

    }

   public function store(Request $request)
    {
    
    		
    	$this->validate($request,[
    		'name' => 'required'
    	]);


    	$division = new Division();
    	$division->name = $request->name;
    	$division->save();

    	 session()->flash('success','Division added successfully');
    	 return redirect()->route('admin.divisions');
}

public  function edit($id)
{
	$division = Division::find($id);
	if (!is_null($division)) {

		return view('admin.pages.divisions.edit',compact('division'));
		# code...
	}else {
		# code...
		return redirect()->route('admin.divisions');

	}

}
 public function update(Request $request,$id)
    {
    
    		
    	$validatedData = $request->validate([
        'name' => 'required',
        


    	]);

    	$division = Division::find($id);
    	$division->name = $request->name;
    	$division->save();

    	 session()->flash('success','Division updated successfully');
    	 return redirect()->route('admin.divisions');
}

public function delete($id){

	$division = Division::find($id);
	if (!is_null($division)) {

		$districts = District::where('division_id',$division->id)->get();

		foreach ($districts as $district) {
			$district->delete();
			# code...
		}

		$division->delete();
		# code...
	}


    	 session()->flash('success','Division delete successfully');
    	 return redirect()->route('admin.divisions');
}
}


