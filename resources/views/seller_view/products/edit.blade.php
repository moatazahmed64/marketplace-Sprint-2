@extends('seller_view/layout_seller')

@section('content')
<div class="container text-center header-view">
		<h1>Edit <span>{{ $products->name }}</span></h1>
		<p>here you can edit your Product ....like (name,description.....etc)</p>
	</div>

		<div class="container">

			<form action="/seller/products/confirm/{{ $products->id }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
			  <div class="form-row">

			  	
			  	<div class="form-group col-lg-6 col-md-7 upload-img">

			    	<input type="file" id="upload" class="form-control" name="img" style="" />
			    	<img id="img" src="/storage/uploads/{{ $products->img }}" name="img">
			    	
			    	<div class="overlay-upload-img text-center">
			    		<div><i class="far fa-edit"></i> Edit</div>
			    	</div>

			    </div>
				


				
			    <div class="form-group col-lg-6 col-md-6">

			      
				  <div class="form-row">

				    <div class="form-group col">
				      <label for="inputName">Name</label>
				      <input type="text" class="form-control" name="name" id="inputName" required="required" value="{{ $products->name }}">
				    </div>

				  </div>
	

				  
				  <div class="form-row">

				    <div class="form-group col">
				      <label for="inputDesc">Description</label>
				      <input type="text" class="form-control" name="description" id="inputDesc"  value="{{ $products->description }}" required="required">
				    </div>

				  </div>


				  <div class="form-row">

				    <div class="form-group col">
				      <label for="inputDesc">Price</label>
				      <input type="text" class="form-control" name="price" id="inputprice"  value="{{ $products->Price }}" required="required">
				    </div>

				  </div>
		

				  
				  <input type="submit" value="Update" class="btn btn-info btn-block">

			    </div>
			    
			  	
			  </div>

			</form>	

	</div>

@endsection