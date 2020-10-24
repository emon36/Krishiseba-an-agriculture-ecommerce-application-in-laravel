@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-12">
              <div class="card" style="max-width:800;">
                <div class="card-header">
                  Manage Order
                </div>
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark" id="dataTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order Id </th>
      <th scope="col">Order Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">Order Status </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($orders as $order )
    <tr>
      <td>{{$loop->index+1}}</td>
      <td> {{$order->id}}</td>
       <td> {{$order->name}}</td>
        <td>{{$order->phone_no}}</td>
      <td>

         <p>
        @if ($order->seen)

        <button type="button" class="btn btn-success btn-sm">seen</button>
        @else

       <button type="button" class="btn btn-warning btn-sm">Unseen</button>

        @endif
      
    </p>

    <p>
        @if ($order->completed)

        <button type="button" class="btn btn-success btn-sm">completed</button>
        @else

       <button type="button" class="btn btn-warning btn-sm">Not completed</button>

        @endif
      
    </p>

        <p>
        @if ($order->paid)

        <button type="button" class="btn btn-success btn-sm">Paid</button>
        @else

       <button type="button" class="btn btn-warning btn-sm">Unpaid</button>

        @endif


      
    </p>
  </td>
        
   
      <td>
        <a href="{{route('admin.order.delete' , $order->id) }}" class="btn btn-danger">Delete</a>
        
        <a href="{{route('admin.order.show' , $order->id) }}" class="btn btn-info">View Details</a>
      </td> 
    @endforeach

    <tfoot>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order Id </th>
      <th scope="col">Order Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">Order Status </th>
      <th scope="col">Phone number</th>
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