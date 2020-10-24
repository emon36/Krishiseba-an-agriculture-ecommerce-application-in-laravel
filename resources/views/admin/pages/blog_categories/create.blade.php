@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper mt-2">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.blog_category.store')}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp"  placeholder="Enter Blog category name">
    <small id="Titlehelp" class="form-text text-muted">Input a  valid Blog category</small>
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

   