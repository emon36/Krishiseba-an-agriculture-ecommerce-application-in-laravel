<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function products()
    {
    	$products = Product::orderBy('id','desc')->get();
      return view('pages.products.index')->with('products', $products);
    }

    public function show($slug)
    {
    	$product = Product::where('slug',$slug)->first();

    	if (!is_null($product)) {
    		# code...
    		return view('pages.products.show', compact('product'));
    	}else{
    		session()->flash('errors', 'NO Product');
    		return redirect()->route('/');
    	}

    }


    public function show_category($id){

        $category = Category::find($id);

        if (!is_null($category)) {
            # code...
            return view('pages.categories.show',compact('category'));
        }else {
            # code...
            session()->flash('errors', 'NO Category');
            return redirect()->route('/');

        }
    }

}
