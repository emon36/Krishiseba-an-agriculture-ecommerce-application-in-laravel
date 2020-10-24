@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-8">
              <div class="card" style="max-width:500;">
                <div class="card-header">
                  Manage Districts 
                </div>
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col"> District Name </th>
      <th scope="col">Division Name </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   @foreach($districts as $district)
    <tr>
     <td>{{$loop->index+1}}</td>

      <td> {{$district->name}}</td>
      
      <td> {{!empty($district->division) ? $district->division->name:''}}</td>
      
      
      <td><a href="{{ route('admin.district.edit' , $district->id) }}" class="btn btn-success">Edit</a>
        <a href="{{route('admin.district.delete' , $district->id) }}" class="btn btn-danger">Delete</a>
      </td> 
    </tr> 
    @endforeach
  </tbody>
</table>

                
                
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
  @endsection