@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-12">
              <div class="card" style="max-width:900;">
                <div class="card-header">
                  Manage Posts
                </div> 
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark" id="dataTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">  Id </th>
      <th scope="col"> Post Title</th>
      <th scope="col">Post Slug</th>
      
      <th scope="col">Action</th>
      <th scope="col">Created at </th>
    </tr>
  </thead>
  <tbody>
   @foreach($posts as $post)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td> {{$post->id}}</td>
       <td> {{$post->title}}</td>
        <td>{{$post->slug}}</td>
        

        <td><a href="{{ route('admin.blog.edit' , $post->id) }}" class="btn btn-success">Edit</a>
          <a href="{{ route('admin.blog.delete' , $post->id) }}" class="btn btn-danger">Delete</a>
       
       
      </td>
    </tr>

      
    @endforeach

    <tfoot>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id </th>
      <th scope="col"> Post Title </th>
      <th scope="col">Post Slug</th>
     <th scope="col">Action</th>
      <th scope="col">Created at </th>
      
    </tr>
  </tfoot>
  </tbody>
</table>

                
                
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
  @endsection