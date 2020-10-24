<?php

namespace App\Http\Controllers;

use App\Helpline;
use Illuminate\Http\Request;
use App\Division;
use App\District;
use App\Sub_district;
use App\Union;

class HelplineController extends Controller
{

    public function __construct()
   {
    $this->middleware('auth');
   }
    
    public function index()
    {

        $divisions = Division::orderBy('id','asc')->get();

        $districts = District::orderBy('id','asc')->get();

        $sub_districts = Sub_district::orderBy('id','asc')->get();

        $unions = Union::orderBy('id','asc')->get();

return view('pages.helpline',compact('divisions','districts','sub_districts','unions'));
        
    }

    
    public function store(Request $request)
    {

        $validatedData = $request->validate([
        'name' => 'required',
        'phone_no' => 'required',
        'division' => 'required',
        'district' => 'required',
        'sub_district' => 'required',
        'union' => 'required',

    ]);

        

        $helpline = new Helpline();

        $helpline->name = $request->name;
        $helpline->phone_no = $request->phone_no;
        $helpline->message = $request->message;
        $helpline->division_id = $request->division;
        $helpline->district_id = $request->district;
        $helpline->sub_district_id = $request->sub_district;
        $helpline->union_id = $request->union;

        $helpline->save();

        session()->flash('success','আপনার সার্ভিসের জন্য আবেদনটি সম্পূর্ন হয়েছে');

        return redirect()->route('helpline');

        
    }

}

    