@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.sub_district.update',$sub_district->id)}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp" placeholder="Enter a  Sub District name">
    <small id="Titlehelp" class="form-text text-muted">Input a  Sub District Name</small>
  </div>
     <div class="form-group">
      <label for="district_id">Select a district for this  Sub district</label>
      <select>
    
    @foreach($districts as $district)
    <option value="{{$district->id}}" {{ $sub_district->district->id == $district->id ? 'selected':''}}> {{$district->name}} </option>
    @endforeach
  </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Update Sub district</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection