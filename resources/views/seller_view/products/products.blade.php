@extends('seller_view/layout_seller')

@section('content')
<a href="#" class="btn btn-success">Add Product</a>
	<div class="row">
		@foreach($products as $product)
			<div class="col">
				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="/storage/uploads/{{$product->img}}" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">{{$product->name}}</h5>
				    <p class="card-text">{{$product->description}}</p>
				    <a href="/seller/products/edit/{{$product->id}}" class="btn btn-primary">Edit</a>
				    <a href="/seller/comments/{{$product->id}}" class="btn btn-success">View Comments</a>
				  </div>
				</div>
			</div>
		@endforeach
	</div>

@endsection