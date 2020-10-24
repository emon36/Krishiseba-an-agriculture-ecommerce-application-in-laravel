@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-8">
              <div class="card" style="max-width:500;">
                <div class="card-header">
                  Manage Divisions 
                </div>
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($divisions as $division)
    <tr>
       <td>{{$loop->index+1}}</td>
      <td> {{$division->name}}</td>
      
      <td><a href="{{ route('admin.division.edit' , $division->id) }}" class="btn btn-success">Edit</a>
        <a href="{{route('admin.division.delete' , $division->id) }}" class="btn btn-danger">Delete</a>
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