 @extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="card" style="max-width:800;">
            <div class="card-body">
        
               <form action="{{ route('admin.blog.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="InputTitile">Post Title</label>
    <input type="text" class="form-control" name="title" id="InputTitile" aria-describedby="Titlehelp" placeholder="Enter post title">
    <small id="Titlehelp" class="form-text text-muted">Input a  valid post title</small>
    <label for="InputTitile">Slug</label>
    <input type="text" class="form-control" name="slug" id="Inputslug" aria-describedby="Titlehelp" placeholder="Enter product title">
    <small id="Titlehelp" class="form-text text-muted">Input a  valid post slug</small>
  </div> 
  <div class="form-group">
    <label for="Image">Image</label>
    <input type="file" class="form-control" name="image" id="PostImage">
  </div>
  <div class="form-group">
    <label for="Inputdescription">Body Text</label>
    <textarea name="body" id="editor"  rows="8" cols="70" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="Inputdescription"> Small Body Text</label>
    <textarea name="small_body" rows="4" cols="40" id="summernote" class="form-control"></textarea>
  </div>
  <div class="form-group"></div>
  <label for="category" class="form-control"> Category</label>
  <select class="form-control" name="category_id">
    <option> Selecct a Category </option>
    
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>

    @endforeach
    
  </select>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Add Post</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection

  