@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.division.update',$division->id)}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp" placeholder="Enter a Division name">
    <small id="Titlehelp" class="form-text text-muted">Input a  Division Name</small>
  </div>
  <button type="submit" class="btn btn-primary">Update Division</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection