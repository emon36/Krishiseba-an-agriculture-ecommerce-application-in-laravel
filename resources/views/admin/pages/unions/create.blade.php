@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.union.store')}}" method="post" enctype="multipart/from-data">

                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp" placeholder="Enter a Union name">
    <small id="Titlehelp" class="form-text text-muted">Input a Sub District Name</small>
  </div>

  <div class="form-group"></div>
  <label for="sub_district_id" class="form-control">Select a sub district for a union</label>
  <select class="form-control" name="sub_district_id">
    <option value="">Selecet a sub district</option>

    @foreach($sub_districts as $sub_district)
    <option value="{{$sub_district->id}}">{{$sub_district->name}}</option>

    @endforeach
    
  </select>
  
  <button type="submit" class="btn btn-primary">Add Union</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection