<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Blog_categories;

class BlogController extends Controller
{
   public function showindex()
    {
    	$posts = Post::orderBy('id','desc')->paginate(2);
      return view('pages.blogs.index')->with('posts', $posts); 
  }

  public function show($slug)
    {
    	$post = Post::where('slug',$slug)->first();

    	if (!is_null($post)) {
    		# code...
    		return view('pages.blogs.show', compact('post'));
    	}else{
    		session()->flash('errors', 'NO Post');
    		return redirect()->route('/');
    	}

    }


    public function show_category($id){


        $categories = Blog_categories::find($id);



        if (!is_null($categories)) {
            # code...
            return view('pages.blog_categories.show',compact('categories'));
        }else {
            # code...
            session()->flash('errors', 'NO Category');
            return redirect()->route('/');

        }
    }
}
