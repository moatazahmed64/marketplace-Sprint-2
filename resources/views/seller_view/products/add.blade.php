@extends('seller_view/layout_seller')

@section('content')

<div class="container text-center header-view">
		<h1>Add New Product</h1>
		<p>here you can add your Product</p>
</div>

<div class="container text-center">
	<form action="/seller/add" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-row">
			<div class="form-group col-6">
				<label for="inputName">Name</label>
				<input type="text" class="form-control" name="name" id="inputName" required="required" value="{{ old('name')}}"/>

				<label for="upload">IMG</label>
				<input type="file" id="upload" class="form-control" name="img" style=""/>    	

				<label for="inputDesc">Description</label>
				<input type="text" class="form-control" name="description" id="inputDesc"  value="{{ old('description') }}" required="required">

	    	</div>	

	    	<div class="form-group col-6">	

				<label for="inputprice">Price</label>
				<input type="text" class="form-control" name="price" id="inputprice"  value="{{ old('price') }}" required="required">

				<label for="inputcategory">Categories</label>
				<select id="inputcategory" class="form-control" name="category" >
					@foreach ($categories as $category ){
						<option value='{{ $category->id }}'>{{ $category->name }}</option>
					@endforeach
				</select>
			</div>	

				<input type="submit" value="Add" class="btn btn-info btn-block">

	    </div>		
	</form>
</div>

@endsection