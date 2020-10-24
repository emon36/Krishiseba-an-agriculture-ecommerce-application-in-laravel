@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-8">
              <div class="card" style="max-width:500;">
                <div class="card-header">
                  Manage Unions 
                </div>
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Union Name </th>
      <th scope="col">Sub District Name </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   @foreach($unions as $union)
    <tr>
       <td>{{$loop->index+1}}</td>

      <td> {{$union->name}}</td>
      
      <td> {{!empty($union->sub_district) ? $union->sub_district->name:''}}</td>
      
      
      <td><a href="{{ route('admin.union.edit' , $union->id) }}" class="btn btn-success">Edit</a>
        <a href="{{route('admin.union.delete' , $union->id) }}" class="btn btn-danger">Delete</a>
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