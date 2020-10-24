<form class="" action="{{route('carts.store')}}" method="post">
	@csrf

	<input type="hidden" name="product_id" value="{{$product->id}}">
	<button type="submit"  class="btn btn-success fa fa-shopping-bag"> শপিং ব্যাগে রাখুন </button>
</form>