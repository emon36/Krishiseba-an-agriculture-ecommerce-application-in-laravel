@extends('layouts.master')

@section('content')
	<div  class='container mt-5'>


<div class="widget">
			
		<h2 class="display-6">শপিং আইটেম</h2>
		@include('partials.messeage')
	

		@if(App\Cart::totalItems()>0)
		<div>


		<table class="table table-bordered table-striped ">
			<thead>
				<tr>
					<th></th>
					<th>প্রোডাক্ট</th>
					
					<th>পরিমাণ</th>
					<th>প্রতি ইউনিট মূল্য</th>
					<th>সর্বমোট মূল্য</th>
					<th>মুছে ফেলুন  </th>
				</tr>
			</thead>
			<tbody>

				@php
				$total_price = 0;

				@endphp
				@foreach(App\Cart::totalCarts() as $cart)

				<tr>
					<td width="100px"> 
						
						<img class="card-img-top feature-img" src="{{$cart->product->img}}" >
					</td>
					
					<td>
						{{$cart->product->title}}
					</td>
					
					<td width="100px">
						<form class="inline-from" action="{{route('carts.update',$cart->id)}}" method="post">
							@csrf
							<input type="number" name="product_quantity" class="from-control" value="{{$cart->product_quantity}}">
							<button type="submit" class="btn btn-success  mt-2"> সংযোজন করুন </button>
							
						</form>
					</td>

					<td>
						{{$cart->product->price}} টাকা
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
							<button type="submit"  input class="far fa-trash-alt" class="ml-5"> </button>
							
						</form>
					</td>
				</tr>
				@endforeach

				<tr>
					<td colspan="4"> </td>
						<td>
							সর্বমোট মূল্য
						 </td>
					<td colspan="2">
						{{ $total_price }}৳
					</td>
				</tr>



				
			</tbody>
		</table>
</div>

	<div class="float-right">
					<a href="{{route('products')}}" class="btn btn-info btn-md">আরো কিছু কিনুন</a>
					<a href="{{route('checkouts')}}" class="btn btn-warning btn-md">পেমেন্ট করুন</a>
				</div>
			
			
			@else
			<div class="alert alert-success">
				<strong>আপনার শপিং ব্যাগে কোনো পন্য নেই </strong>

				
           <a href="{{route('products')}}" class="btn btn-info btn-md"> কিছু কিনুন</a>
              

			</div>

			@endif

	</div>
</div>



@endsection