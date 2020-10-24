<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_categories;
class BlogCategoriesController extends Controller
{
    public function __construct(){

    $this->middleware('auth:admin');

   }
   public function index()
    {
     $categories = Blog_categories::orderBy('id','desc')->get();
        return view('admin.pages.blog_categories.manage',compact('categories'));
    }

    public function create()

    {
    return view('admin.pages.blog_categories.create');

    }

    public function store(Request $request)
    {
    
    		
    	$validatedData = $request->validate([
        'name' => 'required',
        
        
    	]);

    	$category = new Blog_categories();
    	$category->name = $request->name;
    	
    	$category->save();

    	 session()->flash('success','Category added successfully');

                return redirect()->back();
    	

}   

public function delete($id){

    $category = Blog_categories::find($id);

    if (!is_null($category)) {

        $category->delete();
    }

    
}

public function edit($id){

    
$category = Blog_categories::find($id);
    if (!is_null($category)) {

        return view('admin.pages.blog_categories.edit',compact('category'));
        # code...
    }else {
        # code...
        return redirect()->route('admin.blog_categories');

    }

}

public function update(Request $request ,$id)
    {

            
        $validatedData = $request->validate([
        'name' => 'required',
       
        ]);

        $category = new Blog_categories();
        $category->name = $request->name;
       
        $category->save();

         session()->flash('success','Category Updated successfully');

                return redirect()->back();

}   


}
