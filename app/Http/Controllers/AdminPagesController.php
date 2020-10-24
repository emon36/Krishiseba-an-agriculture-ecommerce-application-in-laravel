<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;
use File;
use App\User;
use App\Order;
use App\Helpline;
use App\Post;
class AdminPagesController extends Controller
{


   
    
    public function index(){

       $productCount = Product::count();
       $userCount = User::count();
       $orderCount = Order::count();
       $serviceRequestCount = Helpline::count();
       $postCount =  Post::count();

    	return view('admin.pages.index',compact('productCount','userCount','orderCount','serviceRequestCount','postCount'));
    }

    public function product_create(){

    	return view('admin.pages.product.create');
    }
    public function product_store(Request $request){


    	$validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'small_description' => 'required',
        'price' => 'required',
        'slug' => 'required',
        'category_id' => 'required|numeric',
        'img'=>'img|mimes:png,jpg,jpeg|max:10000'

    ]);


    	$product = new Product;
    	$product->title = $request->title;
        $product->small_description = $request->small_description;
    	$product->description = $request->description;
    	$product->category_id = $request->category_id;
        $product->slug = $request->slug;
    	$product->Sub_category_id = 1;
        $product->price = $request->price;
    	$product->save();

    	$lastId = $product->id;

    	$pictureInfo = $request->file('product_image');

    	$imgName = $pictureInfo->getClientOriginalName();

    	$folder = "ProductImage/";

    	$pictureInfo->move($folder,$imgName);

    	$imgUrl = $folder.$imgName;

    	$productImg = Product::find($lastId);

    	$productImg->img = $imgUrl;

    	$productImg->save();


    	return redirect()->route('admin.products');




    }

    public function manage_products(){
    	$products = Product::orderBy('id','desc')->get();
    	return view('admin.pages.product.manage')->with('products', $products);
    }
     public function product_edit($id){
    	$product = Product::find($id);
    	return view('admin.pages.product.edit')->with('product', $product);
    }
public function product_update(Request $request ,$id){


    	$validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'small_description' => 'required',
        'slug' => 'required',
        'category_id' => 'required|numeric',
    ]);


    	$product =  Product::find($id);
    	$product->title = $request->title;
        $product->small_description = $request->small_description;
    	$product->description = $request->description;
        $product->slug = $request->slug;
    	$product->category_id = $request->category_id;

    	
    	$product->save();


    	



    	
    	return redirect()->route('admin.products');




    }

    public function product_delete($id){
    	$product =  Product::find($id);
    	if (!is_null($product)) {
            if (File::exists('ProductImage/'. $product ->img)) {
                File::delete('ProductImage/'. $product->img);
            }
    		$product->delete();
    	}

    	session()->flash('success','Product deleted successfully');

        return redirect()->route('admin.products');






}


}
