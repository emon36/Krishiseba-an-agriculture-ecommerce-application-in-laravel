@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-8">
              <div class="card" style="max-width:500;">
                <div class="card-header">
                  Manage Sub-district 
                </div>
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sub-district Name </th>
      <th scope="col">District Name </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   @foreach($sub_districts as $sub_district)
    <tr>
       <td>{{$loop->index+1}}</td>

      <td> {{$sub_district->name}}</td>
      
      <td> {{!empty($sub_district->district) ? $sub_district->district->name:''}}</td>
      
      
      <td><a href="{{ route('admin.sub_district.edit' , $sub_district->id) }}" class="btn btn-success">Edit</a>
        <a href="{{route('admin.sub_district.delete' , $sub_district->id) }}" class="btn btn-danger">Delete</a>
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