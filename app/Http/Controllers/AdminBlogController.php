<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Blog_categories;

class AdminBlogController extends Controller
{
    
   
    public function create(){

       $categories = Blog_categories::orderBy('id','desc')->get();

    	return view('admin.pages.blogs.create',compact('categories'));
    }

    public function index(){
    	$posts = Post::orderBy('id','desc')->get();
    	return view('admin.pages.blogs.manage')->with('posts', $posts);
    }

     public function store(Request $request){


    	$validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'small_body' => 'required',    
        'slug' => 'required',
        'image'=>'image|mimes:png,jpg,jpeg|max:10000',
        'category_id'=> 'required'

    ]);


    	
    	if ($request->hasFile('image')) { 

    	$imageName = $request->image->store('public');
    		# code...
    	}

    	$post = new Post;
    	$post->title = $request->title;
    	$post->body = $request->body;  
    	$post->slug = $request->slug;
    	$post->small_body = $request->small_body;  
    	$post->image = $imageName;
        $post->category_id = $request->category_id;
    	$post->save();


    	return redirect()->route('admin.blogs');




    }

    public function edit($id){
    	$post = Post::find($id);
    	return view('admin.pages.blogs.edit')->with('post', $post);
    }

    public function update(Request $request ,$id){


    	$validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',    
        'slug' => 'required',
        'image'=>'image|mimes:png,jpg,jpeg|max:10000'

    ]);


    	
    	if ($request->hasFile('image')) { 

    	$imageName = $request->image->store('public');
    		# code...
    	}

    	$post =  Post::find($id);
    	$post->title = $request->title;
    	$post->body = $request->body;  
    	$post->slug = $request->slug;
    	$post->image = $imageName;
    	$post->save();


    	return redirect()->route('admin.blogs');




    }

    public function delete($id){
    	$post =  Post::find($id);
    	if (!is_null($post)) {
    	  Storage::delete( public_path('/' . $post->image));
    	}
    	 $post->delete();
    	session()->flash('success','Blog deleted successfully');
        return redirect()->route('admin.blogs');


}

  

}
