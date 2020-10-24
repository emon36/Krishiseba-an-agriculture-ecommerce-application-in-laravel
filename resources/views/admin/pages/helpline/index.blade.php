@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-12">
              <div class="card" style="max-width:900;">
                <div class="card-header">
                  Manage Services
                </div> 
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark" id="dataTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">  Id </th>
      <th scope="col"> Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">division </th>
      <th scope="col">district </th>
      <th scope="col">Sub District </th>
      <th scope="col">Union</th>
      <th scope="col">Services Status </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($helplines as $helpline)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td> {{$helpline->id}}</td>
       <td> {{$helpline->name}}</td>
        <td>{{$helpline->phone_no}}</td>

        <td>{{$helpline->division->name}}</td>

      <td> {{$helpline->district->name}}</td>

      <td> {{$helpline->sub_district->name}}</td>
      <td> {{$helpline->union->name}}</td>
   
      
      <td>  
        

    <p>
        @if ($helpline->completed)

        <button type="button" class="btn btn-success btn-sm">Completed</button>
        @else

       <button type="button" class="btn btn-warning btn-sm">Not completed</button>

        @endif
      
    </p>
      </td> 
      <td>
        <a href="{{route('admin.help.delete' , $helpline->id) }}" class="btn btn-danger">Delete</a> 

        <a href="{{route('admin.help.completed' , $helpline->id) }}" class="btn btn-success">Mark as done </a> </td>


    @endforeach

    <tfoot>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Helpline Id </th>
      <th scope="col"> Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">division </th>
      <th scope="col">district </th>
      <th scope="col">Sub District </th>
      <th scope="col">Union</th>
      <th scope="col">Services Status </th>
      <th scope="col">Action</th>
    </tr>
  </tfoot>
  </tbody>
</table>

                
                
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
  @endsection