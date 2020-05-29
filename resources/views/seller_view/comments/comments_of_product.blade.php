@extends('seller_view/layout_seller')


@section('content')

	
<div class="container text-center header-view">
	<h1> Product <span>Comments</span></h1>
	<p>here you can see all users comments in of this product</p>
</div>

<div class="container">
	<div class="responsive-table">
		<table class="table main-table table-striped table-bordered dt-responsive nowrap text-center">
			<thead>
				<tr>
					<th>Name</th>
					<th>Product_name</th>
					<th>Comment</th>
					<th>Comment_date</th>

				</tr>	
			</thead>
			@foreach ($comments as $comment) 
				<tr>
					<td>{{ $comment->user->name }}</td>
					<td>{{ $comment->product->name }}</td>
					<td>{{ $comment->comment }}</td>
					<td> <span style='color:grey;font-size:12px'>{{ $comment->created_at }}</span></td>
					
				</tr>
			@endforeach
		</table>	
	</div>
</div>



@endsection