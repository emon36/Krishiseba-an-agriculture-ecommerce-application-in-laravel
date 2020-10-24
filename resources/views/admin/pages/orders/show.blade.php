@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
             
              <div class="card" style="max-width:500;">
                <div class="card-header">
                  View Order {{$order->id}}
                </div>
            <div class="card-body">
              @include('admin.partials.messeage')

              <h5>Customer Information  </h5>

              <div class="row">
                <div class="col-md-6 border-right">                
        <p><strong>Name: </strong>{{$order->name}} </p>

        <p><strong>Phone: </strong>{{$order->phone_no}} </p>
       <p><strong>Adress: </strong> <strong> Division: </strong> {{$order->division->name}} <strong> District: </strong> {{$order->district->name}}  <strong>  Sub-District : </strong> {{$order->Sub_district->name}} <strong> Union: </strong>{{$order->Union->name}} </p>
     </div>

       <div class="col-md-6">

        <p><strong>Order Payment Method: </strong>{{$order->payment->name}} </p>
        <p><strong>Transaction id : </strong>{{$order->transaction_id}} </p>

      </div>



        
        

              </div>

              <hr>


              <h5>Ordered item</h5>

              <table class="table table-bordered table-striped ">
      <thead>
        <tr>
          <th>No</th>
          <th>Product Name </th>
          <th> Image</th>
          <th>Quantity</th>
          <th>Per Unit Price </th>
          <th>Total amount</th>
          <th> Action</th>
        </tr>
      </thead>
      <tbody>

        @php
        $total_price = 0;

        @endphp
        @foreach($order->carts as $cart)

        <tr>
          <td>
            {{$loop->index+1}}
          </td>
          <td>
            {{$cart->product->title}}
          </td>
          <td width="100px"> 
            
            <img class="card-img-top feature-img" src="{{asset($cart->product->img)}}" >
          </td>
          <td>
            <form class="inline-from" action="{{route('carts.update',$cart->id)}}" method="post">
              @csrf
              <input type="number" name="product_quantity" class="from-control" value="{{$cart->product_quantity}}">
              <button type="submit" class="btn btn-success  ml-2"> Update </button>
              
            </form>
          </td>

          <td>
            {{$cart->product->price}}৳
          </td>
          <td>
            @php

            $total_price += $cart->product->price * $cart->product_quantity;
            @endphp

          
            {{$cart->product->price * $cart->product_quantity}}৳ 
          </td>
          <td>
            <form class="inline-from" action="{{route('carts.delete',$cart->id)}}" method="post">
              @csrf
              <input type="hidden" name="cart_id" class="from-control">
              <button type="submit" class="btn btn-danger"> delete </button>
              
            </form>
          </td>
        </tr>
        @endforeach

        <tr>
          <td colspan="4"> </td>
            <td>
              Total
             </td>
          <td colspan="2">
            {{ $total_price }}৳
          </td>
        </tr>



        
      </tbody>
    </table>

    <hr>

    <form action="{{ route('admin.order.completed',$order->id)}}" method="post" style="inline-bloc">

      @csrf
@if($order->completed)
      <input type="submit" value="Cancel order" name="" class="btn btn-danger" style="inline-block">
      @else
      <input type="submit" value="completed order" name="" class="btn btn-success" style="inline-block">
      @endif

      <hr>
      
    </form>
    <form action="{{ route('admin.order.paid',$order->id)}}" method="post">

      @csrf

      @if($order->paid)
      <input type="submit" value="Cancel  Payment" name="" class="btn btn-danger">

      @else
      <input type="submit" value="Order paid" name="" class="btn btn-success">
      @endif
      
    </form>
        
                
                
              </div>
            </div>
          </div>
        </div>
        </div>
    
  @endsection