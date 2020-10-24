@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.blog_category.update',$category->id)}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name"></label>
    <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}" aria-describedby="Titlehelp"  placeholder="Enter Blog category name">
    <small id="Titlehelp" class="form-text text-muted"></small>
  </div>

 
 
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Update Category</button>
</form>
               
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection