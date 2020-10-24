@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.sub_district.store')}}" method="post" enctype="multipart/from-data">

                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp" placeholder="Enter a Sub District name">
    <small id="Titlehelp" class="form-text text-muted">Input a Sub District Name</small>
  </div>

  <div class="form-group"></div>
  <label for="district_id" class="form-control">Select a district for a sub district</label>
  <select class="form-control" name="district_id">
    <option value="">Selecet a district</option>

    @foreach($districts as $district)
    <option value="{{$district->id}}">{{$district->name}}</option>

    @endforeach
    
  </select>
  
  <button type="submit" class="btn btn-primary">Add Sub District</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection