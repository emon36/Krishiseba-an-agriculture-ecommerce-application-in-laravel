@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.union.update',$union->id)}}" method="post" enctype="multipart/from-data">
                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp" placeholder="Enter a Union name">
    <small id="Titlehelp" class="form-text text-muted">Input a  Union Name</small>
  </div>
     <div class="form-group">
      <label for="sub_district_id">Select a Sub district for this  Union</label>
      <select>
    
    @foreach($sub_districts as $sub_district)
    <option value="{{$sub_district->id}}" {{ $union->sub_district->id == $sub_district->id ? 'selected':''}}> {{$sub_district->name}} </option>
    @endforeach
  </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Update Union</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection