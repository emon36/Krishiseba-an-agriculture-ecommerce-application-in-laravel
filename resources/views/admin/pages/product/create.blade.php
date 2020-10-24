 @extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-10 mt-3 ml-5">
              <div class="card" style="max-width:800;">
                <div class="card-header">
                  <a href="{{Route('admin.products')}}"><span style="border-bottom: 2px solid black" class="btn btn-dark">Products</span></a>
                   <h4 style="text-align: center;">Add Product Info</h2>
                </div>
            <div class="card-body">
        
               <form action="{{ route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="InputTitile">Title</label>
    <input type="text" class="form-control" name="title" id="InputTitile" aria-describedby="Titlehelp" placeholder="Enter product title">
    <small id="Titlehelp" class="form-text text-muted">Input a  valid product title</small>
  </div>
 <div class="form-group">
    <label for="Inputdescription">Small Description</label>
    <textarea name="small_description" rows="5" cols="50"class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="Inputdescription">Description</label>
    <textarea name="description" rows="7" cols="70"  id="editor" class="form-control"></textarea>
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
    <label for="price">Price</label>
    <input type="text" class="form-control" name="price" id="price">
  </div>

  <div class="form-group">
    <label for="Slug">Slug</label>
    <input type="text" class="form-control" name="slug" id="slug">
  </div>
  <div class="form-group">
    <label for="Image">Image</label>
    <input type="file" class="form-control" name="product_image" id="ProductImage">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Add Product</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection