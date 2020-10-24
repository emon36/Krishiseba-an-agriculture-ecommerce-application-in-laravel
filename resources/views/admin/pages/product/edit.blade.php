@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.product.update',$product->id)}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="InputTitile">Title</label>
    <input type="text" class="form-control" name="title" id="InputTitile" value="{{$product->title}}" earia-describedby="Titlehelp" placeholder="Enter product title">
    <small id="Titlehelp" class="form-text text-muted">Input a  valid product title</small>
  </div>
  <div class="form-group">
    <label for="Inputdescription">Small Description</label>
    <textarea name="small_description" rows="5" cols="50" class="form-control">{{$product->small_description }}</textarea>
  </div>
  <div class="form-group">
    <label for="Inputdescription">Description</label>
    <textarea name="description"  rows="7" cols="70" id="editor" class="form-control">{{$product->description }}</textarea>
  </div>

   <div class="form-group">
    <label for="Inputdescription">Select Category</label>
    <select class="form-control" name="category_id">
      <option value="">Select a product category</option>
          @foreach (App\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
          
          @foreach (App\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
      <option value="{{$child->id}}">{{$child->name}} ({{$parent->name}}) </option>
          @endforeach 

          @endforeach

    </select> 
  </div>
  <div class="form-group">
    <label for="Slug">Slug</label>
    <input type="text" class="form-control" name="slug" value="{{$product->slug}}" id="slug">
  </div>
  <div class="form-group">
    <label for="product_image">Image</label>
    <input type="file" class="form-control" name="product_image" id="ProductImage">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Update Product</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection