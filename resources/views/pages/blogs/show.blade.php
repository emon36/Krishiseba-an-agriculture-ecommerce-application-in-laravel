@extends('layouts.master')

@section('content')

<div class="container mt-5">
	<div class="row">


<div class="card" style="max-width:auto;">
  <div class="card-body">
  	<h5>{{$post->title}}</h5>
  	<small>{{$post->created_at->diffForHumans()}}</small>
  	<hr>
    <p>
    	{!! htmlspecialchars_decode($post->body) !!}
    </p>
  </div>
</div>
</div>
</div>

@endsection