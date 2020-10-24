@extends('layouts.master')

@section('content')

<div class="container-fluid">
  
  <div class="row">
    <div class="col-md-4">
        @include('partials.sidebar') 
       
  </div>
         

    <div class="col-md-8">  
      <div class="widget">
        <h3>{{$category->name}}</h3>
        
        @php
        $products = $category->products;
        @endphp
        <div class="row">
          @foreach($products as $product)
          <div class="card" style="max-width:auto;">
            
    <div class="row no-gutters">
        <div class="col-md-2" style="background: #868e96;">
          
            <img src="{{ asset($product->img) }}" class="card-img-top h-100" alt="..."> 
        </div>
   
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title">
                  <a href="{{ route('products.show',$product->slug)}}">{{$product->title}}</a> </h5>
                <p class="card-text">{{$product->small_description}}</p>
                @include('pages.products.partials.order_button')


 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{$product->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{$product->description}}</p>
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

            </div>
        </div>
    </div>
</div>

@endforeach




        </div>
      </div>
      
    </div>
  
    










</div>

</div>


</div>
</div>


@endsection