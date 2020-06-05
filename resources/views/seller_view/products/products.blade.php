@extends('seller_view/layout_seller')

@section('content')
	<div class="row">
		@foreach($products as $product)
			<div class="col">
				<div class="card" style="width: 18rem;">
				  <a href="/seller/product/details/{{$product->id}}" class="">
				    <img class="card-img-top" src="/storage/uploads/{{$product->img}}" alt="Card image cap">
				  </a>
				  <div class="card-body">
				    <h5 class="card-title">{{$product->name}}</h5>
				    <p class="card-text">{{$product->description}}</p>
				    <p class="card-text">Price: {{$product->price}}$</p>
				    <a href="/seller/products/edit/{{$product->id}}" class="btn btn-primary">Edit</a>
				    <a href="/seller/comments/{{$product->id}}" class="btn btn-success">View Comments</a>
				    <a href="/seller/products/destroy/{{$product->id}}	" style="color: white;" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
				  </div>
				</div>
			</div>
		@endforeach
	</div>
	
@endsection