@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
          <div class="row">
             <div class="col-md-12">
              <div class="card" style="max-width:800;">
            <div class="card-body">
              @include('admin.partials.messeage')
        <table class="table table-striped table-dark" id="dataTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Title </th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td> {{$product->title}}</td>
      <td> {{$product->price}}</td>
      <td><a href="{{ route('admin.product.edit' , $product->id) }}" class="btn btn-success">Edit</a>
        <a href="{{route('admin.product.delete' , $product->id) }}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>

   <tfoot>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Title </th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
      
    </tr>
</table>

                
                
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
  @endsection