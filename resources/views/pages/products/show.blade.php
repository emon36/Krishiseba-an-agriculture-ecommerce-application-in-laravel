@extends('layouts.master')

@section('content')

<div class="container-fluid">
  
  <div class="row">
    <div class="col-md-4">
      
      @include('partials.sidebar')   
  </div>
         

    <div class="col-md-8">
    	<div class="widget">
        <div class="card" style="width:500;">
    		<div class="card-title mt-5"> <h5 style="text-align: center;">{{$product->title}}</h5></div>
        <div class="card-body">

          <div class="col-md-4 mx-auto d-block">

          <img src="{{asset('/').$product->img}}" class="card-img-top  mx-auto d-block" alt="">
        </div>
        <br>

        <div class="mt-5">

          <p>{!! htmlspecialchars_decode($product->description) !!}</p>
        </div>


<div style="position: ">
  <form class="" action="{{route('carts.store')}}" method="post">
  @csrf

  <input type="hidden" name="product_id" value="{{$product->id}}">
  <button type="submit"  class="btn btn-succsess btn-lg btn-block"> শপিং ব্যাগে রাখুন </button>
</form>
</div>

        </div>
    	
    </div>
  
</div>







</div>

</div>


</div>
</div>


@endsection



