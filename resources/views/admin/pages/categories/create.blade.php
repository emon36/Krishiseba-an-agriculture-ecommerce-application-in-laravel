@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.category.store')}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp"  placeholder="Enter product category name">
    <small id="Titlehelp" class="form-text text-muted">Input a  valid product category</small>
  </div>
  <div class="form-group">
    <label for="Inputdescription">Description</label>
    <textarea name="description" rows="7" cols="70" class="form-control"></textarea>
  </div>

 <div class="form-group">
  <label for="Select category">Parent Category (optional)</label>
  <select class="form-control" name="parent_id">
    <option value="">Select a parent category</option>
    @foreach ($main_categories as $category)
    <option value="{{$category->id}}">{{ $category->name }}</option>
    @endforeach
  </select>
  </div>

  <div class="form-group">
    <label for="product_image">Image (optinal)</label>
    <input type="file" class="form-control" name="product_image" id="ProductImage">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection

   