@extends('layouts.master')

@section('content')

<div class='container mt-5'>

	<div class="card card-body">
		<h2>পেমেন্ট সম্পূর্ণ  করুন </h2>
	

	<hr>
	<div class="row">
		<div class="col-md-7 border-right">

	@foreach(App\Cart::totalCarts() as $cart)

	<p>
		{{$cart->product->title}}&nbsp;-<strong>{{$cart->product->price}} টাকা</strong>
		-&nbsp;{{$cart->product_quantity}}টি


	</p>
	@endforeach


</div>
	
		<div class="col-md-5">
			@php

			$total_price = 0;

			@endphp

			@foreach(App\Cart::totalCarts() as $cart)

			@php

			$total_price += $cart->product->price * $cart->product_quantity;
		    @endphp 

			@endforeach
			<p> সর্বমোট মূল্য : <strong>{{$total_price}}</strong>৳</p>

		</div>
	</div>
</div>
		
	
	
		<a href="{{route('carts')}}" class="btn btn-info btn-md mt-2 ml-2 mb-2 "> শপিং ব্যাগ পরিবর্তন করুন </a>


	<div  class="card card-body mt-2">
		<h4> আপনার তথ্য দিন</h4>



	

		<form class="" action="{{route('checkouts.store')}}" method="post" enctype="multipart/form-data">
			@csrf
      @include('partials.messeage')
  <div class="form-group">
    <label for="name">নাম</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="আপনার নাম লিখুন" class="from-control{{$errors->has('name')?'is-invalid' :''}}" value="{{Auth::check()? Auth::user()->name : ''}}">
			
    
  </div>
  <div class="form-group">
    <label for="phone">মোবাইল নাম্বার</label>
    <input type="text" class="form-control" id="phone" name="phone_no" placeholder="আপনার মোবাইল নাম্বারটি দিন" class="from-control{{$errors->has('phone')?'is-invalid' :''}}" value="{{Auth::check()? Auth::user()->phone : ''}}">
  </div>

  <div class="form-group">
    <label for="ivision"> বিভাগ </label>
    <select  class="form-control" id="division_id" name="division_id">
    	<option value="">আপনার বিভাগ নির্বাচন করুন </option>
    	@foreach($divisions as $division)

					<option value="{{$division->id}}">{{$division->name}}</option>
					


					@endforeach
      
    </select>
  </div>
  <div class="form-group">
    <label for="district">জেলা</label>
    <select  class="form-control" id="district_id" name="district_id">
    	<option  value="short_name">আপনার জেলা নির্বাচন করুন </option>
    	
      
    </select>
</div>

<div class="form-group">
    <label for="Sub district">উপজেলা</label>
    <select  class="form-control" id="sub_district_id" name="sub_district_id">
        <option value="short_name">আপনার উপজেলা নির্বাচন করুন </option>
        
      
    </select>
</div>


<div class="form-group">
    <label for="Union">ইউনিয়ন</label>
    <select  class="form-control" id="union_id" name="union_id">
        <option value="union">আপনার ইউনিয়ন নির্বাচন করুন </option>
        
      
    </select>
</div>

<div class="form-group">
    <label for="payment_method">পেমেন্ট পদ্ধতি </label>
    <select class="form-control" name="payment_method_id" required id="payments">
      <option value=""> আপনার টাকা দেওয়ার পদ্ধতিটি নিররাবচন করুন</option>
          @foreach($payments as $payment)

          <option value="{{$payment->short_name}}">{{$payment->name}}</option>


          @endforeach
      
      
    </select>

    

    @foreach($payments as $payment)

    
      @if($payment->short_name == "cash_in")
      <div id="payment_{{$payment->short_name}}" class="hidden">

      <div>
        <h3 mt-2>
          অর্ডার বাটন্টি ক্লিক করুন 
        </h3>
      </div>
    </div>

      @else 
       <div id="payment_{{$payment->short_name}}" class="hidden">

    <h4>{{$payment->name}}</h4>

    <p> <strong>{{$payment->name}} নাম্বার : {{$payment->number}} </strong>
      <br>
      <strong>একাউন্ট টাইপ : {{$payment->type}}</strong>
    </p>
    <div class="alert alert-success">
      পর্যাপ্ত টাকা উক্ত  নাম্বারে পাঠান এবং নিচে ট্রানজেকশন কোডটি  জমা দিন।
    </div>
      
  
    <div>
  
  </div>




      @endif
      
    </div>
    @endforeach
    <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden">
  


    
    

  
  </div>

  
  
  <button type="submit" class="btn btn-primary">অর্ডার করুন</button>


</form>
</div>
</div>

  


  

  
  

  
  
  

	






@endsection

@section('scripts')

<script type="text/javascript">
    	$("#payments").change(function(){

    		$payment_method = $("#payments").val();
    		
    		
    		if ($payment_method == "cash_in") 
    		{
    			$("#payment_cash_in").removeClass('hidden');
    			$("#payment_bkash").addClass('hidden');
    			$("#payment_rocket").addClass('hidden');
    		}
    		else if($payment_method == "bkash") 
    		{
    			$("#payment_bkash").removeClass('hidden');
    			$("#transaction_id").removeClass('hidden');
    			$("#payment_cash_in").addClass('hidden');
    			$("#payment_rocket").addClass('hidden');
    		}

    		else if($payment_method == "rocket") 
    		{
    			$("#payment_rocket").removeClass('hidden');
    			$("#payment_bkash").addClass('hidden');
    			$("#payment_cash_in").addClass('hidden');
    			$("#transaction_id").removeClass('hidden');
    		}
    		
    		
    	})

       $("#division_id").change(function(){


                var division =   $("#division_id").val();
                
                $("#district_id").html("");

                var option ='<option value="">আপনার জেলা নির্বাচন করুন  </option>';

                
                $.get( "http://127.0.0.1:8000/get-districts/"+division, function( data ) {


               data = JSON.parse(data)
              data.forEach(function(element){



                option += "<option value='"+element.id+"'>"+ element.name + "</option>";

              });
              $("#district_id").html(option);

 }); 
                 });

        $("#district_id").change(function(){


                var district =   $("#district_id").val();
                
                $("#sub_district_id").html("");
        var option ='<option value="">আপনার উপজেলা নির্বাচন করুন  </option>';

               
                $.get( "http://127.0.0.1:8000/get-sub_districts/"+district, function( data ) {

              data = JSON.parse(data)
              data.forEach(function(element){
                option += "<option value='"+element.id+"'>"+ element.name + "</option>";

              });
              $("#sub_district_id").html(option);

 });
                 });

        $("#sub_district_id").change(function(){


                var sub_district =   $("#sub_district_id").val();
                
                $("#union_id").html("");
        var option ='<option value="">আপনার ইউনিয়ন নির্বাচন করুন </option>';

               
                $.get( "http://127.0.0.1:8000/get-unions/"+sub_district, function( data ) {

              data = JSON.parse(data)
              data.forEach(function(element){
                option += "<option value='"+element.id+"'>"+ element.name + "</option>";

              });
              $("#union_id").html(option);

 });
                 });

         


         
    </script>
    @endsection
