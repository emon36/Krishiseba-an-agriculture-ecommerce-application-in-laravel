@extends('admin.layouts.master')

@section('content')


            <div class="grid_10 mt-2">
    <div style="height: 920px" class="box round first grid">
            <div class="col-md-8">
              <div class="card" style="max-width:500;">
            <div class="card-body">
        
               <form action="{{ route('admin.district.store')}}" method="post" enctype="multipart/from-data">

                {{ csrf_field() }}
                @include('admin.partials.messeage')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="Titlehelp" placeholder="Enter a District name">
    <small id="Titlehelp" class="form-text text-muted">Input a  District Name</small>
  </div>

  <div class="form-group"></div>
  <label for="division_id" class="form-control">Select a division for a district</label>
  <select class="form-control" name="division_id">
    <option value="">Selecet a division</option>

    @foreach($divisions as $division)
    <option value="{{$division->id}}">{{$division->name}}</option>

    @endforeach
    
  </select>
  
  <button type="submit" class="btn btn-primary">Add District</button>
</form>
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
   
  @endsection