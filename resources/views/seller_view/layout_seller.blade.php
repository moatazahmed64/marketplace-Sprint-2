<!DOCTYPE html>
<html>
<head>
	<title>Seller</title>
	<link rel="icon" href="{{ asset('images/icon2.png') }}">
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/seller.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Courgette|Lobster" rel="stylesheet">
</head>
<body>

	<!-- -------------------------------------------------------- -->
	<!-- -------------------------------------------------------- -->

		<!-- start navbar -->

			@include('seller_view/navbar')

		<!-- end navbar -->	

	<!-- -------------------------------------------------------- -->
	<!-- -------------------------------------------------------- -->	

		<!-- start carousel -->
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" style="margin-bottom: 30px">
			<div class="carousel-inner">
				<?php /*<div class="carousel-item active">
					<img src="{{ asset('images/trolley.jpg')}}" class="d-block w-100" alt="...">
				</div>*/?>
			</div>
			<div style=" position: absolute;
					     width: 100%;
					     height: 100%;
					     top: 0;
					     left:0;
					     background-color:rgba(0,0,0,.3);
					     z-index: 2;"></div>
		</div>

		<!-- end carousel -->

	<!-- -------------------------------------------------------- -->
	<!-- -------------------------------------------------------- -->

		<!-- start views -->

			<div class="main main-raised">
				@include('messages')
				@yield('content')
			</div>
			
		<!-- end views -->

	<!-- -------------------------------------------------------- -->
	<!-- -------------------------------------------------------- -->

		<!-- start footer -->

			<footer class="text-center mt-5">
		        <p>Made with <a href="#" target="_blank">ZzZ</a> by Creative Team</p>
		    </footer>

		<!-- end footer -->

	<!-- -------------------------------------------------------- -->
	<!-- -------------------------------------------------------- -->	


	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/my_script.js') }}"></script>
</body>
</html>