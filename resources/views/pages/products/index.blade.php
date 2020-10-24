 @extends('layouts.master')

@section('content')

<div class="container-fluid">
  
  <div class="row">
    <div class="col-md-3 mt-3">
        @include('partials.sidebar') 

       
  </div>
         

    <div class="col-md-8 feature">
    	<div class="widget">
                @include('partials.messeage')
    		<h3>ফিচার প্রোডাক্ট</h3>
    		<div class="row">


          <?php $count = 0; ?>
    			@foreach($products as $product)
          <?php if($count == 8) break; ?>
    			<div class="card" style="width:500;">
    				
    <div class="row no-gutters">
        <div class="col-md-2" style="background: #868e96;">
        	
            <img src="{{$product->img}}" class="card-img-top h-100" alt=""> 
        </div>
   
        <div class="col-md-6">
            <div class="card-body">
                <h5 class="card-title">
                  <a href="{{ route('products.show',$product->slug)}}">{{$product->title}}</a> </h5>
                <p class="card-text">{{$product->small_description}}</p>
               @include('pages.products.partials.order_button') 


 

            </div>
        </div>
    </div>
</div>
<?php $count++; ?>

@endforeach




    		</div>
    	</div>
    	
    </div>
  
    










</div>

</div>


</div>
</div>

 
@endsection

 
