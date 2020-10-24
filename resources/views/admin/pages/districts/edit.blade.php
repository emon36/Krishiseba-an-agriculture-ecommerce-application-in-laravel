@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.district.update',$district->id)}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp" placeholder="Enter a District name">
    <small id="Titlehelp" class="form-text text-muted">Input a  District Name</small>
  </div>
     <div class="form-group">
      <label for="division_id">Select a division for this district</label>
      <select>
    
    @foreach($divisions as $division)
    <option value="{{$division->id}}" {{ $district->division->id == $division->id ? 'selected':''}}> {{$division->name}} </option>
    @endforeach
  </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Update district</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection