<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('id','desc')->get();
    	return view('admin.pages.categories.manage',compact('categories'));
    }

    public function create()

    {
    	$main_categories = Category::orderBy('name','desc')->where('parent_id', NULL)->get();
    	return view('admin.pages.categories.create',compact('main_categories'));
    }

    public function store(Request $request)
    {
    
    		
    	$validatedData = $request->validate([
        'name' => 'required',
        


    	]);

    	$category = new Category();
    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;
    	$category->save();

    	 session()->flash('success','Category added successfully');
    	 return redirect()->route('admin.categories');


}   

public function delete($id){

    $category =  Category::find($id);
        if (!is_null($category)) {

            if ($category->parent_id == NULL) {
$sub_categories = Category::orderBy('name','desc')->where('parent_id', $category->id)->get();
                foreach ($sub_categories as  $sub) {

                    $sub->delete();
                }
            }
            $category->delete();
        }
        session()->flash('success','Category deleted successfully');
        return redirect()->route('admin.categories');
}

public function edit($id){
$main_categories = Category::orderBy('name','desc')->where('parent_id', NULL)->get();
    $category = Category::find($id);

    if (!is_null($category)) {
        return view('.admin.pages.categories.edit',compact('category','main_categories'));
    }else{
        return redirect()->route('admin.categories');
    }

}

public function update(Request $request ,$id)
    {

            
        $validatedData = $request->validate([
        'name' => 'required',
        


        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->save();

         session()->flash('success','Category added successfully');
         return redirect()->route('admin.categories');


}   


}
